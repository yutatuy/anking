<?php

namespace Package\Application\UserPlay\Ranking;

class UserPlayRankingUsecaseOutput implements UserPlayRankingOutput {

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