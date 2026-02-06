document.addEventListener('DOMContentLoaded', function() {
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.has('saved') && urlParams.get('saved') === 'true') {
        showToast('¡Acta guardada exitosamente!');
        // Clean up the URL
        const cleanUrl = window.location.pathname;
        window.history.replaceState({}, document.title, cleanUrl);
    }
});

function showToast(message) {
    // Remove any existing toast
    const existingToast = document.querySelector('.toast');
    if (existingToast) {
        existingToast.remove();
    }

    // Create and show new toast
    const toast = document.createElement('div');
    toast.className = 'toast';
    toast.textContent = message;
    document.body.appendChild(toast);

    // Trigger the show animation
    setTimeout(() => toast.classList.add('show'), 10);

    // Auto-hide after 3 seconds
    setTimeout(() => {
        toast.classList.remove('show');
        toast.classList.add('hide');
        // Remove from DOM after animation
        setTimeout(() => toast.remove(), 300);
    }, 3000);
}

// Variables globales para el modal
let currentCheckbox = null;
let currentAction = null;

function confirmarCambio(checkbox) {
    currentCheckbox = checkbox;
    const id = checkbox.dataset.id;
    const nombre = checkbox.dataset.nombre;
    const isChecked = checkbox.checked;
    
    const action = isChecked ? 'marcar como ingresado' : 'desmarcar como ingresado';
    const message = `¿Estás seguro que quieres ${action} a ${nombre} en el sistema?`;
    
    document.getElementById('modalMessage').textContent = message;
    document.getElementById('confirmModal').style.display = 'block';
    currentAction = isChecked ? 1 : 0;
    
    // Prevenir el cambio inmediato
    checkbox.checked = !isChecked;
}

// Event listeners para el modal
document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('confirmYes').addEventListener('click', function() {
        if (currentCheckbox) {
            const id = currentCheckbox.dataset.id;
            
            fetch('../src/actualizar_ingresado.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    id: id,
                    ingresado: currentAction
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    currentCheckbox.checked = currentAction === 1;
                    // Actualizar la clase de la fila
                    const row = currentCheckbox.closest('tr');
                    if (currentAction === 1) {
                        row.classList.add('ingresado');
                    } else {
                        row.classList.remove('ingresado');
                    }
                    showToast(data.message);
                } else {
                    showToast('Error: ' + data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showToast('Error al actualizar el estado');
            });
        }
        
        closeModal();
    });

    document.getElementById('confirmNo').addEventListener('click', closeModal);

    // Cerrar modal al hacer clic fuera
    window.addEventListener('click', function(event) {
        const modal = document.getElementById('confirmModal');
        if (event.target === modal) {
            closeModal();
        }
    });
});

function closeModal() {
    document.getElementById('confirmModal').style.display = 'none';
    currentCheckbox = null;
    currentAction = null;
}
