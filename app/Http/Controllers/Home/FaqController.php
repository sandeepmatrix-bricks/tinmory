<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Home\Faq;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $title = Faq::where('type', 'title')->select('id','title')->first();
        $qa = Faq::where('type', 'qa')->select('id','question', 'answer')->get();

        return view('admin.home.faqs.index', compact('title', 'qa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $type = null;
        if($request->has('type')) {
            $type = $request->type;
        }
        return view('admin.home.faqs.create', [
            'type' => $type ?? null,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->has('titles')) {
            $request->validate([
                'titles' => 'required|string|max:255',
            ]);

            Faq::create([
                'title' => $request->input('titles'),
                'type'  => 'title',
            ]);

        } elseif ($request->has('questions') && $request->has('answers')) {
            $request->validate([
                'questions.*' => 'required|string|max:500',
                'answers.*'   => 'required|string',
            ]);

            $questions = $request->input('questions');
            $answers   = $request->input('answers');

            foreach ($questions as $index => $question) {
                Faq::create([
                    'question' => $question,
                    'answer'   => $answers[$index] ?? null,
                    'type'     => 'qa',
                ]);
            }
        } else {
            return redirect()
                ->back()
                ->with('error', 'Invalid data submitted!');
        }

        return redirect()
            ->route('admin.home.faqs.index')
            ->with('success', 'FAQ(s) added successfully!');
    }

        
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id,Request $request)
    {
        $type = $request->get('type');

        if ($type === 'title') {
            $faq = Faq::where('id', $id)->where('type', 'title')->firstOrFail();
            return view('admin.home.faqs.edit', [
                'type' => 'title',
                'faq'  => $faq,
            ]);
        }

        // Default to QA type
        $faq = Faq::where('id', $id)->where('type', 'qa')->firstOrFail();
        return view('admin.home.faqs.edit', [
            'type' => 'qa',
            'faq'  => $faq,
        ]);
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $faq = Faq::findOrFail($id);

        if ($faq->type === 'title') {
            $request->validate([
                'titles' => 'required|string|max:255',
            ]);

            $faq->update([
                'title' => $request->input('titles'),
            ]);

            $message = 'Title updated successfully!';
        } elseif ($faq->type === 'qa') {
            $request->validate([
                'question' => 'required|string|max:500',
                'answer'   => 'required|string',
            ]);

            $faq->update([
                'question' => $request->input('question'),
                'answer'   => $request->input('answer'),
            ]);

            $message = 'FAQ updated successfully!';
        } else {
            return redirect()
                ->back()
                ->with('error', 'Invalid FAQ type.');
        }

        return redirect()
            ->route('admin.home.faqs.index')
            ->with('success', $message);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $faq = Faq::find($id);
         if (!$faq) {
            return redirect()->back()->with('error', 'Carousel item not found.');
        }

        $faq->delete();

        return redirect()->route('admin.home.faqs.index')
                        ->with('success', 'Faqs item deleted successfully.');

    }
}
