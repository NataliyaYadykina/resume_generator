<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Резюме</title>
    <style>
        @font-face {
            font-family: 'DejaVu Sans';
            font-style: normal;
            font-weight: normal;
            src: url('{{ asset('fonts/DejaVuSans.ttf') }}') format('truetype');
        }

        body {
            font-family: 'DejaVu Sans', sans-serif;
            margin: 0;
            padding: 0;
            color: #333;
            line-height: 1.6;
        }

        .resume-container {
            max-width: 800px;
            margin: 0 auto;
            padding: 30px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        h1,
        h2,
        h3,
        h4 {
            color: #2c3e50;
            margin-bottom: 10px;
        }

        h2.resume-name {
            font-size: 2.5em;
            margin-bottom: 5px;
        }

        .lead {
            font-size: 1.2em;
            color: #7f8c8d;
        }

        .resume-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .resume-header .photo {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid #ecf0f1;
        }

        .resume-header .info {
            flex-grow: 1;
            margin-left: 20px;
        }

        .resume-header .info p {
            margin: 5px 0;
        }

        .resume-header .info .lead {
            margin-top: 5px;
        }

        .section-title {
            background-color: #3498db;
            color: white;
            padding: 10px;
            font-size: 1.2em;
            margin-bottom: 10px;
            border-radius: 5px;
        }

        .list-unstyled {
            padding-left: 0;
            list-style: none;
        }

        .work-item,
        .education-item {
            background-color: #ecf0f1;
            padding: 10px;
            margin-bottom: 5px;
            border-radius: 8px;
            transition: background-color 0.3s ease;
        }

        .work-item:hover,
        .education-item:hover {
            background-color: #e1e8f0;
        }

        .social-links a {
            color: #3498db;
            text-decoration: none;
            font-weight: bold;
            margin-right: 10px;
        }

        .social-links a:hover {
            text-decoration: underline;
        }

        .btn-download {
            display: inline-block;
            margin-bottom: 20px;
            background-color: #2ecc71;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            font-weight: bold;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .btn-download:hover {
            background-color: #27ae60;
        }

        .flex-center {
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>

<body>
    <div class="resume-container">
        <div class="row justify-content-center">
            <!-- Фотография пользователя -->
            <div class="col-md-3 text-center mb-4 flex-center">
                @if ($resume->photo)
                    <img src="data:image/jpeg;base64,{{ base64_encode(file_get_contents(storage_path('app/public/' . $resume->photo))) }}"
                        alt="Image">
                @else
                    <img src="https://via.placeholder.com/150" alt="No photo"
                        class="img-fluid rounded-circle mb-3 shadow-lg">
                @endif
            </div>

            <!-- Основная информация -->
            <div class="col-md-9">
                <div class="bg-light p-4 rounded shadow-sm mb-4">
                    <h2 class="resume-name">{{ $resume->first_name }} {{ $resume->last_name }}</h2>
                    @if ($resume->position)
                        <p class="lead text-muted">{{ $resume->position }}</p>
                    @endif
                    <p>
                        <strong>Телефон:</strong> {{ $resume->phone ?? 'Не указан' }} <br>
                        <strong>Email:</strong> {{ $resume->email ?? 'Не указан' }} <br>
                        <strong>Адрес:</strong> {{ $resume->address ?? 'Не указан' }} <br>
                    </p>
                    <p>
                        @if ($resume->objective)
                            <strong>Цель:</strong> {{ $resume->objective }}
                        @endif
                    </p>
                </div>
            </div>
        </div>

        <!-- Социальные сети -->
        @if ($resume->social_links)
            <div class="social-links mt-4">
                <h4>Социальные сети</h4>
                <ul class="list-unstyled">
                    @foreach ($resume->social_links as $link)
                        <li>
                            <a href="{{ $link }}" target="_blank" class="social-link">{{ $link }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Опыт работы -->
        @if ($resume->work_experience)
            <div class="work-experience mt-4">
                <h4>Опыт работы</h4>
                <ul class="list-unstyled">
                    @foreach ($resume->work_experience as $experience)
                        <li class="work-item">{{ $experience }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Образование -->
        @if ($resume->education)
            <div class="education mt-4">
                <h4>Образование</h4>
                <ul class="list-unstyled">
                    @foreach ($resume->education as $education)
                        <li class="education-item">{{ $education }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
</body>

</html>
