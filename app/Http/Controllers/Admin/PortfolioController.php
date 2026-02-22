<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PortfolioProject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PortfolioController extends Controller
{
    public function index()
    {
        $projects = PortfolioProject::ordered()->get();
        return view('admin.portfolio.index', compact('projects'));
    }

    public function create()
    {
        return view('admin.portfolio.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'required|in:residencial,comercial,industrial',
            'year' => 'required|string|max:4',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('portfolio', 'public');
        }

        $validated['order'] = PortfolioProject::max('order') + 1;

        PortfolioProject::create($validated);

        return redirect()->route('admin.portfolio.index')->with('success', 'Proyecto creado correctamente.');
    }

    public function edit(PortfolioProject $portfolio)
    {
        return view('admin.portfolio.edit', compact('portfolio'));
    }

    public function update(Request $request, PortfolioProject $portfolio)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'required|in:residencial,comercial,industrial',
            'year' => 'required|string|max:4',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'active' => 'boolean',
        ]);

        if ($request->hasFile('image')) {
            // Eliminar imagen anterior si existe
            if ($portfolio->image) {
                Storage::disk('public')->delete($portfolio->image);
            }
            $validated['image'] = $request->file('image')->store('portfolio', 'public');
        }

        $portfolio->update($validated);

        return redirect()->route('admin.portfolio.index')->with('success', 'Proyecto actualizado correctamente.');
    }

    public function destroy(PortfolioProject $portfolio)
    {
        if ($portfolio->image) {
            Storage::disk('public')->delete($portfolio->image);
        }
        
        $portfolio->delete();
        return redirect()->route('admin.portfolio.index')->with('success', 'Proyecto eliminado correctamente.');
    }
}
