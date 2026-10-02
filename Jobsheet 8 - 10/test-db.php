<?php

require_once __DIR__ . '/includes/db.php';

try {
    $pdo = db();

    echo "<h2>Database berhasil tersambung!</h2>";

    $stmt = $pdo->query("SELECT current_database(), current_user");
    $data = $stmt->fetch();

    echo "<pre>";
    print_r($data);
    echo "</pre>";

} catch (PDOException $e) {

    echo "<h2>Database GAGAL tersambung</h2>";

    echo "<pre>";
    echo "Error: " . $e->getMessage();
    echo "</pre>";
}