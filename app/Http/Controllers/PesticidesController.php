<?php

namespace App\Http\Controllers;

use App\Models\Pesticide;
use Illuminate\Http\Request;

class PesticidesController extends Controller
{
    public function index()
    {
        $pesticides = Pesticide::get();
        return view('admin.pesticide.AdminPesticideView', ['pesticides' => $pesticides]);
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|regex:/^([A-Za-zÑñ\s]*)$/|between:3,50',
            'description' => 'required|regex:/^([A-Za-zÑñ\s]*)$/|between:3,300',
            'activeIngredient' => 'required|regex:/^([A-Za-zÑñ\s]*)$/|between:3,300',
            'Price' => 'required|integer|between:10000,100000',
            'type' => 'required|regex:/^([A-Za-zÑñ\s]*)$/|between:3,300',
            'dose' => 'required|regex:/^([A-Za-zÑñ\s]*)$/|between:3,100',
            'image' => 'required|regex:/^([A-Za-zÑñ\s]*)$/|between:3,800',

        ]);

        //Obtener el nombre de la imagen usando la función time()
        //Para generar un nombre aleatorio
        $imageNamePesticide = time() . '.' . $request->image->extension();
        //Copiar la imagen al directorio public
        $request->image->move(public_path('storage/pest$pesticides/'), $imageNamePesticide);

        Pesticide::create([
            'name' => $request->name,
            'description' => $request->description,
            'activeIngredient' => $request->activeIngredient,
            'price' => $request->price,
            'type' => $request->type,
            'dose' => $request->dose,
            'image' => $request->imageNamePesticide
        ]);

        return redirect()->route('pesticides.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pesticide $pesticides)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pesticide $pesticides)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pesticide $pesticides)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pesticide $pesticides)
    {
        //
    }

    //___________________________________________________________________________________________________________





    //-------------------------------------------------------------------------------
    //método de muchos a a muchos CropDisease


}
