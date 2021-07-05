<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte de datos guardados</title>
    <style>
        
        body {
        position: relative;
        margin: 0 auto; 
        color: #001028;
        background: #FFFFFF; 
        font-family: Arial, sans-serif; 
        font-size: 12px; 
        font-family: Arial;
        }

        h1 {
        border-top: 1px solid  #5D6975;
        border-bottom: 1px solid  #5D6975;
        color: #5D6975;
        font-size: 2.4em;
        line-height: 1.4em;
        font-weight: normal;
        text-align: center;
        margin: 0 0 20px 0;
        background: url(dimension.png);
        }


        table {
        width: 100%;
        border-collapse: collapse;
        border-spacing: 0;
        margin-bottom: 20px;
        }

        table tr:nth-child(2n-1) td {
        background: #F5F5F5;
        }

        table th {
        padding: 5px 20px;
        color: #5D6975;
        border-bottom: 1px solid #C1CED9;
        white-space: nowrap;        
        font-weight: normal;
        }

        table tr td{
        text-align: center;
        }


        table td {
        padding: 20px;
        text-align: right;
        }

        table tr td {
        font-size: 1.2em;
        }

        .page_break { page-break-before: always; }

        .qr_img{ 
            margin: auto 40%;
            
        }

        </style>
</head>
<body>
    <h1>Lista de las direcciones guardadas con sus respectivas comunas:</h1>
    <table border="1">
        <thead>
            <tr>
                <td><b>Dirección</b></td>
                <td><b>Comuna</b></td>
            </tr>
        </thead>

        <tbody>
            @foreach($locations as $location)
                <tr >
                    <td>{{ $location->direccion }}</td>
                    <td>{{ $location->comuna_direccion }}</td>
                    {{-- <td><button class="btn btn-block btn-danger btn-xs" data-toggle="modal" data-target="#modal-danger" data-id="{{$file->id}}" >Eliminar</button></td> --}}
                </tr>
            @endforeach
        </tbody>
    </table>

    <h1 class="page_break">Lista de los archivos guardados con sus respectivas fechas de creación:</h1>
    <table border="1">
        <thead>
            <tr>
                <td><b>ID</b></td>
                <td><b>Nombre del archivo</b></td>
                <td><b>Nombre original del archivo</b></td>
                <td><b>Fecha de creación</b></td>
            </tr>
        </thead>

        <tbody>
            @foreach($files as $file)
                <tr >
                    <td>{{ $file->id }}</td>
                    <td>{{ $file->file_name }}</td>
                    <td>{{ $file->original_name }}</td>
                    <td>{{ $file->created_at }}</td>
                    {{-- <td><button class="btn btn-block btn-danger btn-xs" data-toggle="modal" data-target="#modal-danger" data-id="{{$file->id}}" >Eliminar</button></td> --}}
                </tr>
            @endforeach
        </tbody>

        
        {{-- <img src="data:image/svg+xml;utf8, {{ $codigoQR }}" /> --}}
        <div class="center page_break">
            <h1>Código QR para acceder al archivo PDF: </h1>
            <img class="qr_img" src="data:image/png;base64, {!! base64_encode($codigoQR) !!}" />   
        </div>
        
    </table>


    

</body>
</html>