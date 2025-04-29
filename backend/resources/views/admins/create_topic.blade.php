@extends ('layouts.main')

@section ('content')
    <!--app-content open-->
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <h1 class="page-title">Добавить тему</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Pages</a></li>
                <li class="breadcrumb-item active" aria-current="page">Empty</li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div>
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Первичная информация</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                            <div class="form-group">
                                <label for="Inputname">Наименование темы</label>
                                <input type="text" class="form-control" id="Inputname" name="name" placeholder="Тема">
                            </div>


                    </div>
                    <div class="form-group">
                        <label class="form-label">Предмет/дисциплина и класс</label>
                        <div class="row">
                            <div class="col-xl-8">
                                <select class="form-control select2 form-select">
                                        <option value="0">Предмет</option>
                                        -------
                                            <option value="1">valume</option>
                                        -------
                                    </select>
                            </div>
                            <div class="col-md-4 mb-2">
                                <select class="form-control select2 form-select">
                                        <option value="0">Класс</option>
                                        -------
                                            <option value="1">0</option>
                                        -------
                                    </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Описание или обучающий материал</h3>
                </div>
                <div class="card-body">
                    <textarea class="content" name="example" ></textarea>
                </div>
            </div>
        </div>
    </div>
            
    <div class="card">
        <div class="card-header">
            <div class="card-title">Создание теста</div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="Inputname">Вопрос</label>
                        <input type="text" class="form-control" id="question" name="question" placeholder="Вопрос">
                    </div>
                    
                    <div class="d-flex justify-content-between align-items-center">
                        <h3 class="w-50">Тип ответа</h3>
                        <select id="answer_type" class="form-control w-50" onchange="changeAnswerType()">
                            <option value="0">Один правильный</option>
                            <option value="1">Много правильных</option>
                            <option value="2">Текст</option>
                        </select>
                    </div>
                    <div id="answers">
                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <label class="custom-control custom-radio-md ml-3">
                                <input type="radio" class="custom-control-input" name="answer_r" value="1" checked="">
                                <span class="custom-control-label"></span>
                            </label>
                            <input type="text" class="form-control w-75" id="Inputname" name="answer" placeholder="Ответ">
                            <button type="button" class="btn btn-danger my-1" onclick="removeAnswer(this)">X</button>
                        </div>
                    </div>
                    <button type="button" id="add_answer" class="btn btn-primary mt-3" onclick="addAnswer()">Добавить ответ</button>
                    <div class="d-flex justify-content-end align-items-center mt-3">
                        <button type="button" class="btn btn-primary" onclick="saveQuestion()">Сохранить</button>
                    </div>
                </div>
                <div class="col-6 bg-gray-500" >
                    <textarea name="questions" id="questions_json" style="display: none;"></textarea>
                    <div id="questions_view" class="mt-4">
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer text-end">
            <a href="javascript:void(0)" class="btn btn-primary my-1">Deactivate</a>
            <a href="javascript:void(0)" class="btn btn-danger my-1">Delete Account</a>
        </div>
    </div>

@endsection

@section('scripts')
    <!-- INTERNAL WYSIWYG Editor JS -->
    <script src="{{asset('assets/plugins/wysiwyag/jquery.richtext.js')}}"></script>
    <script src="{{asset('assets/plugins/wysiwyag/wysiwyag.js')}}"></script>
    <script>
        let questions = [];
        function saveQuestion() {
            // Формируем json на основе введенных данных

            const questionData = {};

            const question = $('#question').val();
            const answer_type = $('#answer_type').val();
            questionData['question'] = question;
            questionData['answer_type'] = answer_type;
            questionData['answers'] = [];
            $('#answers').children().each(function() {
                const answer = $(this).find('input[name="answer"]').val();
                const is_correct = answer_type == 2 ? true : $(this).find('input[name="answer_r"]').is(':checked');
                questionData['answers'].push({
                    'answer': answer,
                    'is_correct': is_correct
                });
            })

            questions.push(questionData);
            $('#questions').val(JSON.stringify(questions));
            $('#question').val('');
            $('#answers').empty();
            
            changeAnswerType();

            viewQuestions();
        }

        function viewQuestions() {
            $('#questions_view').empty();
            for(let i = 0; i < questions.length; i++) {
                const question = questions[i];
                const answers = question.answers.map(answer => {
                    return `<li>${answer.answer} ${answer.is_correct ? '<span class="text-success"><b>Правильный</b></span>' : ''}</li>`;
                }).join('');
                const questionCard = `
                    <div class="card m-b-20">
                        <div class="card-header">
                            <h3 class="card-title">Вопрос ${i + 1}</h3>
                            <div class="card-options">
                                <a href="javascript:void(0)" class="card-options-collapse" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                                <a href="javascript:void(0)" class="card-options-remove" ><i class="fe fe-x"></i></a>
                            </div>
                        </div>
                        <div class="card-body">
                            <p><b>${question.question}</b></p>
                            <ul style="margin-left: 20px;">
                                ${answers}
                            </ul>
                        </div>
                    </div>
                `;
                $('#questions_view').append(questionCard);
            }
        }

        function changeAnswerType() {
            const answerType = $('#answer_type').val();
            $('#answers').empty();
            $('#add_answer').show();
            if(answerType == 0) {
                $('#answers').append(return_signle_answer('',1,0));
            } else if(answerType == 1) {
                $('#answers').append(return_multiple_answer('',1,0));
            } else if(answerType == 2) {
                $('#answers').append(return_text_answer(''));
                $('#add_answer').hide();
            }
        }

        function return_text_answer(value) {
            return `
                <div class="d-flex justify-content-between align-items-center mt-3">
                    <input type="text" class="form-control w-75" id="Inputname" name="answer" value="${value}" placeholder="Ответ">
                </div>
            `;
        }

        function return_signle_answer(value,id, is_correct) {
            return `
                <div class="d-flex justify-content-between align-items-center mt-3">
                    <label class="custom-control custom-radio-md ml-3">
                        <input type="radio" class="custom-control-input" name="answer_r" value="${id}" ${is_correct ? 'checked' : ''}>
                        <span class="custom-control-label"></span>
                    </label>
                    <input type="text" class="form-control w-75" id="Inputname" name="answer" value="${value}" placeholder="Ответ">
                    <button type="button" class="btn btn-danger my-1" onclick="removeAnswer(this)">X</button>
                </div>
            `;
        }

        function return_multiple_answer(value,id, is_correct) {
            return `
                <div class="d-flex justify-content-between align-items-center mt-3">
                    <label class="custom-control custom-checkbox-md ml-3">
                        <input type="checkbox" class="custom-control-input" name="answer_r" value="${id}" ${is_correct ? 'checked' : ''}>
                        <span class="custom-control-label"></span>
                    </label>
                     <input type="text" class="form-control w-75" id="Inputname" name="answer" value="${value}" placeholder="Ответ">
                    <button type="button" class="btn btn-danger my-1" onclick="removeAnswer(this)">X</button>
                </div>
            `;
        }

        function addAnswer() {

            const answerType = $('#answer_type').val();
            if(answerType == 0) {
                const count = $('#answers').children().length+1;
                $('#answers').append(return_signle_answer('',count,0));
            } else if(answerType == 1) {
                const count = $('#answers').children().length+1;
                $('#answers').append(return_multiple_answer('',count,0));
            }
        }

        function removeAnswer(button) {
            
            const answerType = $('#answer_type').val();
            if(answerType == 0) {
                // нужно проверить был ли удалет ответ с галкочкой что он был правельный и в таком случае что бы не получилось что ответы останятся без правильного поставить на первый
                const isCorrect = $(button).parent().find('input[name="answer_r"]').is(':checked');
                if(isCorrect) {
                    $('#answers').children().first().find('input[name="answer_r"]').prop('checked', true);
                }
            }

            $(button).parent().remove();
        }
    </script>
    
@endsection