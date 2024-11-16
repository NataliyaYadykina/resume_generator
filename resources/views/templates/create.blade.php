@extends('layouts.app')

@section('content')
    <div class="bg-light p-4 rounded shadow-sm mb-4">
        <h1 class="display-6">Создать новый шаблон</h1>
    </div>

    <!-- Ошибки валидации -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Форма создания шаблона -->
    <form action="{{ route('templates.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Название шаблона</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                value="{{ old('name') }}" required>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Описание</label>
            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                rows="4">{{ old('description') }}</textarea>
            @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="view_name" class="form-label">Название представления шаблона (доступны: base, default,
                modern)</label>
            <input type="text" class="form-control @error('view_name') is-invalid @enderror" id="view_name"
                name="view_name" value="{{ old('view_name') }}" required>
            @error('view_name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Создать</button>
        <a href="{{ route('templates.index') }}" class="btn btn-secondary ms-2">Отмена</a>
    </form>
@endsection
