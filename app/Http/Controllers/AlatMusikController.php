<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AlatMusik;
use Illuminate\Support\Facades\Log;

class AlatMusikController extends Controller
{
    public function index()
    {
        return AlatMusik::all();
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'no_hp' => 'required|string|max:255',
            'instrumen' => 'required|string|max:255',
            'hari' => 'sometimes|required|string|max:255',
            'durasi' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'pembayaran' => 'required|string|max:255',
            'total_harga' => 'required|string|max:255',
            'opsi' => 'required|string|max:255',  // Tambahkan ini
        ]);

        $alatmusik = AlatMusik::create($validatedData);

        return response()->json($alatmusik, 201);
    }

    public function show($id)
    {
        return AlatMusik::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $alatmusik = AlatMusik::findOrFail($id);

        $validatedData = $request->validate([
            'nama' => 'sometimes|required|string|max:255',
            'no_hp' => 'sometimes|required|string|max:255',
            'instrumen' => 'sometimes|required|string|max:255',
            'hari' => 'sometimes|required|string|max:255',
            'durasi' => 'sometimes|required|string|max:255',
            'alamat' => 'sometimes|required|string|max:255',
            'pembayaran' => 'sometimes|required|string|max:255',
            'total_harga' => 'sometimes|required|string|max:255',
            'opsi' => 'sometimes|required|string|max:255',  // Tambahkan ini
        ]);

        $alatmusik->update($validatedData);

        return response()->json($alatmusik, 200);
    }

    public function destroy($id)
    {
        try {
            $alatmusik = AlatMusik::findOrFail($id);
            $alatmusik->delete();
            Log::info("Alat dengan ID $id berhasil dihapus.");
            return response()->json(null, 204);
        } catch (\Exception $e) {
            Log::error("Error saat menghapus alat dengan ID $id: " . $e->getMessage());
            return response()->json(['error' => 'Gagal menghapus data'], 500);
        }
    }
    public function updateStatus(Request $request, $id)
{
    Log::info("Updating status for alatmusik ID: $id with status: " . $request->status);
    
    $alatmusik = AlatMusik::find($id);
    if ($alatmusik) {
        $alatmusik->status = $request->status;
        $alatmusik->save();
        return response()->json(['success' => true, 'message' => 'Status updated successfully']);
    } else {
        return response()->json(['success' => false, 'message' => 'Studio not found'], 404);
    }
}
}
