<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function store(Request $request, Image $image)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $path = $request->file('image')->store('images', "public");

        $image->create([
            'path' => $path,
            'name' => $request->file('image')->getClientOriginalName(),
            'user_id' => Auth::id(),
        ]);

        return redirect()->back()
            ->with('created', 'You have successfully uploaded the image.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Image $image)
    {

        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $path = $request->file('image')->store('images', "public");

        Storage::disk('public')->delete($image->path);


        $image->update([
            'path' => $path,
            'name' => $request->file('image')->getClientOriginalName(),
        ]);




        return redirect()->back()
            ->with('updated', 'You have successfully updated the image.');
    }
}
