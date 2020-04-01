<?php


namespace App\Event;

use Symfony\Contracts\EventDispatcher\Event;

class UselessEvent extends  Event
{
    public const NAME = 'useless.nothing';

    private $value;

    public function __construct($value)
    {
        $this->value = $value;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param mixed $value
     */
    public function setValue($value): UselessEvent
    {
        $this->value = $value;
        return $this;
    }


}