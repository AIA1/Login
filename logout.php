<?php 
session_start();

session_unset();

session_destroy();

header("Location: /auth");//de corectat peste tot la /

 ?>