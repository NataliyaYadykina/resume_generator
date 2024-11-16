<?php

namespace App\Http\Controllers;

use App\Models\Resume;
use App\Models\Template;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Barryvdh\DomPDF\PDF;

class ResumeController extends Controller
{
    use AuthorizesRequests;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $resumes = Auth::user()->resumes;
        return view('resumes.index', compact('resumes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $templates = Template::all();
        return view('resumes.create', compact('templates'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $this->validateResumeData($request);

        $validatedData['photo'] = $this->handlePhotoUpload($request);

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
        $templates = Template::all();
        return view('resumes.edit', compact('resume', 'templates'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Resume $resume)
    {
        $validatedData = $this->validateResumeData($request);

        $photoPath = $this->handlePhotoUpload($request);
        if ($photoPath) {
            $validatedData['photo'] = $photoPath;
        }

        $resume->update($validatedData);

        return redirect()->route('resumes.index')->with('success', 'Резюме обновлено успешно!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Resume $resume)
    {

        $resume->delete();

        return redirect()->route('resumes.index')->with('success', 'Резюме удалено успешно!');
    }

    private function validateResumeData(Request $request)
    {
        return $request->validate([
            'photo' => 'nullable|image|mimes:jpeg,jpg|max:2048',
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

    public function downloadPdf($id)
    {
        $resume = Resume::where('id', $id)
            ->where('user_id', auth()->id()) // Проверка на принадлежность текущему пользователю
            ->firstOrFail();
        $templateView = $resume->template->view_name ?? 'default';

        $pdf = app(PDF::class);
        $pdf->loadView("resumes.templates.{$templateView}", compact('resume'));
        return $pdf->stream("resume_{$resume->id}.pdf");
    }
}
