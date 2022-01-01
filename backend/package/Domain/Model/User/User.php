<?php

namespace Package\Domain\Model\User;

class User {
  private UserId $id;
  private UserEmail $email;
  
  public getId() {
    return $this->id->value();
  }

  public getEmail() {
    return $this->email->value();
  }
}