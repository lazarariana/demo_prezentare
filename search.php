<?php
require_once 'db.php';

function search_users($conn, $name) {
    echo "<p>Cautare: " . $name . "</p>";

    $sql = "SELECT username FROM users WHERE username = '$name'";
    db_query($conn, $sql);
}


function handle_search($conn) {
    $name = $_GET['name'] ?? '';                         
    $name_sanitizat = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');

    search_users($conn, $name_sanitizat);
    search_users($conn, 'admin');
}

$conn = db_connect();
handle_search($conn);