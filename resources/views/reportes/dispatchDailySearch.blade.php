@extends('layouts.dashboard')

@section('section')
<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.css"
    integrity="sha256-b5ZKCi55IX+24Jqn638cP/q3Nb2nlx+MH/vMMqrId6k=" crossorigin="anonymous" />

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"
    integrity="sha256-4iQZ6BVL4qNKlQ27TExEhBN1HFPvAvAMbFavKKosSWQ=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"
    integrity="sha256-5YmaxAwMjIpMrVlK84Y/+NjCpKnFYa8bWWBbUHSBGfU=" crossorigin="anonymous"></script>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 col-md-offset-1 ">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4 style="text-align:center;"> Reporte diario [Despacho]
                </div>
                <form method="POST" action="{{ route('reporteDespachoDailySearch') }}">
                    @csrf

                    <div class="row">
                        <div class="form-group row">
                            <label for="example-datetime-local-input" class="col-2 col-form-label">Día</label>
                            <div class="col-10">
                                <input class="form-control" type="date" name="date" value=""
                                    id="example-datetime-local-input">
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <button type="submit" class="btn btn-primary">
                                <span class="fas fa-search"></span> Buscar
                            </button>
                        </div>
                    </div>


                </form>

                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr class="">

                                <th>Kilos Procesados</th>
                                <th>Kilos de P. Final</th>
                                <th>Fruta - variedad</th>


                                <th colspan="auto">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>

                            @forelse($dispatchs as $dispatch)
                            <tr>
                                <td>{{ $dispatch->grossweight  }} Kg.</td>
                                <td>{{ $dispatch->netweight  }} Kg.</td>
                                <td>{{ $dispatch->fruit->specie  }} - {{$dispatch->varieties->variety}} </td>

                            </tr>
                            @empty
                            <h1 class="alert alert-danger text-center"> No hay reporte </h1>
                            @endforelse

                        </tbody>
                    </table>
                    <table class="table responsive">
                        <h3> Total </h3>
                        <tr style="font-size:24px">
                            <td> Bruto: {{ $dispatchs->sum('grossweight') }} </td>
                            <td> Neto: {{ $dispatchs->sum('netweight') }} </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection