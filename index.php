<?php
if (isset($_GET['ref'])) {
    setcookie("ref", $_GET['ref'], time() + 14 * 86400, "/");
    header('Location: view/index.php');
}
else
    header('Location: view/index.php');
?>