<?php
    require __DIR__.'/../partials/relativePath.php';
    $newURL = $Path."/pages/admin.php";
    header('Location: '.$newURL);
?>