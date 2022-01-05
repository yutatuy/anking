<?php

namespace Package\Adapter\ViewModel\Word;

use Package\Adapter\ViewModel\JsonViewModel;
use Package\Domain\Model\Word\Word;

class WordViewModel implements JsonViewModel {
    private Word $word;

    public function __construct(Word $word)
    {
        $this->word = $word;
    }

    public function getId(): int
    {
        return $this->word->id()->value();
    }

    public function getWordbookId(): int
    {
        return $this->word->wordbookId()->value();
    }

    public function getFrontContent(): string
    {
        return $this->word->frontContent()->value();
    }

    public function getBackContent(): string
    {
        return $this->word->backContent()->value();
    }

    public function toArray(): array
    {
        return [
            'id' => $this->getId(),
            'wordbook_id' => $this->getWordbookId(),
            'front_content' => $this->getFrontContent(),
            'back_content' => $this->getBackContent()
        ];
    }
}