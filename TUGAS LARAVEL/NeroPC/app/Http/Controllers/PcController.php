<?php

namespace App\Http\Controllers;

use App\Models\Pc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PcController extends Controller
{
    public function index()
    {
        $pcs = Pc::where('user_id', auth()->id())->latest()->paginate(10);
        return view('pc.index', compact('pcs'));
    }

    public function create()
    {
        return view('pc.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_pc' => 'required|string|max:255|unique:pcs,kode_pc',
            'nama_pc' => 'required|string|max:255',
            'kategori' => 'required|in:ENTRY LEVEL,MID RANGE,HIGH END',
            'prosesor' => 'required|string|max:255',
            'vga' => 'required|string|max:255',
            'ram' => 'required|string|max:255',
            'storage' => 'required|string|max:255',
            'motherboard' => 'required|string|max:255',
            'psu' => 'required|string|max:255',
            'casing' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
            'tersedia' => 'boolean',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $validated['tersedia'] = $request->has('tersedia');

        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('public/pcs');
            $validated['foto'] = basename($path);
        }

        $validated['user_id'] = auth()->id();

        Pc::create($validated);

        return redirect()->route('pc.index')->with('success', 'Data PC berhasil ditambahkan.');
    }

    public function show(Pc $pc)
    {
        return view('pc.show', compact('pc'));
    }

    public function edit(Pc $pc)
    {
        return view('pc.edit', compact('pc'));
    }

    public function update(Request $request, Pc $pc)
    {
        $validated = $request->validate([
            'kode_pc' => 'required|string|max:255|unique:pcs,kode_pc,' . $pc->id,
            'nama_pc' => 'required|string|max:255',
            'kategori' => 'required|in:ENTRY LEVEL,MID RANGE,HIGH END',
            'prosesor' => 'required|string|max:255',
            'vga' => 'required|string|max:255',
            'ram' => 'required|string|max:255',
            'storage' => 'required|string|max:255',
            'motherboard' => 'required|string|max:255',
            'psu' => 'required|string|max:255',
            'casing' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
            'tersedia' => 'boolean',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $validated['tersedia'] = $request->has('tersedia');

        if ($request->hasFile('foto')) {
            // Delete old photo if exists
            if ($pc->foto) {
                Storage::delete('public/pcs/' . $pc->foto);
            }
            $path = $request->file('foto')->store('public/pcs');
            $validated['foto'] = basename($path);
        }

        $pc->update($validated);

        return redirect()->route('pc.index')->with('success', 'Data PC berhasil diperbarui.');
    }

    public function destroy(Pc $pc)
    {
        if ($pc->foto) {
            Storage::delete('public/pcs/' . $pc->foto);
        }
        $pc->delete();

        return redirect()->route('pc.index')->with('success', 'Data PC berhasil dihapus.');
    }
}
