<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreAspectosProyectoPost;
use App\Http\Requests\StoreDesarrolloProyectoPost;
use App\Http\Requests\StoreAntecedentesInstitucionPost;
use App\Http\Requests\StoreAntecedentesResponsablePost;

class PostulationController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    
    public function create()
    {
        return view("postulation.create");
    }




    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeAspectosProyeecto(StoreAspectosProyectoPost $request)
    {
        dd($request);
    }

    public function storeAntecedentesInstitucion(StoreAntecedentesInstitucionPost $request)
    {
        dd($request);
    }

    public function storeAntecedentesResponsable(StoreAntecedentesResponsablePost $request)
    {
        dd($request);
    }

    public function storeDesarrolloProyecto(StoreDesarrolloProyectoPost $request)
    {
        dd($request);
    }

    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
