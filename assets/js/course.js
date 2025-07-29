// Mostrar modal de edição do curso
function editCourse(courseId) {
    const modal = document.getElementById('editCourseModal');
    if (modal) {
        modal.classList.add('show');
        modal.style.display = 'flex';
        document.body.style.overflow = 'hidden';
    }
}

// Fechar modal do curso de edição
function closeEditCourseModal() {
    const modal = document.getElementById('editCourseModal');
    if (modal) {
        modal.classList.remove('show');
        modal.style.display = 'none';
        document.body.style.overflow = '';
    }
}

// Excluir curso
function deleteCourse(courseId) {
    if (confirm('Tem certeza de que deseja excluir este curso? Esta ação não pode ser desfeita.')) {
        const formData = new FormData();
        formData.append('action', 'delete');
        formData.append('id', courseId);
        
        fetch('api/courses.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                showMessage('Curso excluído com sucesso!', 'success');
                setTimeout(() => {
                    window.location.href = 'index.php';
                }, 1000);
            } else {
                showMessage(data.message, 'error');
            }
        })
        .catch(error => {
            console.error('Error deleting course:', error);
            showMessage('Erro ao excluir curso. Tente novamente.', 'error');
        });
    }
}

// Processar formulário de edição do curso
document.addEventListener('DOMContentLoaded', function() {
    const editCourseForm = document.getElementById('editCourseForm');
    if (editCourseForm) {
        editCourseForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const formData = new FormData(this);
            formData.append('action', 'update');

            // Show loading state
            const submitBtn = this.querySelector('button[type="submit"]');
            const originalText = submitBtn.textContent;
            submitBtn.textContent = 'Atualizando...';
            submitBtn.disabled = true;
            
            fetch('api/courses.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    showMessage('Curso atualizado com sucesso!', 'success');
                    closeEditCourseModal();
                    
                    setTimeout(() => {
                        location.reload();
                    }, 1500);
                } else {
                    showMessage(data.message, 'error');
                }
            })
            .catch(error => {
                console.error('Error updating course:', error);
                showMessage('Erro ao atualizar curso. Tente novamente.', 'error');
            })
            .finally(() => {
                submitBtn.textContent = originalText;
                submitBtn.disabled = false;
            });
        });
    }
});

// Fechar modais ao clicar fora
document.addEventListener('click', function(e) {
    if (e.target.classList.contains('modal')) {
        if (e.target.id === 'editCourseModal') {
            closeEditCourseModal();
        }
    }
});

// Feche os modais com ESC
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        closeEditCourseModal();
    }
});

// Função para exibir mensagens de feedback
window.showMessage = function(message, type = 'info') {
    const messageDiv = document.createElement('div');
    messageDiv.className = `message message-${type}`;
    messageDiv.textContent = message;
    
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
    
    const colors = {
        'success': '#28a745',
        'error': '#dc3545',
        'warning': '#ffc107',
        'info': '#667eea'
    };
    
    messageDiv.style.backgroundColor = colors[type] || colors.info;
    
    document.body.appendChild(messageDiv);
    
    setTimeout(() => {
        messageDiv.style.animation = 'slideOut 0.3s ease-out';
        setTimeout(() => {
            if (messageDiv.parentNode) {
                messageDiv.parentNode.removeChild(messageDiv);
            }
        }, 300);
    }, 4000);
};
