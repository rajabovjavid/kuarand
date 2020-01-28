<?php

include "auth_check.php";

session_destroy();
header("Location:index.php?durum=exit");

