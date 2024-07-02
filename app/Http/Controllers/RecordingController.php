<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recording;
use Illuminate\Support\Facades\Log;

class RecordingController extends Controller
{
    public function index()
    {
        return Recording::all();
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

        $recording = Recording::create($validatedData);

        return response()->json($recording, 201);
    }

    public function show($id)
    {
        return Recording::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $recording = Recording::findOrFail($id);

        $validatedData = $request->validate([
            'nama_band' => 'sometimes|required|string|max:255',
            'jam_sewa' => 'sometimes|required|string|max:255',
            'hari' => 'sometimes|required|string|max:255',
            'durasi' => 'sometimes|required|string|max:255',
            'pembayaran' => 'sometimes|required|string|max:255',
            'total_harga' => 'sometimes|required|string|max:255',
        ]);

        $recording->update($validatedData);

        return response()->json($recording, 200);
    }

    public function destroy($id)
{
    $recording = Recording::findOrFail($id);

    if ($recording->delete()) {
        return response(null, 204);
    } else {
        return response()->json(['error' => 'Gagal menghapus data'], 500);
    }
}
public function updateStatus(Request $request, $id)
{
    Log::info("Updating status for recording ID: $id with status: " . $request->status);
    
    $recording = Recording::find($id); // Correct model
    if ($recording) {
        $recording->status = $request->status;
        $recording->save();
        return response()->json(['success' => true, 'message' => 'Status updated successfully']);
    } else {
        return response()->json(['success' => false, 'message' => 'Recording not found'], 404);
    }
}
}
