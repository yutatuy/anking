<?php

namespace Package\Application\User\Login;

class UserLoginUsecase
{
    public function exec(UserLoginInput $input): UserLoginOutput
    {

        $email = $input->getUserEmail()->value();
        $password = $input->getUserPassword()->value();

        if (!$token = auth()->attempt([
            'email' => $email,
            'password' => $password
        ])) {
            throw new \Exception('認証に失敗しました。');
        }

        $result = [
            'accessToken' => $token,
            'tokenType' => 'bearer',
            'expiresIn' => auth()->factory()->getTTL() * 60
        ];

        return new UserLoginUsecaseOutput($result);
    }
}
