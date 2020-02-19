<?php
//logout.inc.php

session_start();
//destroying session and cookies
setcookie($cookie_name, '', time() - 10, "/");//back in time
session_unset();
session_destroy();

header('location: ../home.php');