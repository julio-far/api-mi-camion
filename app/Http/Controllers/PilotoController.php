<?php

namespace App\Http\Controllers;

use App\Models\Piloto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;

class PilotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $Pilotos = Piloto::all();

        return response(['pilotos' => $Pilotos], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make($data, [
            'nombre' => 'required|string|max:100',
			'dpi' => 'required',
            'licencia' => 'required'
		]);

        if ($validator->fails())
        {
            return response(['error'=>$validator->errors()], 404);
        }

            Piloto::create([
                'nombre'=>$data['nombre'],
                'dpi'=>$data['dpi'],
                'licencia'=>$data['licencia'],
                'telefono'=>$data['telefono']
            ]);
        

        return response(['message' => 'Created success'], 202);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Piloto  $Piloto
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Piloto = Piloto::find($id);
        return response(['piloto' => $Piloto], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Piloto  $Piloto
     * @return \Illuminate\Http\Response
     */
    public function edit(Piloto $Piloto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Piloto  $Piloto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $validator = Validator::make($data, [
            'nombre' => 'required|string|max:100',
			'dpi' => 'required',
            'licencia' => 'required'
		]);

        if ($validator->fails())
        {
            return response(['error'=>$validator->errors()], 404);
        }

        $Piloto = Piloto::find($id);
        $Piloto->nombre = $data['nombre'];
        $Piloto->dpi = $data['dpi'];
        $Piloto->licencia = $data['licencia'];
        $Piloto->telefono = $data['telefono'];
        $Piloto->save();
        return response(['data' => 'Updated success'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Piloto  $Piloto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Piloto = Piloto::find($id);
        $Piloto->delete();
        return response(['data' => 'Delete success'], 200);
    }
}
