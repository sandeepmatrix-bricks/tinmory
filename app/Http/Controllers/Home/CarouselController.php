<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Home\Carousel;
use Illuminate\Support\Facades\File;

class CarouselController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $carousels = Carousel::all();
        return view('admin.home.carousel.index', compact('carousels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view('admin.home.carousel.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'images.*' => 'required|image|mimes:jpg,jpeg,png,webp|max:3072',
            'titles.*' => 'required|string|max:255',
            'descriptions.*' => 'required|string',
        ]);
        

      
        $images = $request->file('images');
        $titles = $request->input('titles');
        $descriptions = $request->input('descriptions');
        
        if (count($titles) !== count($descriptions) || count($titles) !== count($images)) {
            return back()->with('error', 'Please fill all carousel fields correctly.');
        }

        $uploadPath = public_path('uploads/carousels');
        if (!File::exists($uploadPath)) {
            File::makeDirectory($uploadPath, 0777, true, true);
        }

        foreach ($titles as $index => $title) {
            $imageName = null;

            if (isset($images[$index]) && $images[$index]->isValid()) {
                $file = $images[$index];
                $imageName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                $file->move($uploadPath, $imageName);
            }

            Carousel::create([
                'image' => $imageName,
                'title' => $title,
                'description' => $descriptions[$index],
            ]);
        }

        return redirect()->route('admin.home.carousels.index')
                        ->with('success', 'Carousel items added successfully!');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
        $data = Carousel::findOrFail($id);
        return view('admin.home.carousel.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $carousel = Carousel::findOrFail($id);

        if ($request->hasFile('image')) {
            $uploadPath = public_path('uploads/carousels');
            if (!File::exists($uploadPath)) {
                File::makeDirectory($uploadPath, 0777, true, true);
            }

            if ($carousel->image && File::exists($uploadPath . '/' . $carousel->image)) {
                File::delete($uploadPath . '/' . $carousel->image);
            }

            $file = $request->file('image');
            $imageName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move($uploadPath, $imageName);

            $carousel->image = $imageName;
        }

        $carousel->title = $request->title;
        $carousel->description = $request->description;
        $carousel->save();

        return redirect()->route('admin.home.carousels.index')
                        ->with('success', 'Carousel item updated successfully!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find the carousel item
        $carousel = Carousel::find($id);

        if (!$carousel) {
            return redirect()->back()->with('error', 'Carousel item not found.');
        }

        // Delete image file if it exists
        if($carousel->image) {
            $imagePath = public_path('uploads/carousels/' . $carousel->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
       
        // Delete the record
        $carousel->delete();

        return redirect()->route('admin.home.carousels.index')
                        ->with('success', 'Carousel item deleted successfully.');
    }

}
