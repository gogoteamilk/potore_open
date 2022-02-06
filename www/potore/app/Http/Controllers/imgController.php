<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class imgController extends Controller
{
    public function parse(Request $request){
        $validatedData = $request->validate([
            'avater' => 'bail|required|image|file|max:5060',
        ]);
        $img = $request->file('avater');
        $finfo = $img->getClientMimeType();
        $img_base64 = base64_encode(file_get_contents($img));
        return "data:" . $finfo . ";base64," . $img_base64;
    }
}
