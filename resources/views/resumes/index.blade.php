@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="bg-light p-4 rounded shadow-sm mb-4">
                <h1 class="display-6">Ваши Резюме</h1>
            </div>

            <!-- Сообщение об успешных операциях -->
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Кнопка для создания нового резюме -->
            <div class="mb-3">
                <a href="{{ route('resumes.create') }}" class="btn btn-primary">Создать новое резюме</a>
            </div>

            <!-- Таблица резюме -->
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>Имя</th>
                            <th>Фамилия</th>
                            <th>Email</th>
                            <th>Телефон</th>
                            <th>Должность</th>
                            <th>Шаблон</th>
                            <th>Действия</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($resumes as $resume)
                            <tr>
                                <td>{{ $resume->first_name }}</td>
                                <td>{{ $resume->last_name }}</td>
                                <td>{{ $resume->email }}</td>
                                <td>{{ $resume->phone }}</td>
                                <td>{{ $resume->position }}</td>
                                <td>{{ $resume->template ? $resume->template->name : 'По умолчанию' }}</td>
                                <td>
                                    <a href="{{ route('resumes.download', $resume->id) }}" class="btn btn-info btn-sm"
                                        target="_blank">Просмотр</a>
                                    <a href="{{ route('resumes.edit', $resume->id) }}"
                                        class="btn btn-warning btn-sm">Редактировать</a>

                                    <!-- Форма удаления -->
                                    <form action="{{ route('resumes.destroy', $resume->id) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Вы уверены, что хотите удалить это резюме?')">Удалить</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">У вас пока нет резюме.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const alert = document.querySelector('.alert-success');
            if (alert) {
                setTimeout(() => {
                    alert.style.transition = 'opacity 0.5s ease';
                    alert.style.opacity = '0';
                    setTimeout(() => alert.remove(), 500);
                }, 3000);
            }
        });
    </script>
@endsection
