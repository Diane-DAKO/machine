<?php
namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    /**
     * Affiche la liste des FAQ.
     */
    public function index()
    {
        $faqs = Faq::all();
        return view('admin.faqs.index', compact('faqs'));
    }

    /**
     * Affiche le formulaire de création.
     */
    public function create()
    {
        return view('partials.formfaqs');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'question' => 'required|string',
            'answer' => 'required|string',
            'active' => 'nullable|boolean',
        ]);

        Faq::create([
            'question' => $data['question'],
            'answer' => $data['answer'],
            'active' => $request->has('active'),
        ]);

        return redirect()->route('admin.faqs.index')->with('success', 'Question ajoutée avec succès.');
    }

    public function edit(Faq $faq)
    {
        return view('partials.formfaqs', compact('faq'));
    }
    /**
     * Met à jour une FAQ.
     */
    public function update(Request $request, Faq $faq)
    {
        $request->validate([
            'question' => 'required|string',
            'answer' => 'required|string',
        ]);

        $faq->update($request->only(['question', 'answer']));

        return redirect()->route('admin.faqs.index')->with('success', 'Question mise à jour.');
    }

    /**
     * Supprime une FAQ.
     */
    public function destroy(Faq $faq)
    {
        $faq->delete();
        return back()->with('success', 'Question supprimée.');
    }
}
