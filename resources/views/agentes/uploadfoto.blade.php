@extends('layouts.app')

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('css/sweetalert2.css') }}">
@endsection

@section('content')
    <section class="content-header">
        <h2>Passo 2 - Insira uma foto para o agente</h2>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    <div class="col-xs-12 text-center mx-auto">
                        
                        @include('dropzone.upload', [
                            'formUrl' => 'agentes/'.$Agente->id.'/foto',
                            'owner_id' => $Agente->id,
                            'owner_type' => get_class($Agente)
                        ])

                    </div>
                
                </div>
            </div>
        </div>
    </div>
@endsection

