<?php

namespace Package\Adapter\Gateway;

use Package\Domain\Model\Word\Word;
use Package\Domain\Model\Word\WordId;
use Package\Domain\Model\Word\WordWordbookId;
use Package\Domain\Model\Word\WordFrontContent;
use Package\Domain\Model\Word\WordBackContent;
use Package\Domain\Model\Word\WordRepository;
use Package\Infrastructure\Dao\Eloquent\Word\WordDao;
use App\Models\EloquentWord;

class WordGateway implements WordRepository {
    private WordDao $word_dao;

    public function __construct(WordDao $word_dao)
    {
        $this->word_dao = $word_dao;
    }

    public function findById(WordId $id): ?Word
    {
        $eloquent_word = $this->word_dao->findById($id->value());
        if(is_null($eloquent_word)) return null;
        return $this->createFromEloquent($eloquent_word);
    }

    public function fetchByWordbookId(WordWordbookId $id): array
    {
        $eloquent_word_list = $this->word_dao->fetchByWordbookId($id->value());
        $word_list = [];
        foreach ($eloquent_word_list as $eloquent_word) {
            $word_list[] = $this->createFromEloquent($eloquent_word);
        }
        return $word_list;
    }

    public function create(Word $word)
    {
        $wordbook_id = $word->wordbookId()->value();
        $front_content = $word->frontContent()->value();
        $back_content = $word->backContent()->value();

        $this->word_dao->create($wordbook_id, $front_content, $back_content);
    }

    public function update(Word $word)
    {
        $id = $word->id()->value();
        $eloquent_word = $this->word_dao->findById($id);

        $eloquent_word->front_content = $word->frontContent()->value();
        $eloquent_word->back_content = $word->backContent()->value();

        $this->word_dao->save($eloquent_word);
    }

    public function delete(Word $word)
    {
        $id = $word->id()->value();
        $eloquent_word = $this->word_dao->findById($id);
        $this->word_dao->delete($eloquent_word);
    }

    public function createFromEloquent(EloquentWord $eloquent_word): Word
    {
        return Word::reconstruct(
            new WordId($eloquent_word->id), 
            new WordWordbookId($eloquent_word->wordbook_id), 
            new WordFrontContent($eloquent_word->front_content), 
            new WordBackContent($eloquent_word->back_content)
        );
    }
}

