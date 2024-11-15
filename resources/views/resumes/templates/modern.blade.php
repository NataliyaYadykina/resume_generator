@extends('layouts.app')

@section('additional_styles')
    @vite(['resources/css/resume-modern.css'])
@endsection

@section('content')
    <div class="bg-light p-4 rounded shadow-sm mb-4">
        <h1 class="display-6">Резюме</h1>
    </div>
    <div class="resume-container">
        <!-- Фото пользователя -->
        <div class="profile-photo">
            @if ($resume->photo)
                <img src="{{ asset('storage/' . $resume->photo) }}" alt="User Photo" class="img-fluid rounded-circle">
            @else
                <img src="https://via.placeholder.com/150" alt="No Photo" class="img-fluid rounded-circle">
            @endif
        </div>

        <!-- Основная информация -->
        <div class="resume-header">
            <h1>{{ $resume->first_name }} {{ $resume->last_name }}</h1>
            <p class="job-title">{{ $resume->position ?? 'Не указана должность' }}</p>
            <p class="contact-info">
                <strong>Телефон:</strong> {{ $resume->phone ?? 'Не указан' }} <br>
                <strong>Email:</strong> {{ $resume->email ?? 'Не указан' }} <br>
                <strong>Адрес:</strong> {{ $resume->address ?? 'Не указан' }} <br>
            </p>
        </div>

        <!-- Цель -->
        @if ($resume->objective)
            <div class="resume-section">
                <h3>Цель</h3>
                <p>{{ $resume->objective }}</p>
            </div>
        @endif

        <!-- Опыт работы -->
        @if ($resume->work_experience)
            <div class="resume-section">
                <h3>Опыт работы</h3>
                <ul>
                    @foreach ($resume->work_experience as $experience)
                        <li>{{ $experience }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Образование -->
        @if ($resume->education)
            <div class="resume-section">
                <h3>Образование</h3>
                <ul>
                    @foreach ($resume->education as $education)
                        <li>{{ $education }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Социальные сети -->
        @if ($resume->social_links)
            <div class="resume-section">
                <h3>Социальные сети</h3>
                <ul>
                    @foreach ($resume->social_links as $link)
                        <li><a href="{{ $link }}" target="_blank">{{ $link }}</a></li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
@endsection
