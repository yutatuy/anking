<?php

namespace Package\Adapter\Presenter\User;

use Illuminate\Http\JsonResponse;
use Package\Adapter\Presenter\JsonPresenter;
use Package\Adapter\ViewModel\User\UserLoginViewModel;
use Package\Application\User\Login\UserLoginOutput;

class UserLoginPresenter extends JsonPresenter{

  public function exec($output): JsonResponse
  {
    $view_model = new UserLoginViewModel($output->getData());

    return $this->jsonResponse(
      [
        'status' => 'success',
        'results' => $view_model,
      ]
    );
  }
}