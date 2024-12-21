<?php

include "connect.php";

// Form verilerini kontrol et
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Gelen verileri al ve temizle
    $todo = isset($_POST['todo']) ? trim($_POST['todo']) : null;

    // boş mu kontrol
    if ($todo == "") {
        die("Lütfen tüm alanları doldurunuz.");
    }

    // veritabanı kayıt
    $sql = "INSERT INTO todos (todo) VALUES ('$todo')";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->execute();
        header("Location: http://localhost/ardaproje/todolist.php");
    } else {
        echo "Hata: " . $conn->error;
    }

}

?>