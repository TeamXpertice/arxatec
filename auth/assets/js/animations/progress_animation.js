document.addEventListener('DOMContentLoaded', function() {
    const progressBarFill = document.getElementById('progress-fill');
    progressBarFill.style.width = '0%';

    // Mostrar los botones del primer paso al cargar la página
    showFields(1);

    document.querySelectorAll('.step-circle').forEach(circle => {
        circle.classList.remove('active');
    });

    setTimeout(() => {
        updateProgressBar();
    }, 100); 
});

let currentStep = 1;

function nextStep(step) {
    // Validar antes de avanzar
    if (validateStepFields(currentStep)) {
        hideFields(currentStep);
        currentStep = step;
        updateProgressBar();
        showStep(step);
    }
}

function prevStep(step) {
    hideFields(currentStep);
    currentStep = step;
    updateProgressBar();
    showStep(step);
}

function updateProgressBar() {
    const progressBarFill = document.getElementById('progress-fill');
    const percentage = (currentStep / 3) * 100;

    setTimeout(() => {
        progressBarFill.style.width = `${percentage}%`;

        document.querySelectorAll('.step-circle').forEach((circle, index) => {
            if (index < currentStep) {
                circle.classList.add('active');
            } else {
                circle.classList.remove('active');
            }
        });

        const stepTexts = document.querySelectorAll('.progress-text div');
        stepTexts.forEach((text, index) => {
            if (index < currentStep) {
                text.classList.add('active-step');
                text.classList.remove('inactive-step');
            } else {
                text.classList.add('inactive-step');
                text.classList.remove('active-step');
            }
        });
    }, 100); 
}

function showStep(step) {
    document.querySelectorAll('.tab-pane').forEach(pane => {
        pane.classList.remove('show', 'active');
    });
    document.getElementById(`step${step}`).classList.add('show', 'active');
    showFields(step);
}

function hideFields(step) {
    document.querySelectorAll(`#step${step} .fade-field`).forEach(field => {
        field.classList.remove('show-field');
    });
    document.querySelectorAll(`#step${step} .fade-button`).forEach(button => {
        button.classList.remove('show-button');
    });
}

function showFields(step) {
    document.querySelectorAll(`#step${step} .fade-field`).forEach(field => {
        setTimeout(() => {
            field.classList.add('show-field');
        }, 100);
    });
    document.querySelectorAll(`#step${step} .fade-button`).forEach(button => {
        setTimeout(() => {
            button.classList.add('show-button');
        }, 100);
    });
}

// Validar campos del paso actual
function validateStepFields(step) {
    const stepFields = document.querySelectorAll(`#step${step} .form-control`);
    let isValid = true;

    stepFields.forEach(field => {
        if (!field.value.trim()) {
            field.classList.add('is-invalid', 'shake');
            isValid = false;

            // Remover la clase de "shake" después de la animación
            setTimeout(() => {
                field.classList.remove('shake');
            }, 300); // Duración de la animación es de 0.3s
        } else {
            field.classList.remove('is-invalid');
        }
    });

    return isValid;
}

