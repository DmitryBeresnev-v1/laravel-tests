<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduMaster - Образовательная платформа</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
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
<body class="font-sans bg-gray-50">
    <!-- Header -->

    <!-- Main Content -->
    <main class="container mx-auto px-4 py-8">
        <!-- Grade Selection -->
        <section id="grade-selection" class="mb-12">
            <h2 class="text-2xl md:text-3xl font-bold mb-6 text-gray-800 flex items-center">
                <i class="fas fa-layer-group mr-3 text-purple-600"></i> Выберите ваш класс
            </h2>
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-6 gap-4">
                <button onclick="selectGrade(5)" class="grade-btn bg-blue-100 hover:bg-blue-200 text-blue-800 font-semibold py-4 px-2 rounded-lg transition flex flex-col items-center">
                    <i class="fas fa-child text-2xl mb-2"></i>
                    5 класс
                </button>
                <button onclick="selectGrade(6)" class="grade-btn bg-green-100 hover:bg-green-200 text-green-800 font-semibold py-4 px-2 rounded-lg transition flex flex-col items-center">
                    <i class="fas fa-user text-2xl mb-2"></i>
                    6 класс
                </button>
                <button onclick="selectGrade(7)" class="grade-btn bg-yellow-100 hover:bg-yellow-200 text-yellow-800 font-semibold py-4 px-2 rounded-lg transition flex flex-col items-center">
                    <i class="fas fa-user-graduate text-2xl mb-2"></i>
                    7 класс
                </button>
                <button onclick="selectGrade(8)" class="grade-btn bg-red-100 hover:bg-red-200 text-red-800 font-semibold py-4 px-2 rounded-lg transition flex flex-col items-center">
                    <i class="fas fa-user-tie text-2xl mb-2"></i>
                    8 класс
                </button>
                <button onclick="selectGrade(9)" class="grade-btn bg-purple-100 hover:bg-purple-200 text-purple-800 font-semibold py-4 px-2 rounded-lg transition flex flex-col items-center">
                    <i class="fas fa-user-astronaut text-2xl mb-2"></i>
                    9 класс
                </button>
                <button onclick="selectGrade(10)" class="grade-btn bg-indigo-100 hover:bg-indigo-200 text-indigo-800 font-semibold py-4 px-2 rounded-lg transition flex flex-col items-center">
                    <i class="fas fa-user-ninja text-2xl mb-2"></i>
                    10 класс
                </button>
            </div>
        </section>

        <!-- Subjects Section (hidden by default) -->
        <section id="subjects-section" class="mb-12 hidden">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl md:text-3xl font-bold text-gray-800 flex items-center">
                    <i class="fas fa-book-open mr-3 text-purple-600"></i>
                    <span id="selected-grade-text">Предметы для 5 класса</span>
                </h2>
                <button onclick="backToGrades()" class="text-purple-600 hover:text-purple-800 font-medium flex items-center">
                    <i class="fas fa-arrow-left mr-2"></i> Назад
                </button>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6" id="subjects-container">
                <!-- Subjects will be loaded here by JavaScript -->
            </div>
        </section>

        <!-- Topics Section (hidden by default) -->
        <section id="topics-section" class="mb-12 hidden">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl md:text-3xl font-bold text-gray-800 flex items-center">
                    <i class="fas fa-list-ul mr-3 text-purple-600"></i>
                    <span id="selected-subject-text">Темы по Математике</span>
                </h2>
                <button onclick="backToSubjects()" class="text-purple-600 hover:text-purple-800 font-medium flex items-center">
                    <i class="fas fa-arrow-left mr-2"></i> Назад
                </button>
            </div>
            <div class="grid grid-cols-1 gap-6" id="topics-container">
                <!-- Topics will be loaded here by JavaScript -->
            </div>
        </section>


    </main>


    <script>
        // Sample data for subjects and topics
        const subjectsData = {
            5: [
                { id: 'math-5', name: 'Математика', icon: 'calculator', color: 'bg-blue-100', textColor: 'text-blue-800' },
                { id: 'russian-5', name: 'Русский язык', icon: 'language', color: 'bg-red-100', textColor: 'text-red-800' },
                { id: 'history-5', name: 'История', icon: 'landmark', color: 'bg-yellow-100', textColor: 'text-yellow-800' },
                { id: 'biology-5', name: 'Биология', icon: 'leaf', color: 'bg-green-100', textColor: 'text-green-800' },
                { id: 'geography-5', name: 'География', icon: 'globe-europe', color: 'bg-purple-100', textColor: 'text-purple-800' },
                { id: 'literature-5', name: 'Литература', icon: 'book', color: 'bg-indigo-100', textColor: 'text-indigo-800' }
            ],
            6: [
                { id: 'math-6', name: 'Математика', icon: 'calculator', color: 'bg-blue-100', textColor: 'text-blue-800' },
                { id: 'russian-6', name: 'Русский язык', icon: 'language', color: 'bg-red-100', textColor: 'text-red-800' },
                { id: 'history-6', name: 'История', icon: 'landmark', color: 'bg-yellow-100', textColor: 'text-yellow-800' },
                { id: 'biology-6', name: 'Биология', icon: 'leaf', color: 'bg-green-100', textColor: 'text-green-800' },
                { id: 'geography-6', name: 'География', icon: 'globe-europe', color: 'bg-purple-100', textColor: 'text-purple-800' },
                { id: 'literature-6', name: 'Литература', icon: 'book', color: 'bg-indigo-100', textColor: 'text-indigo-800' }
            ]
            // Add more grades as needed
        };

        const topicsData = {
            'math-5': [
                { 
                    title: 'Натуральные числа', 
                    description: 'Изучение натуральных чисел, их свойств и операций над ними. Включает сложение, вычитание, умножение и деление натуральных чисел.',
                    icon: 'sort-numeric-up'
                },
                { 
                    title: 'Обыкновенные дроби', 
                    description: 'Основные понятия обыкновенных дробей, сравнение дробей, сложение и вычитание дробей с одинаковыми знаменателями.',
                    icon: 'divide'
                },
                { 
                    title: 'Геометрические фигуры', 
                    description: 'Изучение основных геометрических фигур: точка, прямая, отрезок, луч, угол, треугольник, прямоугольник, квадрат, окружность.',
                    icon: 'shapes'
                }
            ],
            'russian-5': [
                { 
                    title: 'Фонетика и графика', 
                    description: 'Звуки и буквы русского языка, гласные и согласные звуки, твердые и мягкие согласные, звонкие и глухие согласные.',
                    icon: 'spell-check'
                },
                { 
                    title: 'Состав слова', 
                    description: 'Морфемный состав слова: корень, приставка, суффикс, окончание. Основа слова. Разбор слова по составу.',
                    icon: 'font'
                }
            ]
            // Add more subjects as needed
        };

        let currentGrade = null;
        let currentSubject = null;

        // Function to select grade
        function selectGrade(grade) {
            currentGrade = grade;
            document.getElementById('grade-selection').classList.add('hidden');
            document.getElementById('subjects-section').classList.remove('hidden');
            document.getElementById('selected-grade-text').textContent = `Предметы для ${grade} класса`;
            
            // Load subjects for selected grade
            const subjectsContainer = document.getElementById('subjects-container');
            subjectsContainer.innerHTML = '';
            
            const subjects = subjectsData[grade] || [];
            subjects.forEach(subject => {
                const subjectCard = document.createElement('div');
                subjectCard.className = `subject-card ${subject.color} ${subject.textColor} p-6 rounded-xl shadow-md cursor-pointer transition flex flex-col items-center text-center`;
                subjectCard.onclick = () => selectSubject(subject.id, subject.name);
                
                subjectCard.innerHTML = `
                    <i class="fas fa-${subject.icon} text-4xl mb-4"></i>
                    <h3 class="text-xl font-semibold mb-2">${subject.name}</h3>
                    <p class="text-sm opacity-75">Нажмите для просмотра тем</p>
                `;
                
                subjectsContainer.appendChild(subjectCard);
            });
        }

        // Function to go back to grade selection
        function backToGrades() {
            currentGrade = null;
            document.getElementById('grade-selection').classList.remove('hidden');
            document.getElementById('subjects-section').classList.add('hidden');
            document.getElementById('topics-section').classList.add('hidden');
        }

        // Function to select subject
        function selectSubject(subjectId, subjectName) {
            currentSubject = subjectId;
            document.getElementById('subjects-section').classList.add('hidden');
            document.getElementById('topics-section').classList.remove('hidden');
            document.getElementById('selected-subject-text').textContent = `Темы по ${subjectName}`;
            
            // Load topics for selected subject
            const topicsContainer = document.getElementById('topics-container');
            topicsContainer.innerHTML = '';
            
            const topics = topicsData[subjectId] || [];
            topics.forEach((topic, index) => {
                const topicCard = document.createElement('div');
                topicCard.className = 'topic-card bg-white p-6 rounded-xl shadow-sm border border-gray-100';
                
                topicCard.innerHTML = `
                    <div class="flex items-start">
                        <div class="bg-purple-100 w-12 h-12 rounded-full flex items-center justify-center mr-4">
                            <i class="fas fa-${topic.icon} text-purple-600 text-xl"></i>
                        </div>
                        <div class="flex-1">
                            <div class="flex justify-between items-start">
                                <h3 class="text-xl font-semibold mb-2 text-gray-800">${index + 1}. ${topic.title}</h3>
                                <span class="bg-gray-100 text-gray-600 text-xs font-medium px-2.5 py-0.5 rounded">Тема ${index + 1}</span>
                            </div>
                            <p class="text-gray-600 mb-4">${topic.description}</p>
                            <div class="flex flex-wrap gap-3">
                                <button class="test-btn bg-purple-600 hover:bg-purple-700 text-white font-medium py-2 px-4 rounded-lg transition flex items-center">
                                    <i class="fas fa-book-open mr-2"></i> Учебный материал
                                </button>
                                <button class="test-btn bg-green-600 hover:bg-green-700 text-white font-medium py-2 px-4 rounded-lg transition flex items-center">
                                    <i class="fas fa-question-circle mr-2"></i> Пройти тест
                                </button>
                            </div>
                        </div>
                    </div>
                `;
                
                topicsContainer.appendChild(topicCard);
            });
        }

        // Function to go back to subjects
        function backToSubjects() {
            currentSubject = null;
            document.getElementById('subjects-section').classList.remove('hidden');
            document.getElementById('topics-section').classList.add('hidden');
        }
    </script>
</body>
</html>