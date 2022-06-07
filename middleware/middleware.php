<?php

function auth() {
    $login = $_SESSION["login"] === true;
    if(!$login) {
        header("Location: ?p=login");
    }
}