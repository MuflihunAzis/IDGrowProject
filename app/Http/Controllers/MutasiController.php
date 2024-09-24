<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\BarangController;
use App\Models\Mutasi;
use App\Models\Barang;
use Illuminate\Support\Facades\Validator;

class MutasiController extends Controller
{
    // Create Mutasi
    public function store(Request $request)
    {
        $validateMutasi = Validator::make($request->all(), [
            'tanggal' => 'required|date',
            'jenis_mutasi' => 'required',
            'jumlah' => 'required|integer',
            'user_id' => 'required|exists:users,id',
            'barang_id' => 'required|exists:barangs,id',
        ]);

        if ($validateMutasi->fails()) {
            return response()->json(['status' => false, 'message' => 'Validation error', 'errors' => $validateMutasi->errors()], 401);
        }

        $mutasi = Mutasi::create($request->all());

        return response()->json([
            'status' => true,
            'message' => 'Mutasi created successfully',
            'data' => $mutasi
        ], 201);
    }

    // Read Mutasi
    public function index()
    {
        $mutasis = Mutasi::with(['user', 'barang'])->get();
        return response()->json($mutasis, 200);
    }

    // Show Mutasi
    public function show($id)
    {
        $mutasi = Mutasi::with(['user', 'barang'])->find($id);

        if (!$mutasi) {
            return response()->json(['status' => false, 'message' => 'Mutasi not found'], 404);
        }

        return response()->json($mutasi, 200);
    }

    // Update Mutasi
    public function update(Request $request, $id)
    {
        $mutasi = Mutasi::find($id);

        if (!$mutasi) {
            return response()->json(['status' => false, 'message' => 'Mutasi not found'], 404);
        }

        $mutasi->update($request->all());

        return response()->json([
            'status' => true,
            'message' => 'Mutasi updated successfully',
            'data' => $mutasi
        ], 200);
    }

    // Delete Mutasi
    public function destroy($id)
    {
        $mutasi = Mutasi::find($id);

        if (!$mutasi) {
            return response()->json(['status' => false, 'message' => 'Mutasi not found'], 404);
        }

        $mutasi->delete();

        return response()->json(['status' => true, 'message' => 'Mutasi deleted successfully'], 200);
    }

}
