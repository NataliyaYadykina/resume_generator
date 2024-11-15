@extends('layouts.app')

@section('content')
    <div class="bg-light p-4 rounded shadow-sm mb-4">
        <h1 class="display-6">Шаблоны резюме</h1>
    </div>
    <a href="{{ route('templates.create') }}" class="btn btn-primary">Добавить новый шаблон</a>
    <table class="table mt-4">
        <thead>
            <tr>
                <th>Название</th>
                <th>Описание</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($templates as $template)
                <tr>
                    <td>{{ $template->name }}</td>
                    <td>{{ $template->description }}</td>
                    <td>
                        <a href="{{ route('templates.edit', $template->id) }}" class="btn btn-warning">Редактировать</a>
                        <form action="{{ route('templates.destroy', $template->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Удалить</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center">Шаблонов пока нет.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
