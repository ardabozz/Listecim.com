<?php
include "connect.php";

// Form verilerini kontrol et
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Gelen verileri al ve temizle
    $ad = isset($_POST['ad']) ? trim($_POST['ad']) : null;
    $email = isset($_POST['email']) ? trim($_POST['email']) : null;
    $mesaj = isset($_POST['konu']) ? trim($_POST['konu']) : null;
    $konu = isset($_POST['mesaj']) ? trim($_POST['mesaj']) : null;

    // boş mu kontrol
    if ($ad == "" || $email == "" || $mesaj == "" || $konu == "") {
        die("Lütfen tüm alanları doldurunuz.");
    }

    // veritabanı kayıt
    $sql = "INSERT INTO iletişim (ad, email, mesaj, konu) VALUES ('$ad', '$email', '$mesaj', '$konu')";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->execute();
        echo "Kayıt başarılı!";
        header("refresh: 2; url=../iletisim.html");
    } else {
        echo "Hata: " . $conn->error;
    }

}

// Veritabanı kapatma
$conn->close();
?> 