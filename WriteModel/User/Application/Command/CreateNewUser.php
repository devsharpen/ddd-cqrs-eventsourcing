<?php

namespace User\Application\Command;

use SimpleBus\Message\Type\Command;
use User\Domain\Model\Email;

class CreateNewUser implements Command
{
    /** @var string */
    private $name;

    /** @var string */
    private $email;

    public function __construct($a_name, $an_email)
    {
        $this->name  = $a_name;
        $this->email = new Email($an_email);
    }

    /**
     * @return string
     */
    public function name()
    {
        return $this->name;
    }

    /**
     * @return Email
     */
    public function email()
    {
        return $this->email;
    }
}
