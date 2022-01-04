<?php

namespace Package\Adapter\Gateway;

use Package\Domain\Model\Wordbook\Wordbook;
use Package\Domain\Model\Wordbook\WordbookId;
use Package\Domain\Model\Wordbook\WordbookTitle;
use Package\Domain\Model\Wordbook\WordbookUserId;
use Package\Domain\Model\Wordbook\WordbookIsPublic;
use Package\Domain\Model\Wordbook\WordbookRepository;
use Package\Infrastructure\Dao\Eloquent\Wordbook\WordbookDao;
use Package\Domain\Model\User\UserId;
use App\Models\EloquentWordbook;

class WordbookGateway implements WordbookRepository {
    private WordbookDao $wordbook_dao;

    public function __construct(WordbookDao $wordbook_dao)
    {
        $this->wordbook_dao = $wordbook_dao;
    }

    public function fetchAll(UserId $user_id): array
    {
        $eloquent_wordbook_list = $this->wordbook_dao->fetchAll($user_id->value());
        $wordbook_list = [];
        foreach ($eloquent_wordbook_list as $eloquent_wordbook) {
            $wordbook_list[] = $this->createFromEloquent($eloquent_wordbook);
        }
        return $wordbook_list;
    }

    public function create(Wordbook $wordbook)
    {
        $title = $wordbook->title()->value();
        $user_id = $wordbook->userId()->value();
        $is_public = $wordbook->isPublic()->value();

        $this->wordbook_dao->create($title, $user_id, $is_public);
    }

    public function createFromEloquent(EloquentWordbook $eloquent_wordbook)
    {
        return Wordbook::reconstruct(
            new WordbookId($eloquent_wordbook->id), 
            new WordbookTitle($eloquent_wordbook->title), 
            new WordbookUserId($eloquent_wordbook->user_id), 
            new WordbookIsPublic($eloquent_wordbook->is_public)
        );
    }
}

