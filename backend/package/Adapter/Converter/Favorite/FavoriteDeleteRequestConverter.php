<?php 

namespace Package\Adapter\Converter\Favorite;

use Package\Domain\Model\Wordbook\WordbookId;
use Package\Application\Favorite\Delete\FavoriteDeleteInput;
use App\Http\Requests\FavoriteDeleteRequest;

class FavoriteDeleteRequestConverter implements FavoriteDeleteInput {
    private $request;

    public function __construct(FavoriteDeleteRequest  $input)
    {
        $this->request = $input;
    }
    
    public function getWordbookId(): WordbookId
    {
        return new WordbookId($this->request->wordbook_id);
    }
}