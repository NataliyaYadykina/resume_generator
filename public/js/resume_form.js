document.addEventListener('DOMContentLoaded', function () {
    // Функция для добавления новых полей в форму
    function addField(containerId, inputName) {
        const container = document.getElementById(containerId);
        const inputGroup = document.createElement('div');
        inputGroup.classList.add('input-group', 'mb-2');

        const input = document.createElement('input');
        input.type = 'text';
        input.name = inputName + '[]';
        input.classList.add('form-control');
        input.placeholder = 'Введите данные';

        const removeButton = document.createElement('button');
        removeButton.classList.add('btn', 'btn-outline-danger');
        removeButton.type = 'button';
        removeButton.textContent = '-';
        removeButton.addEventListener('click', function () {
            inputGroup.remove();
        });

        inputGroup.appendChild(input);
        inputGroup.appendChild(removeButton);
        container.appendChild(inputGroup);
    }

    // Проверка наличия кнопок перед добавлением обработчиков
    const addSocialLinkBtn = document.getElementById('addSocialLink');
    const addWorkExperienceBtn = document.getElementById('addWorkExperience');
    const addEducationBtn = document.getElementById('addEducation');

    if (addSocialLinkBtn) {
        addSocialLinkBtn.addEventListener('click', function () {
            addField('social-links-container', 'social_links');
        });
    }

    if (addWorkExperienceBtn) {
        addWorkExperienceBtn.addEventListener('click', function () {
            addField('work-experience-container', 'work_experience');
        });
    }

    if (addEducationBtn) {
        addEducationBtn.addEventListener('click', function () {
            addField('education-container', 'education');
        });
    }
});
