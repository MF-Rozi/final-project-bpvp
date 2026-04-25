<?php

namespace App\Http\Controllers;

use App\Models\Attraction;
use App\Models\Zone;
use Illuminate\Http\Request;

class AttractionController extends Controller
{
    public function index()
    {
        $attractions = Attraction::all();
        return view('admin.pages.attractions.index', compact('attractions'));
    }
    public function show($id)
    {
        $attraction = Attraction::findOrFail($id);
        return view('admin.pages.attractions.show', compact('attraction'));
    }
    public function create()
    {
        $zones = Zone::all();
        return view('admin.pages.attractions.create', compact('zones'));
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'ticket_price' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'zone_id' => 'required|exists:zones,id',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('attractions', 'public');
        }
        Attraction::create($validated);
        return redirect()->route('admin.attractions.index')->with('success', 'Attraction created successfully.');
    }
    public function edit($id)
    {
        $attraction = Attraction::findOrFail($id);
        $zones = Zone::all();
        return view('admin.pages.attractions.edit', compact('attraction', 'zones'));
    }
    public function update(Request $request, $id)
    {
        $attraction = Attraction::findOrFail($id);
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'ticket_price' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'zone_id' => 'required|exists:zones,id',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('attractions', 'public');
        }

        $attraction->update($validated);
        return redirect()->route('admin.attractions.index')->with('success', 'Attraction updated successfully.');
    }
    public function destroy($id)
    {
        $attraction = Attraction::findOrFail($id);
        $attraction->delete();
        return redirect()->route('admin.attractions.index')->with('success', 'Attraction deleted successfully.');
    }

    public function showAttractions($attraction)
    {
        $attraction = Attraction::findOrFail($attraction);
        return view('landing.pages.detail-attractions', compact('attraction'));
    }
}
