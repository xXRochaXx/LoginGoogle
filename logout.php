<?php

require __DIR__ . '/vendor/autoload.php';

use App\Session\User as SessionUser;

SessionUser::logout();
header('location: index.php');
exit;
