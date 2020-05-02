<?php

    namespace App\Http\Controllers;


class DownloadsController extends Controller
{
    public function download($file) {
        $file_path = public_path('files/'.$file);
        return response()->download($file_path);
    }
}
