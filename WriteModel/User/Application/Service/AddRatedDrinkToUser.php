<?php

namespace User\Application\Service;

use Core\Application\Service\WithRecordedEvents;
use SimpleBus\Message\Message;
use User\Domain\Repository\UserRepository;

final class AddRatedDrinkToUser extends WithRecordedEvents
{
    /** @var UserRepository */
    private $user_repository;

    public function __construct(UserRepository $a_user_repository)
    {
        $this->user_repository = $a_user_repository;
    }

    /**
     * Handles the given message.
     *
     * @param Message $message
     *
     * @return void
     */
    public function handle(Message $message)
    {
        $user = $this->user_repository->getById($message->userId());
        $user->addDrink($message->drinkId());
        $this->user_repository->add($user);
        $this->recordEvents($user);
    }
}
