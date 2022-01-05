<?php 

namespace Package\Application\UserPlay\Create;

use Package\Domain\Model\UserPlay\UserPlayCount;

interface UserPlayCreateInput {
  public function getCount(): UserPlayCount;
}