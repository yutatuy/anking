<?php

namespace Package\Application\Word\Delete;

use Package\Domain\Model\Word\WordId;

interface WordDeleteInput {
  public function getId(): WordId;
}