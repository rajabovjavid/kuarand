<?php

include "auth_check.php";

apcu_clear_cache();
apcu_store("message", "You successfully signed out!");
session_destroy();
header("Location:index.php");

