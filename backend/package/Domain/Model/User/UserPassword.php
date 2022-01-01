<?php

namespace Package\Domain\Model\User;

class UserPassword
{
    /**
     * @var string
     */
    private string $value;

    /**
     * UserName constructor.
     * @param string $value
     * @throws \Exception
     */
    public function __construct(string $value)
    {
        // 半角大小英数字をそれぞれ1種類以上含む8文字以上100文字以下
        if (!preg_match('/\A(?=.*?[a-z])(?=.*?[A-Z])(?=.*?\d)[a-zA-Z\d]{8,100}+\z/', $value)) {
            throw new \Exception('パスワードが不正です。');
        }
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function value(): string
    {
        return $this->value;
    }
}
