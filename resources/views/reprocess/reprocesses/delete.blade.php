@extends('layouts.dashboard')
@section('section')
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: center;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>

<div class="container-fluid px-4">
    <div class="responsive">
        <div class=" ">

            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 style="text-align:center;">PANEL DE ELIMINACIÓN
                       
                    </h3>
                   
                </div>
                <br>

               
                <h4 style="text-align:center;">Tabla de Reprocesos:</h4>
                <br>
                
                <br>
                <div class="table-responsive">
                    <table id="laravel_datatable" style="width:100%" class=" table table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th>Codigo de pallet procesado</th>
                                <th>Fecha Ingreso</th>
                                <th>Estatus</th>
                                <th>Fruta</th>
                                <th>Variedad</th>
                                <th>Fruta Lavada</th>
                                <th>Eliminar</th>



                                        


                            </tr>
                        </thead>
                        <tbody>
                                     @foreach($reprocesses as $reprocess)
                                    <td>{{ $reprocess->tarja_proceso}}</td>
                                     <td>{{ $reprocess->created_at}}</td>
                                     <td>{{ $reprocess->status->name}}</td>
                                     <td>{{ $reprocess->fruit->specie}}</td>
                                     <td>{{ $reprocess->varieties->variety}}</td>
                                     <td>{{ $reprocess->wash}}</td>
                                     

                                    <td width="10px">

                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-sm btn-danger" data-toggle="modal"
                                        data-target="#exampleModalCenter{{$reprocess->id}}">
                                        Eliminar
                                    </button>

                                </td>

                            </tr>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModalCenter{{$reprocess->id}}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Eliminar</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            ¿Esta seguro que desea eliminar?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-sm btn-secondary"
                                                data-dismiss="modal">Cerrar</button>
                                            @can('reprocess.reprocesses.destroy')
                                            {!! Form::open(['route' => ['reprocess.reprocesses.destroy', $reprocess->id],
                                            'method' => 'DELETE' ]) !!}
                                            <button class="btn btn-sm btn-danger">Eliminar</button>
                                            {!! Form::close() !!}
                                            @endcan </div>
                                    </div>
                                </div>
                                @endforeach

                                </tbody>
                                <tfoot>



                                </tfoot>
                            </table>
{{ $reprocesses->render() }}
                </div>
               
            </div>
        </div>
    </div>
</div>
@endsection