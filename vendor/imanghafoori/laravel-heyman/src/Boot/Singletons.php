<?php

namespace Imanghafoori\HeyMan\Boot;

use Imanghafoori\HeyMan\Chain;
use Imanghafoori\HeyMan\HeyMan;
use Imanghafoori\HeyMan\HeyManSwitcher;
use Imanghafoori\HeyMan\Reactions\ReactionFactory;
use Imanghafoori\HeyMan\WatchingStrategies\EloquentEventsManager;
use Imanghafoori\HeyMan\WatchingStrategies\EventManager;
use Imanghafoori\HeyMan\WatchingStrategies\RouterEventManager;
use Imanghafoori\HeyMan\WatchingStrategies\ViewEventManager;
use Imanghafoori\HeyMan\YouShouldHave;

class Singletons
{
    public static function make($app)
    {
        $singletons = self::singletons();

        foreach ($singletons as $class) {
            $app->singleton($class, $class);
        }
    }

    /**
     * @return array
     */
    private static function singletons(): array
    {
        return [
            HeyManSwitcher::class,
            Chain::class,
            HeyMan::class,
            YouShouldHave::class,
            ReactionFactory::class,
            EventManager::class,
            RouterEventManager::class,
            ViewEventManager::class,
            EloquentEventsManager::class,
        ];
    }
}
