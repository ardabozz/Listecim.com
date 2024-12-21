<?php

include "connect.php";


// Güncelleme işlemi
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $update_id = intval($_GET['update_id']);
    $updated_todo = trim($_GET['updated_todo']);

    if (!empty($updated_todo)) {
        $stmt = $conn->prepare("UPDATE todos SET todo = ? WHERE id = ?");
        $stmt->bind_param("si", $updated_todo, $update_id);
        $stmt->execute();
        $stmt->close();

        // Sayfayı yenileyerek güncellenmiş listeyi göster
        header("Location: http://localhost/ardaproje/todolist.php");
        exit();
    }
}

?>