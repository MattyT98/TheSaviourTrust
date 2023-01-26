<?php
    require __DIR__.'/../partials/relativePath.php';
    $newURL = $Path."/index.php";
    header('Location: '.$newURL);
?>