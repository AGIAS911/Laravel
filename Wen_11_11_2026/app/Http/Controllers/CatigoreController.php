<?php

namespace App\Http\Controllers;

use App\Models\Catigore;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CatigoreController extends Controller
{

    public function index()
    {
        $categories = Catigore::latest()->paginate(10);
        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }



    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'required|string',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'status'      => 'boolean',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('categories', 'public');
        }

        $validated['status'] = $request->has('status');

        Catigore::create($validated);

        return redirect()->route('categories.index')->with('success', 'created successfully');
    }

    public function edit(Catigore $category)
    {
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, Catigore $category)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'required|string',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'status'      => 'boolean',
        ]);

        if ($request->hasFile('image')) {
            if ($category->image) {
                Storage::disk('public')->delete($category->image);
            }
            $validated['image'] = $request->file('image')->store('categories', 'public');
        }

        $validated['status'] = $request->has('status');

        $category->update($validated);

        return redirect()->route('categories.index')->with('success', 'upated successfully');
    }

    public function destroy(Catigore $category)
    {
        if ($category->image) {
            Storage::disk('public')->delete($category->image);
        }
        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Deledted successfully');
    }
}
