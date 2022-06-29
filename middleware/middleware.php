<?php

function auth($level = null) {
    $login = $_SESSION["login"] === true;
    if(!$login) {
        header("Location: ?p=login");
    }

    if($level) {
        if(isset($login) && isset($level) && $level !== $_SESSION["level"]) {
            header("Location: ?p=".$_SESSION["level"]);
        }
    }

}