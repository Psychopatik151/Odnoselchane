<?php
session_start();
if (isset($_SESSION['user'])) {
    echo("Вы вошли как " . $_SESSION['user']['nickname']);

} else {
    echo("Вы не авторизованы")
}