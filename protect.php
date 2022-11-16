<?php
    if (!isset($_SESSION)) {
        session_start();
    }

    if (!isset($_SESSION['id'])) {
        die("Você não pode acessar essa página, por favor faça o login <a href=\"login.php\">clicando aqui.</a>");
    }
?>