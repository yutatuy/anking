<?php

namespace Package\Infrastructure\Dao\eloquent\Wordbook;
use App\Models\EloquentWordbook;

class WordbookDao {

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