<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Физика | Обучение и тестирование</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }
        .floating {
            animation: float 3s ease-in-out infinite;
        }
        .option:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        }
        .progress-bar {
            transition: width 0.5s ease-in-out;
        }
        .fade-in {
            animation: fadeIn 0.5s ease-in-out;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .study-card {
            transition: all 0.3s ease;
        }
        .study-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
        }
        .tab-button {
            transition: all 0.3s ease;
        }
        .tab-button.active {
            border-bottom: 3px solid #7c3aed;
            color: #7c3aed;
        }
        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        .subject-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1);
        }
        .topic-card {
            transition: all 0.3s ease;
        }
        .topic-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }
        .test-btn {
            transition: all 0.3s ease;
        }
        .test-btn:hover {
            transform: scale(1.05);
        }
        @media (max-width: 640px) {
            .grade-btn {
                padding: 0.5rem 1rem;
                font-size: 0.875rem;
            }
        }
    </style>
</head>

<body class="bg-gradient-to-br from-blue-50 to-purple-50 min-h-screen font-sans">
    <div class="container mx-auto px-4 py-8">
        <!-- Header -->

            <div class="flex items-center justify-center mb-4">
                <h1 class="text-4xl font-bold bg-gradient-to-r from-purple-600 to-blue-500 bg-clip-text text-transparent">
                    {{ $subject->name }}
                </h1>
            </div>

        <!-- Main Content -->
        <main class="max-w-4xl mx-auto">
            <!-- Tabs Navigation -->
            <div class="flex border-b border-gray-200 mb-8">
                <button id="study-tab" class="tab-button active py-2 px-4 font-medium text-gray-600" onclick="showTab('study')">
                    <i class="fas fa-book-open mr-2"></i> Изучение
                </button>
                <button id="test-tab" class="tab-button py-2 px-4 font-medium text-gray-600" onclick="showTab('test')">
                    <i class="fas fa-graduation-cap mr-2"></i> Тестирование
                </button>
            </div>

            <!-- Study Content -->
            <div id="study-content" class="fade-in">
                
                <!-- Список тем -->
                <section id="topics-section" class="mb-12">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-2xl md:text-2xl font-bold text-gray-800 flex items-center">
                            <i class="fas fa-list-ul mr-3 text-purple-500"></i>
                            <span id="selected-subject-text">Список тем</span>
                        </h2>
                        <div class="backButtonTopic" style="display:none">
                            <button onclick="backToTopics()" class="text-purple-600 hover:text-purple-800 font-medium flex items-center">
                                <i class="fas fa-arrow-left mr-2"></i> Назад
                            </button>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 gap-7" id="topics-container">
                        <div id="topic-list">
                            @foreach ($subject->topics as $topic)
                                <div class="topic-conteiner">
                                    <div class="full-topic" style="display:none">
                                        <div id="topic-detail" class="bg-white p-6 rounded-lg shadow fade-in">
                                            <h3 id="topic-title" class="text-2xl font-bold mb-4">{{ $topic->title }}</h3>
                                            <p id="topic-description" class="text-gray-700 mb-6">{!! $topic->content !!}</p>
                                        </div>
                                    </div>

                                    <div class="short-topic study-card bg-white p-4 rounded-lg shadow mb-6">
                                        <div class="ms-4 mb-2 mt-1">
                                            <div class="flex justify-between items-start">
                                                <h3 class="text-xl font-bold mb-2 text-gray-800"> {{ $loop->iteration }}. {{ $topic->title }}</h3>
                                                <snap class="text-nowrap ml-4 bg-gray-100 text-gray-600 text-xs font-medium px-2.5 py-0.5 rounded"> 
                                                    {{ $topic->class->name }}
                                                </snap>
                                            </div>
                                            <p class="text-gray-600 mb-4">{{ $topic->description }}</p>
                                            <div class="flex flex-wrap gap-3">
                                                <button onclick="showTopic(this)" class="test-btn bg-purple-600 hover:bg-purple-700 text-white font-medium py-2 px-4 rounded-lg transition flex items-center">
                                                    <i class="fas fa-book-open mr-2"></i> Учебный материал
                                                </button>
                                                <button onclick="showTests({{ $topic->id }})" class="test-btn bg-green-600 hover:bg-green-700 text-white font-medium py-2 px-4 rounded-lg transition flex items-center">
                                                    <i class="fas fa-question-circle mr-2"></i> Пройти тест
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </section>
            </div>

            <!-- Test Content -->
            <div id="test-content" style="display: none;">
                <!-- Список тестов -->
                <section id="tests-section" class="fade-in">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-2xl md:text-2xl font-bold text-gray-800 flex items-center">
                            <i class="fas fa-list-check text-purple-500 mr-3"></i>
                            <span id="selected-subject-text">Список тестов</span>
                        </h2>
                        <div class="backButtonTest" style="display:none">
                            <button onclick="backToTests()" class="text-purple-600 hover:text-purple-800 font-medium flex items-center">
                                <i class="fas fa-arrow-left mr-2"></i> Назад
                            </button>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 gap-7" id="topics-container">
                        <div id="test-list">
                            @foreach ($subject->topics as $topic)
                                
                                <!-- @if ($topic->tests->isNotEmpty())
                                    <p class="text-gray-600 mb-4">Тесты для темы: {{ $topic->title }} </p>  
                                @endif        -->
                                
                                @foreach ($topic->tests as $test)
                                    <div class="test-conteiner topic-{{ $topic->id }}">                                      
                                        {{-- Контетнт самого теста --}}
                                        <div class="full-test" style="display:none">          
                                            <!-- Тело теста -->
                                            <div id="test-area" class="bg-white rounded-xl shadow-lg p-6 mb-8 fade-in">
                                                <div class="flex justify-between items-center mb-6 flex-wrap">
                                                    <h2 class="text-2xl font-semibold text-gray-800 flex items-center flex-1 min-w-0">
                                                        <i class="fas fa-question-circle text-purple-500 mr-3 shrink-0"></i>
                                                        <span class="break-words truncate sm:whitespace-normal overflow-hidden">Тест: {{ $test->title }}</span>
                                                    </h2>
                                                    <div class="flex items-center ml-4 mt-2 sm:mt-0 shrink-0">
                                                        <span class="question-progress-count bg-purple-100 text-purple-800 px-3 py-1 rounded-full text-sm font-medium">1/1</span>
                                                    </div>
                                                </div>

                                                <!-- Progress Bar -->
                                                <div class="w-full bg-gray-200 rounded-full h-2.5 mb-6">
                                                    <div id="progress-bar" class="progress-bar bg-purple-600 h-2.5 rounded-full" style="width: 0%"></div>
                                                </div>

                                                <!-- Question -->
                                                <div class="question-container mb-8 ">
                                                    @foreach ($test->quests as $quest)
                                                        <div class="quest-{{ $loop->iteration }} hidden">
                                                                <!-- Вопрос -->
                                                            <h3 class="break-words line-clamp text-xl font-medium text-gray-800 mb-6">{{ $quest->question }}</h3>
                                                        
                                                            <div class="options-container grid grid-cols-1 gap-3">
                                                                <!-- Варианты ответов -->
                                                               
                                                                <!-- Если один правильный -->
                                                                @foreach ($quest->answers as $answer)
                                                                    @if ($quest->type == 0)         
                                                                            <label class="option bg-white border-2 rounded-lg p-4 cursor-pointer transition-all duration-300 border-gray-200 hover:border-purple-300 flex items-center">
                                                                                
                                                                                <input type="radio" name="answer-single" data-answer-type="single" data-answer="{{ $answer->is_correct }}" value="{{ $answer->answer }}" class="hidden peer">
                                                                                
                                                                                <div class="w-6 h-6 rounded-full border-2 flex-shrink-0 flex items-center justify-center mr-3 border-gray-300 peer-checked:bg-purple-500 peer-checked:border-purple-500">
                                                                                    <!-- круг -->
                                                                                    <div class="w-3 h-3 rounded-full bg-white peer-checked:bg-white"></div>
                                                                                </div>
                                                                                <span class="break-words line-clamp-3">{{ $answer->answer }}</span>
                                                                            </label>
                                                                
                                                                    @elseif ($quest->type == 1)
                                                                    <!-- Если много правильных -->
                                                                        <label class="option bg-white border-2 rounded-lg p-4 cursor-pointer transition-all duration-300 border-gray-200 hover:border-purple-300 flex items-center">
                                                                            
                                                                            <input type="checkbox" name="answer-multiple" data-answer-type="multiple" data-answer="{{ $answer->is_correct }}" value="{{ $answer->answer }}" class="hidden peer">
                                                                            
                                                                            <div class="w-6 h-6 rounded border-2 flex-shrink-0 flex items-center justify-center mr-3 border-gray-300 peer-checked:bg-purple-500 peer-checked:border-purple-500">
                                                                                <!-- галочка -->
                                                                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                                                                </svg>
                                                                            </div>

                                                                            <span class="break-words line-clamp-3">{{ $answer->answer }}</span>
                                                                        </label>
                                                                    @else
                                                                    <!-- Если текст --> 
                                                                            <label class="flex items-center w-full">
                                                                                <input type="text" name="answer-text-{{ $answer->id }}" data-answer-type="text" data-answer="{{ $answer->answer }}" class="border-2 rounded-lg border-gray-200 rounded px-3 py-4 w-full focus:outline-none focus:border-purple-300" placeholder="Введите ответ">
                                                                            </label>    
                                                                    @endif
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>

                                                <!-- Navigation -->
                                                <div class="flex justify-between">
                                                    <button onclick="prevQuestion(this)" class="hidden prev-btn bg-gray-200 hover:bg-gray-300 text-gray-800 font-medium py-2 px-4 rounded-lg transition duration-300 flex items-center">
                                                        <i class="fas fa-arrow-left mr-2"></i> Назад
                                                    </button>
                                                    <button onclick="nextQuestion(this)" class="next-btn bg-purple-600 hover:bg-purple-700 text-white font-medium py-2 px-6 rounded-lg transition duration-300 flex items-center ml-auto">
                                                        Далее <i class="fas fa-arrow-right ml-2"></i>
                                                    </button>
                                                    <button onclick="finishTest(this)" class="hidden finish-btn bg-green-600 hover:bg-green-700 text-white font-medium py-2 px-6 rounded-lg transition duration-300 flex items-center ml-auto">
                                                        Завершить <i class="fas fa-check ml-2"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Results (hidden by default) -->
                                        <div class="hidden results-area bg-white rounded-xl shadow-lg p-8 text-center fade-in">
                                            <div class="flex justify-center mb-6">
                                                <div class="w-24 h-24 rounded-full bg-green-100 flex items-center justify-center">
                                                    <i class="fas fa-trophy text-4xl text-yellow-500"></i>
                                                </div>
                                            </div>
                                            <h2 class="text-3xl font-bold text-gray-800 mb-3">Тест завершен!</h2>
                                            <p id="result-score" class="text-xl text-gray-600 mb-6">Твой результат: <span class="main-result font-bold text-purple-600">15/20</span></p>
                                            
                                            <div class="w-full bg-gray-200 rounded-full h-4 mb-8">
                                                <div class="result-bar bg-gradient-to-r from-blue-500 to-purple-600 h-4 rounded-full" style="width: 75%"></div>
                                            </div>
                                            
                                            <div class="max-w-2xl mx-auto mb-8 p-4 bg-blue-50 rounded-lg">
                                                <p class="result-feedback text-gray-700">Отличный результат! Ты хорошо разбираешься в основах физики. Продолжай в том же духе!</p>
                                            </div>
                                            
                                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
                                                <div class="bg-blue-50 p-4 rounded-lg">
                                                    <div class="text-blue-600 mb-2"><i class="fas fa-check-circle text-2xl"></i></div>
                                                    <h3 class="font-medium text-gray-800 mb-1">Правильные ответы</h3>
                                                    <p class="result-correct-answers text-2xl font-bold text-blue-600">15</p>
                                                </div>
                                                <div class="bg-purple-50 p-4 rounded-lg">
                                                    <div class="text-purple-600 mb-2"><i class="fas fa-times-circle text-2xl"></i></div>
                                                    <h3 class="font-medium text-gray-800 mb-1">Неправильные</h3>
                                                    <p class="result-wrong-answers text-2xl font-bold text-purple-600">5</p>
                                                </div>
                                                <div class="bg-green-50 p-4 rounded-lg">
                                                    <div class="text-green-600 mb-2"><i class="fas fa-clock text-2xl"></i></div>
                                                    <h3 class="font-medium text-gray-800 mb-1">Время</h3>
                                                    <p id="time-spent" class="result-time text-2xl font-bold text-green-600">3:45</p>
                                                </div>
                                            </div>
                                            
                                            <button onclick="restartTest()" class="bg-purple-600 hover:bg-purple-700 text-white font-medium py-3 px-8 rounded-lg transition duration-300 inline-flex items-center">
                                                <i class="fas fa-redo mr-2"></i> Пройти еще раз
                                            </button>
                                        </div>
                                            
                                        <div class="short-test study-card bg-white p-4 rounded-lg shadow mb-6">
                                            <div class="ms-4 mb-2 mt-1">
                                                <div class="flex justify-between items-start">
                                                    <h3 class="text-xl font-bold mb-2 text-gray-800"> {{ $loop->iteration }}. {{ $test->title }}</h3>
                                                    <snap class="text-nowrap ml-4 bg-gray-100 text-gray-600 text-xs font-medium px-2.5 py-0.5 rounded"> 
                                                        {{ $topic->class->name }}
                                                    </snap>
                                                </div>
                                                <p class="text-gray-600 mb-4">{{ $test->description }}</p>
                                                <div class="flex flex-wrap gap-3">
                                                    <button class="test-btn bg-green-600 hover:bg-green-700 text-white font-medium py-2 px-4 rounded-lg transition flex items-center"
                                                    onclick="startTest(this)">
                                                        <i class="fas fa-question-circle mr-2"></i> Пройти тест
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach       
                            @endforeach
                        </div>
                    </div>
                </section>

            </div>
        </main>


     <!-- JQUERY JS -->
    <script src="{{asset('assets/js/jquery.min.js')}}"></script>
    <script>
        
        // Current test state
        let startTime = null;
        let currentTest = null;
        let questAnswer = null;
        let currentQuestion = 0;

        // Interactiv elements
        let nextBtn = null;
        let prevBtn = null;
        let finishBtn = null;
        let progressBar = null;
        let progressCount = null;

        // Result elements
        let mainCountCorrectAnswers = null;
        let countCorrectAnswers = null;
        let countMistacsAnswers = null;
        let countTimeTest = null;
        let progressBarResulr = null;
        let feedback = null;

        // menu
        let testArea = null;
        let resultsArea = null;

        function showTab(tab) {
            document.getElementById('study-content').style.display = (tab === 'study') ? 'block' : 'none';
            document.getElementById('test-content').style.display = (tab === 'test') ? 'block' : 'none';

            document.getElementById('study-tab').classList.toggle('active', tab === 'study');
            document.getElementById('test-tab').classList.toggle('active', tab === 'test');
        }

        // Test section
        function startTest(d){
            currentQuestion = 0;
            progressBar = null;

            //Находит по конструкции родительский объект отвечающий за тест
            let parent = $(d).parent().parent().parent().parent();
            
            //Определение всех нужных элементов
            testArea = parent.find('.full-test');                   //Тест
            resultsArea = parent.find('.results-area');             //Результат
            let questsTest = parent.find('.question-container');    //Контейнер с вопросами
            let questAnswers = parent.find('.options-container');    //Контейнер с ответами

            //Кнопки теста
            nextBtn = parent.find('.next-btn');
            prevBtn = parent.find('.prev-btn');
            finishBtn = parent.find('.finish-btn');
            progressBar = parent.find('.progress-bar');
            progressCount = parent.find('.question-progress-count');

            //Итоговый результат
            mainCountCorrectAnswers = parent.find('.main-result');
            countCorrectAnswers = parent.find('.result-correct-answers');
            countMistacsAnswers = parent.find('.result-wrong-answers');
            countTimeTest = parent.find('.result-time');
            progressBarResulr = parent.find('.result-bar');
            feedback = parent.find('.result-feedback');
            
            startTime = new Date();                                 //начало отсчета 

            currentTest = questsTest.children().toArray();          //Из контейнера тестов помещаются дочерние объекты в массив
            questAnswer = questAnswers.find('[data-answer-type][data-answer]').toArray();

            //userAnswers = Array(currentTest.length).fill(null);     //Обнуляет массив ответов пользователя

            testArea.show();                                        //Отображает всю панель теста 

            $('.short-test').hide();                                //Скрывает список доступных тестов
            $('.backButtonTest').show();                            //Обображение кнопки возрата к списку

            updateQuestion();
        }

        function updateQuestion(){
            
            //Отрисовать прогрессии
            progressBar.css('width', `${((currentQuestion + 1) / currentTest.length) * 100}%`);
            progressCount.text(`${currentQuestion + 1} / ${currentTest.length}`);
            
            //Отрисовки текущего вопроса
            $(currentTest).hide();
            $(currentTest[currentQuestion]).show();

            //console.log(currentQuestion, currentTest.length-1);
            
            //Показать/скрыть кнопку "Назад" при нахождении на всех вопросах кроме первого
            (currentQuestion >= 1) ? prevBtn.show() : prevBtn.hide();
            
            //Показать/скрыть кнопку "Завершить" при нахождении на поледнем вопросе
            if (currentQuestion >= currentTest.length - 1){
                finishBtn.show(); 
                nextBtn.hide();
            } else {
                finishBtn.hide(); 
                nextBtn.show();
            }
        }

        //Предыдущий вопрос
        function prevQuestion(){
            if (currentQuestion > 0) {
                currentQuestion--;
                updateQuestion();
            }
        }

        //Следующий вопрос
        function nextQuestion(){
            if (currentQuestion < currentTest.length - 1) {
                currentQuestion++;
                updateQuestion();
            }
        }

        //Закончить тест
        function finishTest(){
            let userCorrectAnswers = 0;
            let percentage = 0;
            let endTime = new Date();
            let timeDiff = (endTime - startTime) / 1000; // in seconds
            let minutes = Math.floor(timeDiff / 60);
            let seconds = Math.floor(timeDiff % 60);
            let timeString = `${minutes}:${seconds < 10 ? '0' + seconds : seconds}`;

            // Группируем все input по имени (name используется для объединения ответов на один вопрос)
            let grouped = {};

            questAnswer.forEach(el => {
                let name = $(el).attr('name');
                if (!grouped[name]) grouped[name] = [];
                grouped[name].push(el);
            });

            // Нормализация строки
            function normalize(str) {
                return String(str).trim().toLowerCase().normalize('NFC');
            }

            // Перебираем группы (каждая группа — один вопрос)
            Object.values(grouped).forEach(group => {
                let type = $(group[0]).data('answer-type'); // предполагаем, что все в группе одного типа

                if (type === 'text') {
                    // Ожидаем один input
                    let input = group[0];
                    let expected = $(input).data('answer');   // ← может быть строкой типа "Число 4"
                    let actual = $(input).val();              // ← пользовательский ввод

                    if (normalize(expected) === normalize(actual)) {
                        userCorrectAnswers++;
                    }

                } else if (type === 'single') {
                    let selected = group.find(el => el.checked);
                    if (selected && $(selected).data('answer') == 1) {
                        userCorrectAnswers++;
                    }

                } else if (type === 'multiple') {
                    let allCorrect = true;

                    for (let el of group) {
                        let isCorrect = $(el).data('answer') == 1;
                        let isChecked = el.checked;

                        if ((isCorrect && !isChecked) || (!isCorrect && isChecked)) {
                            allCorrect = false;
                            break;
                        }
                    }

                    if (allCorrect) {
                        userCorrectAnswers++;
                    }
                }
            });

            mainCountCorrectAnswers.text(`${userCorrectAnswers} / ${currentTest.length}`);
            countCorrectAnswers.text(`${userCorrectAnswers}`);
            countMistacsAnswers.text(`${currentTest.length-userCorrectAnswers}`);
            progressBarResulr.css('width', `${((userCorrectAnswers) / currentTest.length) * 100}%`);

            percentage = ((userCorrectAnswers) / currentTest.length) * 100;
            if (percentage >= 80) {
                feedback.text('Отличный результат! Ты отлично разбираешься в этой теме. Так держать!');
            } else if (percentage >= 50) {
                feedback.text('Хороший результат! Есть над чем поработать, но основы ты усвоил хорошо.');
            } else {
                feedback.text('Попробуй еще раз! C практикой у тебя обязательно получится!');
            }

            countTimeTest.text(`${timeString}`);

            console.log(`Правильных ответов: ${userCorrectAnswers}`);

            resultsArea.show();
            testArea.hide();
        }



        // Topic section
        function showTopic(d) {
            let parent = $(d).parent().parent().parent().parent();
            let full_topic = parent.find('.full-topic');

            full_topic.show();

            $('.short-topic').hide();
            $('.backButtonTopic').show();
        }

        function backToTopics() {
            $('.full-topic').hide();
            $('.short-topic').show();
            $('.backButtonTopic').hide();
        }

        function backToTests() {
            $('.results-area').hide();
            $('.full-test').hide();
            $('.short-test').show();
            $('.backButtonTest').hide();
        }

        function showTests(topicId){
            showTab('test');

            $('.test-conteiner').hide();
            $('.topic-' + topicId).show(); //jQuery animation show
        }

    </script>
</body>
</html>