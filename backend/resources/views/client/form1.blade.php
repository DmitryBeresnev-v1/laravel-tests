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
        <header class="flex flex-col items-center mb-12">
            <div class="flex items-center justify-center mb-4">
                <i class="fas fa-atom text-4xl text-purple-600 mr-3 floating"></i>
                <h1 class="text-4xl font-bold bg-gradient-to-r from-purple-600 to-blue-500 bg-clip-text text-transparent">
                    Физика
                </h1>
            </div>
        </header>

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
                <!-- Topic Selection -->
                <div class="bg-white rounded-xl shadow-lg p-6 mb-8">
                    <h2 class="text-2xl font-semibold text-gray-800 mb-6 flex items-center">
                        <i class="fas fa-lightbulb text-yellow-500 mr-3"></i>
                        Выберите тему для изучения
                    </h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="study-card bg-gradient-to-r from-blue-100 to-purple-100 rounded-lg p-5 cursor-pointer border border-blue-200" onclick="showTopic('basic')">
                            <h3 class="text-xl font-medium text-blue-800 mb-2">Основы физики</h3>
                            <p class="text-gray-600 mb-3">Механика, теплота, свет и звук</p>
                            <div class="flex items-center text-sm text-blue-600">
                                <i class="fas fa-star mr-1"></i>
                                <span>Уровень: Начальный</span>
                            </div>
                        </div>
                        <div class="study-card bg-gradient-to-r from-purple-100 to-indigo-100 rounded-lg p-5 cursor-pointer border border-purple-200" onclick="showTopic('electricity')">
                            <h3 class="text-xl font-medium text-purple-800 mb-2">Электричество</h3>
                            <p class="text-gray-600 mb-3">Цепи, ток, напряжение и магнетизм</p>
                            <div class="flex items-center text-sm text-purple-600">
                                <i class="fas fa-star-half-alt mr-1"></i>
                                <span>Уровень: Средний</span>
                            </div>
                        </div>
                        <div class="study-card bg-gradient-to-r from-indigo-100 to-blue-100 rounded-lg p-5 cursor-pointer border border-indigo-200" onclick="showTopic('modern')">
                            <h3 class="text-xl font-medium text-indigo-800 mb-2">Современная физика</h3>
                            <p class="text-gray-600 mb-3">Атомы, кванты, теория относительности</p>
                            <div class="flex items-center text-sm text-indigo-600">
                                <i class="fas fa-star mr-1"></i>
                                <i class="fas fa-star mr-1"></i>
                                <span>Уровень: Сложный</span>
                            </div>
                        </div>
                        <div class="study-card bg-gradient-to-r from-pink-100 to-red-100 rounded-lg p-5 cursor-pointer border border-pink-200" onclick="showTopic('experiments')">
                            <h3 class="text-xl font-medium text-pink-800 mb-2">Эксперименты</h3>
                            <p class="text-gray-600 mb-3">Практические опыты и задания</p>
                            <div class="flex items-center text-sm text-pink-600">
                                <i class="fas fa-flask mr-1"></i>
                                <span>Интерактивно</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Topic Content (hidden by default) -->
                <div id="topic-content" class="hidden bg-white rounded-xl shadow-lg p-6 mb-8">
                    <div class="flex justify-between items-center mb-6">
                        <h2 id="topic-title" class="text-2xl font-semibold text-gray-800 flex items-center">
                            <i class="fas fa-book text-purple-500 mr-3"></i>
                            <span>Основы физики</span>
                        </h2>
                        <button onclick="hideTopic()" class="text-gray-500 hover:text-gray-700">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>

                    <div id="basic-topic" class="hidden">
                        <div class="mb-6">
                            <h3 class="text-xl font-medium text-blue-800 mb-3 flex items-center">
                                <i class="fas fa-running mr-2"></i> Механика
                            </h3>
                            <div class="bg-blue-50 p-4 rounded-lg mb-4">
                                <p class="text-gray-700 mb-3">Механика изучает движение тел и силы, которые вызывают это движение.</p>
                                <p class="text-gray-700 mb-3"><strong>Скорость</strong> показывает, как быстро тело перемещается в пространстве. Измеряется в метрах в секунду (м/с).</p>
                                <p class="text-gray-700"><strong>Сила тяжести</strong> - это сила, с которой Земля притягивает все тела. Она направлена вниз и равна F = m·g, где m - масса тела, g ≈ 9,8 м/с².</p>
                            </div>
                            <div class="flex justify-center mb-6">
                                <img src="https://cdn.pixabay.com/photo/2017/01/31/15/33/ball-2025768_640.png" alt="Механика" class="rounded-lg max-w-full h-auto" style="max-height: 200px;">
                            </div>
                        </div>

                        <div class="mb-6">
                            <h3 class="text-xl font-medium text-purple-800 mb-3 flex items-center">
                                <i class="fas fa-temperature-high mr-2"></i> Теплота
                            </h3>
                            <div class="bg-purple-50 p-4 rounded-lg mb-4">
                                <p class="text-gray-700 mb-3">Теплота - это форма энергии, связанная с движением молекул вещества.</p>
                                <p class="text-gray-700 mb-3"><strong>Температура</strong> измеряется термометром и показывает, насколько горячо или холодно тело.</p>
                                <p class="text-gray-700"><strong>Плавление</strong> - переход вещества из твердого состояния в жидкое при нагревании. Например, лед превращается в воду при 0°C.</p>
                            </div>
                        </div>

                        <div class="mb-6">
                            <h3 class="text-xl font-medium text-yellow-600 mb-3 flex items-center">
                                <i class="fas fa-sun mr-2"></i> Свет и звук
                            </h3>
                            <div class="bg-yellow-50 p-4 rounded-lg mb-4">
                                <p class="text-gray-700 mb-3"><strong>Свет</strong> - это электромагнитное излучение, которое мы видим. Он распространяется прямолинейно со скоростью 300 000 км/с.</p>
                                <p class="text-gray-700"><strong>Звук</strong> - это колебания воздуха, которые мы слышим. Он распространяется в воздухе со скоростью около 340 м/с.</p>
                            </div>
                            <div class="flex justify-center">
                                <img src="https://cdn.pixabay.com/photo/2017/01/31/15/37/light-bulb-2025778_640.png" alt="Свет" class="rounded-lg max-w-full h-auto" style="max-height: 200px;">
                            </div>
                        </div>
                    </div>

                    <div id="electricity-topic" class="hidden">
                        <div class="mb-6">
                            <h3 class="text-xl font-medium text-blue-800 mb-3 flex items-center">
                                <i class="fas fa-bolt mr-2"></i> Основы электричества
                            </h3>
                            <div class="bg-blue-50 p-4 rounded-lg mb-4">
                                <p class="text-gray-700 mb-3"><strong>Электрический ток</strong> - это упорядоченное движение заряженных частиц (обычно электронов). Измеряется в амперах (А).</p>
                                <p class="text-gray-700 mb-3"><strong>Напряжение</strong> - это разность потенциалов, которая заставляет ток течь. Измеряется в вольтах (В).</p>
                                <p class="text-gray-700"><strong>Сопротивление</strong> - свойство материала препятствовать току. Измеряется в омах (Ω).</p>
                            </div>
                        </div>

                        <div class="mb-6">
                            <h3 class="text-xl font-medium text-purple-800 mb-3 flex items-center">
                                <i class="fas fa-magnet mr-2"></i> Магнетизм
                            </h3>
                            <div class="bg-purple-50 p-4 rounded-lg mb-4">
                                <p class="text-gray-700 mb-3"><strong>Магнитное поле</strong> создается движущимися зарядами (током) или постоянными магнитами.</p>
                                <p class="text-gray-700"><strong>Электромагнит</strong> - это устройство, которое становится магнитом при протекании тока. Можно сделать, обмотав гвоздь проволокой и подключив к батарейке.</p>
                            </div>
                            <div class="flex justify-center mb-6">
                                <img src="https://cdn.pixabay.com/photo/2017/01/31/23/42/electronics-2028034_640.png" alt="Электричество" class="rounded-lg max-w-full h-auto" style="max-height: 200px;">
                            </div>
                        </div>

                        <div class="mb-6">
                            <h3 class="text-xl font-medium text-green-600 mb-3 flex items-center">
                                <i class="fas fa-car-battery mr-2"></i> Электрические цепи
                            </h3>
                            <div class="bg-green-50 p-4 rounded-lg">
                                <p class="text-gray-700 mb-3"><strong>Закон Ома</strong>: I = U/R, где I - сила тока, U - напряжение, R - сопротивление.</p>
                                <p class="text-gray-700 mb-3"><strong>Последовательное соединение</strong>: ток одинаков во всех элементах, напряжения складываются.</p>
                                <p class="text-gray-700"><strong>Параллельное соединение</strong>: напряжения одинаковы, токи складываются.</p>
                            </div>
                        </div>
                    </div>

                    <div id="modern-topic" class="hidden">
                        <div class="mb-6">
                            <h3 class="text-xl font-medium text-blue-800 mb-3 flex items-center">
                                <i class="fas fa-atom mr-2"></i> Строение атома
                            </h3>
                            <div class="bg-blue-50 p-4 rounded-lg mb-4">
                                <p class="text-gray-700 mb-3">Атом состоит из <strong>ядра</strong> (протоны и нейтроны) и <strong>электронов</strong>, вращающихся вокруг.</p>
                                <p class="text-gray-700"><strong>Электроны</strong> имеют отрицательный заряд, <strong>протоны</strong> - положительный, <strong>нейтроны</strong> - нейтральны.</p>
                            </div>
                            <div class="flex justify-center mb-6">
                                <img src="https://cdn.pixabay.com/photo/2015/10/31/12/00/atom-1015327_640.jpg" alt="Атом" class="rounded-lg max-w-full h-auto" style="max-height: 200px;">
                            </div>
                        </div>

                        <div class="mb-6">
                            <h3 class="text-xl font-medium text-purple-800 mb-3 flex items-center">
                                <i class="fas fa-rocket mr-2"></i> Теория относительности
                            </h3>
                            <div class="bg-purple-50 p-4 rounded-lg mb-4">
                                <p class="text-gray-700 mb-3"><strong>Альберт Эйнштейн</strong> сформулировал теорию относительности, которая изменила наши представления о пространстве и времени.</p>
                                <p class="text-gray-700"><strong>E = mc²</strong> - самое известное уравнение, показывающее эквивалентность массы и энергии.</p>
                            </div>
                        </div>

                        <div class="mb-6">
                            <h3 class="text-xl font-medium text-indigo-600 mb-3 flex items-center">
                                <i class="fas fa-microscope mr-2"></i> Квантовая физика
                            </h3>
                            <div class="bg-indigo-50 p-4 rounded-lg">
                                <p class="text-gray-700 mb-3"><strong>Квант</strong> - минимальная порция энергии, которую может поглотить или излучить система.</p>
                                <p class="text-gray-700 mb-3"><strong>Фотон</strong> - квант электромагнитного излучения (света).</p>
                                <p class="text-gray-700"><strong>Принцип неопределенности</strong> Гейзенберга: невозможно одновременно точно измерить координату и импульс частицы.</p>
                            </div>
                        </div>
                    </div>

                    <div id="experiments-topic" class="hidden">
                        <div class="mb-6">
                            <h3 class="text-xl font-medium text-blue-800 mb-3 flex items-center">
                                <i class="fas fa-vial mr-2"></i> Химические реакции
                            </h3>
                            <div class="bg-blue-50 p-4 rounded-lg mb-4">
                                <p class="text-gray-700 mb-3"><strong>Уксус + сода</strong>: при смешивании происходит реакция с выделением углекислого газа (CO₂).</p>
                                <p class="text-gray-700"><strong>Как сделать:</strong> насыпь 1 ложку соды в стакан, добавь немного уксуса и наблюдай за бурной реакцией!</p>
                            </div>
                            <div class="flex justify-center mb-6">
                                <img src="https://cdn.pixabay.com/photo/2016/11/22/19/15/glass-1850302_640.jpg" alt="Эксперимент" class="rounded-lg max-w-full h-auto" style="max-height: 200px;">
                            </div>
                        </div>

                        <div class="mb-6">
                            <h3 class="text-xl font-medium text-purple-800 mb-3 flex items-center">
                                <i class="fas fa-magnet mr-2"></i> Простейший электромагнит
                            </h3>
                            <div class="bg-purple-50 p-4 rounded-lg mb-4">
                                <p class="text-gray-700 mb-3"><strong>Что понадобится:</strong> гвоздь, медная проволока, батарейка, скрепки.</p>
                                <p class="text-gray-700 mb-3"><strong>Как сделать:</strong> плотно обмотай гвоздь проволокой (50-100 витков), подключи концы проволоки к батарейке.</p>
                                <p class="text-gray-700"><strong>Что произойдет:</strong> гвоздь намагнитится и сможет притягивать мелкие металлические предметы!</p>
                            </div>
                        </div>

                        <div class="mb-6">
                            <h3 class="text-xl font-medium text-green-600 mb-3 flex items-center">
                                <i class="fas fa-rainbow mr-2"></i> Домашняя радуга
                            </h3>
                            <div class="bg-green-50 p-4 rounded-lg">
                                <p class="text-gray-700 mb-3"><strong>Что понадобится:</strong> стакан воды, белый лист бумаги, солнечный свет.</p>
                                <p class="text-gray-700 mb-3"><strong>Как сделать:</strong> поставь стакан с водой на солнечный свет так, чтобы свет проходил через воду и падал на бумагу.</p>
                                <p class="text-gray-700"><strong>Что произойдет:</strong> на бумаге появится радуга! Это происходит из-за преломления и разложения света в воде.</p>
                            </div>
                        </div>
                    </div>

                    <div class="mt-8 flex justify-center">
                        <button onclick="startTestAfterStudy()" class="bg-purple-600 hover:bg-purple-700 text-white font-medium py-3 px-8 rounded-lg transition duration-300 inline-flex items-center">
                            <i class="fas fa-graduation-cap mr-2"></i> Пройти тест по этой теме
                        </button>
                    </div>
                </div>
            </div>

            <!-- Test Content (hidden by default) -->
            <div id="test-content" class="hidden">
                <!-- Test Selection -->
                <div id="test-selection" class="bg-white rounded-xl shadow-lg p-6 mb-8 fade-in">
                    <h2 class="text-2xl font-semibold text-gray-800 mb-6 flex items-center">
                        <i class="fas fa-list-check text-purple-500 mr-3"></i>
                        Выберите тест
                    </h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="bg-gradient-to-r from-blue-100 to-purple-100 rounded-lg p-5 cursor-pointer transition-all duration-300 hover:shadow-md border border-blue-200" onclick="startTest('basic')">
                            <h3 class="text-xl font-medium text-blue-800 mb-2">Основы физики</h3>
                            <p class="text-gray-600 mb-3">Для начинающих: механика, теплота, свет</p>
                            <div class="flex items-center text-sm text-blue-600">
                                <i class="fas fa-star mr-1"></i>
                                <span>Уровень: Легкий</span>
                            </div>
                        </div>
                        <div class="bg-gradient-to-r from-purple-100 to-indigo-100 rounded-lg p-5 cursor-pointer transition-all duration-300 hover:shadow-md border border-purple-200" onclick="startTest('electricity')">
                            <h3 class="text-xl font-medium text-purple-800 mb-2">Электричество</h3>
                            <p class="text-gray-600 mb-3">Цепи, ток, напряжение и магнетизм</p>
                            <div class="flex items-center text-sm text-purple-600">
                                <i class="fas fa-star-half-alt mr-1"></i>
                                <span>Уровень: Средний</span>
                            </div>
                        </div>
                        <div class="bg-gradient-to-r from-indigo-100 to-blue-100 rounded-lg p-5 cursor-pointer transition-all duration-300 hover:shadow-md border border-indigo-200" onclick="startTest('modern')">
                            <h3 class="text-xl font-medium text-indigo-800 mb-2">Современная физика</h3>
                            <p class="text-gray-600 mb-3">Атомы, кванты, теория относительности</p>
                            <div class="flex items-center text-sm text-indigo-600">
                                <i class="fas fa-star mr-1"></i>
                                <i class="fas fa-star mr-1"></i>
                                <span>Уровень: Сложный</span>
                            </div>
                        </div>
                        <div class="bg-gradient-to-r from-pink-100 to-red-100 rounded-lg p-5 cursor-pointer transition-all duration-300 hover:shadow-md border border-pink-200" onclick="startTest('experiments')">
                            <h3 class="text-xl font-medium text-pink-800 mb-2">Эксперименты</h3>
                            <p class="text-gray-600 mb-3">Практические задания и опыты</p>
                            <div class="flex items-center text-sm text-pink-600">
                                <i class="fas fa-flask mr-1"></i>
                                <span>Интерактивно</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Test Area (hidden by default) -->
                <div id="test-area" class="hidden bg-white rounded-xl shadow-lg p-6 mb-8 fade-in">
                    <div class="flex justify-between items-center mb-6">
                        <h2 id="test-title" class="text-2xl font-semibold text-gray-800 flex items-center">
                            <i class="fas fa-question-circle text-purple-500 mr-3"></i>
                            <span>Тест: Основы физики</span>
                        </h2>
                        <div class="flex items-center">
                            <span id="question-counter" class="bg-purple-100 text-purple-800 px-3 py-1 rounded-full text-sm font-medium">1/10</span>
                        </div>
                    </div>

                    <!-- Progress Bar -->
                    <div class="w-full bg-gray-200 rounded-full h-2.5 mb-6">
                        <div id="progress-bar" class="progress-bar bg-purple-600 h-2.5 rounded-full" style="width: 0%"></div>
                    </div>

                    <!-- Question -->
                    <div id="question-container" class="mb-8">
                        <h3 id="question-text" class="text-xl font-medium text-gray-800 mb-6">Загрузка вопроса...</h3>
                        
                        <!-- Options -->
                        <div id="options-container" class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <!-- Options will be inserted here by JavaScript -->
                        </div>
                    </div>

                    <!-- Navigation -->
                    <div class="flex justify-between">
                        <button id="prev-btn" onclick="prevQuestion()" class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-medium py-2 px-4 rounded-lg transition duration-300 flex items-center">
                            <i class="fas fa-arrow-left mr-2"></i> Назад
                        </button>
                        <button id="next-btn" onclick="nextQuestion()" class="bg-purple-600 hover:bg-purple-700 text-white font-medium py-2 px-6 rounded-lg transition duration-300 flex items-center">
                            Далее <i class="fas fa-arrow-right ml-2"></i>
                        </button>
                        <button id="finish-btn" onclick="finishTest()" class="hidden bg-green-600 hover:bg-green-700 text-white font-medium py-2 px-6 rounded-lg transition duration-300 flex items-center">
                            Завершить <i class="fas fa-check ml-2"></i>
                        </button>
                    </div>
                </div>

                <!-- Results (hidden by default) -->
                <div id="results-area" class="hidden bg-white rounded-xl shadow-lg p-8 text-center fade-in">
                    <div class="flex justify-center mb-6">
                        <div class="w-24 h-24 rounded-full bg-green-100 flex items-center justify-center">
                            <i class="fas fa-trophy text-4xl text-yellow-500"></i>
                        </div>
                    </div>
                    <h2 class="text-3xl font-bold text-gray-800 mb-3">Тест завершен!</h2>
                    <p id="result-score" class="text-xl text-gray-600 mb-6">Твой результат: <span class="font-bold text-purple-600">15/20</span></p>
                    
                    <div class="w-full bg-gray-200 rounded-full h-4 mb-8">
                        <div id="result-progress" class="bg-gradient-to-r from-blue-500 to-purple-600 h-4 rounded-full" style="width: 75%"></div>
                    </div>
                    
                    <div id="result-feedback" class="max-w-2xl mx-auto mb-8 p-4 bg-blue-50 rounded-lg">
                        <p class="text-gray-700">Отличный результат! Ты хорошо разбираешься в основах физики. Продолжай в том же духе!</p>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
                        <div class="bg-blue-50 p-4 rounded-lg">
                            <div class="text-blue-600 mb-2"><i class="fas fa-check-circle text-2xl"></i></div>
                            <h3 class="font-medium text-gray-800 mb-1">Правильные ответы</h3>
                            <p id="correct-answers" class="text-2xl font-bold text-blue-600">15</p>
                        </div>
                        <div class="bg-purple-50 p-4 rounded-lg">
                            <div class="text-purple-600 mb-2"><i class="fas fa-times-circle text-2xl"></i></div>
                            <h3 class="font-medium text-gray-800 mb-1">Неправильные</h3>
                            <p id="wrong-answers" class="text-2xl font-bold text-purple-600">5</p>
                        </div>
                        <div class="bg-green-50 p-4 rounded-lg">
                            <div class="text-green-600 mb-2"><i class="fas fa-clock text-2xl"></i></div>
                            <h3 class="font-medium text-gray-800 mb-1">Время</h3>
                            <p id="time-spent" class="text-2xl font-bold text-green-600">3:45</p>
                        </div>
                    </div>
                    
                    <button onclick="restartTest()" class="bg-purple-600 hover:bg-purple-700 text-white font-medium py-3 px-8 rounded-lg transition duration-300 inline-flex items-center">
                        <i class="fas fa-redo mr-2"></i> Пройти еще раз
                    </button>
                </div>
            </div>
        </main>

        <!-- Footer -->
        <footer class="mt-16 text-center text-gray-500 text-sm">
            <p>© 2023 Физика для детей. Все права защищены.</p>
            <p class="mt-2">Сделано с <i class="fas fa-heart text-red-400"></i> для юных ученых</p>
        </footer>
    </div>

    <script>
        // Test data
        const tests = {
            basic: {
                title: "Основы физики",
                questions: [
                    {
                        question: "Что измеряется в метрах в секунду?",
                        options: ["Масса", "Сила", "Скорость", "Температура"],
                        answer: 2
                    },
                    {
                        question: "Как называется сила, с которой Земля притягивает тела?",
                        options: ["Сила трения", "Сила упругости", "Сила тяжести", "Сила Архимеда"],
                        answer: 2
                    },
                    {
                        question: "Какой прибор используется для измерения температуры?",
                        options: ["Барометр", "Термометр", "Амперметр", "Спидометр"],
                        answer: 1
                    },
                    {
                        question: "Что происходит со льдом при нагревании?",
                        options: ["Испаряется", "Тает", "Сжимается", "Остается без изменений"],
                        answer: 1
                    },
                    {
                        question: "Как называется явление изменения положения тела с течением времени?",
                        options: ["Вращение", "Движение", "Колебание", "Покой"],
                        answer: 1
                    }
                ]
            },
            electricity: {
                title: "Электричество",
                questions: [
                    {
                        question: "Что измеряется в амперах?",
                        options: ["Напряжение", "Сопротивление", "Сила тока", "Мощность"],
                        answer: 2
                    },
                    {
                        question: "Как называется устройство для изменения напряжения?",
                        options: ["Генератор", "Трансформатор", "Резистор", "Конденсатор"],
                        answer: 1
                    },
                    {
                        question: "Какие частицы создают электрический ток в металлах?",
                        options: ["Протоны", "Нейтроны", "Электроны", "Ионы"],
                        answer: 2
                    },
                    {
                        question: "Как называется закон, связывающий силу тока, напряжение и сопротивление?",
                        options: ["Закон Ньютона", "Закон Ома", "Закон Паскаля", "Закон Архимеда"],
                        answer: 1
                    },
                    {
                        question: "Что произойдет, если соединить полюса батарейки проводником?",
                        options: ["Ничего", "Короткое замыкание", "Батарейка зарядится", "Появится магнитное поле"],
                        answer: 1
                    }
                ]
            },
            modern: {
                title: "Современная физика",
                questions: [
                    {
                        question: "Кто сформулировал теорию относительности?",
                        options: ["Никола Тесла", "Исаак Ньютон", "Альберт Эйнштейн", "Галилео Галилей"],
                        answer: 2
                    },
                    {
                        question: "Как называется мельчайшая частица вещества?",
                        options: ["Молекула", "Атом", "Электрон", "Кварк"],
                        answer: 1
                    },
                    {
                        question: "Что такое фотон?",
                        options: ["Частица света", "Частица атомного ядра", "Электрический заряд", "Магнитное поле"],
                        answer: 0
                    },
                    {
                        question: "Как называется превращение ядер атомов?",
                        options: ["Испарение", "Плавление", "Ядерная реакция", "Диффузия"],
                        answer: 2
                    },
                    {
                        question: "Что изучает квантовая физика?",
                        options: ["Движение планет", "Поведение мельчайших частиц", "Свойства жидкостей", "Электрические цепи"],
                        answer: 1
                    }
                ]
            },
            experiments: {
                title: "Эксперименты",
                questions: [
                    {
                        question: "Что произойдет, если смешать уксус и пищевую соду?",
                        options: ["Образуется лед", "Появится огонь", "Произойдет реакция с выделением газа", "Ничего не произойдет"],
                        answer: 2
                    },
                    {
                        question: "Как сделать простейший электромагнит?",
                        options: ["Обмотать гвоздь медной проволокой и подключить к батарейке", "Нагреть металл", "Соединить два магнита", "Заморозить проводник"],
                        answer: 0
                    },
                    {
                        question: "Как можно увидеть звуковые волны?",
                        options: ["С помощью микроскопа", "Используя сосуд с водой", "Через специальные очки", "Звуковые волны невидимы"],
                        answer: 1
                    },
                    {
                        question: "Что нужно для создания радуги в домашних условиях?",
                        options: ["Стакан воды и солнечный свет", "Зеркало и фонарик", "Призму", "Все варианты верны"],
                        answer: 3
                    },
                    {
                        question: "Как проверить, является ли вещество проводником электричества?",
                        options: ["Попробовать на вкус", "Подключить в цепь с лампочкой", "Нагреть его", "Посмотреть под микроскопом"],
                        answer: 1
                    }
                ]
            }
        };

        // Current test state
        let currentTest = null;
        let currentQuestion = 0;
        let userAnswers = [];
        let startTime = null;
        let testType = '';
        let currentTopic = '';

        // DOM elements
        const studyContent = document.getElementById('study-content');
        const testContent = document.getElementById('test-content');
        const studyTab = document.getElementById('study-tab');
        const testTab = document.getElementById('test-tab');
        const topicContent = document.getElementById('topic-content');
        const topicTitle = document.getElementById('topic-title');
        const testSelection = document.getElementById('test-selection');
        const testArea = document.getElementById('test-area');
        const resultsArea = document.getElementById('results-area');
        const testTitle = document.getElementById('test-title');
        const questionCounter = document.getElementById('question-counter');
        const progressBar = document.getElementById('progress-bar');
        const questionText = document.getElementById('question-text');
        const optionsContainer = document.getElementById('options-container');
        const prevBtn = document.getElementById('prev-btn');
        const nextBtn = document.getElementById('next-btn');
        const finishBtn = document.getElementById('finish-btn');
        const resultScore = document.getElementById('result-score');
        const resultProgress = document.getElementById('result-progress');
        const resultFeedback = document.getElementById('result-feedback');
        const correctAnswersEl = document.getElementById('correct-answers');
        const wrongAnswersEl = document.getElementById('wrong-answers');
        const timeSpentEl = document.getElementById('time-spent');

        // Show tab
        function showTab(tab) {
            if (tab === 'study') {
                studyContent.classList.remove('hidden');
                testContent.classList.add('hidden');
                studyTab.classList.add('active');
                testTab.classList.remove('active');
            } else {
                studyContent.classList.add('hidden');
                testContent.classList.remove('hidden');
                studyTab.classList.remove('active');
                testTab.classList.add('active');
            }
        }

        // Show topic
        function showTopic(topic) {
            currentTopic = topic;
            
            // Hide all topic contents
            document.querySelectorAll('#topic-content > div').forEach(div => {
                div.classList.add('hidden');
            });
            
            // Show selected topic
            document.getElementById(`${topic}-topic`).classList.remove('hidden');
            
            // Set topic title
            let title = '';
            switch(topic) {
                case 'basic': title = 'Основы физики'; break;
                case 'electricity': title = 'Электричество'; break;
                case 'modern': title = 'Современная физика'; break;
                case 'experiments': title = 'Эксперименты'; break;
            }
            topicTitle.innerHTML = `<i class="fas fa-book text-purple-500 mr-3"></i><span>${title}</span>`;
            
            // Show topic content
            topicContent.classList.remove('hidden');
        }

        // Hide topic
        function hideTopic() {
            topicContent.classList.add('hidden');
        }

        // Start test after studying
        function startTestAfterStudy() {
            startTest(currentTopic);
            showTab('test');
        }

        // Start test function
        function startTest(type) {
            testType = type;
            currentTest = tests[type];
            currentQuestion = 0;
            userAnswers = Array(currentTest.questions.length).fill(null);
            startTime = new Date();
            
            testSelection.classList.add('hidden');
            testArea.classList.remove('hidden');
            resultsArea.classList.add('hidden');
            testTitle.innerHTML = `<i class="fas fa-question-circle text-purple-500 mr-3"></i><span>Тест: ${currentTest.title}</span>`;
            
            updateQuestion();
        }

        // Update question display
        function updateQuestion() {
            const question = currentTest.questions[currentQuestion];
            
            // Update question counter and progress
            questionCounter.textContent = `${currentQuestion + 1}/${currentTest.questions.length}`;
            progressBar.style.width = `${((currentQuestion + 1) / currentTest.questions.length) * 100}%`;
            
            // Set question text
            questionText.textContent = question.question;
            
            // Clear and add options
            optionsContainer.innerHTML = '';
            question.options.forEach((option, index) => {
                const optionElement = document.createElement('div');
                optionElement.className = `option bg-white border-2 rounded-lg p-4 cursor-pointer transition-all duration-300 ${
                    userAnswers[currentQuestion] === index ? 'border-purple-500 bg-purple-50' : 'border-gray-200 hover:border-purple-300'
                }`;
                optionElement.innerHTML = `
                    <div class="flex items-center">
                        <div class="w-6 h-6 rounded-full border-2 flex items-center justify-center mr-3 ${
                            userAnswers[currentQuestion] === index ? 'border-purple-500 bg-purple-500 text-white' : 'border-gray-300'
                        }">
                            ${userAnswers[currentQuestion] === index ? '<i class="fas fa-check text-xs"></i>' : ''}
                        </div>
                        <span>${option}</span>
                    </div>
                `;
                optionElement.addEventListener('click', () => selectOption(index));
                optionsContainer.appendChild(optionElement);
            });
            
            // Update button states
            prevBtn.disabled = currentQuestion === 0;
            nextBtn.disabled = userAnswers[currentQuestion] === null;
            
            // Show/hide finish button
            if (currentQuestion === currentTest.questions.length - 1) {
                nextBtn.classList.add('hidden');
                finishBtn.classList.remove('hidden');
                finishBtn.disabled = userAnswers[currentQuestion] === null;
            } else {
                nextBtn.classList.remove('hidden');
                finishBtn.classList.add('hidden');
            }
        }

        // Select option
        function selectOption(index) {
            userAnswers[currentQuestion] = index;
            updateQuestion();
        }

        // Next question
        function nextQuestion() {
            if (currentQuestion < currentTest.questions.length - 1) {
                currentQuestion++;
                updateQuestion();
            }
        }

        // Previous question
        function prevQuestion() {
            if (currentQuestion > 0) {
                currentQuestion--;
                updateQuestion();
            }
        }

        // Finish test
        function finishTest() {
            testArea.classList.add('hidden');
            resultsArea.classList.remove('hidden');
            
            // Calculate results
            const correctAnswers = userAnswers.reduce((acc, answer, index) => {
                return acc + (answer === currentTest.questions[index].answer ? 1 : 0);
            }, 0);
            
            const wrongAnswers = userAnswers.length - correctAnswers;
            const percentage = (correctAnswers / userAnswers.length) * 100;
            
            // Calculate time spent
            const endTime = new Date();
            const timeDiff = (endTime - startTime) / 1000; // in seconds
            const minutes = Math.floor(timeDiff / 60);
            const seconds = Math.floor(timeDiff % 60);
            const timeString = `${minutes}:${seconds < 10 ? '0' + seconds : seconds}`;
            
            // Update results
            resultScore.innerHTML = `Твой результат: <span class="font-bold text-purple-600">${correctAnswers}/${userAnswers.length}</span>`;
            resultProgress.style.width = `${percentage}%`;
            correctAnswersEl.textContent = correctAnswers;
            wrongAnswersEl.textContent = wrongAnswers;
            timeSpentEl.textContent = timeString;
            
            // Set feedback based on score
            let feedback = '';
            if (percentage >= 80) {
                feedback = 'Отличный результат! Ты отлично разбираешься в этой теме. Так держать!';
                resultFeedback.className = 'max-w-2xl mx-auto mb-8 p-4 bg-green-50 rounded-lg';
            } else if (percentage >= 50) {
                feedback = 'Хороший результат! Есть над чем поработать, но основы ты усвоил хорошо.';
                resultFeedback.className = 'max-w-2xl mx-auto mb-8 p-4 bg-blue-50 rounded-lg';
            } else {
                feedback = 'Попробуй еще раз! Физика - это интересно, и с практикой у тебя обязательно получится!';
                resultFeedback.className = 'max-w-2xl mx-auto mb-8 p-4 bg-purple-50 rounded-lg';
            }
            resultFeedback.innerHTML = `<p class="text-gray-700">${feedback}</p>`;
        }

        // Restart test
        function restartTest() {
            resultsArea.classList.add('hidden');
            testArea.classList.add('hidden');
            testSelection.classList.remove('hidden');
        }
    </script>
</body>
</html>