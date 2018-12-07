<?php

if (isset($_SESSION['user']) && $_SESSION['user'] !== 'admin') {
    echo "<script>alert('Your have no permission to access this page.');";
    echo 'window.location= "../index.php"';
    echo '</script>';
    exit;
}
?>
