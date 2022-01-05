<?php

namespace Package\Application\Word\FetchByWordbookId;

class WordFetchByWordbookIdUsecaseOutput implements WordFetchByWordbookIdOutput {

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