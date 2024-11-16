<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="{{ asset('css/landing.css') }}" rel="stylesheet">
    <!-- Стили для Slick Slider -->
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" />
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" />
</head>

<body>
    {{-- @extends('layouts.app') --}}

    {{-- @section('content') --}}
    <div class="landing-container">
        <!-- Шапка сайта -->
        <header class="site-header">
            <div class="container">
                <div class="header-content">
                    <!-- Логотип -->
                    <div class="logo">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" width="70" height="70">
                            <circle cx="50" cy="50" r="45" fill="#f4a261" />
                            <path d="M30,40 L40,40 C50,40 50,50 40,50 L30,50 Z" fill="#fff" />
                            <path d="M40,40 L40,60 L70,60 C80,60 80,50 70,50 L40,50 Z" fill="#fff" />
                            <circle cx="50" cy="50" r="10" fill="#e76f51" />
                        </svg>
                    </div>

                    <!-- Название сервиса -->
                    <div class="site-name">
                        <h1>Генератор резюме</h1>
                    </div>

                    <!-- Меню -->
                    <nav class="navbar">
                        <div class="auth-links">
                            <!-- Войти -->
                            <a href="{{ route('login') }}" class="auth-link">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="24"
                                    height="24"
                                    fill="currentColor"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                    <path
                                        d="M217.9 105.9L340.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L217.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1L32 320c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM352 416l64 0c17.7 0 32-14.3 32-32l0-256c0-17.7-14.3-32-32-32l-64 0c-17.7 0-32-14.3-32-32s14.3-32 32-32l64 0c53 0 96 43 96 96l0 256c0 53-43 96-96 96l-64 0c-17.7 0-32-14.3-32-32s14.3-32 32-32z" />
                                </svg>
                                <span>Войти</span>
                            </a>

                            <!-- Зарегистрироваться -->
                            <a href="{{ route('register') }}" class="auth-link">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="24"
                                    height="24"
                                    fill="currentColor"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                    <path
                                        d="M304 128a80 80 0 1 0 -160 0 80 80 0 1 0 160 0zM96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM49.3 464l349.5 0c-8.9-63.3-63.3-112-129-112l-91.4 0c-65.7 0-120.1 48.7-129 112zM0 482.3C0 383.8 79.8 304 178.3 304l91.4 0C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7L29.7 512C13.3 512 0 498.7 0 482.3z" />
                                </svg>
                                <span>Зарегистрироваться</span>
                            </a>
                        </div>
                    </nav>
                </div>
            </div>
        </header>

        <!-- Главный блок -->
        <section class="hero">
            <div class="hero-content">
                <h1 class="hero-title">Добро пожаловать в наш сервис резюме!</h1>
                <p class="hero-subtitle">Создайте профессиональное резюме за считанные минуты с помощью простого и
                    удобного конструктора.</p>
                <a href="{{ route('register') }}" class="btn-cta">Создать резюме</a>
            </div>
            <div class="hero-image">
                <!-- Добавьте изображение -->
                <img src="{{ asset('images/placeholder.jpg') }}" alt="Герой изображение">
            </div>
        </section>

        <!-- Преимущества -->
        <section class="features">
            <h2>Почему выбирают нас?</h2>
            <div class="features-grid">
                <div class="feature">
                    <div class="icon">🌟</div>
                    <h3>Просто и удобно</h3>
                    <p>Создание резюме — лёгкий и приятный процесс с нашим сервисом.</p>
                </div>
                <div class="feature">
                    <div class="icon">⏱️</div>
                    <h3>Экономия времени</h3>
                    <p>Сконцентрируйтесь на содержании, а мы позаботимся об остальном.</p>
                </div>
                <div class="feature">
                    <div class="icon">🎨</div>
                    <h3>Красивые шаблоны</h3>
                    <p>Подберите стиль, который идеально подходит для вашей профессии.</p>
                </div>
            </div>
        </section>

        <!-- Примеры -->
        <h2 class="slider-heading">Примеры наших шаблонов</h2>
        <div class="slider">
            <div>
                <img src="{{ asset('images/resume_1.png') }}" alt="Пример 1">
                <p class="slider-caption">Пример работы 1</p>
            </div>
            <div>
                <img src="{{ asset('images/resume_2.jpg') }}" alt="Пример 2">
                <p class="slider-caption">Пример работы 2</p>
            </div>
            <div>
                <img src="{{ asset('images/resume_3.jpg') }}" alt="Пример 3">
                <p class="slider-caption">Пример работы 3</p>
            </div>
            <!-- Добавьте больше элементов, если нужно -->
        </div>

        <!-- Призыв к действию -->
        <section class="cta">
            <h2>Готовы начать?</h2>
            <p>Создайте своё первое резюме прямо сейчас!</p>
            <a href="{{ route('register') }}" class="btn-cta">Попробовать бесплатно</a>
        </section>
    </div>
    {{-- @endsection --}}

    <footer class="footer">
        <div class="footer-container">
            <!-- Информация о компании -->
            <div class="footer-section about">
                <h3>О нас</h3>
                <p>Мы помогаем вам создавать профессиональные резюме быстро и легко. Наш сервис предлагает множество
                    шаблонов и инструментов для достижения лучших результатов.</p>
            </div>

            <!-- Ссылки -->
            <div class="footer-section links">
                <h3>Полезные ссылки</h3>
                <ul>
                    <li><a href="{{ route('home') }}">Главная</a></li>
                    <li><a href="{{ route('resumes.index') }}">Мои резюме</a></li>
                    <li><a href="{{ route('templates.index') }}">Шаблоны</a></li>
                    {{-- <li><a href="{{ route('/terms') }}">Условия использования</a></li>
                    <li><a href="{{ route('privacy') }}">Политика конфиденциальности</a></li> --}}
                </ul>
            </div>

            <!-- Социальные сети -->
            <div class="footer-section social">
                <h3>Мы в соцсетях</h3>
                <ul>
                    <li><a href="https://facebook.com" target="_blank"><i class="fab fa-facebook-f"></i> Facebook</a>
                    </li>
                    <li><a href="https://twitter.com" target="_blank"><i class="fab fa-twitter"></i> Twitter</a></li>
                    <li><a href="https://instagram.com" target="_blank"><i class="fab fa-instagram"></i> Instagram</a>
                    </li>
                    <li><a href="https://linkedin.com" target="_blank"><i class="fab fa-linkedin-in"></i> LinkedIn</a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Нижняя часть футера -->
        <div class="footer-bottom">
            <p>&copy; {{ date('Y') }} Генератор резюме. Все права защищены.</p>
        </div>
    </footer>
    <!-- Скрипты для Slick Slider -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.slider').slick({
                infinite: true, // Зацикливание
                slidesToShow: 1, // Количество показываемых слайдов
                slidesToScroll: 1, // Количество слайдов при прокрутке
                autoplay: true, // Автозапуск
                autoplaySpeed: 3000, // Скорость прокрутки
                arrows: true, // Стрелки навигации
                dots: true, // Точки навигации
                responsive: [{
                    breakpoint: 768, // Для устройств с шириной экрана до 768px
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }]
            });
        });
    </script>

</body>

</html>
