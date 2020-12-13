<?php

/** @copyright Sven Ullmann <kontakt@sumedia-webdesign.de> **/

namespace BricksFramework\Event\EventManager;

interface EventManagerInterface
{
    public function addListener(string $eventName, callable $listener) : void;
    public function getListeners() : array;
    public function removeListener(string $eventName, callable $listener) : void;
    public function removeListeners(string $eventName) : void;
}