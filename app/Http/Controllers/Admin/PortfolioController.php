<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PortfolioProject;
use Illuminate\Http\Request;

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
            'icon' => 'nullable|string|max:50',
        ]);

        $validated['icon'] = $validated['icon'] ?? 'fa-building';
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
            'icon' => 'nullable|string|max:50',
            'active' => 'boolean',
        ]);

        $portfolio->update($validated);

        return redirect()->route('admin.portfolio.index')->with('success', 'Proyecto actualizado correctamente.');
    }

    public function destroy(PortfolioProject $portfolio)
    {
        $portfolio->delete();
        return redirect()->route('admin.portfolio.index')->with('success', 'Proyecto eliminado correctamente.');
    }
}
