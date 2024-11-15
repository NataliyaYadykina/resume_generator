<?php

namespace App\Http\Controllers;

use App\Models\Resume;
use App\Models\Template;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ResumeController extends Controller
{
    use AuthorizesRequests;

    // public function __construct()
    // {
    //     $this->authorizeResource(Resume::class, 'resume');
    // }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Получаем резюме текущего пользователя
        $resumes = Auth::user()->resumes;
        return view('resumes.index', compact('resumes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Получаем доступные шаблоны
        $templates = Template::all();
        return view('resumes.create', compact('templates'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Валидация данных
        $validatedData = $this->validateResumeData($request);

        // Обработка загрузки фото
        $validatedData['photo'] = $this->handlePhotoUpload($request);

        // Создаем новое резюме для текущего пользователя
        Auth::user()->resumes()->create($validatedData);

        return redirect()->route('resumes.index')->with('success', 'Резюме создано успешно!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Resume $resume)
    {
        $templateView = $resume->template->view_name ?? 'default';

        return view("resumes.templates.{$templateView}", ['resume' => $resume]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Resume $resume)
    {
        // Проверка прав доступа
        // $this->authorize('update', $resume);

        $templates = Template::all();
        return view('resumes.edit', compact('resume', 'templates'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Resume $resume)
    {
        // Валидация данных
        $validatedData = $this->validateResumeData($request);

        // Обработка загрузки фото, если загружено новое
        $photoPath = $this->handlePhotoUpload($request);
        if ($photoPath) {
            $validatedData['photo'] = $photoPath;
        }

        // Обновление резюме
        $resume->update($validatedData);

        return redirect()->route('resumes.index')->with('success', 'Резюме обновлено успешно!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Resume $resume)
    {

        // Удаление резюме
        $resume->delete();

        return redirect()->route('resumes.index')->with('success', 'Резюме удалено успешно!');
    }

    private function validateResumeData(Request $request)
    {
        return $request->validate([
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'position' => 'nullable|string|max:255',
            'phone' => 'required|string|max:15',
            'email' => 'required|email|max:255',
            'address' => 'nullable|string|max:255',
            'social_links' => 'nullable|array',
            'objective' => 'nullable|string',
            'work_experience' => 'nullable|array',
            'education' => 'nullable|array',
            'template_id' => 'nullable|exists:templates,id'
        ]);
    }

    private function handlePhotoUpload(Request $request)
    {
        if ($request->hasFile('photo')) {
            return $request->file('photo')->store('photos', 'public');
        }
        return null;
    }
}
