(() => {
    'use strict'

    const forms = document.querySelectorAll('.needs-validation')

    Array.from(forms).forEach(form => {
        form.addEventListener('submit', event => {
            event.preventDefault();
            event.stopPropagation();

            let customValid = true;

            // Удаляем обязательность с необязательных полей
            const testDescription = form.querySelector('[name="test_description"]');
            if (testDescription) {
                testDescription.removeAttribute('required');
            }

            const answerTypeSelects = form.querySelectorAll('[name*="[answer_type]"]');
            answerTypeSelects.forEach(select => {
                select.removeAttribute('required');
            });

            // Проверка каждого вопроса
            const questionBlocks = form.querySelectorAll('.question-block');
            
            questionBlocks.forEach(question => {
                const answerTypeSelect = question.querySelector('[name*="[answer_type]"]');
                const answerType = answerTypeSelect ? answerTypeSelect.value : '0';
                const container = question.querySelector('.correct-checkboxes');

                // Пропускаем проверку для всех типов, кроме радио (тип 0)
                if (answerType !== '0') {
                    if (container) container.classList.remove('is-invalid');
                    return;
                }

                if (container) {
                    container.classList.remove('is-invalid');
                    
                    // Проверяем только радио-кнопки (тип 0)
                    const radioButtons = container.querySelectorAll('input[type="radio"]');
                    const radioChecked = Array.from(radioButtons).some(radio => radio.checked);
                    
                    if (radioButtons.length > 0 && !radioChecked) {
                        customValid = false;
                        container.classList.add('is-invalid');
                    }
                }
            });

            if (form.checkValidity() && customValid) {
                form.submit();
            } else {
                form.classList.add('was-validated');
            }
        }, false);
    });
})();