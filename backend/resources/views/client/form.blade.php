<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Физика для детей | Обучение и тестирование</title>
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
                        <div class="backButton" style="display:none">
                            <button id="backButton" onclick="backToTopics()" class="text-purple-600 hover:text-purple-800 font-medium flex items-center">
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
                                            <p id="topic-description" class="text-gray-700 mb-6">{!! $topic->description !!}</p>
                                        </div>
                                    </div>

                                    <div class="short-topic study-card bg-white p-4 rounded-lg shadow mb-6">
                                        <div class="ms-4 mb-2 mt-1">
                                            <div class="flex justify-between items-start">
                                                <h3 class="text-xl font-bold mb-2 text-gray-800"> {{ $loop->iteration }}. {{ $topic->title }}</h3>
                                                <snap class="bg-gray-100 text-gray-600 text-xs font-medium px-2.5 py-0.5 rounded"> 
                                                    {{ $topic->class->name }}
                                                </snap>
                                            </div>
                                            <p class="text-gray-600 mb-4">Нажмите, чтобы узнать подробнее</p>
                                            <div class="flex flex-wrap gap-3">
                                                <button onclick="showTopic(this)" class="test-btn bg-purple-600 hover:bg-purple-700 text-white font-medium py-2 px-4 rounded-lg transition flex items-center">
                                                    <i class="fas fa-book-open mr-2"></i> Учебный материал
                                                </button>
                                                <button class="test-btn bg-green-600 hover:bg-green-700 text-white font-medium py-2 px-4 rounded-lg transition flex items-center">
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
                <section id="tests-section" class="mb-12">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-2xl md:text-2xl font-bold text-gray-800 flex items-center">
                            <i class="fas fa-list-check text-purple-500 mr-3"></i>
                            <span id="selected-subject-text">Список тестов</span>
                        </h2>
                        <div class="backButton" style="display:none">
                            <button id="backButton" onclick="backToTopics()" class="text-purple-600 hover:text-purple-800 font-medium flex items-center">
                                <i class="fas fa-arrow-left mr-2"></i> Назад
                            </button>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 gap-7" id="topics-container">
                        <div id="test-list">
                            @foreach ($subject->topics as $topic)
                                
                                @if ($topic->tests->isNotEmpty())
                                    <p class="text-gray-600 mb-4">Тесты для темы: {{ $topic->title }} </p>  
                                @endif       
                                
                                @foreach ($topic->tests as $test)
                                    <div class="test-conteiner">                                      
                                        
                                        {{-- Контетнт самого теста --}}
                                        <div class="full-test" style="display:none">
                                            <div id="test-detail" class="bg-white p-6 rounded-lg shadow fade-in">
                                                <h3 id="test-title" class="text-2xl font-bold mb-4">{{ $test->title }}</h3>
                                                <p id="test-description" class="text-gray-700 mb-6"> </p>
                                            </div>
                                        </div>

                                        <div class="short-test study-card bg-white p-4 rounded-lg shadow mb-6">
                                            <div class="ms-4 mb-2 mt-1">
                                                <div class="flex justify-between items-start">
                                                    <h3 class="text-xl font-bold mb-2 text-gray-800"> {{ $loop->iteration }}. {{ $test->title }}</h3>
                                                    <snap class="bg-gray-100 text-gray-600 text-xs font-medium px-2.5 py-0.5 rounded"> 
                                                        {{ $topic->class->name }}
                                                    </snap>
                                                </div>
                                                <p class="text-gray-600 mb-4">{{ $test->description }}</p>
                                                <div class="flex flex-wrap gap-3">
                                                    <button class="test-btn bg-green-600 hover:bg-green-700 text-white font-medium py-2 px-4 rounded-lg transition flex items-center">
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
        function showTab(tab) {
            document.getElementById('study-content').style.display = (tab === 'study') ? 'block' : 'none';
            document.getElementById('test-content').style.display = (tab === 'test') ? 'block' : 'none';

            document.getElementById('study-tab').classList.toggle('active', tab === 'study');
            document.getElementById('test-tab').classList.toggle('active', tab === 'test');
        }

        function showTopic(d) {
            let parent = $(d).parent().parent().parent().parent();
            let full_topic = parent.find('.full-topic');

            full_topic.show();

            $('.short-topic').hide();
            $('.backButton').show();
        }

        function backToTopics() {
            $('.full-topic').hide();
            $('.short-topic').show();
            $('.backButton').hide();
        }
    </script>
</body>
</html>
