<?php

namespace Imanghafoori\HeyMan\WatchingStrategies;

class EventManager extends BaseManager
{
    public function register($event, array $callback)
    {
        \Event::listen($event, $callback[0]);
    }
}
