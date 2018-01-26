<?php

define('ROOT', __DIR__ . '\\');

define('BASEURL', (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/AgroSeven/');

//include_once(ROOT . 'Conexao.php');

require_once(ROOT . '/assets/librarys/rb.php');

R::setup('mysql:host=localhost;dbname=rbteste', 'root', '1234');

define('REDBEAN_MODEL_PREFIX', ROOT . '/Data/Entidades/');

// R::freeze(true);