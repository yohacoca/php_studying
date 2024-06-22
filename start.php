<?php

require 'vendor/autoload.php';

use tools\jwt\jwt;

$int = jwt::encode();

echo $int;