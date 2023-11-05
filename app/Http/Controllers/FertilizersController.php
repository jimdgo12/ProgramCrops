<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FertilizersController extends Controller
{
    public function store(Request $request){

        $request->validate([
            'name' => 'required|regex:/^([A-Za-zÑñ\s]*)$/|between:3,50',
            'description' => 'required|regex:/^([A-Za-zÑñ\s]*)$/|between:3,300',
            'dose' => 'required|regex:/^([A-Za-zÑñ\s]*)$/|between:3,150',
            'price' => 'required|integer|between:5,30000',
            'type' => 'required|regex:/^([A-Za-zÑñ\s]*)$/|between:3,50',
            'image' => 'required|regex:/^([A-Za-zÑñ\s]*)$/|between:3,800'

        ]);

        //Obtener el nombre de la imagen usando la función time()
        //Para generar un nombre aleatorio
        $imageNameCrop = time() . '.' . $request->image->extension();
        //Copiar la imagen al directorio public
        $request->image->move(public_path('storage/pets/'), $imageNameCrop);

    }

}
