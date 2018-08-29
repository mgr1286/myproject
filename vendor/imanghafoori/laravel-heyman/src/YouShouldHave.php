<?php

namespace Imanghafoori\HeyMan;

use Illuminate\Support\Facades\Gate;
use Imanghafoori\HeyMan\Reactions\Reactions;
use Imanghafoori\HeyMan\Reactions\Validator;

class YouShouldHave
{
    public $condition;

    /**
     * @var Chain
     */
    private $chain;

    /**
     * YouShouldHave constructor.
     *
     * @param Chain $chain
     */
    public function __construct(Chain $chain)
    {
        $this->chain = $chain;
    }

    public function youShouldHaveRole(string $role): Otherwise
    {
        return $this->thisGateShouldAllow('heyman.youShouldHaveRole', $role);
    }

    public function thisGateShouldAllow($gate, ...$parameters): Otherwise
    {
        $gate = $this->defineNewGate($gate);

        $this->chain->condition = function (...$payload) use ($gate, $parameters) {
            return Gate::allows($gate, (array_merge($parameters, ...$payload)));
        };

        return app(Otherwise::class);
    }

    public function thisClosureShouldAllow(callable $callback, array $parameters = []): Otherwise
    {
        return $this->thisMethodShouldAllow($callback, $parameters);
    }

    public function thisMethodShouldAllow($callback, array $parameters = []): Otherwise
    {
        $this->chain->condition = function (...$payload) use ($callback, $parameters) {
            return (bool) app()->call($callback, array_merge($parameters, ...$payload));
        };

        return app(Otherwise::class);
    }

    public function thisValueShouldAllow($value): Otherwise
    {
        $this->chain->condition = function () use ($value) {
            return (bool) $value;
        };

        return app(Otherwise::class);
    }

    public function youShouldBeGuest($guard = null): Otherwise
    {
        $this->chain->condition = function () use ($guard) {
            return auth($guard)->guest();
        };

        return app(Otherwise::class);
    }

    public function sessionShouldHave($key): Otherwise
    {
        $this->chain->condition = function () use ($key) {
            return session()->has($key);
        };

        return app(Otherwise::class);
    }

    public function youShouldBeLoggedIn($guard = null): Otherwise
    {
        $this->chain->condition = function () use ($guard) {
            return auth($guard)->check();
        };

        return app(Otherwise::class);
    }

    public function youShouldAlways(): Reactions
    {
        $this->chain->condition = function () {
            return false;
        };

        return app(Reactions::class);
    }

    /**
     * Validate the given request with the given rules.
     *
     * @param array $rules
     * @param array $messages
     * @param array $customAttributes
     *
     * @return \Imanghafoori\HeyMan\Reactions\Validator
     */
    public function yourRequestShouldBeValid($rules, array $messages = [], array $customAttributes = []): Validator
    {
        return new Validator($this->chain, [$rules, $messages, $customAttributes]);
    }

    /**
     * @param $gate
     *
     * @return string
     */
    private function defineNewGate($gate): string
    {
        // Define a Gate for inline closures passed as gate
        if (is_callable($gate)) {
            $closure = $gate;
            $gate = str_random(10);
            Gate::define($gate, $closure);
        }

        // Define a Gate for "class@method" gates
        if (is_string($gate) && str_contains($gate, '@')) {
            Gate::define($gate, $gate);
        }

        return $gate;
    }
}
