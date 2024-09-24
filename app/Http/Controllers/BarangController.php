<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Barang;
use Illuminate\Support\Facades\Validator;

class BarangController extends Controller
{
    // Create Barang
    public function store(Request $request)
    {
        $validateBarang = Validator::make($request->all(), [
            'nama_barang' => 'required',
            'kode' => 'required',
            'kategori' => 'required',
            'lokasi' => 'required',
        ]);

        if ($validateBarang->fails()) {
            return response()->json(['status' => false, 'message' => 'Validation error', 'errors' => $validateBarang->errors()], 401);
        }

        $barang = Barang::create($request->all());

        return response()->json([
            'status' => true,
            'message' => 'Barang created successfully',
            'data' => $barang
        ], 201);
    }

    // Read Barang
    public function index()
    {
        $barangs = Barang::all();
        return response()->json($barangs, 200);
    }

    // Show Barang
    public function show($id)
    {
        $barang = Barang::find($id);

        if (!$barang) {
            return response()->json(['status' => false, 'message' => 'Barang not found'], 404);
        }

        return response()->json($barang, 200);
    }

    // Update Barang
    public function update(Request $request, $id)
    {
        $barang = Barang::find($id);

        if (!$barang) {
            return response()->json(['status' => false, 'message' => 'Barang not found'], 404);
        }

        $barang->update($request->all());

        return response()->json([
            'status' => true,
            'message' => 'Barang updated successfully',
            'data' => $barang
        ], 200);
    }

    // Delete Barang
    public function destroy($id)
    {
        $barang = Barang::find($id);

        if (!$barang) {
            return response()->json(['status' => false, 'message' => 'Barang not found'], 404);
        }

        $barang->delete();

        return response()->json(['status' => true, 'message' => 'Barang deleted successfully'], 200);
    }
}
