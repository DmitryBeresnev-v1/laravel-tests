<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Выбор предмета | Обучение и тестирование</title>
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
            Выбери предмет
        </h1>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Карточка предмета -->

            @foreach ($subjects as $subject)
                {{-- if ($subject->visible == 'main') --}}
                    <div class="card h-64">
                        <div class="card-inner relative w-full h-full">
                            <div class="card-front bg-white rounded-xl shadow-xl p-6 flex flex-col items-center justify-center border-2 border-{{$subject->color}}-200">
                                <i class="subject-icon {{$subject->icon_subject}} text-{{$subject->color}}-500"></i>
                                <h2 class="text-2xl font-bold text-{{$subject->color}}-600 mb-2">{{ $subject->name }}</h2>
                                <p class="text-gray-600 text-center">{{ $subject->description }}</p>
                                <div class="mt-4 px-3 py-1 bg-{{$subject->color}}-100 text-{{$subject->color}}-800 rounded-full text-sm font-medium">
                                    <i class="fas fa-clock mr-1"></i> {{ $subject->topics()->count() }}
                                        @if ($subject->topics()->count() <= 0 || $subject->topics()->count() >=5)
                                            тем на изучение
                                        @elseif ($subject->topics()->count() <= 0)
                                            тема на изучение
                                        @else ($subject->topics()->count() >= 2 && $subject->topics()->count() <=4)
                                            темы на изучение
                                        @endif
                                </div>
                            </div>
                            <div class="card-back bg-{{$subject->color}}-600 rounded-xl shadow-xl p-6 flex flex-col items-center justify-center text-white">
                                <h3 class="text-xl font-bold mb-2">Что изучаем?</h3>
                                <ul class="text-sm text-center space-y-1">
                                    @foreach ($subject->topics->take(3) as $topic)
                                        <div>
                                            <li>{{ $topic->title }}</li>
                                        </div>
                                    @endforeach    
                                    <li>и многое другое</li>
                                </ul>
                                <a href="{{ route('client.subject', ['nameSubject' => $subject->url_name]) }}" class="mt-4 px-4 py-2 bg-white text-{{$subject->color}}-600 rounded-full font-medium hover:bg-{{$subject->color}}-50 transition">
                                    Подробнее
                                </a>
                            </div>
                        </div>
                    </div>
                {{-- endif --}}
            @endforeach
        </div>
    </div>
</body>
</html>