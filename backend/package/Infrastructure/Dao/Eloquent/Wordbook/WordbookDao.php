<?php

namespace Package\Infrastructure\Dao\eloquent\Wordbook;
use Illuminate\Support\Facades\Auth;
use App\Models\EloquentWordbook;

class WordbookDao {

    public function fetchAll(int $user_id)
    {
        return EloquentWordbook::where('user_id', $user_id)->get();
    }

    public function findById(int $id): ?EloquentWordbook
    {
        $user_id = Auth::id();
        return EloquentWordbook::where(
            [
                'id' => $id,
                'user_id' => $user_id,
            ]
        )->first();
        // return EloquentWordbook::find($id);
    }

    public function create(string $title, int $user_id, bool $is_public)
    {
        EloquentWordbook::create(
        [
            'title' => $title,
            'user_id' => $user_id,
            'is_public' => $is_public,
        ]
        );
    }

    public function save(EloquentWordbook $wordbook)
    {
        $wordbook->save();
    }
}