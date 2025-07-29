<?php

require_once 'config/config.php';

// Instanciar classe de curso
$courseObj = new Course();

// Buscar cursos do banco de dados
try {
    $courses = $courseObj->getAll();
} catch (Exception $e) {
    $courses = [];
    if (APP_DEBUG) {
        echo "Error loading data: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LEO Learning</title>
    <link rel="icon" type="image/svg+xml" href="assets/images/logo.svg">
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
                <div class="navbar-header">
                    <div class="logo">
                        <img src="assets/images/logo.svg" alt="LEO Learning" class="logo-img">
                    </div>
                    
                    <div class="search-container mobile-search">
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
                
                <div class="navbar-right desktop-search">
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
                    <a href="#courses-section" class="btn-hero">Ver Cursos</a>
                </div>
            </div>
            <div class="slide">
                <div class="slide-content">
                    <h2>Organize seus Estudos</h2>
                    <p>Mantenha todos os seus cursos organizados e acompanhe seu progresso de forma simples e eficiente.</p>
                    <a href="#courses-section" class="btn-hero">Começar Agora</a>
                </div>
            </div>
            <div class="slide">
                <div class="slide-content">
                    <h2>Aprenda no seu Ritmo</h2>
                    <p>Estude quando e onde quiser, com flexibilidade total para se adaptar à sua rotina.</p>
                    <a href="#courses-section" class="btn-hero">Explorar</a>
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
        <section class="courses-section" id="courses-section">
            <div class="container">
                <div class="section-title">
                    <h2>Meus Cursos</h2>
                    <p>Gerencie e acompanhe o progresso dos seus cursos favoritos</p>
                </div>

                <div class="courses-grid" id="courses-grid">
                    <?php if (!empty($courses)): ?>
                        <?php foreach ($courses as $course): ?>
                            <!-- Card de Curso -->
                            <div class="course-card" data-course-id="<?php echo $course['id']; ?>">
                                <div class="course-image" style="background-image: url('<?php echo !empty($course['image']) ? $course['image'] : 'assets/images/default-course.svg'; ?>');">
                                    <?php if ($course['is_new']): ?>
                                        <span class="course-badge new">New</span>
                                    <?php endif; ?>
                                </div>
                                <div class="course-content">
                                    <h3 class="course-title"><?php echo htmlspecialchars($course['title']); ?></h3>
                                    <p class="course-description"><?php echo htmlspecialchars($course['description']); ?></p>
                                    <div class="course-actions">
                                        <button class="btn-course" onclick="viewCourse(<?php echo $course['id']; ?>)">VIEW COURSE</button>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="no-courses">
                            <p>No courses registered yet. Click "Add Course" to get started!</p>
                        </div>
                    <?php endif; ?>

                    <!-- Card para Adicionar Novo Curso -->
                    <div class="course-card add-course-card" onclick="showAddCourseModal()">
                        <div class="add-course-content">
                            <i class="bi bi-plus-circle-fill icon"></i>
                            <h3>Add Course</h3>
                            <p>Click here to add a new course to your list</p>
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
                        <img src="assets/images/logo.svg" alt="LEO Learning" class="footer-logo-img">
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
<!--                 <?php if (APP_DEBUG): ?>
                    <button onclick="resetFirstVisit()" class="debug-reset-btn">
                        🔄 Resetar Modal (Debug)
                    </button>
                <?php endif; ?> -->
            </div>
        </div>
    </footer>

    <!-- Modal para Adicionar Curso -->
    <div id="addCourseModal" class="modal">
        <div class="modal-content course-modal">
            <div class="modal-header">
                <h2>Add New Course</h2>
                <button class="modal-close" onclick="closeAddCourseModal()">&times;</button>
            </div>
            <div class="modal-body">
                <form id="addCourseForm" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="courseTitle">Course Title *</label>
                        <input type="text" id="courseTitle" name="title" required placeholder="e.g. PHP for Beginners">
                    </div>
                    
                    <div class="form-group">
                        <label for="courseDescription">Description *</label>
                        <textarea id="courseDescription" name="description" required placeholder="Describe the course content..." rows="4"></textarea>
                    </div>
                    
                    <div class="form-group">
                        <label for="courseImage">Course Image</label>
                        <input type="file" id="courseImage" name="image" accept="image/*">
                        <small class="form-help">Accepted formats: JPG, PNG, WebP (max. 2MB)</small>
                    </div>
                    
                    <div class="form-group">
                        <label class="checkbox-label">
                            <input type="checkbox" id="courseIsNew" name="is_new" checked>
                            Mark as new course
                        </label>
                    </div>
                    
                    <div class="form-actions">
                        <button type="button" class="btn-secondary" onclick="closeAddCourseModal()">Cancel</button>
                        <button type="submit" class="btn-primary">Add Course</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="assets/js/script.js"></script>
</body>

</html>