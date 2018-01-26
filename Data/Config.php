<?php

define('ROOT', __DIR__ . '\\');

require_once(ROOT . '/rb.php');

R::setup('mysql:host=localhost;dbname=rbteste', 'root', '1234');

define('REDBEAN_MODEL_PREFIX', ROOT . '/Data/Entidades/');