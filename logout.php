<?php
session_start();
$_SESSION = [];

header("Location: login-form.php");