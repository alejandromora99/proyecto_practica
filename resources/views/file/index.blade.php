@extends('master')
@section('css')

@endsection

@section('content')

{{-- <div class="table-responsive-sm">
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Ruta del archivo</th>
            <th scope="col">Nombre original</th>
            <th scope="col">Creado</th>
        </tr>
        </thead>
        <tbody>
        @foreach($files as $file)
            <tr>
                <td>{{ $file->file }}</td>
                <td>{{ $file->original_name }}</td>
                <td>{{ $file->created_at->format('Y-M-d') }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div> --}}
@if (count($files)>0)
@include('partials.session-flash-status')
<div class="box">
    <div class="box-header">
      <h3 class="box-title">Tabla de archivos guardados</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
            
            <div class="row">
                <div class="col-sm-12">
                    <table id="table_files" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="table_files_info">
                        <thead>
                            <tr role="row">
                                <th tabindex="0" aria-controls="table_files" rowspan="1" colspan="1" aria-sort="ascending">Ruta del archivo</th>
                                <th tabindex="0" aria-controls="table_files" rowspan="1" colspan="1">Nombre original</th>
                                <th tabindex="0" aria-controls="table_files" rowspan="1" colspan="1">Creado</th>
                                <th tabindex="0" aria-controls="table_files" rowspan="1" colspan="2" class="text-center">Acciones</th>
                                {{-- <th tabindex="0" aria-controls="table_files" rowspan="1" colspan="1">Eliminar archivo</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            

                            @foreach($files as $file)
                                <tr role="row">
                                    <td>{{ $file->file }}</td>
                                    <td>{{ $file->original_name }}</td>
                                    <td>{{ $file->created_at->format('Y-M-d') }}</td>
                                    <td ><a class="btn btn-block btn-success btn-xs" href="{{ route('file.download', $file) }}" target="_blank">Descargar</a>
                                        <td><button class="btn btn-block btn-danger btn-xs" data-toggle="modal" data-target="#modal-danger" data-id="{{$file->id}}" >Eliminar</button></td>
                                        
                                    </td>
                                    {{-- <td><button class="btn btn-block btn-danger btn-xs" data-toggle="modal" data-target="#modal-danger" data-id="{{$file->id}}" >Eliminar</button></td> --}}
                                </tr>
                            @endforeach


                            
                        </tbody>

                    </table>
                </div>
            </div>
            {{$files->links()}}
                    

            
        </div>
    </div>
    <!-- /.box-body -->
</div>

<script>
    //para detectar si el modal esta abierto
    window.onload = function() {
        'use strict';
            $('#modal-danger').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget); // Button that triggered the modal
                var id = button.data('id') // Extract info from data-* attributes
    
                //extraigo el data-action sin el 0 del formulario
                //de esta forma el data-action siempre esta limpio, con el 'id' 0
                var action = $('#formDelete').attr('data-action').slice(0,-1);
                //le añado la id del file al action
                action += id;
                
                //le entrego 
                $('#formDelete').attr('action',action);
    
                //console.log(action);
                // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
                // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
                var modal = $(this);
                modal.find('.modal-title').text('Vas a borrar el archivo con ID: ' + id);
                });
    };
</script>
@else
    <h2>No hay archivos guardados.</h2>
@endif




    {{-- Modal de borrado --}}
    <div class="modal modal-danger fade" id="modal-danger" style="display: none;">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span></button>
              <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                <p>¿Estas seguro de querer borrar este archivo?</p>
            </div>
            <div class="modal-footer">
                <form id="formDelete" method="POST" action="{{ route('file.destroy',0) }}" data-action="{{ route('file.destroy',0) }}">
                    @csrf
                    <button type="submit" class="btn btn-outline">Si, deseo borrarlo</button>
                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">No, cancelar</button>
                </form>
              
              
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>



@endsection
