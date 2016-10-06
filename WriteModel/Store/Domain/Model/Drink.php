<?php

namespace Store\Domain\Model;

use Core\Infrastructure\EventBus\DomainEventRecorder;

class Drink
{
    /** @var DrinkId */
    private $id;

    /** @var string */
    private $name;

    private function __construct(
        DrinkId $an_id
    )
    {
        $this->id   = $an_id;
    }

    public static function create(
        DrinkId $an_id,
        string $a_name
    )
    {
        $drink = new self($an_id, $a_name);
        $drink->setName($a_name);
        DomainEventRecorder::instance()->recordMessage(new DrinkWasCreated($an_id, $a_name));

        return $drink;
    }

    /**
     * @return DrinkId
     */
    public function id()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function name()
    {
        return $this->name;
    }

    private function setName($a_name)
    {
        $this->name = $a_name;
    }

}
