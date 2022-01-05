<?php

namespace Package\Application\Word\Update;

use Package\Domain\Model\Word\WordId;
use Package\Domain\Model\Word\WordFrontContent;
use Package\Domain\Model\Word\WordBackContent;

interface WordUpdateInput {
  public function getId(): WordId;
  public function getFrontContent(): WordFrontContent;
  public function getBackContent(): WordBackContent;
}