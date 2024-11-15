<?php

namespace App\Http\Controllers;

use App\Models\Template;
use Illuminate\Http\Request;

class TemplateController extends Controller
{

    // Конструктор для проверки авторизации
    // public function __construct()
    // {
    //     $this->middleware('auth');  // Только авторизованные пользователи могут работать с шаблонами
    // }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $templates = Template::all();  // Получаем все шаблоны
        return view('templates.index', compact('templates'));  // Возвращаем представление с шаблонами
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('templates.create');  // Возвращаем форму для создания шаблона
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Валидация данных
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'view_name' => 'required|string|max:255',
        ]);

        // Создание нового шаблона
        Template::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'view_name' => $request->input('view_name'),
        ]);

        return redirect()->route('templates.index')->with('success', 'Шаблон создан успешно!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Template $template)
    {
        return view('templates.edit', compact('template'));  // Возвращаем форму редактирования
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Template $template)
    {
        // Валидация данных
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'view_name' => 'required|string|max:255',
        ]);

        // Обновляем шаблон
        $template->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'view_name' => $request->input('view_name'),
        ]);

        return redirect()->route('templates.index')->with('success', 'Шаблон обновлен успешно!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Template $template)
    {
        // Удаляем шаблон
        $template->delete();

        return redirect()->route('templates.index')->with('success', 'Шаблон удален успешно!');
    }
}
