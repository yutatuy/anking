<?php

namespace Package\Adapter\Presenter\User;

use Illuminate\Http\JsonResponse;
use Package\Adapter\Presenter\JsonPresenter;
use Package\Adapter\ViewModel\User\UserViewModel;
use Package\Application\User\Create\UserCreateOutput;

class UserCreateJsonPresenter extends JsonPresenter
{
    public function exec(UserCreateOutput $output): JsonResponse
    {
        $view_model = new UserViewModel($output->getUser());

        return $this->jsonResponse(
            [
                'status' => 'success',
                'user' => [
                    'id' => $view_model->getId(),
                    'name' => $view_model->getName(),
                    'email' => $view_model->getEamil()
                ]
            ]
        );
    }
}
