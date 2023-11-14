<?php

namespace App\Http\Controllers;

use App\Models\Fertilizer;
use Illuminate\Http\Request;

class FertilizersController extends Controller
{
    public function index()
    {
        $fertilizers = Fertilizer::get();
        return view('admin.fertilizer.AdminFertilizerView', ['fertilizers' => $fertilizers]);
    }


    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {

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
        $imageNameFertilizer = time() . '.' . $request->image->extension();
        //Copiar la imagen al directorio public
        $request->image->move(public_path('storage/fertilizer/'), $imageNameFertilizer);

        Fertilizer::create([
            'name' => $request->name,
            'description' => $request->description,
            'dose' => $request->dose,
            'price' => $request->price,
            'type' => $request->type,
            'image' => $request->imageNameFertilizer
        ]);

        return redirect()->route('fertilizers.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Fertilizer $fertilizers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Fertilizer $fertilizers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Fertilizer $fertilizers)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Fertilizer $fertilizers)
    {
        //
    }

    //___________________________________________________________________________________________________________





    //-------------------------------------------------------------------------------
    //método de muchos a a muchos CropDisease


}
