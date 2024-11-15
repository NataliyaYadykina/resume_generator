@extends('layouts.app')

@section('content')
    <div class="bg-light p-4 rounded shadow-sm mb-4">
        <h1 class="display-6">Редактировать резюме</h1>
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

    <!-- Форма редактирования резюме -->
    <form action="{{ route('resumes.update', $resume->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Поле для загрузки фото -->
        <div class="mb-3">
            <label for="photo" class="form-label">Фото</label>
            <input type="file" class="form-control" id="photo" name="photo">
            @if ($resume->photo)
                <img src="{{ asset('storage/' . $resume->photo) }}" alt="Фото резюме" class="img-thumbnail mt-2"
                    style="max-width: 150px;">
            @endif
        </div>

        <!-- Поле для имени и фамилии -->
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="first_name" class="form-label">Имя</label>
                <input type="text" class="form-control" id="first_name" name="first_name"
                    value="{{ old('first_name', $resume->first_name) }}" required>
            </div>
            <div class="col-md-6">
                <label for="last_name" class="form-label">Фамилия</label>
                <input type="text" class="form-control" id="last_name" name="last_name"
                    value="{{ old('last_name', $resume->last_name) }}" required>
            </div>
        </div>

        <!-- Поле для вакансии -->
        <div class="mb-3">
            <label for="position" class="form-label">Вакансия</label>
            <input type="text" class="form-control" id="position" name="position"
                value="{{ old('position', $resume->position) }}" placeholder="Введите должность, на которую претендуете">
        </div>

        <!-- Поле для телефона и email -->
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="phone" class="form-label">Телефон</label>
                <input type="text" class="form-control" id="phone" name="phone"
                    value="{{ old('phone', $resume->phone) }}">
            </div>
            <div class="col-md-6">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email"
                    value="{{ old('email', $resume->email) }}" required>
            </div>
        </div>

        <!-- Поле для социальных ссылок -->
        <div class="mb-3">
            <label class="form-label">Социальные сети</label>
            <div id="social-links-container">
                @foreach (old('social_links', $resume->social_links ?? []) as $index => $link)
                    <div class="input-group mb-2">
                        <input type="text" class="form-control" name="social_links[]" value="{{ $link }}"
                            placeholder="Введите ссылку">
                        <button type="button" class="btn btn-outline-danger"
                            onclick="this.parentElement.remove()">-</button>
                    </div>
                @endforeach
                <button type="button" class="btn btn-outline-secondary" id="addSocialLink">Добавить ссылку</button>
            </div>
        </div>

        <!-- Поле для опыта работы -->
        <div class="mb-3">
            <label class="form-label">Опыт работы</label>
            <div id="work-experience-container">
                @foreach (old('work_experience', $resume->work_experience ?? []) as $index => $experience)
                    <div class="input-group mb-2">
                        <input type="text" class="form-control" name="work_experience[]" value="{{ $experience }}"
                            placeholder="Введите опыт работы">
                        <button type="button" class="btn btn-outline-danger"
                            onclick="this.parentElement.remove()">-</button>
                    </div>
                @endforeach
                <button type="button" class="btn btn-outline-secondary" id="addWorkExperience">Добавить опыт</button>
            </div>
        </div>

        <!-- Поле для образования -->
        <div class="mb-3">
            <label class="form-label">Образование</label>
            <div id="education-container">
                @foreach (old('education', $resume->education ?? []) as $index => $education)
                    <div class="input-group mb-2">
                        <input type="text" class="form-control" name="education[]" value="{{ $education }}"
                            placeholder="Введите образование">
                        <button type="button" class="btn btn-outline-danger"
                            onclick="this.parentElement.remove()">-</button>
                    </div>
                @endforeach
                <button type="button" class="btn btn-outline-secondary" id="addEducation">Добавить образование</button>
            </div>
        </div>

        <!-- Поле для выбора шаблона -->
        <div class="mb-3">
            <label for="template_id" class="form-label">Шаблон</label>
            <select class="form-select" id="template_id" name="template_id">
                <option value="">Выберите шаблон</option>
                @foreach ($templates as $template)
                    <option value="{{ $template->id }}"
                        {{ old('template_id', $resume->template_id) == $template->id ? 'selected' : '' }}>
                        {{ $template->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Кнопка отправки -->
        <button type="submit" class="btn btn-primary">Сохранить изменения</button>
        <a href="{{ route('resumes.index') }}" class="btn btn-secondary">Отмена</a>
    </form>
@endsection

@section('scripts')
    <script src="{{ asset('js/resume_form.js') }}"></script>
@endsection
