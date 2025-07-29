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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
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
                <div class="logo">LEO</div>
                
                <div class="navbar-right">
                    <div class="search-container">
                        <input type="text" class="search-input" placeholder="Pesquisar cursos...">
                        <button class="search-btn">
                            <i class="bi bi-search"></i>
                        </button>
                    </div>
                    
                    <div class="user-profile">
                        <img src="assets/images/profile.webp" alt="Perfil" class="profile-img">
                        <div class="user-info">
                            <span class="welcome-text">Seja bem-vindo</span>
                            <span class="user-name">John Doe</span>
                        </div>
                        <button class="profile-dropdown">
                            <i class="bi bi-chevron-down"></i>
                        </button>
                    </div>
                </div>
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
            <button class="slider-arrow prev" onclick="changeSlide(-1)">
                <i class="bi bi-chevron-left"></i>
            </button>
            <button class="slider-arrow next" onclick="changeSlide(1)">
                <i class="bi bi-chevron-right"></i>
            </button>

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
                                <span><i class="bi bi-person-fill"></i> João Silva</span>
                                <span><i class="bi bi-clock-fill"></i> 40h</span>
                                <span><i class="bi bi-bar-chart-fill"></i> 25%</span>
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
                                <span><i class="bi bi-person-fill"></i> Maria Santos</span>
                                <span><i class="bi bi-clock-fill"></i> 30h</span>
                                <span><i class="bi bi-bar-chart-fill"></i> 0%</span>
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
                                <span><i class="bi bi-person-fill"></i> Pedro Costa</span>
                                <span><i class="bi bi-clock-fill"></i> 20h</span>
                                <span><i class="bi bi-bar-chart-fill"></i> 100%</span>
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
                                <span><i class="bi bi-person-fill"></i> Ana Lima</span>
                                <span><i class="bi bi-clock-fill"></i> 50h</span>
                                <span><i class="bi bi-bar-chart-fill"></i> 60%</span>
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
                                <span><i class="bi bi-person-fill"></i> Carlos Tech</span>
                                <span><i class="bi bi-clock-fill"></i> 35h</span>
                                <span><i class="bi bi-bar-chart-fill"></i> 0%</span>
                            </div>
                            <button class="btn-course">Iniciar Curso</button>
                        </div>
                    </div>

                    <!-- Card para Adicionar Novo Curso -->
                    <div class="course-card add-course-card">
                        <div class="add-course-content">
                            <i class="bi bi-plus-circle-fill icon"></i>
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
                <div class="footer-left">
                    <div class="footer-logo">
                        <h2>LEO</h2>
                    </div>
                    <p class="footer-description">
                        Maecenas faucibus mollis interdum. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.
                    </p>
                </div>
                
                <div class="footer-right">
                    <div class="footer-contact">
                        <h4>// CONTATO</h4>
                        <p>(21) 98765-3434</p>
                        <p>contato@leolearning.com</p>
                    </div>
                    
                    <div class="footer-social">
                        <h4>// REDES SOCIAIS</h4>
                        <div class="social-icons">
                            <a href="#" class="social-icon" title="Twitter">
                                <i class="bi bi-twitter"></i>
                            </a>
                            <a href="#" class="social-icon" title="YouTube">
                                <i class="bi bi-youtube"></i>
                            </a>
                            <a href="#" class="social-icon" title="Pinterest">
                                <i class="bi bi-pinterest"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="footer-bottom">
                <p>Copyright 2017 - All right reserved.</p>
                <?php if (APP_DEBUG): ?>
                    <button onclick="resetFirstVisit()" class="debug-reset-btn">
                        🔄 Resetar Modal (Debug)
                    </button>
                <?php endif; ?>
            </div>
        </div>
    </footer>

    <script src="assets/js/script.js"></script>
</body>

</html>