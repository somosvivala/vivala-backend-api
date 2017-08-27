@extends('layouts.app')

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('css/sweetalert2.css') }}">
@endsection

@section('content')
    <section class="content-header">
        <h2>Passo 2 - Insira a foto que vai aparecer na listagem de expedições</h2>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    <div class="col-xs-12 text-center mx-auto">
                        
                        @include('dropzone.upload', [
                            'formUrl' => 'expedicaos/'.$expedicao->id.'/foto-listagem'
                        ])

                    </div>
                
                </div>
            </div>
        </div>
    </div>
@endsection

