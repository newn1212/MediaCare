<?php
session_start();
session_destroy();
header('Location: /mediacare/index.php?page=home');
exit();
?>