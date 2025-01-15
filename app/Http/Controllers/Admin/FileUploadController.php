<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class FileUploadController extends Controller
{
    /**
     * Handle the screenshot file upload.
     */
    public function uploadScreenshot(Request $request): JsonResponse
    {
        $request->validate(['file' => 'required|image|max:2048']);

        if ($request->file('file')) {
            $path = $request->file('file')->store('screenshots', 'public');

            return response()->json(['path' => $path], 200);
        }

        return response()->json(['error' => 'File upload failed'], 400);
    }
}
