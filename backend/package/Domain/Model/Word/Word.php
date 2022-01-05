<?php

namespace Package\Domain\Model\Word;

class Word {
    private WordId $id;
    private WordWordbookId $wordbook_id;
    private WordFrontContent $front_content;
    private WordBackContent $back_content;

    public static function create(WordWordbookId $wordbook_id ,WordFrontContent $front_content,  WordBackContent $back_content): Word
    {
        $word = new Word();
        $word->wordbook_id = $wordbook_id;
        $word->front_content = $front_content;
        $word->back_content = $back_content;

        return $word;
    }

    public static function reconstruct(WordId $id, WordWordbookId $wordbook_id ,WordFrontContent $front_content, WordBackContent $back_content): Word
    {
        $word = new Word();
        $word->id = $id;
        $word->wordbook_id = $wordbook_id;
        $word->front_content = $front_content;
        $word->back_content = $back_content;

        return $word;
    }

    public function id(): WordId
    {
        return $this->id;
    }

    public function wordbookId(): WordWordbookId
    {
        return $this->wordbook_id;
    }

    public function frontContent(): WordFrontContent
    {
        return $this->front_content;
    }

    public function backContent(): WordBackContent
    {
        return $this->back_content;
    }

    public function changeFrontContent(WordFrontContent $front_content)
    {
        $this->front_content = $front_content;
    }

    public function changeBackContent(WordBackContent $back_content)
    {
        $this->back_content = $back_content;
    }

}