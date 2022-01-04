<?php

namespace Package\Domain\Model\Wordbook;

class Wordbook {
    private WordbookId $id;
    private WordbookUserId $user_id;
    private WordbookTitle $title;
    private WordbookIsPublic $is_public;

    public static function create(WordbookTitle $title, WordbookUserId $user_id, WordbookIsPublic $is_public): Wordbook
    {
        $wordbook = new Wordbook();
        $wordbook->title = $title;
        $wordbook->user_id = $user_id;
        $wordbook->is_public = $is_public;

        return $wordbook;
    }

    public static function reconstruct(WordbookId $id, WordbookTitle $title, WordbookUserId $user_id, WordbookIsPublic $is_public): Wordbook
    {
        $wordbook = new Wordbook();
        $wordbook->id = $id;
        $wordbook->title = $title;
        $wordbook->user_id = $user_id;
        $wordbook->is_public = $is_public;

        return $wordbook;
    }

    public function id(): WordbookId
    {
        return $this->id;
    }

    public function userId(): WordbookUserId
    {
        return $this->user_id;
    }

    public function title(): WordbookTitle
    {
        return $this->title;
    }

    public function isPublic(): WordbookIsPublic
    {
        return $this->is_public;
    }

    public function changeTitle(WordbookTitle $title)
    {
        $this->title = $title;
    }

    public function changeIsPublic(WordbookIspublic $is_public)
    {
        $this->is_public = $is_public;
    }

}