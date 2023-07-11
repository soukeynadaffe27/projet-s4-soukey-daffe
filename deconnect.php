<?php
session_start();
session_destroy();
header("Location: db.php");
