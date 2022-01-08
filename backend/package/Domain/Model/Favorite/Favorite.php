<?php 

namespace Package\Domain\Model\Favorite;

use Package\Domain\Model\User\UserId;
use Package\Domain\Model\Wordbook\WordbookId;

class Favorite
{
    private FavoriteId $id;
    private UserId $user_id;
    private WordbookId $wordbook_id;

    private function __construct() { }

    public static function create(UserId $user_id, WordbookId $wordbook_id): Favorite
    {
        $favorite = new Favorite();
        $favorite->user_id = $user_id;
        $favorite->wordbook_id = $wordbook_id;

        return $favorite;
    }

    public static function reconstruct(FavoriteId $id, UserId $user_id, WordbookId $wordbook_id): Favorite
    {
        $favorite = new Favorite();
        $favorite->id = $id;
        $favorite->user_id = $user_id;
        $favorite->wordbook_id = $wordbook_id;

        return $favorite;
    }

    public function id(): FavoriteId
    {
        return $this->id;
    }

    public function userId(): UserId
    {
        return $this->user_id;
    }

    public function wordbookId(): WordbookId
    {
        return $this->wordbook_id;
    }
}