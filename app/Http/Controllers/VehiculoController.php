<?php

namespace App\Http\Controllers;

use App\Models\Vehiculo;
use Illuminate\Http\Request;
use App\Enums\HttpStatusCode;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;

class VehiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $Vehiculos = Vehiculo::all();

        return response(['vehiculos' => $Vehiculos], 200);
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
            'modelo' => 'required|string|max:100',
			'marca' => 'required',
            'placa' => 'required'
		]);

        if ($validator->fails())
        {
            return response(['error'=>$validator->errors()], 404);
        }

            Vehiculo::create([
                'modelo'=>$data['modelo'],
                'marca'=>$data['marca'],
                'placa'=>$data['placa'],
                'kilometraje'=>$data['kilometraje'],
                'record_servicio'=>$data['record_servicio'],
                'estado'=>$data['estado']
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
     * @param  \App\Models\Vehiculo  $Vehiculo
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Vehiculo = Vehiculo::find($id);
        return response(['vehiculo' => $Vehiculo], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vehiculo  $Vehiculo
     * @return \Illuminate\Http\Response
     */
    public function edit(Vehiculo $Vehiculo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vehiculo  $Vehiculo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $validator = Validator::make($data, [
            'modelo' => 'required|string|max:100',
			'marca' => 'required',
            'placa' => 'required'
		]);

        if ($validator->fails())
        {
            return response(['error'=>$validator->errors()], 404);
        }

        $Vehiculo = Vehiculo::find($id);
        $Vehiculo->modelo = $data['modelo'];
        $Vehiculo->marca = $data['marca'];
        $Vehiculo->placa = $data['placa'];
        $Vehiculo->kilometraje = $data['kilometraje'];
        $Vehiculo->record_servicio = $data['record_servicio'];
        $Vehiculo->estado = $data['estado'];
        $Vehiculo->save();
        return response(['data' => 'Updated success'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vehiculo  $Vehiculo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Vehiculo = Vehiculo::find($id);
        $Vehiculo->delete();
        return response(['data' => 'Delete success'], 200);
    }
}
