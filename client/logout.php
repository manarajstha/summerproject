<?php
session_start();
session_destroy();
header("Location: /summerproject/client/index.php");