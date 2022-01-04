<?php

namespace Package\Infrastructure\Dao\eloquent\Wordbook;
use Illuminate\Support\Facades\Auth;
use App\Models\EloquentWordbook;

class WordbookDao {

    public function fetchAll(int $user_id)
    {
        return EloquentWordbook::where('user_id', $user_id)->get();
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
}