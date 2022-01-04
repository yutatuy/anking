<?php

namespace Package\Adapter\Converter\User;

use Package\Domain\Model\User\UserName;
use Package\Domain\Model\User\UserEmail;
use Package\Domain\Model\User\UserPassword;
use App\Http\Requests\UserCreateRequest;
use Package\Application\User\Create\UserCreateInput;

class UserCreateRequestConverter implements UserCreateInput {

  private $request;

  public function __construct(UserCreateRequest $input)
  {
    $this->request = $input;
  }

  public function getName(): UserName
  {
    return new UserName($this->request->name);
  }

  public function getEmail(): UserEmail
  {
    return new UserEmail($this->request->email);
  }

  public function getPassword(): UserPassword
  {
    return new UserPassword($this->request->password);
  }
}

