<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\t_photo;

class IndexController extends Controller
{
    public function index(t_photo $t_photo)
    {
        $heroPhoto = $t_photo->getHeroPhoto();
        $recommendedUser = $t_photo->recommendedUserIndex();
        return view('index', compact('heroPhoto', 'recommendedUser'));
    }
}
