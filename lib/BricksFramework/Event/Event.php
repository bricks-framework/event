<?php

/** @copyright Sven Ullmann <kontakt@sumedia-webdesign.de> **/

declare(strict_types=1);

namespace BricksFramework\Event;

class Event implements EventInterface
{
    /**
     * @var mixed
     */
    protected $target;

    /**
     * @var string
     */
    protected $eventName;

    protected $params = [];

    protected $isStopPropagation = false;

    /**
     * If the return of this event is a returnable to the event triggering method
     */
    protected $isReturnable = false;

    protected $return = null;

    /**
     * EventResult constructor.
     *
     * @param mixed                 $target
     * @param string                $eventName
     * @param array                 &$params
     */
    public function __construct($target, $eventName, array &$params = [], $return = null)
    {
        $this->target = $target;
        $this->eventName = $eventName;
        $this->params = &$params;
        if (null !== $return) {
            $this->setReturn($return);
        }
    }

    /**
     * @return mixed
     */
    public function getTarget()
    {
        return $this->target;
    }

    public function getEventName() : string
    {
        return $this->eventName;
    }

    public function getParams(): array
    {
        return $this->params;
    }

    /**
     * @param mixed $key
     * @param mixed $value
     */
    public function setParam($key, $value) : void
    {
        $this->params[$key] = $value;
    }

    public function stopPropagation() : void
    {
        $this->isStopPropagation = true;
    }

    public function isPropagationStopped(): bool
    {
        return $this->isStopPropagation;
    }

    /**
     * @param bool $returnable
     */
    public function setIsReturnable(bool $returnable) : void
    {
        $this->isReturnable = $returnable;
    }

    /**
     * @return bool
     */
    public function isReturnable() : bool
    {
        return $this->isReturnable;
    }

    /**
     * @param $mixed
     */
    public function setReturn($mixed) : void
    {
        $this->return = $mixed;
    }

    /**
     * @return array
     */
    public function getReturn()
    {
        return $this->return;
    }
}
