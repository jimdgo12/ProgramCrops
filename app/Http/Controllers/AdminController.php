<?php

namespace App\Http\Controllers;

use App\Models\Crop;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function welcome(Crop $crop)
    {
        $crops = Crop::get();
        return view('admin/WelcomeAdmin', ['crops' => $crop]);
    }
}
