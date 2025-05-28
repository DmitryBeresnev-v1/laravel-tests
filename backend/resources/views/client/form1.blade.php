<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Школьные тесты</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .tab-content {
            display: none;
        }
        .tab-content.active {
            display: block;
            animation: fadeIn 0.5s;
        }
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        .subject-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }
        .test-card:hover {
            transform: scale(1.02);
        }
        .dropdown:hover .dropdown-menu {
            display: block;
        }
    </style>
</head>
<body class="bg-gray-50 min-h-screen">
    <div class="container mx-auto px-4 py-8">
        <!-- Заголовок -->
        <header class="text-center mb-12">
            <h1 class="text-4xl font-bold text-blue-600 mb-2">Школьные тесты</h1>
            <p class="text-lg text-gray-600">Проверьте свои знания по разным предметам</p>
        </header>

        <!-- Фильтры по классам (выпадающий список) -->
        <div class="flex justify-center mb-8">
            <div class="relative dropdown">
                <button class="flex items-center justify-between px-4 py-2 bg-white border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <span id="selected-grade">Все классы</span>
                    <i class="fas fa-chevron-down ml-2 text-gray-400"></i>
                </button>
                <div class="dropdown-menu hidden absolute z-10 mt-1 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none">
                    <div class="py-1">
                        <a href="#" class="grade-option block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" data-grade="all">Все классы</a>
                        <a href="#" class="grade-option block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" data-grade="5">5 класс</a>
                        <a href="#" class="grade-option block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" data-grade="6">6 класс</a>
                        <a href="#" class="grade-option block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" data-grade="7">7 класс</a>
                        <a href="#" class="grade-option block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" data-grade="8">8 класс</a>
                        <a href="#" class="grade-option block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" data-grade="9">9 класс</a>
                        <a href="#" class="grade-option block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" data-grade="10">10 класс</a>
                        <a href="#" class="grade-option block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" data-grade="11">11 класс</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Переключение между вкладками -->
        <div class="flex justify-center mb-8">
            <div class="inline-flex rounded-md shadow-sm">
                <button id="subjects-tab" class="tab-button px-6 py-3 text-sm font-medium rounded-l-lg bg-blue-600 text-white">
                    <i class="fas fa-book mr-2"></i>Предметы
                </button>
                <button id="tests-tab" class="tab-button px-6 py-3 text-sm font-medium rounded-r-lg bg-gray-200 text-gray-700 hover:bg-gray-300">
                    <i class="fas fa-question-circle mr-2"></i>Тесты
                </button>
            </div>
        </div>

        <!-- Контент вкладки "Предметы" -->
        <div id="subjects-content" class="tab-content active">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                <!-- Карточка предмета -->
                <div class="subject-card bg-white rounded-xl shadow-md overflow-hidden transition duration-300" data-grades="5,6,7,8">
                    <div class="p-6">
                        <div class="flex items-center mb-4">
                            <div class="bg-red-100 p-3 rounded-full mr-4">
                                <i class="fas fa-atom text-red-500 text-xl"></i>
                            </div>
                            <h3 class="text-xl font-semibold text-gray-800">Физика</h3>
                        </div>
                        <p class="text-gray-600 mb-4">Изучение материи, её движения и поведения в пространстве и времени.</p>
                        <div class="flex flex-wrap gap-1">
                            <span class="text-xs px-2 py-1 bg-blue-100 text-blue-800 rounded-full">5 класс</span>
                            <span class="text-xs px-2 py-1 bg-blue-100 text-blue-800 rounded-full">6 класс</span>
                            <span class="text-xs px-2 py-1 bg-blue-100 text-blue-800 rounded-full">7 класс</span>
                            <span class="text-xs px-2 py-1 bg-blue-100 text-blue-800 rounded-full">8 класс</span>
                        </div>
                    </div>
                </div>

                <!-- Карточка предмета -->
                <div class="subject-card bg-white rounded-xl shadow-md overflow-hidden transition duration-300" data-grades="5,6,7,8,9,10,11">
                    <div class="p-6">
                        <div class="flex items-center mb-4">
                            <div class="bg-green-100 p-3 rounded-full mr-4">
                                <i class="fas fa-square-root-alt text-green-500 text-xl"></i>
                            </div>
                            <h3 class="text-xl font-semibold text-gray-800">Математика</h3>
                        </div>
                        <p class="text-gray-600 mb-4">Наука о количественных отношениях и пространственных формах.</p>
                        <div class="flex flex-wrap gap-1">
                            <span class="text-xs px-2 py-1 bg-blue-100 text-blue-800 rounded-full">5 класс</span>
                            <span class="text-xs px-2 py-1 bg-blue-100 text-blue-800 rounded-full">6 класс</span>
                            <span class="text-xs px-2 py-1 bg-blue-100 text-blue-800 rounded-full">7 класс</span>
                            <span class="text-xs px-2 py-1 bg-blue-100 text-blue-800 rounded-full">8 класс</span>
                            <span class="text-xs px-2 py-1 bg-blue-100 text-blue-800 rounded-full">9 класс</span>
                            <span class="text-xs px-2 py-1 bg-blue-100 text-blue-800 rounded-full">10 класс</span>
                            <span class="text-xs px-2 py-1 bg-blue-100 text-blue-800 rounded-full">11 класс</span>
                        </div>
                    </div>
                </div>

                <!-- Карточка предмета -->
                <div class="subject-card bg-white rounded-xl shadow-md overflow-hidden transition duration-300" data-grades="5,6,7,8,9,10,11">
                    <div class="p-6">
                        <div class="flex items-center mb-4">
                            <div class="bg-yellow-100 p-3 rounded-full mr-4">
                                <i class="fas fa-language text-yellow-500 text-xl"></i>
                            </div>
                            <h3 class="text-xl font-semibold text-gray-800">Русский язык</h3>
                        </div>
                        <p class="text-gray-600 mb-4">Изучение грамматики, орфографии и пунктуации русского языка.</p>
                        <div class="flex flex-wrap gap-1">
                            <span class="text-xs px-2 py-1 bg-blue-100 text-blue-800 rounded-full">5 класс</span>
                            <span class="text-xs px-2 py-1 bg-blue-100 text-blue-800 rounded-full">6 класс</span>
                            <span class="text-xs px-2 py-1 bg-blue-100 text-blue-800 rounded-full">7 класс</span>
                            <span class="text-xs px-2 py-1 bg-blue-100 text-blue-800 rounded-full">8 класс</span>
                            <span class="text-xs px-2 py-1 bg-blue-100 text-blue-800 rounded-full">9 класс</span>
                            <span class="text-xs px-2 py-1 bg-blue-100 text-blue-800 rounded-full">10 класс</span>
                            <span class="text-xs px-2 py-1 bg-blue-100 text-blue-800 rounded-full">11 класс</span>
                        </div>
                    </div>
                </div>

                <!-- Карточка предмета -->
                <div class="subject-card bg-white rounded-xl shadow-md overflow-hidden transition duration-300" data-grades="8,9,10,11">
                    <div class="p-6">
                        <div class="flex items-center mb-4">
                            <div class="bg-purple-100 p-3 rounded-full mr-4">
                                <i class="fas fa-dna text-purple-500 text-xl"></i>
                            </div>
                            <h3 class="text-xl font-semibold text-gray-800">Биология</h3>
                        </div>
                        <p class="text-gray-600 mb-4">Наука о живых существах и их взаимодействии с окружающей средой.</p>
                        <div class="flex flex-wrap gap-1">
                            <span class="text-xs px-2 py-1 bg-blue-100 text-blue-800 rounded-full">8 класс</span>
                            <span class="text-xs px-2 py-1 bg-blue-100 text-blue-800 rounded-full">9 класс</span>
                            <span class="text-xs px-2 py-1 bg-blue-100 text-blue-800 rounded-full">10 класс</span>
                            <span class="text-xs px-2 py-1 bg-blue-100 text-blue-800 rounded-full">11 класс</span>
                        </div>
                    </div>
                </div>

                <!-- Карточка предмета -->
                <div class="subject-card bg-white rounded-xl shadow-md overflow-hidden transition duration-300" data-grades="9,10,11">
                    <div class="p-6">
                        <div class="flex items-center mb-4">
                            <div class="bg-indigo-100 p-3 rounded-full mr-4">
                                <i class="fas fa-flask text-indigo-500 text-xl"></i>
                            </div>
                            <h3 class="text-xl font-semibold text-gray-800">Химия</h3>
                        </div>
                        <p class="text-gray-600 mb-4">Наука о веществах, их свойствах, строении и превращениях.</p>
                        <div class="flex flex-wrap gap-1">
                            <span class="text-xs px-2 py-1 bg-blue-100 text-blue-800 rounded-full">9 класс</span>
                            <span class="text-xs px-2 py-1 bg-blue-100 text-blue-800 rounded-full">10 класс</span>
                            <span class="text-xs px-2 py-1 bg-blue-100 text-blue-800 rounded-full">11 класс</span>
                        </div>
                    </div>
                </div>

                <!-- Карточка предмета -->
                <div class="subject-card bg-white rounded-xl shadow-md overflow-hidden transition duration-300" data-grades="5,6,7,8,9,10,11">
                    <div class="p-6">
                        <div class="flex items-center mb-4">
                            <div class="bg-pink-100 p-3 rounded-full mr-4">
                                <i class="fas fa-globe-europe text-pink-500 text-xl"></i>
                            </div>
                            <h3 class="text-xl font-semibold text-gray-800">История</h3>
                        </div>
                        <p class="text-gray-600 mb-4">Изучение прошлого человечества во всем его многообразии.</p>
                        <div class="flex flex-wrap gap-1">
                            <span class="text-xs px-2 py-1 bg-blue-100 text-blue-800 rounded-full">5 класс</span>
                            <span class="text-xs px-2 py-1 bg-blue-100 text-blue-800 rounded-full">6 класс</span>
                            <span class="text-xs px-2 py-1 bg-blue-100 text-blue-800 rounded-full">7 класс</span>
                            <span class="text-xs px-2 py-1 bg-blue-100 text-blue-800 rounded-full">8 класс</span>
                            <span class="text-xs px-2 py-1 bg-blue-100 text-blue-800 rounded-full">9 класс</span>
                            <span class="text-xs px-2 py-1 bg-blue-100 text-blue-800 rounded-full">10 класс</span>
                            <span class="text-xs px-2 py-1 bg-blue-100 text-blue-800 rounded-full">11 класс</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Контент вкладки "Тесты" -->
        <div id="tests-content" class="tab-content">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Карточка теста -->
                <div class="test-card bg-white rounded-lg shadow-md overflow-hidden transition duration-300" data-grade="5" data-subject="math">
                    <div class="p-5">
                        <div class="flex justify-between items-start mb-3">
                            <span class="text-xs px-2 py-1 bg-blue-100 text-blue-800 rounded-full">5 класс</span>
                            <span class="text-xs px-2 py-1 bg-green-100 text-green-800 rounded-full">Математика</span>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">Основы арифметики</h3>
                        <p class="text-gray-600 text-sm mb-4">Тест по основным арифметическим операциям: сложение, вычитание, умножение и деление.</p>
                        <div class="flex justify-between items-center">
                            <div class="flex items-center text-sm text-gray-500">
                                <i class="fas fa-question-circle mr-1"></i>
                                <span>10 вопросов</span>
                            </div>
                            <button class="px-3 py-1 bg-blue-600 text-white text-sm rounded hover:bg-blue-700 transition">Начать</button>
                        </div>
                    </div>
                </div>

                <!-- Карточка теста -->
                <div class="test-card bg-white rounded-lg shadow-md overflow-hidden transition duration-300" data-grade="6" data-subject="russian">
                    <div class="p-5">
                        <div class="flex justify-between items-start mb-3">
                            <span class="text-xs px-2 py-1 bg-blue-100 text-blue-800 rounded-full">6 класс</span>
                            <span class="text-xs px-2 py-1 bg-yellow-100 text-yellow-800 rounded-full">Русский язык</span>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">Части речи</h3>
                        <p class="text-gray-600 text-sm mb-4">Определение и характеристика основных частей речи в русском языке.</p>
                        <div class="flex justify-between items-center">
                            <div class="flex items-center text-sm text-gray-500">
                                <i class="fas fa-question-circle mr-1"></i>
                                <span>15 вопросов</span>
                            </div>
                            <button class="px-3 py-1 bg-blue-600 text-white text-sm rounded hover:bg-blue-700 transition">Начать</button>
                        </div>
                    </div>
                </div>

                <!-- Карточка теста -->
                <div class="test-card bg-white rounded-lg shadow-md overflow-hidden transition duration-300" data-grade="7" data-subject="physics">
                    <div class="p-5">
                        <div class="flex justify-between items-start mb-3">
                            <span class="text-xs px-2 py-1 bg-blue-100 text-blue-800 rounded-full">7 класс</span>
                            <span class="text-xs px-2 py-1 bg-red-100 text-red-800 rounded-full">Физика</span>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">Основы механики</h3>
                        <p class="text-gray-600 text-sm mb-4">Тест по основным понятиям механика: сила, движение, энергия.</p>
                        <div class="flex justify-between items-center">
                            <div class="flex items-center text-sm text-gray-500">
                                <i class="fas fa-question-circle mr-1"></i>
                                <span>12 вопросов</span>
                            </div>
                            <button class="px-3 py-1 bg-blue-600 text-white text-sm rounded hover:bg-blue-700 transition">Начать</button>
                        </div>
                    </div>
                </div>

                <!-- Карточка теста -->
                <div class="test-card bg-white rounded-lg shadow-md overflow-hidden transition duration-300" data-grade="8" data-subject="biology">
                    <div class="p-5">
                        <div class="flex justify-between items-start mb-3">
                            <span class="text-xs px-2 py-1 bg-blue-100 text-blue-800 rounded-full">8 класс</span>
                            <span class="text-xs px-2 py-1 bg-purple-100 text-purple-800 rounded-full">Биология</span>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">Анатомия человека</h3>
                        <p class="text-gray-600 text-sm mb-4">Основные системы органов человека и их функции.</p>
                        <div class="flex justify-between items-center">
                            <div class="flex items-center text-sm text-gray-500">
                                <i class="fas fa-question-circle mr-1"></i>
                                <span>18 вопросов</span>
                            </div>
                            <button class="px-3 py-1 bg-blue-600 text-white text-sm rounded hover:bg-blue-700 transition">Начать</button>
                        </div>
                    </div>
                </div>

                <!-- Карточка теста -->
                <div class="test-card bg-white rounded-lg shadow-md overflow-hidden transition duration-300" data-grade="9" data-subject="chemistry">
                    <div class="p-5">
                        <div class="flex justify-between items-start mb-3">
                            <span class="text-xs px-2 py-1 bg-blue-100 text-blue-800 rounded-full">9 класс</span>
                            <span class="text-xs px-2 py-1 bg-indigo-100 text-indigo-800 rounded-full">Химия</span>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">Периодическая таблица</h3>
                        <p class="text-gray-600 text-sm mb-4">Тест по элементам периодической таблицы Менделеева.</p>
                        <div class="flex justify-between items-center">
                            <div class="flex items-center text-sm text-gray-500">
                                <i class="fas fa-question-circle mr-1"></i>
                                <span>20 вопросов</span>
                            </div>
                            <button class="px-3 py-1 bg-blue-600 text-white text-sm rounded hover:bg-blue-700 transition">Начать</button>
                        </div>
                    </div>
                </div>

                <!-- Карточка теста -->
                <div class="test-card bg-white rounded-lg shadow-md overflow-hidden transition duration-300" data-grade="10" data-subject="history">
                    <div class="p-5">
                        <div class="flex justify-between items-start mb-3">
                            <span class="text-xs px-2 py-1 bg-blue-100 text-blue-800 rounded-full">10 класс</span>
                            <span class="text-xs px-2 py-1 bg-pink-100 text-pink-800 rounded-full">История</span>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">Вторая мировая война</h3>
                        <p class="text-gray-600 text-sm mb-4">Основные события, даты и участники Второй мировой войны.</p>
                        <div class="flex justify-between items-center">
                            <div class="flex items-center text-sm text-gray-500">
                                <i class="fas fa-question-circle mr-1"></i>
                                <span>15 вопросов</span>
                            </div>
                            <button class="px-3 py-1 bg-blue-600 text-white text-sm rounded hover:bg-blue-700 transition">Начать</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Переключение между вкладками
            const tabButtons = document.querySelectorAll('.tab-button');
            const tabContents = document.querySelectorAll('.tab-content');
            
            tabButtons.forEach(button => {
                button.addEventListener('click', function() {
                    // Убираем активный класс у всех кнопок и контента
                    tabButtons.forEach(btn => {
                        btn.classList.remove('bg-blue-600', 'text-white');
                        btn.classList.add('bg-gray-200', 'text-gray-700', 'hover:bg-gray-300');
                    });
                    
                    tabContents.forEach(content => {
                        content.classList.remove('active');
                    });
                    
                    // Добавляем активный класс к текущей кнопке
                    this.classList.remove('bg-gray-200', 'text-gray-700', 'hover:bg-gray-300');
                    this.classList.add('bg-blue-600', 'text-white');
                    
                    // Показываем соответствующий контент
                    const tabId = this.id.replace('-tab', '-content');
                    document.getElementById(tabId).classList.add('active');
                });
            });
            
            // Фильтрация по классам (выпадающий список)
            const gradeOptions = document.querySelectorAll('.grade-option');
            let currentGrade = 'all';
            
            gradeOptions.forEach(option => {
                option.addEventListener('click', function(e) {
                    e.preventDefault();
                    
                    // Обновляем текст выбранного класса
                    document.getElementById('selected-grade').textContent = this.textContent;
                    currentGrade = this.dataset.grade;
                    
                    // Закрываем выпадающий список
                    document.querySelector('.dropdown-menu').classList.add('hidden');
                    
                    // Фильтруем контент
                    filterContent();
                });
            });
            
            // Закрытие выпадающего списка при клике вне его
            document.addEventListener('click', function(e) {
                if (!e.target.closest('.dropdown')) {
                    document.querySelector('.dropdown-menu').classList.add('hidden');
                }
            });
            
            function filterContent() {
                const activeTab = document.querySelector('.tab-content.active').id;
                
                if (activeTab === 'subjects-content') {
                    // Фильтрация предметов
                    const subjectCards = document.querySelectorAll('.subject-card');
                    
                    subjectCards.forEach(card => {
                        if (currentGrade === 'all') {
                            card.style.display = 'block';
                        } else {
                            const grades = card.dataset.grades.split(',');
                            if (grades.includes(currentGrade)) {
                                card.style.display = 'block';
                            } else {
                                card.style.display = 'none';
                            }
                        }
                    });
                } else if (activeTab === 'tests-content') {
                    // Фильтрация тестов
                    const testCards = document.querySelectorAll('.test-card');
                    
                    testCards.forEach(card => {
                        if (currentGrade === 'all') {
                            card.style.display = 'block';
                        } else if (card.dataset.grade === currentGrade) {
                            card.style.display = 'block';
                        } else {
                            card.style.display = 'none';
                        }
                    });
                }
            }
        });
    </script>
</body>
</html>