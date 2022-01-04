<?php

namespace Package\Adapter\ViewModel\User;

use Package\Adapter\ViewModel\JsonViewModel;
use Package\Domain\Model\User\User;

class UserViewModel implements JsonViewModel
{
    private User $user;

    /**
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getId(): int
    {
        return $this->user->id()->value();
    }

    public function getName(): string
    {
        return $this->user->name()->value();
    }

    public function getEamil(): string
    {
        return $this->user->email()->value();
    }

    public function toArray(): array
    {
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'email' => $this->getEamil()
        ];
    }
}
