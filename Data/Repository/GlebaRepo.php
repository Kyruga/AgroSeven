<?php

namespace Data\Entidades;

use Data\Repository\BaseRepo;

include_once(ROOT . 'Data\Repository\BaseRepo.php');

class GlebaRepo extends BaseRepo
{
    public function SetBean($type, $array) {
        return BaseRepo::SetSingleTable($type, $array);
    }
}