<?php

namespace WPEngine\Tests\Unit\RateLimit;

use PHPUnit\Framework\TestCase;
use WPEngine\RateLimit\RateLimiter;

class RateLimiterTest extends TestCase
{
    public function testInitialTokens()
    {
        $limiter = new RateLimiter(5);
        $this->assertEquals(5, $limiter->getAvailableTokens());
    }

    public function testTokenConsumption()
    {
        $limiter = new RateLimiter(5);
        $promise = $limiter->acquire();
        $promise->wait(); // Wait for promise to resolve

        $this->assertEquals(4, round($limiter->getAvailableTokens()));
    }

    public function testTokenRefill()
    {
        $limiter = new RateLimiter(5);
        
        // Consume all tokens
        for ($i = 0; $i < 5; $i++) {
            $promise = $limiter->acquire();
            $promise->wait();
        }

        $this->assertEquals(0, round($limiter->getAvailableTokens()));

        // Wait for 1 second to allow token refill
        sleep(1);
        
        // Should have refilled all tokens
        $this->assertEquals(5, round($limiter->getAvailableTokens()));
    }

    public function testWaitTimeCalculation()
    {
        $limiter = new RateLimiter(5);
        
        // Initially should have no wait time
        $this->assertEquals(0, $limiter->getWaitTime());

        // Consume all tokens
        for ($i = 0; $i < 5; $i++) {
            $promise = $limiter->acquire();
            $promise->wait();
        }

        // Should have wait time now
        $this->assertGreaterThan(0, $limiter->getWaitTime());
    }

    public function testRateLimitingBehavior()
    {
        $limiter = new RateLimiter(2); // 2 requests per second
        $startTime = microtime(true);

        // Make 4 requests
        for ($i = 0; $i < 4; $i++) {
            $promise = $limiter->acquire();
            $promise->wait();
        }

        $endTime = microtime(true);
        $duration = $endTime - $startTime;

        // With 2 requests per second and 4 requests total,
        // it should take at least 1.5 seconds (2 requests in first second, 2 in next second)
        $this->assertGreaterThan(0.9, $duration, "Rate limiting should enforce delay between requests");
    }

    public function testPartialTokenRefill()
    {
        $limiter = new RateLimiter(10); // 10 requests per second
        
        // Consume 5 tokens
        for ($i = 0; $i < 5; $i++) {
            $promise = $limiter->acquire();
            $promise->wait();
        }

        // Wait for 0.5 seconds
        usleep(500000);

        // Should have refilled approximately 5 tokens (10 tokens/sec * 0.5 sec)
        $availableTokens = $limiter->getAvailableTokens();
        $this->assertGreaterThanOrEqual(7.0, $availableTokens);
        $this->assertLessThanOrEqual(10.0, $availableTokens);
    }

    public function testMaxTokensCap()
    {
        $limiter = new RateLimiter(5);
        
        // Wait for more than 1 second to ensure full refill
        sleep(2);
        
        // Should still only have 5 tokens (max)
        $this->assertEquals(5, round($limiter->getAvailableTokens()));
    }
}
