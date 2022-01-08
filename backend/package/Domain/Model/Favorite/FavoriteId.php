<?php 

namespace Package\Domain\Model\Favorite;

class FavoriteId
{
  private $value;

  public function __construct(int $value) {
    $this->value = $value;
  }

  public function value(): int
  {
    return $this->value;
  }
}