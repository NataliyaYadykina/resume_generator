<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Резюме</title>
    <style>
        /* Базовые стили */
        body {
            font-family: 'DejaVu Sans', sans-serif;
            margin: 0;
            padding: 0;
            font-size: 12px;
            line-height: 1.5;
            color: #333;
        }

        .container {
            width: 100%;
            max-width: 750px;
            margin: 0 auto;
            padding: 20px;
        }

        /* Заголовки */
        h1,
        h2,
        h3,
        h4 {
            color: #2c3e50;
            margin-bottom: 8px;
        }

        h1 {
            font-size: 24px;
            text-align: center;
        }

        h2 {
            font-size: 18px;
            margin-bottom: 10px;
            border-bottom: 1px solid #ccc;
            padding-bottom: 5px;
        }

        /* Основная информация */
        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 10px;
        }

        .info p {
            margin: 0;
            margin-bottom: 5px;
        }

        /* Разделы */
        .section {
            margin-bottom: 20px;
        }

        .section-title {
            font-size: 16px;
            color: #2c3e50;
            margin-bottom: 10px;
        }

        .list {
            margin: 0;
            padding: 0;
            list-style: none;
        }

        .list-item {
            margin-bottom: 5px;
            padding: 5px 10px;
            border-left: 3px solid #3498db;
            background: #f9f9f9;
        }

        .list-item p {
            margin: 0;
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Заголовок с фото -->
        <div class="header">
            @if ($resume->photo)
                <img src="data:image/jpeg;base64,{{ base64_encode(file_get_contents(storage_path('app/public/' . $resume->photo))) }}"
                    alt="Фото">
            @else
                <img src="https://via.placeholder.com/150" alt="Нет фото">
            @endif
            <h1>{{ $resume->first_name }} {{ $resume->last_name }}</h1>
            @if ($resume->position)
                <p><strong>Позиция:</strong> {{ $resume->position }}</p>
            @endif
        </div>

        <!-- Основная информация -->
        <div class="section info">
            <h2>Контактная информация</h2>
            <p><strong>Телефон:</strong> {{ $resume->phone ?? 'Не указан' }}</p>
            <p><strong>Email:</strong> {{ $resume->email ?? 'Не указан' }}</p>
            <p><strong>Адрес:</strong> {{ $resume->address ?? 'Не указан' }}</p>
        </div>

        <!-- Цель -->
        @if ($resume->objective)
            <div class="section">
                <h2>Цель</h2>
                <p>{{ $resume->objective }}</p>
            </div>
        @endif

        <!-- Социальные сети -->
        @if ($resume->social_links)
            <div class="section">
                <h2>Социальные сети</h2>
                <ul class="list">
                    @foreach ($resume->social_links as $link)
                        <li class="list-item"><a href="{{ $link }}" target="_blank">{{ $link }}</a></li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Опыт работы -->
        @if ($resume->work_experience)
            <div class="section">
                <h2>Опыт работы</h2>
                <ul class="list">
                    @foreach ($resume->work_experience as $experience)
                        <li class="list-item">{{ $experience }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Образование -->
        @if ($resume->education)
            <div class="section">
                <h2>Образование</h2>
                <ul class="list">
                    @foreach ($resume->education as $education)
                        <li class="list-item">{{ $education }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
</body>

</html>
