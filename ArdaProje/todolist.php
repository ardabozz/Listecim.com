<?php 
    include "./php/connect.php";

    // todo çekme
    $sql = "SELECT * FROM todos";
    $result = $conn->query($sql);

?>


<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listecim.com - Todolist</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/todolist.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a href="index.html" class="logo">
                <div class="fas fa-clipboard-list"></div>
                Listecim.com
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.html">Anasayfa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="hakkinda.html">Hakkımızda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="todolist.php">TodoList</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="iletisim.html">İletişim</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- todolist alanı -->
    <section class="todo-section" id="todolist">
        <div class="container">
            <div class="todo-container">
                <div class="todo-header">
                    <h1 class="todo-title">Yapılacaklar Listesi</h1>
                </div>

                <form action="./php/addtodo.php" method="post">
                    <div class="input-group">
                        <input name="todo" type="text" class="form-control" id="todoInput"
                            placeholder="Yeni görev ekle...">
                        <button type="submit" class="btn btn-add" id="addTodo">
                            <i class="fas fa-plus"></i> Ekle
                        </button>
                    </div>
                </form>

                <ul class="todo-list" id="todoList">
                    <?php if ($result->num_rows > 0): ?>
                    <?php while ($row = $result->fetch_assoc()): ?>
                    <div class="todo-actions">
                        <span class="text-dark"><?php echo $row['id']; ?></span>
                        <span class="todo-text mt-2"><?php echo $row['todo']; ?></span>
                            <button onclick="editTask(<?php echo $row['id']; ?>)" class="btn-action btn-edit">
                                <i class="fas fa-edit"></i>
                            </button>
                        <a href="./php/deleteTodo.php?delete_id=<?php echo $row['id']; ?>">
                            <button class="btn-action btn-delete">
                                <i class="fas fa-trash"></i>
                            </button>
                        </a>
                    </div>
                    <?php endwhile; ?>
                    <?php else: ?>
                    <p>Henüz bir görev eklenmedi.</p>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </section>

    <script>
    function editTask(id) {
        // JavaScript prompt ile kullanıcıdan yeni görev ismi al
        var updatedTodo = prompt("Yeni görev ismini girin:");

        // boş mu kontrol
        if (updatedTodo !== null && updatedTodo.trim() !== "") {
            // php dosyasına gönderme ulr ile
            window.location.href = "./php/updateTodo.php?update_id=" + id + "&updated_todo=" + updatedTodo;
        }
    }
    </script>

    <!-- footer alanı -->
    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <!-- Logo ve Açıklama -->
                <div>
                    <a href="index.html" class="footer-logo">
                        <div class="logo-icon">
                            <i class="fas fa-clipboard-list"></i>
                        </div>
                        <span>Listecim.com</span>
                    </a>
                    <p class="footer-text">Hayatınızı düzene sokmanın en kolay yolu. Görevlerinizi organize edin,
                        hedeflerinize ulaşın.</p>
                    <div class="social-links">
                        <a href="#" class="social-link"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="social-link"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="social-link"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="social-link"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>

                <!-- Hızlı Linkler -->
                <div>
                    <h3 class="footer-title">Hızlı Linkler</h3>
                    <ul class="footer-links">
                        <li><a href="index.html">Anasayfa</a></li>
                        <li><a href="hakkinda.html">Hakkımızda</a></li>
                        <li><a href="todolist.php">Todo List</a></li>
                        <li><a href="iletisim.html">İletişim</a></li>
                    </ul>
                </div>
                <!-- İletişim -->
                <div>
                    <h3 class="footer-title">İletişim</h3>
                    <ul class="footer-links">
                        <li><a href="mailto:info@listecim.com"><i class="far fa-envelope me-2"></i>info@listecim.com</a>
                        </li>
                        <li><a href="tel:+902121234567"><i class="fas fa-phone me-2"></i>+90 212 123 45 67</a></li>
                        <li><a href="#"><i class="fas fa-map-marker-alt me-2"></i>İstanbul, Türkiye</a></li>
                    </ul>
                </div>

                <!-- Yasal -->
                <div>
                    <h3 class="footer-title">Yasal</h3>
                    <ul class="footer-links">
                        <li><a href="#">Gizlilik Politikası</a></li>
                        <li><a href="#">Kullanım Koşulları</a></li>
                        <li><a href="#">Çerez Politikası</a></li>
                    </ul>
                </div>
            </div>

            <!-- Telif Hakkı -->
            <div class="footer-bottom">
                <p>&copy; 2024 Listecim.com - Tüm hakları saklıdır.</p>
            </div>
        </div>
    </footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>