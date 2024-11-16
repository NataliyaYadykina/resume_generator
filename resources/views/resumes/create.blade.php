@extends('layouts.app')

@section('content')
    <div class="bg-light p-4 rounded shadow-sm mb-4">
        <h1 class="display-6">Создать новое резюме</h1>
    </div>

    <!-- Сообщения об ошибках -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Форма создания резюме -->
    <form action="{{ route('resumes.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <!-- Поле для загрузки фото -->
        <div class="mb-3">
            <label for="photo" class="form-label">Фото</label>
            <input type="file" class="form-control" id="photo" name="photo">
        </div>

        <!-- Поле для имени и фамилии -->
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="first_name" class="form-label">Имя</label>
                <input type="text" class="form-control" id="first_name" name="first_name" value="{{ old('first_name') }}"
                    required>
            </div>
            <div class="col-md-6">
                <label for="last_name" class="form-label">Фамилия</label>
                <input type="text" class="form-control" id="last_name" name="last_name" value="{{ old('last_name') }}"
                    required>
            </div>
        </div>

        <!-- Поле для вакансии -->
        <div class="mb-3">
            <label for="position" class="form-label">Вакансия</label>
            <input type="text" class="form-control" id="position" name="position" value="{{ old('position') }}"
                placeholder="Введите должность, на которую претендуете">
        </div>

        <!-- Поле для телефона и email -->
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="phone" class="form-label">Телефон</label>
                <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}">
            </div>
            <div class="col-md-6">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}"
                    required>
            </div>
            <div class="col-md-6">
                <label for="address" class="form-label">Адрес</label>
                <input type="text" class="form-control" id="address" name="address" value="{{ old('address') }}"
                    required>
            </div>
        </div>

        <!-- Поле для социальных ссылок -->
        <div class="mb-3">
            <label class="form-label">Социальные сети</label>
            <div id="social-links-container">
                <div class="input-group mb-2">
                    <input type="text" class="form-control" name="social_links[]" placeholder="Введите ссылку"
                        value="{{ old('social_links.0') }}">
                    <button type="button" class="btn btn-outline-secondary" id="addSocialLink">+</button>
                </div>
                @foreach (old('social_links', []) as $index => $link)
                    @if ($index > 0)
                        <div class="input-group mb-2">
                            <input type="text" class="form-control" name="social_links[]" value="{{ $link }}">
                            <button type="button" class="btn btn-outline-danger"
                                onclick="this.parentElement.remove()">-</button>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>

        <!-- Поле для опыта работы -->
        <div class="mb-3">
            <label class="form-label">Опыт работы</label>
            <div id="work-experience-container">
                <div class="input-group mb-2">
                    <input type="text" class="form-control" name="work_experience[]" placeholder="Введите опыт работы"
                        value="{{ old('work_experience.0') }}">
                    <button type="button" class="btn btn-outline-secondary" id="addWorkExperience">+</button>
                </div>
                @foreach (old('work_experience', []) as $index => $experience)
                    @if ($index > 0)
                        <div class="input-group mb-2">
                            <input type="text" class="form-control" name="work_experience[]"
                                value="{{ $experience }}">
                            <button type="button" class="btn btn-outline-danger"
                                onclick="this.parentElement.remove()">-</button>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>

        <!-- Поле для образования -->
        <div class="mb-3">
            <label class="form-label">Образование</label>
            <div id="education-container">
                <div class="input-group mb-2">
                    <input type="text" class="form-control" name="education[]" placeholder="Введите образование"
                        value="{{ old('education.0') }}">
                    <button type="button" class="btn btn-outline-secondary" id="addEducation">+</button>
                </div>
                @foreach (old('education', []) as $index => $education)
                    @if ($index > 0)
                        <div class="input-group mb-2">
                            <input type="text" class="form-control" name="education[]" value="{{ $education }}">
                            <button type="button" class="btn btn-outline-danger"
                                onclick="this.parentElement.remove()">-</button>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>

        <!-- Поле для выбора шаблона -->
        <div class="mb-3">
            <label for="template_id" class="form-label">Шаблон</label>
            <select class="form-select" id="template_id" name="template_id">
                <option value="">Выберите шаблон</option>
                @foreach ($templates as $template)
                    <option value="{{ $template->id }}" {{ old('template_id') == $template->id ? 'selected' : '' }}>
                        {{ $template->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Кнопка отправки -->
        <button type="submit" class="btn btn-primary">Создать резюме</button>
        <a href="{{ route('resumes.index') }}" class="btn btn-secondary">Отмена</a>
    </form>
@endsection

@section('scripts')
    <script src="{{ asset('js/resume_form.js') }}"></script>
@endsection
