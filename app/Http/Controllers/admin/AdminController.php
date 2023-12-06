<?php

namespace App\Http\Controllers\admin;

use App\Models\Crop;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class AdminController extends Controller
{
    public function welcome(Crop $crop)
    {
        $crops = Crop::get();
        return view('admin/WelcomeAdmin', ['crops' => $crop]);
    }
}
