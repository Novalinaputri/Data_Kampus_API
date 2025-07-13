<?php

namespace App\Http\Controllers;

use App\Models\Kampus;
use Illuminate\Http\Request;

class KampusController extends Controller
{
    public function index() {
    return response()->json([
        'success' => true,
        'data' => Kampus::all()
    ]);
}

    public function show($id) {
        return response()->json(Kampus::findOrFail($id));
    }

    public function store(Request $request) {
        $this->validate($request, [
            'nama_kampus' => 'required',
            'alamat' => 'required',
            'no_telepon' => 'required',
            'kategori' => 'required|in:Swasta,Negeri',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'jurusan' => 'required',
        ]);
        $kampus = Kampus::create($request->all());
        return response()->json([
    'success' => true,
    'data' => $kampus
], 201); // <- status 201 Created
    }
    

    public function update(Request $request, $id) {
        $kampus = Kampus::findOrFail($id);
        $kampus->update($request->all());
        return response()->json(['success' => true, 'data' => $kampus]);
    }

    public function destroy($id) {
        Kampus::findOrFail($id)->delete();
        return response()->json(['success' => true, 'message' => 'Kampus deleted']);
    }
}