<?php
session_start();
if (!$_SESSION['acceso']) {
    header('Location:login/');
} else {
    header('Location:home/');
}
