<?php

namespace Package\Infrastructure\Dao\eloquent\Word;
use Illuminate\Support\Facades\Auth;
use App\Models\EloquentWord;
use App\Models\EloquentWordbook;

class WordDao {

    public function findById(int $id): ?EloquentWord
    {
        $user_id = Auth::id();
        $word = EloquentWord::with(
            [
                'wordbook' => function($query) use ($user_id) {
                    $query->where(
                        'user_id', '=', $user_id
                    );
                }
            ]
        )->where(['id' => $id])->first();

        return $word;
    }

    public function create(int $wordbook_id, string $front_content, string $back_content)
    {
        EloquentWord::create(
            [
                'wordbook_id' => $wordbook_id,
                'front_content' => $front_content,
                'back_content' => $back_content,
            ]
        );
    }

    public function save(EloquentWord $word)
    {
        $word->save();
    }

    public function delete(EloquentWord $word)
    {
        $word->delete();
    }
}