<?php

namespace App\Http\Controllers;

use App\Models\Disease;
use App\Models\Pesticide;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use PHPUnit\TextUI\Configuration\Php;

class PesticidesController extends Controller
{
    public function index()
    {
        $diseases = Disease::get();
        $disease_id = Disease::first()->id;
        $pesticides = Pesticide::get();
        //dd($diseases, $pesticides, $disease_id);
        return view('admin.pesticide.AdminPesticideView', ['diseases' => $diseases, 'pesticides' => $pesticides, 'disease_id' => $disease_id]);
    }

    public function getDiseasePesticidaById($id)
    {
        $diseases = Disease::get();
        $disease = Disease::find($id);
        $pesticides = $disease->pesticides;

        return view('admin.pesticide.AdminPesticideView', ['diseases' => $diseases, 'pesticides' => $pesticides, 'disease_id' => $disease->id]);
    }

    public function create()
    {
        $diseases = Disease::get();

        return view('admin.pesticide.CreatePesticide', ['diseases' => $diseases, 'pesticide' => null]);
        dd($diseases);
    }


    // public function createPesticide($id)
    // {
    //     $disease = Disease::get();
    //     $diseases = Disease::find($id);
    //     $pesticide = $disease->pesticide;
    //     //dd($pesticides, $diseases);

    //     return view('admin.pesticide.CreatePesticide', ['diseases' => $diseases, 'pesticide' => null]);
    // }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {

        $request->validate([
            'disease_ids' => 'required_without_all',
            'name' => 'required',
            'description' => 'required',
            'activeIngredient' => 'required',
            'Price' => 'required',
            'type' => 'required',
            'dose' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg|max:2048'

        ]);

        try {

            //Obtener el nombre de la imagen usando la función time()
            //Para generar un nombre aleatorio
            $imageNamePesticide = time() . '.' . $request->image->extension();
            //Copiar la imagen al directorio public
            $request->image->move(public_path('storage/pesticide/'), $imageNamePesticide);

            $pesticide = new Pesticide([
                'name' => $request->name,
                'description' => $request->description,
                'activeIngredient' => $request->activeIngredient,
                'price' => $request->price,
                'type' => $request->type,
                'dose' => $request->dose,
                'image' => $request->imageNamePesticide
            ]);

            foreach ($request->disease_ids as $disease_id) {

                $disease = Disease::find($disease_id);
                $disease->pesticides()->save($pesticide);
            }






            $message = 'Se creo un Plaguicida';

            return redirect()->route('pesticides.index')->with('danger', $message);
        } catch (QueryException $e) {
            $message = 'ups.. el fungicida no fue creado';
            return redirect()->route('pesticides.index')->with('error', $message);
        }
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
    public function edit(Pesticide $pesticide)
    {
        $diseases = Disease::get();

        return view('admin.pesticide.EditPesticide', ['diseases' => $diseases, 'pesticide' => $pesticide]);
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
    public function destroy(Pesticide $pesticides, $id)
    {
        try {
            //     $pesticides->delete();
            //
            //     return redirect()->route('pesticides.index')->with('success', $message);
            //

            $pesticides = Pesticide::find($id);
            $pesticides->delete();
            return redirect()->route('pesticides.index')
                // $message = 'El plaguicida fue eliminado'
                ->with('success', 'Post deleted successfully');
        } catch (QueryException $e) {
            $message = 'el plaguicida no puede ser eliminado';
            return redirect()->route('pesticides.index')->with('error', $message);
        }
    }

    //___________________________________________________________________________________________________________





    //-------------------------------------------------------------------------------
    //método de muchos a a muchos CropDisease


}
