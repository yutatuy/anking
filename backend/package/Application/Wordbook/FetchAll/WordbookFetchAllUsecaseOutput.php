<?php

namespace Package\Application\Wordbook\FetchAll;

class WordbookFetchAllUsecaseOutput implements WordbookFetchAllOutput {

  private array $data;

  public function __construct(array $data)
  {
    $this->data = $data;
  }

  public function getData(): array
  {
    return $this->data;
  }
}