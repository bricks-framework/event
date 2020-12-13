<?php

/** @copyright Sven Ullmann <kontakt@sumedia-webdesign.de> **/

namespace BricksFramework\Event;

use Psr\EventDispatcher\StoppableEventInterface;

interface EventInterface extends StoppableEventInterface
{
    public function getTarget();

    public function getEventName() : string;

    public function getParams() : array;

    public function setParam($key, $value) : void;

    public function stopPropagation() : void;

    public function setReturn($mixed) : void;

    public function getReturn();
}
