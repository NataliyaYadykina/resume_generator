@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h2>Резюме: {{ $resume->first_name }} {{ $resume->last_name }}</h2>

        <!-- Кнопки для навигации -->
        <div class="d-flex justify-content-between mb-4">
            <a href="{{ route('resumes.index') }}" class="btn btn-secondary">Назад</a>
            <a href="{{ route('resumes.edit', $resume->id) }}" class="btn btn-primary">Редактировать</a>
        </div>

        <!-- Информация о резюме -->
        <div class="row mb-3">
            <div class="col-md-6">
                <h4>Личная информация</h4>
                <p><strong>Имя:</strong> {{ $resume->first_name }}</p>
                <p><strong>Фамилия:</strong> {{ $resume->last_name }}</p>
                <p><strong>Телефон:</strong> {{ $resume->phone }}</p>
                <p><strong>Email:</strong> {{ $resume->email }}</p>
                <p><strong>Адрес:</strong> {{ $resume->address }}</p>
            </div>

            <div class="col-md-6">
                <h4>Шаблон</h4>
                @if ($resume->template)
                    <p><strong>Шаблон:</strong> {{ $resume->template->name }}</p>
                @else
                    <p>Шаблон не выбран.</p>
                @endif
            </div>
        </div>

        <!-- Социальные ссылки -->
        @if ($resume->social_links && count($resume->social_links) > 0)
            <h4>Социальные ссылки</h4>
            <ul>
                @foreach ($resume->social_links as $link)
                    <li><a href="{{ $link }}" target="_blank">{{ $link }}</a></li>
                @endforeach
            </ul>
        @else
            <p>Социальные ссылки не указаны.</p>
        @endif

        <!-- Опыт работы -->
        @if ($resume->work_experience && count($resume->work_experience) > 0)
            <h4>Опыт работы</h4>
            <ul>
                @foreach ($resume->work_experience as $experience)
                    <li>{{ $experience }}</li>
                @endforeach
            </ul>
        @else
            <p>Опыт работы не указан.</p>
        @endif

        <!-- Образование -->
        @if ($resume->education && count($resume->education) > 0)
            <h4>Образование</h4>
            <ul>
                @foreach ($resume->education as $education)
                    <li>{{ $education }}</li>
                @endforeach
            </ul>
        @else
            <p>Образование не указано.</p>
        @endif
    </div>
@endsection
