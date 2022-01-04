<?php

namespace Package\Adapter\ViewModel\Wordbook;

use Package\Adapter\ViewModel\JsonViewModel;
use Package\Domain\Model\Wordbook\Wordbook;

class WordbookViewModel implements JsonViewModel {
    private Wordbook $wordbook;

    public function __construct(Wordbook $wordbook)
    {
        $this->wordbook = $wordbook;
    }

    public function getId(): int
    {
        return $this->wordbook->id()->value();
    }

    public function getUserId(): int
    {
        return $this->wordbook->userId()->value();
    }

    public function getTitle(): string
    {
        return $this->wordbook->title()->value();
    }

    public function getIsPublic(): bool
    {
        return $this->wordbook->isPublic()->value();
    }
    
    public function toArray(): array
    {
        return [
            'id' => $this->getId(),
            'user_id' => $this->getUserId(),
            'title' => $this->getTitle(),
            'is_public' => $this->getIsPublic()
        ];
    }
}