<?php

session_name('sistema_pneu');
session_start();

session_destroy();

header('location: ../index.php');

exit();

?>