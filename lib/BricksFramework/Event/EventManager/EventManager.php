<?php

/** @copyright Sven Ullmann <kontakt@sumedia-webdesign.de> **/

namespace BricksFramework\Event\EventManager;

use Psr\EventDispatcher\EventDispatcherInterface;

class EventManager implements EventManagerInterface, EventDispatcherInterface
{
    protected $listeners = [];

    /** @param \BricksFramework\Event\Event $event */
    public function dispatch(object $event) : void
    {
        if (!isset($this->listeners[$event->getEventName()])) {
            return;
        }

        foreach ($this->listeners[$event->getEventName()] as $listener) {
            $listener($event);
        }
    }

    public function addListener(string $eventName, callable $listener) : void
    {
        $this->listeners[$eventName][] = $listener;
    }

    public function getListeners() : array
    {
        return $this->listeners;
    }

    public function removeListener(string $eventName, callable $listener) : void
    {
        if (!isset($this->listeners[$eventName])) {
            return;
        }

        while (false !== ($key = array_search($listener, $this->listeners[$eventName]))) {
            unset($this->listeners[$eventName][$key]);
        }
    }

    public function removeListeners(string $eventName) : void
    {
        if (!isset($this->listeners[$eventName])) {
            return;
        }

        unset($this->listeners[$eventName]);
    }
}