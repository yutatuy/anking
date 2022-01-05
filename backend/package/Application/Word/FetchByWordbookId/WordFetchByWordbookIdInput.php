<?php

namespace Package\Application\Word\FetchByWordbookId;

use Package\Domain\Model\Word\WordWordbookId;

interface WordFetchByWordbookIdInput {
  public function getWordbookId(): WordWordbookId;
}