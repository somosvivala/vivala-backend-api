@extends('layouts.app')

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('css/sweetalert2.css') }}">
@endsection

@section('content')
    <section class="content-header">
        <h1>Passo 3/4 - Descrição da pagina interna da experiência</h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    <div class="col-xs-12 text-center mx-auto">
                        
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-blocosDescricao">
                            <i class="fa fa-plus margin-r-3"></i> &nbsp; Adicionar descrição
                        </button>

                        <hr>

                        @include('bloco_descricaos.create-modal', [
                            'modal_id' => 'modal-blocosDescricao',
                            'owner_id' => $experiencia->id,
                            'owner_type' => get_class($experiencia)
                        ])

                        @include('bloco_descricaos.table', ['blocoDescricaos' => $experiencia->blocosDescricao])

                        <a href="/experiencias/{{ $experiencia->id }}/create-medias-interna" class="btn btn-info">
                            Proximo <i class="fa fa-arrow-right"></i> 
                        </a>
                    </div>

                    </div>
                
                </div>
            </div>
        </div>
    </div>
@endsection

