<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FilePaymentController extends Controller
{
    //
    public function downloadfile($filename) {
        return Storage::download('file_payment/' . $filename);
    }
    //
}
