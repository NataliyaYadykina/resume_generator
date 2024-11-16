<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Резюме</title>
    <style>
        body {
            font-family: 'DejaVu Sans', sans-serif;
            margin: 0;
            padding: 0;
            font-size: 12px;
            line-height: 1.5;
            color: #333;
            background-color: #fff;
        }

        .container {
            display: table;
            width: 100%;
            max-width: 800px;
            margin: 0 auto;
            border: 1px solid #ccc;
        }

        .left-column {
            display: table-cell;
            width: 35%;
            background-color: #f5f5f5;
            padding: 15px;
            vertical-align: top;
            border-right: 1px solid #ddd;
            text-align: center;
            /* Центрирование */
        }

        .left-column img {
            display: inline-block;
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
            margin: 0 auto;
        }

        .right-column {
            display: table-cell;
            width: 65%;
            padding: 15px;
            vertical-align: top;
        }

        .section {
            margin-bottom: 20px;
        }

        .section-title {
            font-size: 14px;
            color: #2c3e50;
            margin-bottom: 10px;
            text-transform: uppercase;
            border-bottom: 1px solid #ccc;
            padding-bottom: 5px;
        }

        ul.list {
            margin: 0;
            padding: 0;
            list-style: none;
        }

        ul.list li {
            padding: 5px 10px;
            background: #f9f9f9;
            margin-bottom: 5px;
            border-left: 3px solid #3498db;
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Левая колонка -->
        <div class="left-column">
            @if ($resume->photo)
                <img src="data:image/jpeg;base64,{{ base64_encode(file_get_contents(storage_path('app/public/' . $resume->photo))) }}"
                    alt="Фото">
            @else
                <img src="https://via.placeholder.com/150" alt="Нет фото">
            @endif

            <div class="info">
                <h2>{{ $resume->first_name }} {{ $resume->last_name }}</h2>
                @if ($resume->position)
                    <p>{{ $resume->position }}</p>
                @endif
                <p><strong>Телефон:</strong> {{ $resume->phone ?? 'Не указан' }}</p>
                <p><strong>Email:</strong> {{ $resume->email ?? 'Не указан' }}</p>
                <p><strong>Адрес:</strong> {{ $resume->address ?? 'Не указан' }}</p>
            </div>
        </div>

        <!-- Правая колонка -->
        <div class="right-column">
            @if ($resume->objective)
                <div class="section">
                    <h4 class="section-title">Цель</h4>
                    <p>{{ $resume->objective }}</p>
                </div>
            @endif

            @if ($resume->social_links)
                <div class="section">
                    <h4 class="section-title">Социальные сети</h4>
                    <ul class="list">
                        @foreach ($resume->social_links as $link)
                            <li><a href="{{ $link }}" target="_blank">{{ $link }}</a></li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if ($resume->work_experience)
                <div class="section">
                    <h4 class="section-title">Опыт работы</h4>
                    <ul class="list">
                        @foreach ($resume->work_experience as $experience)
                            <li>{{ $experience }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if ($resume->education)
                <div class="section">
                    <h4 class="section-title">Образование</h4>
                    <ul class="list">
                        @foreach ($resume->education as $education)
                            <li>{{ $education }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>
</body>

</html>
