<?php

include "connect.php";


// Silme işlemi
if (isset($_GET['delete_id'])) {
    $delete_id = intval($_GET['delete_id']);
    $stmt = $conn->prepare("DELETE FROM todos WHERE id = ?");
    $stmt->bind_param("i", $delete_id);
    $stmt->execute();
    $stmt->close();

    // Sayfayı yenileyerek güncellenmiş listeyi göster
    header("Location: http://localhost/ardaproje/todolist.php");
    exit();
}

// Görevleri çekme
$sql = "SELECT * FROM todos";
$result = $conn->query($sql);
?>