@extends('master')

@section('content')
    
<h1>Formulario de presentación de proyecto</h1>
<div class="row mt-3">
    <div class="col-md-12">
      <!-- Custom Tabs -->
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a class="nav-link active" href="#tab_1" data-toggle="tab">Aspectos del proyecto</a></li>
                <li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">Antecedentes de la institución postulante</a></li>
                <li class="nav-item"><a class="nav-link" href="#tab_3" data-toggle="tab">Antecedentes del responsable del proyecto</a></li>   
                <li class="nav-item"><a class="nav-link" href="#tab_4" data-toggle="tab">Desarrollo del proyecto</a></li>
                <li class="nav-item"><a class="nav-link" href="#tab_5" data-toggle="tab">GMAP</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab_1">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form action="{{route("aspectosproyecto.store")}}" method="POST">
                        @csrf
                        <h2>Tipo de proyecto</h2>   
                        <div class="row">
                            <div class="col-md-6">

                                <div>
                                    <input type="checkbox" name="tipo_de_proyecto[]" id="infanto_juv" value="1">
                                    <label for="infanto_juv">
                                        Prevención grupo infanto juveniles
                                    </label>
                                </div>
                                <div>
                                    <input type="checkbox" name="tipo_de_proyecto[]" id="violencia" value="2">
                                    <label for="violencia">
                                        Prevención  de  la Violencia
                                    </label>
                                </div>
                                <div>
                                    <input type="checkbox" name="tipo_de_proyecto[]" id="reincidencia_delic" value="3" >
                                    <label for="reincidencia_delic">
                                        Iniciativas de Prevención de la Reincidencia Delictual
                                    </label>
                                </div>
                                <div>
                                    <input type="checkbox" name="tipo_de_proyecto[]" id="convivencia_com" value="4" >
                                    <label for="convivencia_com">
                                        Iniciativas de convivencia comunitaria
                                    </label>
                                </div>
                                <div>
                                    <input type="checkbox" name="tipo_de_proyecto[]" id="sistema_vig" value="5" >
                                    <label for="sistema_vig">
                                        Sistemas de vigilancia comunal o de prevención del delito
                                    </label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div>
                                    <input type="checkbox" name="tipo_de_proyecto[]" id="alarma_coor" value="6" >
                                    <label for="alarma_coor">
                                        Alarmas de coordinación
                                    </label>
                                </div>
                                <div>
                                    <input type="checkbox" name="tipo_de_proyecto[]" id="focos_ilum" value="7" >
                                    <label for="focos_ilum">
                                        Focos para iluminación vecinal
                                    </label>
                                </div>
                                <div>
                                    <input type="checkbox" name="tipo_de_proyecto[]" id="recuper_esp" value="8" >
                                    <label for="recuper_esp">
                                        Recuperación de espacios
                                    </label>
                                </div>
                                <div>
                                    <input type="checkbox" name="tipo_de_proyecto[]" id="prev_riesgos" value="9" >
                                    <label for="prev_riesgos">
                                        Prevención de riesgos en situaciones de emergencia
                                    </label>
                                </div>
                            </div>
                        </div>
                        <hr>

                        <h2>Antecedentes generales del proyecto</h2>
                        <div class="form-group">
                            <label for="nombre_del_proyecto">Nombre del proyecto</label>
                            <input type="text" class="form-control" id="nombre_del_proyecto" name="nombre_del_proyecto" placeholder="Debe ser corto y ficticio" required>
                        </div>

                        <div class="form-group">
                            <label for="comuna">Comuna(s) donde se implementará el proyecto: </label>
                            <select class="custom-select form-control" name="comuna" id="comuna">
                                <option selected>Open this select menu</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="monto_solicitado">Monto solicitado al Gobierno Regional</label>
                            <input type="number" min="1" class="form-control" id="monto_solicitado" name="monto_solicitado" placeholder="Monto en $" required>
                        </div>

                        <div class="form-group">
                            <label for="duracion_del_proyecto">Duración del Proyecto (Meses)</label>
                            <input type="number" min="1" class="form-control" id="duracion_del_proyecto" name="duracion_del_proyecto" value="3" placeholder="Cantidad de meses" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="resumen_del_proyecto">Breve resumen del proyecto</label>
                            <textarea type="text" class="form-control" id="resumen_del_proyecto" name="resumen_del_proyecto" rows="4" placeholder="No más de un párrafo de máximo 10 renglones" maxlength="1380" required></textarea>
                        </div>
                        <input class="btn btn-success" type="submit" value="Subir archivo">
                    </form>
                </div>

                <div class="tab-pane" id="tab_2">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form action="{{route("antecedentesinstitucion.store")}}" method="POST">
                        @csrf
                        <h2>Antecedentes de la institución postulante</h2>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nombre_institucion">Nombre Institución Postulante</label>
                                    <input type="text" class="form-control" id="nombre_institucion" name="nombre_institucion" placeholder="Nombre de la institución" required>
                                </div>
                                <div class="form-group">
                                    <label for="rut_institucion">Rut Institución Postulante</label>
                                    <input type="text" class="form-control" id="rut_institucion" name="rut_institucion" placeholder="Rut de la institución" required>
                                </div>
                                <div class="form-group">
                                    <label for="nombre_del_representante">Nombre completo del Representante Legal</label>
                                    <input type="text" class="form-control" id="nombre_del_representante" name="nombre_del_representante" placeholder="Nombre completo" required>
                                </div>
                                <div class="form-group">
                                    <label for="telefono_fijo_institucion">Teléfono fijo</label>
                                    <input type="text" class="form-control" id="telefono_fijo_institucion" name="telefono_fijo_institucion" placeholder="Telefono fijo" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="celular_institucion">Teléfono móvil (obligatorio)</label>
                                    <input type="text" class="form-control" id="celular_institucion" name="celular_institucion" placeholder="Telefono móvil" required>
                                </div>
                                <div class="form-group">
                                    <label for="email_institucion">Correo Electrónico (obligatorio)</label>
                                    <input type="email" class="form-control" id="email_institucion" name="email_institucion" placeholder="Correo electronico" required>
                                </div>
                                <div class="form-group">
                                    <label for="direccion_institucion">Dirección de la Institución</label>
                                    <input type="text" class="form-control" id="direccion_institucion" name="direccion_institucion" placeholder="Dirección de la institución" required>
                                </div>
                                <div class="form-group">
                                    <label for="direccion_representante_legal">Dirección del Representante Legal</label>
                                    <input type="text" class="form-control" id="direccion_representante_legal" name="direccion_representante_legal" placeholder="Dirección del representante legal" required>
                                </div>
                            </div>
                        </div>
                        <input class="btn btn-success" type="submit" value="Subir archivo">
                    </form>
                </div>

                <div class="tab-pane" id="tab_3">
                    <form action="{{route("antecedentesresponsable.store")}}" method="post">
                        @csrf
                        <h2>Antecedentes del responsable del proyecto</h2>
                        <div class="form-group">
                            <label for="nombre_del_responsable">Nombre del responsable del Proyecto</label>
                            <input type="text" class="form-control" id="nombre_del_responsable" name="nombre_del_responsable" placeholder="Nombre del responsable" required>
                        </div>
                        <div class="form-group">
                            <label for="correo_del_responsable">Correo Electrónico</label>
                            <input type="email" class="form-control" id="correo_del_responsable" name="correo_del_responsable" placeholder="Correo Electrónico" required>
                        </div>
                        <div class="form-group">
                            <label for="telefono_fijo_del_responsable">Teléfono fijo</label>
                            <input type="tel" class="form-control" id="telefono_fijo_del_responsable" name="telefono_fijo_del_responsable" placeholder="Teléfono fijo" required>
                        </div>
                        <div class="form-group">
                            <label for="celular_del_responsable">Teléfono móvil</label>
                            <input type="tel" class="form-control" id="celular_del_responsable" name="celular_del_responsable" placeholder="Teléfono móvil" required>
                        </div>
                        <input class="btn btn-success" type="submit" value="Subir archivo">
                    </form>
                </div>

                <div class="tab-pane" id="tab_4">
                    <form action="{{route("desarrolloproyecto.store")}}" method="post">
                        @csrf
                        <h2>Aspectos sobre el desarollo del proyecto</h2>
                        <div class="form-group">
                            <label for="objetivo_general">Objetivo general</label>
                            <textarea type="text" class="form-control" rows="4" id="objetivo_general" name="objetivo_general" placeholder="Objetivo general" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="objetivos_especificos">Objetivos específicos</label>
                            <textarea type="text" class="form-control" rows="4" id="objetivos_especificos" name="objetivos_especificos" placeholder="No más de 3 objetivos específicos" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="territorio">Territorio a Intervenir (Comuna, sector/es)</label>
                            <textarea type="text" class="form-control" rows="4" id="territorio" name="territorio" placeholder="Comuna, sector/es" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="caracteristicas_poblacion">Características de la población objetivo (Quienes serán los beneficiarios del proyecto)</label>
                            <textarea type="tel" class="form-control" rows="4" id="caracteristicas_poblacion" name="caracteristicas_poblacion" placeholder="Edades, características socio económicas" required></textarea>
                        </div>
                        <hr>
                        {{-- Tabla cobertura - beneficiarios --}}
                        <h2 for="benef_dir_hombre">Cobertura – Cantidad beneficiarios directos e indirectos del proyecto</h2>
                        <div class="row">
                            <div class="col-md-6">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                        <th scope="col" colspan="2" class="text-center success">Beneficiarios directos</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                        <th scope="row" >Hombres:</th>
                                        <td><input type="number" min="0" class="form-control" name="beneficiario_directo_hombre" id="beneficiario_directo_hombre" required></td>
                                        </tr>
                                        <tr>
                                        <th scope="row">Mujeres:</th>
                                        <td><input type="number" min="0" class="form-control" name="beneficiario_directo_mujer" id="beneficiario_directo_mujer" required></td>
                                        </tr>
                                        <tr>
                                        <th scope="row">Total:</th>
                                        <td><input type="number" min="1" class="form-control" name="beneficiario_directo_total" id="beneficiario_directo_total" required></td>
                                        </tr>
                                    </tbody>
                                    </table>
                            </div>

                            <div class="col-md-6">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                        <th scope="col" colspan="2" class="text-center success">Beneficiarios indirectos</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                        <th scope="row">Hombres:</th>
                                        <td><input type="number" min="0" class="form-control" name="beneficiario_indirecto_hombre" id="beneficiario_indirecto_hombre" required></td>
                                        </tr>
                                        <tr>
                                        <th scope="row">Mujeres:</th>
                                        <td><input type="number" min="0" class="form-control" name="beneficiario_indirecto_mujer" id="beneficiario_indirecto_mujer" required></td>
                                        </tr>
                                        <tr>
                                        <th scope="row">Total:</th>
                                        <td><input type="number" min="1" class="form-control" name="beneficiario_indirecto_total" id="beneficiario_indirecto_total" required></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        {{-- Fin Tabla cobertura - beneficiarios --}}
                        <hr>
                        {{-- descripcion del proyecto --}}
                        <div class="form-group">
                            <label for="content">Descripción del proyecto, detalles de las actividades del proyecto:</label>
                            <div>Máximo tres páginas. Debe desarrollar la iniciativa, describiendo:</div>
                            <ul>
                                
                                <li>En qué consistirá el proyecto.</li>
                                <li>Las actividades que se desarrollarán en él.</li>
                                <li>Fecha estimada de comienzo del proyecto.</li>
                                <li>El tiempo que las desarrollará y como se distribuirá en él.</li>
                                <li>Que recursos necesitara para implementar las actividades, siendo esta descripción
                                    coherente con el presupuesto presentado (formulario 3).</li>
                                <li>Los productos que se desean obtener.</li>
                                <li>Si será necesario la interacción con redes de apoyo.</li>
                            </ul>

                            <textarea name="content" class="form-control" id="content"></textarea>
                        </div>
                        <hr>
                        {{-- resultados esperados --}}
                        <div class="form-group">
                            <label for="resultados_esperados">Resultados esperados y medios de verificación a presentar:</label>
                            <div>Qué resultados se espera obtener o cambios, luego e implementado el proyecto y que medios
                                de verificación presentará la institución para demostrar se desarrollaron las actividades del
                                proyecto, si este fuese financiado, a decir: Listas de asistencia, fotografías, copias de productos,
                                actas, entrevistas, artículos de prensa, etc.
                            </div><br>
                            <textarea type="text" class="form-control" rows="4" id="resultados_esperados" name="resultados_esperados" placeholder="Resultados esperados" required></textarea>
                        </div>
                        <hr>

                        {{-- Cronograma --}}
                        <div class="form-group">
                            <h2 for="cronograma">Cronograma del proyecto o carta gantt:</h2>
                            <div>Haga click en el boton para generar una tabla e indicar las actividades que se llevaran a cabo para completar el proyecto, indicando a su vez en que mes se realizarán. (La cantidad de meses se considera a partir de la duración del proyecto indicada con anterioridad.</div><br>
                            <div id="cronograme_table"></div>

                            <input type="button" class="btn btn-primary" value="Genera una tabla" id="table_generate" >
                            <input type="button" style="display:none;" class="btn btn-primary" value="Añadir otra actividad" id="new_activity">
                        </div>
                        {{-- Fin Cronograma --}}
                        
                        <hr>

                        {{-- tabla actividades --}}
                        <div class="form-group">
                            <h2>Detalle de actividades (mismas del cronograma):</h2>
                            <div>Haga click en el boton para generar una tabla con las mismas actividades definidas en la tabla anterior.</div><br>
                            <div id="activities_table_div"></div>

                            <input type="button" class="btn btn-primary" value="Generar tabla de actividades" id="table_activities_generate">
                        </div>
                        {{-- Fin tabla actividades --}}

                        <hr>

                        <div class="form-group">
                            <h2>Presupuesto resumido</h2>
                            <div>(valores deben coincidir con totales del Formulario 2: Presupuesto Detallado)</div><br>
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col-md-6" class="text-center success">Item</th>
                                        <th scope="col-md-6" colspan="2" class="text-center success">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td scope="row">Recursos humanos:</td>
                                        <td><input type="number" min="0" class="form-control" name="recursos_humanos" id="recursos_humanos" required></td>
                                    </tr>
                                    <tr>
                                        <td scope="row">Gastos en equipamiento:</td>
                                        <td><input type="number" min="0" class="form-control" name="gastos_en_equipamiento" id="gastos_en_equipamiento" required></td>
                                    </tr>
                                    <tr>
                                        <td scope="row">Gastos generales:</td>
                                        <td><input type="number" min="0" class="form-control" name="gastos_generales" id="gastos_generales" required></td>
                                    </tr>
                                    <tr>
                                        <td scope="row">Gastos en difusión:</td>
                                        <td><input type="number" min="0" class="form-control" name="gastos_en_difusion" id="gastos_en_difusion" required></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Total presupuesto:</th>
                                        <td><input type="number" min="0" class="form-control" name="total_presupuesto" id="total_presupuesto" required></td>
                                    </tr>
                                </tbody>
                                
                            </table>
                        </div>

                        <hr>

                        <div class="form-group">
                            <h2 for="#">Detalle de recurso humano solicitado</h2>
                            <div>(Sólo para aquellos a contratar por horas o por talleres o funciones a mediano plazo) (valores deben coincidir con totales del Formulario 3: Presupuesto Detallado)</div><br>
                            <div id="div_rrhh_table"></div>

                            <input type="button" class="btn btn-primary" value="Genera una tabla" id="generate_rrhh" >
                            <input type="button" style="display:none;" class="btn btn-primary" value="Añadir otro perfil" id="new_profile">
                            

                        </div>

                        <hr>
                        <input class="btn btn-success" type="submit" value="Subir archivo">
                    </form>
                </div>

                <div class="tab-pane" id="tab_5">
                    <form action="#" method="post">

                        {{-- inicio de mapa --}}

                        <div class="form-group">
                            <label>Dirección</label>
                            <input type="text" name="autocomplete" id="autocomplete" class="form-control" placeholder="Ingrese dirección">
                        </div>
                
                        <div class="form-group" id="latitudeArea">
                            <label>Latitud</label>
                            <input type="text" id="latitude" name="latitude" class="form-control">
                        </div>
                
                        <div class="form-group" id="longtitudeArea">
                            <label>Longitud</label>
                            <input type="text" name="longitude" id="longitude" class="form-control">
                            
                        </div>

                        <div class="form-group">
                            <div id="map_canvas" class="form-control" style=" display:none; width: auto; height: 400px;"></div>
                        </div>
                        
                        

                        {{-- fin de mapa --}}


                        <input class="btn btn-success" type="button" value="Subir archivo">
                    </form>

                    {{-- <div class="container mt-5">
                        <h2>Autocomplete google maps</h2>
                
                        <div class="form-group">
                            <label>Dirección</label>
                            <input type="text" name="autocomplete" id="autocomplete" class="form-control" placeholder="Choose Location">
                        </div>
                
                        <div class="form-group" id="latitudeArea">
                            <label>Latitud</label>
                            <input type="text" id="latitude" name="latitude" class="form-control">
                        </div>
                
                        <div class="form-group" id="longtitudeArea">
                            <label>Longitud</label>
                            <input type="text" name="longitude" id="longitude" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </div> --}}

                    {{-- mapa --}}
                </div>

                <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
        </div>

    </div>
</div>

<script type="text/javascript" src="{{URL::asset('js/activities_table.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('js/cronograme_table.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('js/rrhh_table.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('js/validate_input_num.js')}}"></script>
<script type="text/javascript"
src="https://maps.google.com/maps/api/js?key=AIzaSyBx2k43lsem3ljuOYCVOQEx8vuHqtDS6D8&libraries=places&callback">
</script>

@endsection