<?php

namespace Package\Application\Word\Create;

use Package\Domain\Model\Word\WordWordbookId;
use Package\Domain\Model\Word\WordFrontContent;
use Package\Domain\Model\Word\WordBackContent;

interface WordCreateInput {
  public function getWordbookId(): WordWordbookId;
  public function getFrontContent(): WordFrontContent;
  public function getBackContent(): WordBackContent;
}