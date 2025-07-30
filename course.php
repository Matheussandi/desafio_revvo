<?php

require_once 'config/config.php';

$courseId = (int) ($_GET['id'] ?? 0);
if ($courseId <= 0) {
    header('Location: index.php');
    exit;
}

$courseObj = new Course();

try {
    $course = $courseObj->getById($courseId);
    if (!$course) {
        header('Location: index.php');
        exit;
    }
} catch (Exception $e) {
    if (APP_DEBUG) {
        echo "Error loading course: " . $e->getMessage();
    }
    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($course['title']); ?> - LEO Learning</title>
    <link rel="icon" type="image/svg+xml" href="assets/images/logo.svg">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
</head>

<body>
    <header>
        <nav class="navbar">
            <div class="container">
                <div class="navbar-header">
                    <div class="logo">
                        <img src="assets/images/logo.svg" alt="LEO Learning" class="logo-img">
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <main>
        <section class="course-detail-section">
            <div class="container">
                <div class="course-detail-content">
                    
                    <!-- Course Header -->
                    <div class="course-header">
                        <div class="course-image-large">
                            <img src="<?php echo !empty($course['image']) ? $course['image'] : 'assets/images/default-course.svg'; ?>" 
                                 alt="<?php echo htmlspecialchars($course['title']); ?>" 
                                 class="course-detail-image">
                            <?php if ($course['is_new']): ?>
                                <span class="course-badge new large">New</span>
                            <?php endif; ?>
                        </div>
                        
                        <div class="course-info">
                            <h1 class="course-detail-title"><?php echo htmlspecialchars($course['title']); ?></h1>
                            <p class="course-detail-description"><?php echo nl2br(htmlspecialchars($course['description'])); ?></p>
                            
                            <div class="course-meta">
                                <div class="meta-item">
                                    <i class="bi bi-calendar"></i>
                                    <span>Criado em: <?php echo date('M d, Y', strtotime($course['created_at'])); ?></span>
                                </div>
                                <?php if ($course['updated_at'] !== $course['created_at']): ?>
                                <div class="meta-item">
                                    <i class="bi bi-pencil"></i>
                                    <span>Atualizado em: <?php echo date('M d, Y', strtotime($course['updated_at'])); ?></span>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

                    <!-- Course Actions -->
                    <div class="course-actions-bar">
                        <button class="btn-secondary" onclick="window.location.href='index.php'">
                            <i class="bi bi-arrow-left"></i> Voltar
                        </button>
                        <button class="btn-secondary" onclick="editCourse(<?php echo $course['id']; ?>)">
                            <i class="bi bi-pencil"></i> Edit
                        </button>
                        <button class="btn-danger" onclick="deleteCourse(<?php echo $course['id']; ?>)">
                            <i class="bi bi-trash"></i> Delete
                        </button>
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
                        Innovative learning platform for modern professionals.
                    </p>
                </div>
                
                <div class="footer-right">
                    <div class="footer-contact">
                        <h4>// CONTACT</h4>
                        <p>(21) 98765-3434</p>
                        <p>contact@leolearning.com</p>
                    </div>
                    
                    <div class="footer-social">
                        <h4>// SOCIAL MEDIA</h4>
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
            </div>
        </div>
    </footer>

    <!-- Edit Course Modal -->
    <div id="editCourseModal" class="modal">
        <div class="modal-content course-modal">
            <div class="modal-header">
                <h2>Editar Curso</h2>
                <button class="modal-close" onclick="closeEditCourseModal()">&times;</button>
            </div>
            <div class="modal-body">
                <form id="editCourseForm" enctype="multipart/form-data">
                    <input type="hidden" id="editCourseId" name="id" value="<?php echo $course['id']; ?>">
                    
                    <div class="form-group">
                        <label for="editCourseTitle">Título do Curso *</label>
                        <input type="text" id="editCourseTitle" name="title" required 
                               value="<?php echo htmlspecialchars($course['title']); ?>">
                    </div>
                    
                    <div class="form-group">
                        <label for="editCourseDescription">Descrição *</label>
                        <textarea id="editCourseDescription" name="description" required rows="4"><?php echo htmlspecialchars($course['description']); ?></textarea>
                    </div>
                    
                    <div class="form-group">
                        <label for="editCourseImage">Imagem do Curso</label>
                        <input type="file" id="editCourseImage" name="image" accept="image/*">
                        <small class="form-help">Deixe em branco para manter a imagem atual. Formatos aceitos: JPG, PNG, WebP (máx. 2MB)</small>
                        <?php if (!empty($course['image'])): ?>
                            <div class="current-image">
                                <p>Imagem atual:</p>
                                <img src="<?php echo $course['image']; ?>" alt="Current" class="current-image-preview">
                            </div>
                        <?php endif; ?>
                    </div>
                    
                    <div class="form-group">
                        <label class="checkbox-label">
                            <input type="checkbox" id="editCourseIsNew" name="is_new" <?php echo $course['is_new'] ? 'checked' : ''; ?>>
                            Marcar como curso novo
                        </label>
                    </div>
                    
                    <div class="form-actions">
                        <button type="button" class="btn-secondary" onclick="closeEditCourseModal()">Cancelar</button>
                        <button type="submit" class="btn-primary">Atualizar Curso</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Pass course ID to JavaScript
        window.courseId = <?php echo $course['id']; ?>;
    </script>
    <script src="assets/js/course.js"></script>
</body>

</html>
