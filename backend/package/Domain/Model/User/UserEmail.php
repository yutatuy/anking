<?php

namespace Package\Domain\Model\User;

class UserEmail
{
    private string $value;

    public function __construct(string $value)
    {
      if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
        throw new \Exception('メールアドレスが正しくありません');
      }
      $this->value = $value;
    }

    public function value(): string
    {
      return $this->value;
    }

    public function equals(UserEmail $other): bool
    {
      return $this->value === $other->value();
    }
}
