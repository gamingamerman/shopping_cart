<?php
    session_start();
    echo "carrito";
    if (isset($_SESSION["cart"])) {
        printf('El carrito tiene %s', implode(', ', $_SESSION["cart"]));
    }
?>