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

    public function fetchAll(): array
    {
        $eloquent_wordbook_list = $this->wordbook_dao->fetchMine();
        $wordbook_list = [];
        foreach ($eloquent_wordbook_list as $eloquent_wordbook) {
            $wordbook_list[] = $this->createFromEloquent($eloquent_wordbook);
        }
        return $wordbook_list;
    }

    public function findById(WordbookId $id): ?Wordbook
    {
        $eloquent_wordbook = $this->wordbook_dao->findById($id->value());
        if(is_null($eloquent_wordbook)) return null;
        return $this->createFromEloquent($eloquent_wordbook);
    }

    public function create(Wordbook $wordbook)
    {
        $title = $wordbook->title()->value();
        $user_id = $wordbook->userId()->value();
        $is_public = $wordbook->isPublic()->value();

        $this->wordbook_dao->create($title, $user_id, $is_public);
    }

    public function update(Wordbook $wordbook)
    {
        $id = $wordbook->id()->value();

        $eloquent_wordbook = $this->wordbook_dao->findById($id);
        $eloquent_wordbook->title = $wordbook->title()->value();
        $eloquent_wordbook->is_public = $wordbook->isPublic()->value();

        $this->wordbook_dao->save($eloquent_wordbook);
    }

    public function delete(Wordbook $wordbook)
    {
        $id = $wordbook->id()->value();
        $eloquent_wordbook = $this->wordbook_dao->findById($id);
        $this->wordbook_dao->delete($eloquent_wordbook);
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

