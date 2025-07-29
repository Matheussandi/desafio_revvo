/**
 * JavaScript para o sistema Meus Cursos
 */

// Variáveis do slider
let currentSlideIndex = 0;
const slides = document.querySelectorAll('.slide');
const indicators = document.querySelectorAll('.indicator');

// Aguardar o carregamento completo da página
document.addEventListener('DOMContentLoaded', function() {
    console.log('Meus Cursos - Sistema carregado com sucesso!');
    
    // Verificar se é a primeira visita e mostrar modal
    checkFirstVisit();
    
    // Inicializar slider automático
    if (slides.length > 0) {
        setInterval(autoSlide, 5000); // Troca slide a cada 5 segundos
    }
    
    // Adicionar event listeners para os cards de adicionar curso
    const addCourseCard = document.querySelector('.add-course-card');
    if (addCourseCard) {
        addCourseCard.addEventListener('click', function() {
            showMessage('Funcionalidade de adicionar curso será implementada em breve!', 'info');
        });
    }
    
    // Funcionalidade de pesquisa
    const searchInput = document.querySelector('.search-input');
    if (searchInput) {
        searchInput.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                performSearch();
            }
        });
    }
    
    const searchBtn = document.querySelector('.search-btn');
    if (searchBtn) {
        searchBtn.addEventListener('click', performSearch);
    }
    
    // Event listener para o perfil do usuário
    const userProfile = document.querySelector('.user-profile');
    if (userProfile) {
        userProfile.addEventListener('click', function() {
            showMessage('Menu de usuário será implementado em breve!', 'info');
        });
    }
    
    // Função para mostrar mensagens
    window.showMessage = function(message, type = 'info') {
        const messageDiv = document.createElement('div');
        messageDiv.className = `message message-${type}`;
        messageDiv.textContent = message;
        
        // Estilos para a mensagem
        messageDiv.style.cssText = `
            position: fixed;
            top: 20px;
            right: 20px;
            padding: 15px 20px;
            border-radius: 8px;
            color: white;
            font-weight: 500;
            z-index: 1000;
            animation: slideIn 0.3s ease-out;
            max-width: 300px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        `;
        
        // Cores baseadas no tipo
        const colors = {
            'success': '#28a745',
            'error': '#dc3545',
            'warning': '#ffc107',
            'info': '#667eea'
        };
        
        messageDiv.style.backgroundColor = colors[type] || colors.info;
        
        document.body.appendChild(messageDiv);
        
        // Remover mensagem após 4 segundos
        setTimeout(() => {
            messageDiv.style.animation = 'slideOut 0.3s ease-out';
            setTimeout(() => {
                if (messageDiv.parentNode) {
                    messageDiv.parentNode.removeChild(messageDiv);
                }
            }, 300);
        }, 4000);
    };
    
    // Função para confirmar ações
    window.confirmAction = function(message, callback) {
        if (confirm(message)) {
            callback();
        }
    };
    
    // Adicionar animações CSS
    const style = document.createElement('style');
    style.textContent = `
        @keyframes slideIn {
            from {
                transform: translateX(100%);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }
        
        @keyframes slideOut {
            from {
                transform: translateX(0);
                opacity: 1;
            }
            to {
                transform: translateX(100%);
                opacity: 0;
            }
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .course-card {
            animation: fadeIn 0.5s ease-out;
        }
    `;
    document.head.appendChild(style);
});

// Funções do Slider
function showSlide(index) {
    // Remover classe active de todos os slides e indicadores
    slides.forEach(slide => slide.classList.remove('active'));
    indicators.forEach(indicator => indicator.classList.remove('active'));
    
    // Adicionar classe active no slide e indicador corretos
    if (slides[index]) {
        slides[index].classList.add('active');
    }
    if (indicators[index]) {
        indicators[index].classList.add('active');
    }
    
    currentSlideIndex = index;
}

function changeSlide(direction) {
    currentSlideIndex += direction;
    
    if (currentSlideIndex >= slides.length) {
        currentSlideIndex = 0;
    } else if (currentSlideIndex < 0) {
        currentSlideIndex = slides.length - 1;
    }
    
    showSlide(currentSlideIndex);
}

function currentSlide(index) {
    showSlide(index - 1); // -1 porque o index começa em 1 no HTML
}

function autoSlide() {
    changeSlide(1);
}

// Função para validar formulários
function validateForm(formId) {
    const form = document.getElementById(formId);
    if (!form) return false;
    
    const inputs = form.querySelectorAll('input[required], textarea[required], select[required]');
    let isValid = true;
    
    inputs.forEach(input => {
        if (!input.value.trim()) {
            input.style.borderColor = '#dc3545';
            input.style.boxShadow = '0 0 0 0.2rem rgba(220, 53, 69, 0.25)';
            isValid = false;
        } else {
            input.style.borderColor = '#28a745';
            input.style.boxShadow = '0 0 0 0.2rem rgba(40, 167, 69, 0.25)';
        }
    });
    
    if (!isValid) {
        showMessage('Por favor, preencha todos os campos obrigatórios.', 'error');
    }
    
    return isValid;
}

// Função para animar elementos quando entram na viewport
function animateOnScroll() {
    const elements = document.querySelectorAll('.course-card, .feature-card');
    
    elements.forEach(element => {
        const elementTop = element.getBoundingClientRect().top;
        const elementVisible = 150;
        
        if (elementTop < window.innerHeight - elementVisible) {
            element.style.animation = 'fadeIn 0.6s ease-out';
        }
    });
}

// Adicionar listener para scroll
window.addEventListener('scroll', animateOnScroll);

// Função para smooth scroll nos links de navegação
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            target.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    });
});

// Funções da Modal de Boas-vindas
function checkFirstVisit() {
    const hasVisited = localStorage.getItem('meuscursos_visited');
    
    if (!hasVisited) {
        // Mostrar modal após um pequeno delay para melhor UX
        setTimeout(showWelcomeModal, 1000);
    }
}

function showWelcomeModal() {
    const modal = document.getElementById('welcomeModal');
    if (modal) {
        modal.classList.add('show');
        document.body.style.overflow = 'hidden'; // Impedir scroll da página
    }
}

function closeWelcomeModal() {
    const modal = document.getElementById('welcomeModal');
    if (modal) {
        modal.classList.remove('show');
        document.body.style.overflow = 'auto'; // Restaurar scroll da página
        
        // Marcar que o usuário já visitou
        localStorage.setItem('meuscursos_visited', 'true');
        localStorage.setItem('meuscursos_visit_date', new Date().toISOString());
    }
}

function startTour() {
    closeWelcomeModal();
    
    // Mostrar mensagem de boas-vindas
    setTimeout(() => {
        showMessage('Bem-vindo ao LEO Learning! Explore nossos cursos e comece sua jornada! 🎉', 'success');
    }, 500);
    
    // Scroll suave para a seção de cursos
    setTimeout(() => {
        const coursesSection = document.querySelector('.courses-section');
        if (coursesSection) {
            coursesSection.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    }, 1000);
}

// Fechar modal ao clicar fora dela
document.addEventListener('click', function(e) {
    const modal = document.getElementById('welcomeModal');
    if (e.target === modal) {
        closeWelcomeModal();
    }
});

// Fechar modal com tecla ESC
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        closeWelcomeModal();
    }
});

// Função para resetar primeira visita (apenas para debug)
function resetFirstVisit() {
    localStorage.removeItem('meuscursos_visited');
    localStorage.removeItem('meuscursos_visit_date');
    showMessage('Modal resetada! Recarregue a página para testar.', 'info');
}

// Função de pesquisa
function performSearch() {
    const searchInput = document.querySelector('.search-input');
    const query = searchInput.value.trim();
    
    if (query) {
        showMessage(`Pesquisando por: "${query}"`, 'info');
        // Aqui você pode implementar a lógica de pesquisa real
        // Por exemplo: filtrar os cursos na página ou redirecionar para página de resultados
    } else {
        showMessage('Digite algo para pesquisar!', 'warning');
    }
}

// Função para mostrar notificação ao clicar em "VER CURSO"
function showCourseNotification() {
    showMessage('Esta funcionalidade será implementada em breve! Em desenvolvimento...', 'info');
}

// Função para rolagem suave para a seção de cursos
function scrollToCourses() {
    const coursesSection = document.getElementById('courses-section');
    if (coursesSection) {
        coursesSection.scrollIntoView({
            behavior: 'smooth',
            block: 'start'
        });
    }
}
