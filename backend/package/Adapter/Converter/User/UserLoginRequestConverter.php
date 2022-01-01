<?php 

namespace Package\Adapter\Converter\User;
use App\Http\Requests\UserLoginRequest;
use Package\Domain\Model\User\UserEmail;
use Package\Domain\Model\User\UserPassword;
use Package\Application\User\Login\UserLoginInput;

class UserLoginRequestConverter implements UserLoginInput {
  private $request;

  public function __construct(UserLoginRequest $input) {
    $this->request = $input;
  }

  public function getUserEmail(): UserEmail
  {
    return new UserEmail($this->request->email);
  }

  public function getUserPassword(): UserPassword
  {
    return new UserPassword($this->request->password);
  }
}