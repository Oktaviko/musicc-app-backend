<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Studio;
use Illuminate\Support\Facades\Log;

class StudioController extends Controller
{
    public function index()
    {
        return Studio::all();
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_band' => 'required|string|max:255',
            'jam_sewa' => 'required|string|max:255',
            'hari' => 'required|string|max:255',
            'durasi' => 'required|string|max:255',
            'pembayaran' => 'required|string|max:255',
            'total_harga' => 'required|string|max:255',
        ]);

        $studio = Studio::create($validatedData);

        return response()->json($studio, 201);
    }

    public function show($id)
    {
        return Studio::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $studio = Studio::findOrFail($id);

        $validatedData = $request->validate([
            'nama_band' => 'sometimes|required|string|max:255',
            'jam_sewa' => 'sometimes|required|string|max:255',
            'hari' => 'sometimes|required|string|max:255',
            'durasi' => 'sometimes|required|string|max:255',
            'pembayaran' => 'sometimes|required|string|max:255',
            'total_harga' => 'sometimes|required|string|max:255',
        ]);

        $studio->update($validatedData);

        return response()->json($studio, 200);
    }

    public function destroy($id)
    {
        try {
            $studio = Studio::findOrFail($id);
            $studio->delete();
            Log::info("Studio dengan ID $id berhasil dihapus.");
            return response()->json(null, 204);
        } catch (\Exception $e) {
            Log::error("Error saat menghapus studio dengan ID $id: " . $e->getMessage());
            return response()->json(['error' => 'Gagal menghapus data'], 500);
        }
    }

    public function updateStatus(Request $request, $id)
{
    Log::info("Updating status for studio ID: $id with status: " . $request->status);
    
    $studio = Studio::find($id);
    if ($studio) {
        $studio->status = $request->status;
        $studio->save();
        return response()->json(['success' => true, 'message' => 'Status updated successfully']);
    } else {
        return response()->json(['success' => false, 'message' => 'Studio not found'], 404);
    }
}

}
