<?php

session_start();           // Fillon sesionin
session_unset();           // Heq të gjitha variablat e sesionit
session_destroy();         // Shkatërron sesionin

header("Location: ../index.php");
exit();
