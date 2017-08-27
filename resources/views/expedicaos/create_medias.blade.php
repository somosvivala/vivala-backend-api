@extends('layouts.app')

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('css/sweetalert2.css') }}">
@endsection

@section('content')
    <section class="content-header">
        <h2>Passo 4 - Fotos e videos do slider da pagina interna da expedição</h2>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    <div class="col-xs-12 text-center" style="margin-top:2rem">
                        <div class="col-xs-6">
                            <a class="btn btn-primary" href="#triggerModalVideo" data-toggle="modal" data-target="#modal-video">Adicionar Video &nbsp; <i class="fa fa-play"></i></a>
                        </div>
                        <div class="col-xs-6">
                            <a class="btn btn-primary" href="#triggerModalVideo" data-toggle="modal" data-target="#modal-foto">Adicionar Foto &nbsp; <i class="fa fa-image"></i></a>
                        </div>
                    </div>

                    <div class="col-xs-12 text-center mx-auto">
                        @include('expedicaos.medias_slider', [
                            'expedicao' => $expedicao
                        ])
                    </div>

                    <div class="col-xs-12 text-center mx-auto" style="margin-top:3rem">
                            <a class="btn btn-primary" href="/expedicaos">Finalizar &nbsp; <i class="fa fa-arrow-right"></i></a>
                    </div>

                </div>
            </div>
        </div>
    </div>


@include('expedicaos.partials.modal_foto_slider', [
    'modal_id' => 'modal-foto',
    'owner_id' => $expedicao->id,
    'owner_type' => get_class($expedicao)
])


@endsection

