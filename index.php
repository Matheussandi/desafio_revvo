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
                <div class="logo">LEO</div>
                
                <div class="navbar-right">
                    <div class="search-container">
                        <input type="text" class="search-input" placeholder="Pesquisar cursos...">
                        <button class="search-btn">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M21 21L16.514 16.506L21 21ZM19 10.5C19 15.194 15.194 19 10.5 19C5.806 19 2 15.194 2 10.5C2 5.806 5.806 2 10.5 2C15.194 2 19 5.806 19 10.5Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </button>
                    </div>
                    
                    <div class="user-profile">
                        <img src="assets/images/profile.webp" alt="Perfil" class="profile-img">
                        <div class="user-info">
                            <span class="welcome-text">Seja bem-vindo</span>
                            <span class="user-name">John Doe</span>
                        </div>
                        <button class="profile-dropdown">▼</button>
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
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                                </svg>
                            </a>
                            <a href="#" class="social-icon" title="YouTube">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
                                </svg>
                            </a>
                            <a href="#" class="social-icon" title="Pinterest">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M12.017 0C5.396 0 .029 5.367.029 11.987c0 5.079 3.158 9.417 7.618 11.174-.105-.949-.199-2.403.041-3.439.219-.937 1.406-5.957 1.406-5.957s-.359-.72-.359-1.781c0-1.663.967-2.911 2.168-2.911 1.024 0 1.518.769 1.518 1.688 0 1.029-.653 2.567-.992 3.992-.285 1.193.6 2.165 1.775 2.165 2.128 0 3.768-2.245 3.768-5.487 0-2.861-2.063-4.869-5.008-4.869-3.41 0-5.409 2.562-5.409 5.199 0 1.033.394 2.143.889 2.741.097.118.112.22.085.345-.09.375-.293 1.199-.334 1.363-.053.225-.172.271-.402.165-1.495-.69-2.433-2.878-2.433-4.646 0-3.776 2.748-7.252 7.92-7.252 4.158 0 7.392 2.967 7.392 6.923 0 4.135-2.607 7.462-6.233 7.462-1.214 0-2.357-.629-2.746-1.378l-.748 2.853c-.271 1.043-1.002 2.35-1.492 3.146C9.57 23.812 10.763 24.009 12.017 24.009c6.624 0 11.99-5.367 11.99-11.988C24.007 5.367 18.641.001 12.017.001z"/>
                                </svg>
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