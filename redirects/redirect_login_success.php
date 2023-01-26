<?php
    require __DIR__.'/../partials/relativePath.php';
    $newURL = $Path."/pages/home.php";
    header('Location: '.$newURL);
?>