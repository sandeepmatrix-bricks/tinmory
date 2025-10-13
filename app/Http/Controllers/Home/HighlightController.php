<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Home\HighlightBackground;
use App\Models\Home\HighlightItem;

class HighlightController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $highlightBackground = HighlightBackground::first();
        $highlightItems = HighlightItem::all();
        return view('admin.home.highlight.index', compact('highlightBackground','highlightItems'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.home.highlight.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        // Validate, making background_image nullable
       
        $request->validate([
            'background_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'icons.*' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:1024', // each icon file
            'titles.*' => 'required|string|max:255',
            'descriptions.*' => 'required|string',
        ]);
       
        // Handle background image if uploaded
        $background = HighlightBackground::first();

        if ($request->hasFile('background_image')) {
            $bgImage = $request->file('background_image');
            $bgImageName = 'background_' . time() . '.' . $bgImage->getClientOriginalExtension();
            $bgImage->move(public_path('uploads/highlights'), $bgImageName);

            if ($background) {
                // Delete old file if exists
                if ($background->background_image && file_exists(public_path('uploads/highlights/' . $background->background_image))) {
                    unlink(public_path('uploads/highlights/' . $background->background_image));
                }
                $background->background_image = $bgImageName;
                $background->save();
            } else {
                HighlightBackground::create(['background_image' => $bgImageName]);
            }
        }

        // Loop through all highlight items arrays and save them
        $icons = $request->file('icons');
        $titles = $request->input('titles');
        $descriptions = $request->input('descriptions');

        foreach ($icons as $index => $iconFile) {
            // Upload each icon file
            $iconName = 'icon_' . time() . '_' . $index . '.' . $iconFile->getClientOriginalExtension();
            $iconFile->move(public_path('uploads/highlights/icons'), $iconName);

                // Create each HighlightItem
                HighlightItem::create([
                    'icon' => $iconName,
                    'title' => $titles[$index],
                    'description' => $descriptions[$index],
                ]);
            }

            return redirect()->route('admin.home.highlights.index')->with('success', 'Highlight items and background updated successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $highlightBackground = HighlightBackground::first();
        $highlightItems = HighlightItem::where('id', $id)->get();
        return view('admin.home.highlight.edit', compact('highlightBackground','highlightItems'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
        $request->validate([
            'background_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:3072',
            'icons.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:1024',
            'titles.*' => 'nullable|string|max:255',
            'descriptions.*' => 'nullable|string',
        ]);

        $background = HighlightBackground::findOrFail($id);

        if ($request->hasFile('background_image')) {
            $bgImage = $request->file('background_image');
            $bgImageName = 'background_' . time() . '.' . $bgImage->getClientOriginalExtension();
            $bgImage->move(public_path('uploads/highlights'), $bgImageName);

            if ($background->background_image && file_exists(public_path('uploads/highlights/' . $background->background_image))) {
                unlink(public_path('uploads/highlights/' . $background->background_image));
            }

            $background->update(['background_image' => $bgImageName]);
        }

        $itemIds = $request->input('item_ids', []);
        $titles = $request->input('titles', []);
        $descriptions = $request->input('descriptions', []);
        $icons = $request->file('icons', []);

        foreach ($titles as $index => $title) {
            $description = $descriptions[$index] ?? null;
            $iconFile = $icons[$index] ?? null;

            if (isset($itemIds[$index])) {
                $item = HighlightItem::find($itemIds[$index]);
                if (!$item) continue;

                if ($iconFile instanceof \Illuminate\Http\UploadedFile) {
                    $iconName = 'icon_' . time() . '_' . $index . '.' . $iconFile->getClientOriginalExtension();
                    $iconFile->move(public_path('uploads/highlights/icons'), $iconName);

                    if ($item->icon && file_exists(public_path('uploads/highlights/icons/' . $item->icon))) {
                        unlink(public_path('uploads/highlights/icons/' . $item->icon));
                    }

                    $item->icon = $iconName;
                }

                $item->title = $title ?? $item->title;
                $item->description = $description ?? $item->description;
                $item->save();
            } else {
                if ($title && $description) {
                    $iconName = null;
                    if ($iconFile instanceof \Illuminate\Http\UploadedFile) {
                        $iconName = 'icon_' . time() . '_' . $index . '.' . $iconFile->getClientOriginalExtension();
                        $iconFile->move(public_path('uploads/highlights/icons'), $iconName);
                    }

                    HighlightItem::create([
                        'icon' => $iconName,
                        'title' => $title,
                        'description' => $description,
                    ]);
                }
            }
        }

        return redirect()->route('admin.home.highlights.index')
            ->with('success', 'Highlights updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) {
        // Find the highlight item
        $item = HighlightItem::find($id);

        if (!$item) {
            return redirect()->back()->with('error', 'Highlight item not found.');
        }

        // Delete icon file if exists
        $iconPath = public_path('uploads/highlight/icons' . $item->icon);
        if (file_exists($iconPath)) {
            unlink($iconPath);
        }

        // Delete the record
        $item->delete();

        return redirect()->route('admin.home.highlights.index')->with('success', 'Highlight item deleted successfully.');
    }

}
