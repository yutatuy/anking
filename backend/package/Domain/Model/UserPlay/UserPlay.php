<?php

namespace Package\Domain\Model\UserPlay;

use Package\Domain\Model\User\UserId;

class UserPlay {
    private UserPlayId $id;
    private UserId $user_id;
    private UserPlayCount $count;

    public static function create(UserId $user_id, UserPlayCount $count): UserPlay
    {
        $user_play = new UserPlay();
        $user_play->user_id = $user_id;
        $user_play->count = $count;

        return $user_play;
    }

    public static function reconstruct(UserPlayId $id, UserId $user_id, UserPlayCount $count): UserPlay
    {
        $user_play = new UserPlay();
        $user_play->id = $id;
        $user_play->user_id = $user_id;
        $user_play->count = $count;

        return $user_play;
    }

    public function id(): UserPlayId
    {
        return $this->id;
    }

    public function userId(): UserId
    {
        return $this->user_id;
    }

    public function count(): UserPlayCount
    {
        return $this->count;
    }

    public function changeCount(UserPlayCount $count)
    {
        $this->count = $count;
    }
}