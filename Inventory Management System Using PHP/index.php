<?php
include 'db.php';

if (isset($_SESSION["role"])) {
    if ($_SESSION["role"] === "admin") {
        header("Location: admin_dash.php");
        exit;
    } elseif ($_SESSION["role"] === "user") {
        header("Location: user_dash.php");
        exit;
    }
} else {
    header("Location: login.php");
}
?>