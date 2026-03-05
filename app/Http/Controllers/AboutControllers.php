<?php

namespace App\Http\Controllers;

use App\Models\Profil;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function index()
    {
        $profils = Profil::all();
        return view('profil.index', compact('profils'));
    }

    public function create()
    {
        return view('profil.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'nullable|string',
        ]);

        Profil::create($data);

        return redirect()->route('profil.index');
    }

    public function show(Profil $profil)
    {
        return view('profil.show', compact('profil'));
    }

    public function edit(Profil $profil)
    {
        return view('profil.edit', compact('profil'));
    }

    public function update(Request $request, Profil $profil)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'nullable|string',
        ]);

        $profil->update($data);

        return redirect()->route('profil.show', $profil);
    }

    public function destroy(Profil $profil)
    {
        $profil->delete();
        return redirect()->route('profil.index');
    }
}
