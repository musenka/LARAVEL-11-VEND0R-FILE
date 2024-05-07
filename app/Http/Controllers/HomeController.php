<?php

namespace App\Http\Controllers;

use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\MediaResource;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    

    public function incrementViews(Media $media)
    {
        // Increment the views count
        $media->increment('views');
    
        // Return a response indicating success
        return response()->json(['success' => true]);
    }
    
    public function index(Request $request)
    {
        $files = Media::latest();
        
        if ($request->category) {
            $files->where('category', $request->category);
        }
        
        $files = $files->paginate();
    
        return view('home', [
            'videos' => $files,
        ]);
    }
    public function logout(Request $request)
    {
        Auth::logout();

        // Redirect to the login page after logout
        return redirect()->route('login');
    }

    // Endpoint to upload media files
    public function store(Request $request)
    {
        $name = $request->name;
        if (!$request->hasFile('videos')) {
            return redirect()->back()->with('error', 'No files were uploaded.');
        }
        
        foreach($request->file('videos') as $f)
        {
            $name_ = $name ?: str_replace('.mp4', '', $f->getClientOriginalName());
            
            // Get the original file name with its extension
            $originalFileName = $f->getClientOriginalName();
            
            // Generate a unique file name to avoid conflicts
            $fileName = $name_ . '_' . time() . '.' . $f->getClientOriginalExtension();
            
            // Move the file to the public directory
            $f->move(public_path('videos'), $fileName);
            
            // Save the file path in the database
            Media::create([
                'name' => $name_,
                'path' => 'videos/' . $fileName, // Store the relative path
                'category' => $request->category ?: 'General',
            ]);
        }
        return redirect()->route('home')->with('success', 'Files uploaded successfully');
    

 
         return response()->json(['message' => 'Files uploaded successfully']);
    }


    // Endpoint to delete a media file
    public function delete(Media $media) 
    {

        Storage::disk('public')->delete($media->path);


        $media->delete();


        return redirect()->route('home')->with('success', 'File deleted successfully');


         return response()->json(['message' => 'File deleted successfully']);
    }
}
