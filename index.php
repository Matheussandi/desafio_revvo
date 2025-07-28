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
    <!-- Modal de Boas-vindas -->
    <div id="welcomeModal" class="welcome-modal">
        <div class="modal-content">
            <div class="modal-header">
                <button class="modal-close" onclick="closeWelcomeModal()">&times;</button>
            </div>
            <div class="modal-body">
                <h2 class="modal-title">Bem-vindo ao LEO Learning</h2>
                <p class="modal-description">
                    Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. 
                    Donec ullamcorper nulla non metus auctor fringilla. Donec sed odio dui. Cras
                </p>
                <button class="modal-cta" onclick="startTour()">Inscreva-se</button>
            </div>
        </div>
    </div>

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

    <main>
        <!-- Hero Slider Section -->
        <section class="hero-slider">
            <div class="slide active">
                <div class="slide-content">
                    <h2>Transforme sua Carreira</h2>
                    <p>Aprenda com os melhores cursos online e desenvolva novas habilidades para se destacar no mercado de trabalho.</p>
                    <a href="cursos.php" class="btn-hero">Ver Cursos</a>
                </div>
            </div>
            <div class="slide">
                <div class="slide-content">
                    <h2>Organize seus Estudos</h2>
                    <p>Mantenha todos os seus cursos organizados e acompanhe seu progresso de forma simples e eficiente.</p>
                    <a href="cursos.php" class="btn-hero">Começar Agora</a>
                </div>
            </div>
            <div class="slide">
                <div class="slide-content">
                    <h2>Aprenda no seu Ritmo</h2>
                    <p>Estude quando e onde quiser, com flexibilidade total para se adaptar à sua rotina.</p>
                    <a href="cursos.php" class="btn-hero">Explorar</a>
                </div>
            </div>

            <!-- Setas de navegação -->
            <button class="slider-arrow prev" onclick="changeSlide(-1)">‹</button>
            <button class="slider-arrow next" onclick="changeSlide(1)">›</button>

            <!-- Indicadores -->
            <div class="slider-indicators">
                <span class="indicator active" onclick="currentSlide(1)"></span>
                <span class="indicator" onclick="currentSlide(2)"></span>
                <span class="indicator" onclick="currentSlide(3)"></span>
            </div>
        </section>

        <!-- Seção de Cursos -->
        <section class="courses-section">
            <div class="container">
                <div class="section-title">
                    <h2>Meus Cursos</h2>
                    <p>Gerencie e acompanhe o progresso dos seus cursos favoritos</p>
                </div>

                <div class="courses-grid">
                    <!-- Card de Curso 1 -->
                    <div class="course-card">
                        <div class="course-image">
                            <span class="course-badge">Em Andamento</span>
                        </div>
                        <div class="course-content">
                            <h3 class="course-title">PHP para Iniciantes</h3>
                            <p class="course-description">Curso completo de PHP do básico ao avançado, com projetos práticos e exemplos reais.</p>
                            <div class="course-meta">
                                <span>🎓 João Silva</span>
                                <span>⏱️ 40h</span>
                                <span>📊 25%</span>
                            </div>
                            <button class="btn-course">Continuar Curso</button>
                        </div>
                    </div>

                    <!-- Card de Curso 2 -->
                    <div class="course-card">
                        <div class="course-image">
                            <span class="course-badge">Não Iniciado</span>
                        </div>
                        <div class="course-content">
                            <h3 class="course-title">Design UI/UX</h3>
                            <p class="course-description">Aprenda os fundamentos do design de interfaces e experiência do usuário.</p>
                            <div class="course-meta">
                                <span>🎓 Maria Santos</span>
                                <span>⏱️ 30h</span>
                                <span>📊 0%</span>
                            </div>
                            <button class="btn-course">Iniciar Curso</button>
                        </div>
                    </div>

                    <!-- Card de Curso 3 -->
                    <div class="course-card">
                        <div class="course-image">
                            <span class="course-badge">Concluído</span>
                        </div>
                        <div class="course-content">
                            <h3 class="course-title">Marketing Digital</h3>
                            <p class="course-description">Estratégias completas de marketing para o mundo digital e redes sociais.</p>
                            <div class="course-meta">
                                <span>🎓 Pedro Costa</span>
                                <span>⏱️ 20h</span>
                                <span>📊 100%</span>
                            </div>
                            <button class="btn-course">Revisar Curso</button>
                        </div>
                    </div>

                    <!-- Card de Curso 4 -->
                    <div class="course-card">
                        <div class="course-image">
                            <span class="course-badge">Em Andamento</span>
                        </div>
                        <div class="course-content">
                            <h3 class="course-title">JavaScript Moderno</h3>
                            <p class="course-description">Domine JavaScript ES6+ e desenvolva aplicações web modernas e interativas.</p>
                            <div class="course-meta">
                                <span>🎓 Ana Lima</span>
                                <span>⏱️ 50h</span>
                                <span>📊 60%</span>
                            </div>
                            <button class="btn-course">Continuar Curso</button>
                        </div>
                    </div>

                    <!-- Card de Curso 5 -->
                    <div class="course-card">
                        <div class="course-image">
                            <span class="course-badge">Não Iniciado</span>
                        </div>
                        <div class="course-content">
                            <h3 class="course-title">React.js Fundamentals</h3>
                            <p class="course-description">Aprenda a biblioteca mais popular do JavaScript para criar interfaces incríveis.</p>
                            <div class="course-meta">
                                <span>🎓 Carlos Tech</span>
                                <span>⏱️ 35h</span>
                                <span>📊 0%</span>
                            </div>
                            <button class="btn-course">Iniciar Curso</button>
                        </div>
                    </div>

                    <!-- Card para Adicionar Novo Curso -->
                    <div class="course-card add-course-card">
                        <div class="add-course-content">
                            <span class="icon">➕</span>
                            <h3>Adicionar Curso</h3>
                            <p>Clique aqui para adicionar um novo curso à sua lista</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <h3>📚 Meus Cursos</h3>
                    <p>Transforme sua carreira com os melhores cursos online. Aprenda no seu ritmo e alcance seus objetivos profissionais.</p>
                    <div class="social-links">
                        <a href="#" title="Facebook">📘</a>
                        <a href="#" title="Twitter">🐦</a>
                        <a href="#" title="LinkedIn">💼</a>
                        <a href="#" title="Instagram">📷</a>
                    </div>
                </div>
                <div class="footer-section">
                    <h3>📞 Contato</h3>
                    <p>📧 contato@meuscursos.com</p>
                    <p>📱 (11) 99999-9999</p>
                    <p>📍 São Paulo, SP - Brasil</p>
                </div>
                <div class="footer-section">
                    <h3>🌐 Redes Sociais</h3>
                    <p>Siga-nos em nossas redes sociais para ficar por dentro das novidades e dicas de estudo.</p>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; <?php echo date('Y'); ?> Meus Cursos. Todos os direitos reservados.</p>
                <?php if (APP_DEBUG): ?>
                    <p style="margin-top: 1rem;">
                        <button onclick="resetFirstVisit()" style="background: rgba(255,255,255,0.2); color: white; border: none; padding: 5px 10px; border-radius: 5px; cursor: pointer; font-size: 0.8rem;">
                            🔄 Resetar Modal (Debug)
                        </button>
                    </p>
                <?php endif; ?>
            </div>
        </div>
    </footer>

    <script src="assets/js/script.js"></script>
</body>

</html>