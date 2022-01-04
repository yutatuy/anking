<?php

namespace Package\Domain\Model\Wordbook;

class WordbookTitle {
  private string $value;

  public function __construct(string $value)
  {
    if(strlen($value) >= 100){
      throw new \Exception('100文字以下の名前にしてください');
    }
    $this->value = $value;
  }

  public function value(): string
  {
    return $this->value;
  }
}