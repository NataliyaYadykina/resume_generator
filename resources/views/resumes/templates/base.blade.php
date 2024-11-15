@extends('layouts.app')

@section('additional_styles')
    @vite(['resources/css/resume.css'])
@endsection

@section('content')
    <div class="resume-container">
        <div class="row justify-content-center">
            <!-- Фотография пользователя -->
            <div class="col-md-3 text-center mb-4 flex-center">
                @if ($resume->photo)
                    <img src="{{ asset('storage/' . $resume->photo) }}" alt="Photo"
                        class="img-fluid rounded-circle mb-3 shadow-lg">
                @else
                    <img src="https://via.placeholder.com/150" alt="No photo" class="img-fluid rounded-circle mb-3 shadow-lg">
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
@endsection
