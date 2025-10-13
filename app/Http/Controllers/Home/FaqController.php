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
        $FaqData = Faq::all();
        return view('admin.home.faqs.index', compact('FaqData'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.home.faqs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $request->validate([
        'titles.*'     => 'required|string|max:255',
        'questions.*'  => 'required|string|max:500',
        'answers.*'    => 'required|string',
        ]);

        // Loop through multiple FAQ entries
        foreach ($request->titles as $index => $title) {
            Faq::create([
                'title'     => $title,
                'question'  => $request->questions[$index],
                'answer'    => $request->answers[$index],
            ]);
        }

        return redirect()
            ->route('admin.home.faqs.index')
            ->with('success', 'FAQs added successfully!');
    }
        
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
