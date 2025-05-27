<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Школьные предметы</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .card {
            perspective: 1000px;
            transition: transform 0.3s;
        }
        .card-inner {
            transition: transform 0.6s;
            transform-style: preserve-3d;
        }
        .card:hover .card-inner {
            transform: rotateY(180deg);
        }
        .card-front, .card-back {
            backface-visibility: hidden;
            position: absolute;
            width: 100%;
            height: 100%;
        }
        .card-back {
            transform: rotateY(180deg);
        }
        .subject-icon {
            font-size: 3rem;
            margin-bottom: 1rem;
        }
    </style>
</head>
<body class="bg-gradient-to-br from-blue-50 to-purple-50 min-h-screen">
    <div class="container mx-auto px-4 py-12">
        <h1 class="text-4xl font-bold text-center mb-12 text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-purple-600">
            Школьные предметы
        </h1>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Информатика -->
            <div class="card h-64">
                <div class="card-inner relative w-full h-full">
                    <div class="card-front bg-white rounded-xl shadow-xl p-6 flex flex-col items-center justify-center border-2 border-blue-200">
                        <i class="subject-icon fas fa-laptop-code text-blue-500"></i>
                        <h2 class="text-2xl font-bold text-blue-600 mb-2">Информатика</h2>
                        <p class="text-gray-600 text-center">Изучение компьютеров и программирования</p>
                        <div class="mt-4 px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-sm font-medium">
                            <i class="fas fa-clock mr-1"></i> 3 урока в неделю
                        </div>
                    </div>
                    <div class="card-back bg-blue-600 rounded-xl shadow-xl p-6 flex flex-col items-center justify-center text-white">
                        <h3 class="text-xl font-bold mb-2">Что изучаем?</h3>
                        <ul class="text-sm text-center space-y-1">
                            <li>Основы программирования</li>
                            <li>Компьютерные сети</li>
                            <li>Алгоритмы и структуры данных</li>
                            <li>Веб-разработка</li>
                        </ul>
                        <button class="mt-4 px-4 py-2 bg-white text-blue-600 rounded-full font-medium hover:bg-blue-50 transition">
                            Подробнее
                        </button>
                    </div>
                </div>
            </div>
            
            <!-- Математика -->
            <div class="card h-64">
                <div class="card-inner relative w-full h-full">
                    <div class="card-front bg-white rounded-xl shadow-xl p-6 flex flex-col items-center justify-center border-2 border-green-200">
                        <i class="subject-icon fas fa-square-root-alt text-green-500"></i>
                        <h2 class="text-2xl font-bold text-green-600 mb-2">Математика</h2>
                        <p class="text-gray-600 text-center">Царица всех наук</p>
                        <div class="mt-4 px-3 py-1 bg-green-100 text-green-800 rounded-full text-sm font-medium">
                            <i class="fas fa-clock mr-1"></i> 5 уроков в неделю
                        </div>
                    </div>
                    <div class="card-back bg-green-600 rounded-xl shadow-xl p-6 flex flex-col items-center justify-center text-white">
                        <h3 class="text-xl font-bold mb-2">Что изучаем?</h3>
                        <ul class="text-sm text-center space-y-1">
                            <li>Алгебра и геометрия</li>
                            <li>Тригонометрия</li>
                            <li>Математический анализ</li>
                            <li>Теория вероятностей</li>
                        </ul>
                        <button class="mt-4 px-4 py-2 bg-white text-green-600 rounded-full font-medium hover:bg-green-50 transition">
                            Подробнее
                        </button>
                    </div>
                </div>
            </div>
            
            <!-- Биология -->
            <div class="card h-64">
                <div class="card-inner relative w-full h-full">
                    <div class="card-front bg-white rounded-xl shadow-xl p-6 flex flex-col items-center justify-center border-2 border-red-200">
                        <i class="subject-icon fas fa-dna text-red-500"></i>
                        <h2 class="text-2xl font-bold text-red-600 mb-2">Биология</h2>
                        <p class="text-gray-600 text-center">Наука о живой природе</p>
                        <div class="mt-4 px-3 py-1 bg-red-100 text-red-800 rounded-full text-sm font-medium">
                            <i class="fas fa-clock mr-1"></i> 2 урока в неделю
                        </div>
                    </div>
                    <div class="card-back bg-red-600 rounded-xl shadow-xl p-6 flex flex-col items-center justify-center text-white">
                        <h3 class="text-xl font-bold mb-2">Что изучаем?</h3>
                        <ul class="text-sm text-center space-y-1">
                            <li>Клеточное строение</li>
                            <li>Эволюция видов</li>
                            <li>Экосистемы</li>
                            <li>Анатомия человека</li>
                        </ul>
                        <button class="mt-4 px-4 py-2 bg-white text-red-600 rounded-full font-medium hover:bg-red-50 transition">
                            Подробнее
                        </button>
                    </div>
                </div>
            </div>
            
            <!-- Английский язык -->
            <div class="card h-64">
                <div class="card-inner relative w-full h-full">
                    <div class="card-front bg-white rounded-xl shadow-xl p-6 flex flex-col items-center justify-center border-2 border-yellow-200">
                        <i class="subject-icon fas fa-language text-yellow-500"></i>
                        <h2 class="text-2xl font-bold text-yellow-600 mb-2">Английский язык</h2>
                        <p class="text-gray-600 text-center">Международный язык общения</p>
                        <div class="mt-4 px-3 py-1 bg-yellow-100 text-yellow-800 rounded-full text-sm font-medium">
                            <i class="fas fa-clock mr-1"></i> 4 урока в неделю
                        </div>
                    </div>
                    <div class="card-back bg-yellow-600 rounded-xl shadow-xl p-6 flex flex-col items-center justify-center text-white">
                        <h3 class="text-xl font-bold mb-2">Что изучаем?</h3>
                        <ul class="text-sm text-center space-y-1">
                            <li>Грамматика</li>
                            <li>Разговорная речь</li>
                            <li>Чтение и письмо</li>
                            <li>Культура англоязычных стран</li>
                        </ul>
                        <button class="mt-4 px-4 py-2 bg-white text-yellow-600 rounded-full font-medium hover:bg-yellow-50 transition">
                            Подробнее
                        </button>
                    </div>
                </div>
            </div>
            
            <!-- Физика -->
            <div class="card h-64">
                <div class="card-inner relative w-full h-full">
                    <div class="card-front bg-white rounded-xl shadow-xl p-6 flex flex-col items-center justify-center border-2 border-purple-200">
                        <i class="subject-icon fas fa-atom text-purple-500"></i>
                        <h2 class="text-2xl font-bold text-purple-600 mb-2">Физика</h2>
                        <p class="text-gray-600 text-center">Наука о природе и её законах</p>
                        <div class="mt-4 px-3 py-1 bg-purple-100 text-purple-800 rounded-full text-sm font-medium">
                            <i class="fas fa-clock mr-1"></i> 3 урока в неделю
                        </div>
                    </div>
                    <div class="card-back bg-purple-600 rounded-xl shadow-xl p-6 flex flex-col items-center justify-center text-white">
                        <h3 class="text-xl font-bold mb-2">Что изучаем?</h3>
                        <ul class="text-sm text-center space-y-1">
                            <li>Механика</li>
                            <li>Термодинамика</li>
                            <li>Электричество</li>
                            <li>Квантовая физика</li>
                        </ul>
                        <button class="mt-4 px-4 py-2 bg-white text-purple-600 rounded-full font-medium hover:bg-purple-50 transition">
                            Подробнее
                        </button>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="mt-12 text-center">
            <button id="randomSubject" class="px-6 py-3 bg-gradient-to-r from-blue-500 to-purple-500 text-white rounded-full font-bold shadow-lg hover:shadow-xl transition-all transform hover:scale-105">
                <i class="fas fa-random mr-2"></i> Случайный предмет
            </button>
            <p id="randomResult" class="mt-4 text-lg font-medium text-gray-700 hidden"></p>
        </div>
    </div>

    <script>
        document.getElementById('randomSubject').addEventListener('click', function() {
            const subjects = [
                "Информатика", 
                "Математика", 
                "Биология", 
                "Английский язык", 
                "Физика"
            ];
            
            const randomIndex = Math.floor(Math.random() * subjects.length);
            const randomSubject = subjects[randomIndex];
            
            const colors = {
                "Информатика": "blue",
                "Математика": "green",
                "Биология": "red",
                "Английский язык": "yellow",
                "Физика": "purple"
            };
            
            const resultElement = document.getElementById('randomResult');
            resultElement.textContent = `Сегодня вам стоит уделить внимание: ${randomSubject}`;
            resultElement.className = `mt-4 text-lg font-medium text-${colors[randomSubject]}-600`;
            resultElement.classList.remove('hidden');
            
            // Анимация
            resultElement.classList.add('animate-bounce');
            setTimeout(() => {
                resultElement.classList.remove('animate-bounce');
            }, 1000);
        });
    </script>
</body>
</html>