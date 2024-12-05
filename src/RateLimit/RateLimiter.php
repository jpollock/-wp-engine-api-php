<?php

namespace WPEngine\RateLimit;

use GuzzleHttp\Promise\Promise;

class RateLimiter
{
    private float $tokens;
    private float $lastRefill;
    private float $maxTokens;
    private float $refillRate;
    private float $refillInterval;

    public function __construct(float $maxRequestsPerSecond = 5)
    {
        $this->maxTokens = $maxRequestsPerSecond;
        $this->tokens = $maxRequestsPerSecond;
        $this->lastRefill = microtime(true);
        $this->refillRate = $maxRequestsPerSecond;
        $this->refillInterval = 1.0; // 1 second
    }

    private function refillTokens(): void
    {
        $now = microtime(true);
        $timePassed = $now - $this->lastRefill;
        $tokensToAdd = ($timePassed / $this->refillInterval) * $this->refillRate;
        
        $this->tokens = min($this->maxTokens, $this->tokens + $tokensToAdd);
        $this->lastRefill = $now;
    }

    public function acquire(): Promise
    {
        $this->refillTokens();
        $promise = new Promise();

        if ($this->tokens >= 1) {
            $this->tokens -= 1;
            $promise->resolve(true);
            return $promise;
        }

        // Calculate wait time until next token is available
        $waitTime = (int)(((1 - $this->tokens) / $this->refillRate) * 1000000); // Convert to microseconds
        
        usleep($waitTime);
        $this->refillTokens();
        $this->tokens -= 1;
        $promise->resolve(true);
        
        return $promise;
    }

    public function getAvailableTokens(): float
    {
        $this->refillTokens();
        return $this->tokens;
    }

    public function getWaitTime(): float
    {
        $this->refillTokens();
        if ($this->tokens >= 1) {
            return 0;
        }
        return ((1 - $this->tokens) / $this->refillRate) * 1000; // Return milliseconds
    }
}
