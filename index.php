<?php

require __DIR__ . "/vendor/autoload.php";

use \App\Session\user as SessionUser;

include __DIR__ . "/includes/header.php";

include SessionUser::isLogged() ?
    __DIR__ . "/includes/admin.php" :
    __DIR__ . "/includes/login.php";
include __DIR__ . "/includes/footer.php";

