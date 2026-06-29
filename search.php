<?php
require_once 'db.php';

function search_users($conn, $name) {
    $safe_name = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
    echo "<p>Cautare: " . $safe_name . "</p>";

    $stmt = mysqli_prepare($conn, "SELECT username FROM users WHERE username = ?");
    mysqli_stmt_bind_param($stmt, "s", $name);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}

function handle_search($conn) {
    $name = $_GET['name'] ?? '';
    search_users($conn, $name);
    search_users($conn, 'admin');
}

$conn = db_connect();
handle_search($conn);
