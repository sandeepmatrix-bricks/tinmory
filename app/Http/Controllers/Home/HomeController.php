<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Home\Banners;
use App\Models\Home\HomeDescriptions;
use DB;

class HomeController extends Controller
{
    
    public function bannerIndex() {

        $banners =  Banners::all();
        return view('admin.home.banner.index',compact('banners')) ;
    }

    public function bannerStoreForm() {
            return view('admin.home.banner.banner-form');
    }

    public function bannerStore(Request $request) {

        info(__FUNCTION__);
        $request->validate([
        'banner_image' => 'required|image|mimes:jpeg,png,jpg,webp|max:3072',
        'banner_description' => 'required|string|max:255',
        ]);
      
        $filename = null;
        if ($request->has('old_image_name')) {
            $oldImagePath = public_path('uploads/banners/' . $request->old_image_name);

            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
        }

        if ($request->hasFile('banner_image')) {
            $file = $request->file('banner_image');
            $filename = time() . '_' . preg_replace('/[^a-zA-Z0-9_.]/', '', $file->getClientOriginalName());

            $uploadPath = public_path('uploads/banners');
            if (!file_exists($uploadPath)) {
                mkdir($uploadPath, 0755, true);
            }

            $file->move($uploadPath, $filename);
        }

        $data = [
            'banner_description' => $request->banner_description,
        ];

        if ($filename) {
            $data['banner_image'] = $filename;
        }

        Banners::updateOrCreate(
            ['id' => $request->input('banner_id')],
            $data
        );

        return redirect()->route('admin.home.banners.index')->with('message', 'Banner saved successfully.');
    }


    public function bannerEdit($id) {
        $banner = Banners::findorFail($id);
        $isEdit = true;
        return view('admin.home.banner.banner-form',compact('id','isEdit','banner'));
    }

    public function bannerDestroy($id) {
        $variant = Banners::find($id)?->delete();
        return redirect()->back();
    }


    public function descIndex() {
        $desc =  HomeDescriptions::all();
        return view('admin.home.desc.index',compact('desc')) ;
    }

    public function descStoreForm() {
            return view('admin.home.desc.desc');
    }

    public function descStore(Request $request) {
        info(__METHOD__);

        // Validation rules
        $rules = [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'year' => 'required|string|max:10',
            'year_description' => 'required|string|max:255',
            'video_description_text' => 'required|string|max:255',
        ];

        // If creating, require video; if editing, make it optional
        if (!$request->has('desc_id')) {
            $rules['description_video'] = 'required|file|mimes:mp4,mov,avi,mkv|max:20480'; // 20MB
        } else {
            $rules['description_video'] = 'nullable|file|mimes:mp4,mov,avi,mkv|max:20480';
        }

        $request->validate($rules);

        // Handle old video deletion if a new one is uploaded
        $videoFilename = null;
        if ($request->hasFile('description_video')) {
            // Delete old video if exists
            if ($request->filled('old_name')) {
                $oldVideoPath = public_path('uploads/banners/' . $request->old_name);
                if (file_exists($oldVideoPath)) {
                    unlink($oldVideoPath);
                }
            }

            $file = $request->file('description_video');
            $videoFilename = time() . '_' . preg_replace('/[^a-zA-Z0-9_.]/', '', $file->getClientOriginalName());

            $uploadPath = public_path('uploads/banners');
            if (!file_exists($uploadPath)) {
                mkdir($uploadPath, 0755, true);
            }

            $file->move($uploadPath, $videoFilename);
        }

        // Prepare data for update/create
        $data = [
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'year' => $request->input('year'),
            'year_description' => $request->input('year_description'),
            'video_description_text' => $request->input('video_description_text'),
        ];

        if ($videoFilename) {
            $data['description_video'] = $videoFilename;
        }

        // Add or update based on desc_id
        HomeDescriptions::updateOrCreate(
            ['id' => $request->input('desc_id')],
            $data
        );

        return redirect()->route('admin.home.desc.index')->with('message', 'Description saved successfully.');
    }

    public function descEdit($id) {
        $desc = HomeDescriptions::findorFail($id);
        $isEdit = true;
        return view('admin.home.desc.desc',compact('id','isEdit','desc'));
    }

    public function descDestroy($id) {
        $desc = HomeDescriptions::find($id);

        if (!$desc) {
            return redirect()->back()->with('error', 'Description not found.');
        }

        // Optionally delete the video file from storage if it exists
        if ($desc->description_video) {
            $videoPath = public_path('uploads/banners/' . $desc->description_video);
            if (file_exists($videoPath)) {
                @unlink($videoPath);
            }
        }

        $desc->delete();

        return redirect()->back()->with('message', 'Description deleted successfully.');
    }

}
