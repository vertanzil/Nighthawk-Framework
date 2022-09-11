<?php


namespace App\controllers;

use App\classes\Router;

$directory = './model/';
if (!is_dir($directory)) {
    exit('Invalid diretory path');
}
$files = [];

foreach (scandir($directory) as $modfile) {
    if ($modfile) {
        if ($modfile === "index.html" || $modfile === "." || $modfile === "..") {
        } else {
            $files[] = $modfile;
        }
    }
    foreach ($files as &$value) {
        if (isset($value)) {
            require_once "./model/" . $value;
        } else {
            header("Location: index.php?url=Error&Result=NoModel");
        }
    }
}
Router::setView('Error', function () {
    ErrorPage::createView("Error");
    ErrorPage::render();
});
Router::setView('Index', function () {
    Index::createView('Index');
    Index::render();
});
Router::setView('Login', function () {
    Login::createView('Login');
    Login::render();
});
Router::setView('Logout', function () {
    Logout::createView('Logout');
    Logout::render();
});
Router::setView('ChangePassword', function () {
    ChangePassword::createView('ChangePassword');
    ChangePassword::render();
});
Router::setView('RecoverPassword', function () {
    RecoverPassword::createView('RecoverPassword');
    RecoverPassword::render();
});
Router::setView('Setup', function () {
    Setup::createView('Setup');
    Setup::render();
});
Router::setView('Test', function () {
    Test::createView('Test');
    Test::render();
});