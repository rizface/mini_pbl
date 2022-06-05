<?php

function alert($message, $redirect = null) {
    if(!$redirect) {
        echo "
            <script>
                alert('$message');
            </script>
        ";
    } else {
        echo "
            <script>
                alert('$message');
                window.location.href = '$redirect';
            </script>
        ";
    }
}