<?php

// app/Http/Controllers/SliderController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;

class SliderController extends Controller
{
    public function create()
    {
        return view('slider.create');
    }

    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust validation rules as needed
            'width' => 'required|integer',
            'height' => 'required|integer',
            'dimensions' => 'required|string',
            'published' => 'required|boolean',
        ]);

        // Handle image upload and storage
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads'), $imageName);
            $imagePath = 'uploads/' . $imageName;
        }

        // Create a new slider record
        Slider::create([
            'image_path' => $imagePath,
            'width' => $request->input('width'),
            'height' => $request->input('height'),
            'dimensions' => $request->input('dimensions'),
            'published' => $request->input('published'),
        ]);

        return redirect()->route('slider.index')->with('success', 'Slider created successfully.');
    }

    public function index()
    {
        $sliders = Slider::all();
        return view('slider.index', compact('sliders'));
    }

    public function edit(Slider $slider)
    {
        return view('slider.edit', compact('slider'));
    }

    public function update(Request $request, Slider $slider)
    {
        // Validate the request for non-image fields
        $request->validate([
            'width' => 'required|integer',
            'height' => 'required|integer',
            'dimensions' => 'required|string',
            'published' => 'required|boolean',
        ]);
    
        // Initialize an empty array to store the fields that need to be updated
        $updateData = [
            'width' => $request->input('width'),
            'height' => $request->input('height'),
            'dimensions' => $request->input('dimensions'),
            'published' => $request->input('published'),
        ];
    
        // Handle image update if a new image is provided
        if ($request->hasFile('image')) {
            $request->validate([
                'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust validation rules as needed
            ]);
    
            // Handle image upload and update the image path
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads'), $imageName);
            $imagePath = 'uploads/' . $imageName;
    
            // Add the updated image path to the update data
            $updateData['image_path'] = $imagePath;
    
            // Delete the old image if it exists
            if (file_exists(public_path($slider->image_path))) {
                unlink(public_path($slider->image_path));
            }
        }
    
        // Update the slider record with all the updated fields
        $slider->update($updateData);
    
        return redirect()->route('slider.index')->with('success', 'Slider updated successfully.');
    }
    
    public function destroy(Slider $slider)
    {
        // Delete the slider record and associated image
        if (file_exists(public_path($slider->image_path))) {
            unlink(public_path($slider->image_path));
        }
        $slider->delete();

        return redirect()->route('slider.index')->with('success', 'Slider deleted successfully.');
    }

    public function uploadImage(Request $request)
    {
        // Handle image upload and return the image path
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads'), $imageName);
            $imagePath = 'uploads/' . $imageName;
            return response()->json(['image_path' => $imagePath]);
        }
    }
}
