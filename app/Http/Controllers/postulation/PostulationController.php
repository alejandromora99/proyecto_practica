<?php

namespace App\Http\Controllers\postulation;

use App\File;
use App\Location;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreLocationPost;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
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
        $location = new Location();
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

    public function storeLocation(StoreLocationPost $request)
    {
        // dd($request);
        Location::create($request->validated());
        // dd($location->direccion);
        return back()->withInput()->with('status', 'Localización guardada con éxito');
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

    public function PDF_locations(){

        $locations = Location::all();
        $files = File::all();
        
        //creo un nombre al archivo
        $fileName =  'pdf_generado_'.date('Y-m-d').'.pdf';

        $storage_path = asset('storage/pdf_files/'.$fileName);
        
        //creo el codigo,le doy un tamaño y la url que tendra vinculada
        $codigoQR = QrCode::size(120)->generate($storage_path);

        //indico que vista sera donde se mostrara el pdf y le paso las variables a mostrar
        $pdf = PDF::loadView('assets.pdf.report_pdf', compact('locations','files', 'codigoQR'));

        // guardo el pdf en storage
        Storage::put('public/pdf_files/' . $fileName, $pdf->output());

        //descargo el pdf
        return $pdf->download($fileName);
    
    }
}
