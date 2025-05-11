@extends ('layouts.main')

@section ('content')

<!--app-content open-->
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <h1 class="page-title">Создание теста</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin/topic">Мои темы</a></li>
                <li class="breadcrumb-item"><a href="/admin/topic/{topic->id}">{topic->name}</a></li>
                <li class="breadcrumb-item active" aria-current="page">Создание теста</li>
            </ol>
        </div>
    </div>

    <form method="POST" action="/admin/test/store">
        @csrf
        <div class="card">
            <div class="card-header">
                <div class="card-title">Информация о тесте</div>
            </div>
            <div class="card-body">
                <div class="row mb-4">
                    <label class="col-md-3 form-label">Название теста :</label>
                    <div class="col-md-9">
                        <input type="text" name="test_title" class="form-control" placeholder="Итоговый тест">
                    </div>
                </div>
                <div class="row mb-4">
                    <label class="col-md-3 form-label">Описание (опционально) :</label>
                    <div class="col-md-9">
                        <input type="text" name="test_description" class="form-control" placeholder="Проверка знаний по темам представленным в теме">
                    </div>
                </div>
            </div>
            @if ($readonly)
                <input type="hidden" name="class_id" value="{{ $topic->class_id }}">
                <input type="hidden" name="subject_id" value="{{ $topic->subject_id }}">
                <input type="hidden" name="topic_id" value="{{ $topic->id }}">
            @else
                @php
                    // Группируем темы по class_id и subject_id
                    $topicsGrouped = $topics->groupBy(fn($t) => $t->class_id . '-' . $t->subject_id);
                @endphp

                <div class="card-footer">
                    <div class="form-group">
                        <label class="form-label">Зависимость</label>
                        <div class="row">
                            <div class="col-md-4 mb-2">
                                <select id="classSelect" class="form-control select2 form-select" >
                                        <option value="">Выбирите класс</option>
                                            @foreach($classes as $class)
                                                <option value="{{ $class->id }}">{{ $class->name }}</option>
                                            @endforeach
                                    </select>
                            </div>
                            <div class="col-md-4 mb-2">
                                <select id="subjectSelect" class="form-control select2 form-select" disabled>
                                        <option value="">Выбирите предмет</option>
                                            @foreach($subjects as $subject)
                                                <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                                            @endforeach
                                    </select>
                            </div>
                            <div class="col-md-4 mb-2">
                                <select name="topic_id" id="topicSelect" class="form-control select2 form-select" disabled>
                                        <option value="">Выбирите тему</option>
                                            @foreach($topics as $topic)
                                               <option 
                                                    value="{{ $topic->id }}" 
                                                    data-class="{{ $topic->class_id }}" 
                                                    data-subject="{{ $topic->subject_id }}">
                                                    {{ $topic->title }}
                                                </option>
                                            @endforeach
                                    </select>
                            </div>
                        </div>
                    </div>
                </div> 
            @endif
        </div>

        <div class="card">
            <div class="card-header">
                <div class="card-title">Вопросы теста</div>
            </div>
            <div class="card-body">
                <div id="questions-container">
                    <div class="card m-b-20" data-question-index="1">
                        <div class="card-header">
                            <h3 class="card-title">Вопрос №1</h3>
                            <div class="card-options">
                                <a href="javascript:void(0)" class="card-options-collapse" data-bs-toggle="card-collapse">
                                    <i class="fe fe-chevron-up"></i>
                                </a>
                                <a href="#modaldelete" data-bs-toggle="modal" class="card-options-remove" onclick="confirmDeleteQuestion(this)">
                                    <i class="fe fe-x"></i>
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row mb-4">
                                <label class="col-md-3 form-label">Вопрос :</label>
                                <div class="col-md-9">
                                    <input type="text" name="questions[1][text]" class="form-control" placeholder="Вопрос">
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label class="col-md-3 form-label">Тип ответа :</label>
                                <div class="col-md-9">
                                    <select name="questions[1][answer_type]" class="form-control form-select" onchange="changeAnswerType(this)">
                                        <option value="0">Один правильный</option>
                                        <option value="1">Много правильных</option>
                                        <option value="2">Текст</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-3 form-label mb-4">Ответы :</label>
                                <div class="col-md-9 mb-4">
                                    <div class="answers" id="answers-1">
                                        <!-- Ответы по умолчанию (4 шт.) -->
                                        <div class="d-flex justify-content-between align-items-center mt-3">
                                            <label class="custom-control custom-radio-md me-2">
                                                <input type="radio" class="custom-control-input" name="questions[1][correct]" value="0">
                                                <span class="custom-control-label"></span>
                                            </label>
                                            <input type="text" class="form-control me-2" name="questions[1][answers][0][text]" placeholder="Ответ">
                                            <button type="button" class="btn btn-outline-danger ms-2" onclick="removeAnswer(this)">Х</button>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center mt-3">
                                            <label class="custom-control custom-radio-md me-2">
                                                <input type="radio" class="custom-control-input" name="questions[1][correct]" value="1">
                                                <span class="custom-control-label"></span>
                                            </label>
                                            <input type="text" class="form-control me-2" name="questions[1][answers][1][text]" placeholder="Ответ">
                                            <button type="button" class="btn btn-outline-danger ms-2" onclick="removeAnswer(this)">Х</button>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center mt-3">
                                            <label class="custom-control custom-radio-md me-2">
                                                <input type="radio" class="custom-control-input" name="questions[1][correct]" value="2">
                                                <span class="custom-control-label"></span>
                                            </label>
                                            <input type="text" class="form-control me-2" name="questions[1][answers][2][text]" placeholder="Ответ">
                                            <button type="button" class="btn btn-outline-danger ms-2" onclick="removeAnswer(this)">Х</button>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center mt-3">
                                            <label class="custom-control custom-radio-md me-2">
                                                <input type="radio" class="custom-control-input" name="questions[1][correct]" value="3">
                                                <span class="custom-control-label"></span>
                                            </label>
                                            <input type="text" class="form-control me-2" name="questions[1][answers][3][text]" placeholder="Ответ">
                                            <button type="button" class="btn btn-outline-danger ms-2" onclick="removeAnswer(this)">Х</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-end">
                            <button type="button" class="btn btn-outline-secondary" onclick="addAnswer(1)">Добавить ответ</button>
                        </div>
                    </div>                   
                </div>

                <div class="text-center">
                    <a href="javascript:void(0)" class="btn btn-outline-primary" onclick="addQuestion()">Добавить вопрос</a>
                </div>
            
            </div>

            <div class="card-footer">
                <a href="/admin/topic/{topic->id}" class="btn btn-default">Назад</a>
                <button type="submit" class="btn btn-success my-1 float-end">Сохранить</button>
            </div>
        </div>

    </form>

    <div class="modal fade" id="modaldelete">
        <div class="modal-dialog modal-dialog-centered text-center" role="document">
            <div class="modal-content tx-size-sm">
                <div class="modal-body text-center p-4 pb-5">
                    <button aria-label="Close" class="btn-close position-absolute" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                    <h4>Удалить вопрос?</h4>
                    <button class="btn btn-danger" data-bs-dismiss="modal"  onclick="deleteQuestion()">Да</button>
                    <button aria-label="Close" class="btn btn-default ms-4" data-bs-dismiss="modal">Нет</button>
                </div>
            </div>
        </div>
    </div>


@endsection


@section('scripts')
<script>
    let questionId = 2; // Начинаем с 2, т.к. первый вопрос уже есть
    let questionToDelete = null;

    function addQuestion() {
        const container = document.getElementById('questions-container');

        const currentQuestionId = questionId;

        const template = `
        <div class="card m-b-20" data-question-index="${currentQuestionId}">
            <div class="card-header">
                <h3 class="card-title">Вопрос №</h3>
                <div class="card-options">
                    <a href="javascript:void(0)" class="card-options-collapse" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                    <a href="#modaldelete" data-bs-toggle="modal" class="card-options-remove" onclick="confirmDeleteQuestion(this)"><i class="fe fe-x"></i></a>
                </div>
            </div>
            <div class="card-body">
                <div class="row mb-4">
                    <label class="col-md-3 form-label">Вопрос :</label>
                    <div class="col-md-9">
                        <input type="text" name="questions[${currentQuestionId}][text]" class="form-control" placeholder="Вопрос">
                    </div>
                </div>
                <div class="row mb-4">
                    <label class="col-md-3 form-label">Тип ответа :</label>
                    <div class="col-md-9">
                        <select name="questions[${currentQuestionId}][answer_type]" class="form-control form-select" onchange="changeAnswerType(this)">
                            <option value="0">Один правильный</option>
                            <option value="1">Много правильных</option>
                            <option value="2">Текст</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <label class="col-md-3 form-label mb-4">Ответы :</label>
                    <div class="col-md-9 mb-4">
                        <div class="answers" id="answers-${currentQuestionId}"></div>
                    </div>
                </div>
            </div>
            <div class="card-footer text-end">
                <button type="button" class="btn btn-outline-secondary" onclick="addAnswer(${currentQuestionId})">Добавить ответ</button>
            </div>
        </div>`;

        container.insertAdjacentHTML('beforeend', template);

        // Добавить 4 ответа по умолчанию
        for (let i = 0; i < 4; i++) {
            addAnswer(currentQuestionId);
        }

        renumberQuestions();
        questionId++;
    }

    function addAnswer(questionIndex) {
        const answersContainer = document.getElementById(`answers-${questionIndex}`);
        const answerIndex = getNextAnswerIndex(answersContainer);
        
        const answerTypeSelect = document.querySelector(`[name="questions[${questionIndex}][answer_type]"]`);
        const answerType = answerTypeSelect?.value ?? '0';
        const inputType = answerType === '1' ? 'checkbox' : 'radio';

        if (answerType === '2') {
            const textInputHtml = `
                <div class="d-flex justify-content-between align-items-center mt-3">
                    <input type="text" class="form-control me-2" name="questions[${questionIndex}][answers][${answerIndex}][text]" placeholder="Ответ">
                </div>`;
            answersContainer.insertAdjacentHTML('beforeend', textInputHtml);
            return;
        }

        const nameAttr = inputType === 'radio'
            ? `questions[${questionIndex}][correct]`
            : `questions[${questionIndex}][answers][${answerIndex}][correct]`;

        const answerHtml = `
            <div class="d-flex justify-content-between align-items-center mt-3">
                <label class="custom-control custom-${inputType}-md me-2">
                    <input type="${inputType}" class="custom-control-input" name="${nameAttr}" value="${answerIndex}">
                    <span class="custom-control-label"></span>
                </label>
                <input type="text" class="form-control me-2" name="questions[${questionIndex}][answers][${answerIndex}][text]" placeholder="Ответ">
                <button type="button" class="btn btn-outline-danger ms-2" onclick="removeAnswer(this)">Х</button>
            </div>`;
        
        answersContainer.insertAdjacentHTML('beforeend', answerHtml);
    }

    function getNextAnswerIndex(answersContainer) {
        const inputs = answersContainer.querySelectorAll('input[name*="[answers]["][name$="[text]"]');
        const usedIndexes = Array.from(inputs).map(input => {
            const match = input.name.match(/\[answers]\[(\d+)]/);
            return match ? parseInt(match[1], 10) : -1;
        }).filter(i => i >= 0);
        
        let next = 0;
        while (usedIndexes.includes(next)) {
            next++;
        }
        return next;
    }

    function removeAnswer(button) {
        const answerDiv = button.closest('.d-flex');
        if (answerDiv) {
            const answersContainer = answerDiv.parentElement;
            answerDiv.remove();
            renumberAnswerIndexes(answersContainer);
        }
    }

    function changeAnswerType(selectElement) {
        const questionCard = selectElement.closest('.card');
        const questionIndex = questionCard.dataset.questionIndex;
        const answersContainer = document.getElementById(`answers-${questionIndex}`);
        answersContainer.innerHTML = '';

        const type = selectElement.value;

        // Находим кнопку добавления ответа
        const addAnswerButton = questionCard.querySelector('.card-footer button');

        if (type === '2') {
            addAnswer(questionIndex);
            if (addAnswerButton) {
                addAnswerButton.style.display = 'none'; // Скрываем кнопку
            }
        } else {
            for (let i = 0; i < 4; i++) {
                addAnswer(questionIndex);
            }
            if (addAnswerButton) {
                addAnswerButton.style.display = ''; // Показываем кнопку
            }
        }
    }

    function confirmDeleteQuestion(button) {
        questionToDelete = button.closest('.card');
    }

    function deleteQuestion() {
        if (questionToDelete) {
            questionToDelete.remove();
            questionToDelete = null;
            renumberQuestions();
        }
    }

    function renumberQuestions() {
        const cards = document.querySelectorAll('#questions-container .card');
        cards.forEach((card, index) => {
            const number = index + 1;
            card.setAttribute('data-question-index', number);

            const title = card.querySelector('.card-title');
            if (title) title.textContent = `Вопрос №${number}`;

            const inputs = card.querySelectorAll('[name]');
            inputs.forEach(input => {
                input.name = input.name.replace(/questions\[\d+\]/g, `questions[${number}]`);
            });

            const answersDiv = card.querySelector('.answers');
            if (answersDiv) answersDiv.id = `answers-${number}`;

            const addAnswerBtn = card.querySelector('button[onclick^="addAnswer"]');
            if (addAnswerBtn) {
                addAnswerBtn.setAttribute('onclick', `addAnswer(${number})`);
            }
        });
    }

    function renumberAnswerIndexes(container) {
        const answerRows = container.querySelectorAll('.d-flex');
        answerRows.forEach((row, index) => {
            // input типа radio/checkbox
            const input = row.querySelector('input[type="radio"], input[type="checkbox"]');
            if (input) {
                input.value = index;
            }

            // текстовый input
            const textInput = row.querySelector('input[type="text"]');
            if (textInput) {
                textInput.name = textInput.name.replace(/\[answers]\[\d+]/, `[answers][${index}]`);
            }

            // для checkbox: name тоже нужно обновить
            if (input?.type === 'checkbox') {
                input.name = input.name.replace(/\[answers]\[\d+]\[correct]/, `[answers][${index}][correct]`);
            }
        });
    }

    const classSelect = document.getElementById('classSelect');
    const subjectSelect = document.getElementById('subjectSelect');
    const topicSelect = document.getElementById('topicSelect');

    classSelect.addEventListener('change', () => {
        const classId = classSelect.value;

        // Если класс не выбран
        if (!classId) {
            subjectSelect.disabled = true;
            subjectSelect.value = '';

            topicSelect.disabled = true;
            topicSelect.value = '';
            return;
        }

        subjectSelect.disabled = false;
        subjectSelect.value = '';
        topicSelect.disabled = true;
        topicSelect.value = '';

        filterTopics(); // очистка видимых тем
    });

    subjectSelect.addEventListener('change', () => {
        const classId = classSelect.value;
        const subjectId = subjectSelect.value;

        // Если предмет не выбран
        if (!subjectId) {
            topicSelect.disabled = true;
            topicSelect.value = '';
            return;
        }

        if (classId && subjectId) {
            topicSelect.disabled = false;
            filterTopics();
        } else {
            topicSelect.disabled = true;
            topicSelect.value = '';
        }
    });

    function filterTopics() {
        const classId = classSelect.value;
        const subjectId = subjectSelect.value;

        const options = topicSelect.querySelectorAll('option');

        options.forEach(option => {
            const topicClass = option.getAttribute('data-class');
            const topicSubject = option.getAttribute('data-subject');

            if (!topicClass || !topicSubject) {
                option.style.display = 'block'; // Показываем placeholder
                return;
            }

            if (topicClass === classId && topicSubject === subjectId) {
                option.style.display = 'block';
            } else {
                option.style.display = 'none';
            }
        });

        topicSelect.value = '';
    }
</script>

@endsection