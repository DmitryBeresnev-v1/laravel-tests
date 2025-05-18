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
    </style>
</head>

<body class="bg-gradient-to-br from-blue-50 to-purple-50 min-h-screen font-sans">
    <div class="container mx-auto px-4 py-8">
        <!-- Header -->

            <div class="flex items-center justify-center mb-4">
                <h1 class="text-4xl font-bold bg-gradient-to-r from-purple-600 to-blue-500 bg-clip-text text-transparent">
                    Физика
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
                <div id="topic-list">
                    @foreach ($topics as $topic)
                        <div class="topic-conteiner">
                            <div class="full-topic" style="display:none">
                                <div id="topic-detail" class="bg-white p-6 rounded-lg shadow fade-in">
                                    <h3 id="topic-title" class="text-2xl font-bold mb-4">{{ $topic->title }}</h3>
                                    <p id="topic-description" class="text-gray-700 mb-6">{!! $topic->description !!}</p>
                                    <button onclick="backToTopics()" class="bg-purple-600 text-white px-4 py-2 rounded hover:bg-purple-700 transition">
                                        ← Назад к темам
                                    </button>
                                </div>
                            </div>

                            <div class="short-topic study-card bg-white p-4 rounded-lg shadow mb-4 cursor-pointer"
                                onclick="showTopic(this)">
                                <h3 class="text-xl font-bold mb-2">{{ $topic->title }}</h3>
                                <p class="text-gray-700 truncate">Нажмите, чтобы узнать подробнее</p>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Детали темы -->
                <div id="topic-detail" class="hidden bg-white p-6 rounded-lg shadow fade-in">
                    <h3 id="topic-title" class="text-2xl font-bold mb-4"></h3>
                    <p id="topic-description" class="text-gray-700 mb-6"></p>
                    <button onclick="backToTopics()" class="bg-purple-600 text-white px-4 py-2 rounded hover:bg-purple-700 transition">
                        ← Назад к темам
                    </button>
                </div>
            </div>

            <!-- Test Content -->
            <div id="test-content" style="display: none;">
                <p class="text-center text-gray-500">Раздел тестирования будет здесь.</p>
            </div>
        </main>
    </div>

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
            let parent = $(d).parent();
            let full_topic = parent.find('.full-topic');

            full_topic.show();

            $('.short-topic').hide();
        }

        function backToTopics() {
            $('.full-topic').hide();
            $('.short-topic').show();
        }
    </script>
</body>
</html>
