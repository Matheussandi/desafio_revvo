<?php

require_once 'config/config.php';
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meus Cursos</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <header>
        <nav class="navbar">
            <div class="container">
                <h1 class="logo">📚 Meus Cursos</h1>
                <ul class="nav-links">
                    <li><a href="index.php">Início</a></li>
                    <li><a href="cursos.php">Cursos</a></li>
                    <li><a href="sobre.php">Sobre</a></li>
                </ul>
            </div>
        </nav>
    </header>

    <main class="container">
        <section class="hero">
            <h2>Bem-vindo ao Meus Cursos!</h2>
            <p>Sistema para gerenciar seus cursos de forma simples e eficiente.</p>
        </section>

        <section class="features">
            <div class="feature-card">
                <h3>Organize seus Cursos</h3>
                <p>Mantenha todos os seus cursos organizados em um só lugar.</p>
            </div>
            <div class="feature-card">
                <h3>Acompanhe o Progresso</h3>
                <p>Monitore seu progresso em cada curso.</p>
            </div>
            <div class="feature-card">
                <h3>Fácil de Usar</h3>
                <p>Interface simples e intuitiva para melhor experiência.</p>
            </div>
        </section>
    </main>

    <footer>
        <div class="container">
            <p>&copy; <?php echo date('Y'); ?> Meus Cursos. Todos os direitos reservados.</p>
        </div>
    </footer>

    <script src="assets/js/script.js"></script>
</body>
</html>
