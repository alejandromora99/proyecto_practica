<?php

namespace App\Http\Controllers\file;

use App\File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UploadFilePost;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    
    public function create()
    {
      // $file = new File();
      return view("file.create");
    }
  
    public function upload(UploadFilePost $request)
    {
        //obtengo la extension del archivo
        $file_extension = $request->file->extension();

        //logica para asignarle una imagen a cada tipo de archivo
        switch(basename($file_extension)) {
            case 'pdf':
              $preview_image = "css/images/logos/pdflogo.png";
              break;
            case ($file_extension == "doc" || $file_extension == "docx"):
              $preview_image = "css/images/logos/wordlogo.png";
              break;
            case ($file_extension == "xls" || $file_extension == "xlsx"):
              $preview_image = "css/images/logos/excellogo.png";
              break;
            case 'zip':
                $preview_image = "css/images/logos/ziplogo.png";
              break;
            // default:
            //   break;
          }

        //guardo el archivo y obtengo la ruta
        $path = $request->file('file')->store('public/file');
        
        //obtengo el nombre que se le puso al archivo
        $file_name = basename($path);
        //obtengo el nombre original con el cual el archivo se recibio
        $original_name = $request->file('file')->getClientOriginalName();
        //guardo los datos en la BD
        $file = File::create(['file' => $path, 'file_name' =>$file_name, 'original_name' => $original_name, 'preview_image' =>$preview_image]);

        return response()->json(['success' => $file]);
    }

    public function fetch(){
        $files = File::all();
        // dd($files);
        $output = "<div class='row'>";
        foreach ($files as $key => $files_storage) {
          // dd($files[$key]);
          // dd(Storage::URL($files_storage->file));
          
          $files[$key]->file= Storage::URL($files_storage->file);
          // dd($files[$key]->file);
          $output .="<div class='col-md-2 form-group'
                      style='margin-bottom:16px;' align='center'><div class='box-title'><b>".$files[$key]->original_name."
                      </b></div><img src='".asset($files[$key]->preview_image)."' class='img-thumbnail' />
                      <button type='button' class='remove_button btn btn-danger form-control' id='".$files[$key]->id."'>Eliminar</button>
                      </div>
          ";
            
            
        }
        $output .= "</div>";
        echo $output;


        // dd($files);
    }

    function list_files(){
      $files = File::orderBy('created_at','desc')->paginate(5);
      return view("file.index", ['files' => $files]);
    }

    function delete(Request $request){
        // dd($request);
        if($request->get("id")){
            $file = File::find($request->get("id"));
            $file->delete();
            Storage::delete($file->file);
            return response()->json(['success' => $request]);
        }
    }

    function download_file(File $file){
      // dd($file);
      if (Storage::disk('local')->exists($file->file))
      {
          // Send Download
          return Storage::download($file->file);
          // exit('A');
      }
      else
      {
          // Error
          exit('Este archivo no se encuentra en nuestro servidor');
      }


      // return Storage::download($file->file);}
    }

    function destroy(File $file){
      // dd($request);
          $file->delete();
          Storage::delete($file->file);
          return back()->with('status', 'Archivo eliminado con éxito');
      
  }
}
