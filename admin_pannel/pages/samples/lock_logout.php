<?php
session_start();
session_destroy();

header('location:lock-screen.html');

?>