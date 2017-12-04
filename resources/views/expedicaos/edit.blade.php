@extends('layouts.app')

@section('content')
<section class="content-header">
    <h1>
        Editando a Expedição
    </h1>
</section>
<div class="content" style="min-height:500px">
    @include('adminlte-templates::common.errors')

            <!-- Custom Tabs -->
            <div class="nav-tabs-custom" style="min-height:500px">

                <ul class="nav nav-tabs">
                    <li class="active">
                        <a href="#tab_infoGeral" data-toggle="tab" aria-expanded="true">
                            <strong>Geral</strong>
                        </a>
                    </li>
                    <li class="">
                        <a href="#tab_fotoListagem" data-toggle="tab" aria-expanded="false">
                            <strong>Foto da listagem</strong>
                        </a>
                    </li>
                    <li class="">
                        <a href="#tab_blocosDescricao" data-toggle="tab" aria-expanded="false">
                            <strong>Descrições Pág. interna</strong>
                        </a>
                    </li>
                    <li class="">
                        <a href="#tab_medias_slider" data-toggle="tab" aria-expanded="false">
                            <strong>Fotos e Videos Pág. Interna </strong>
                        </a>
                    </li>
                    <li class="">
                        <a href="#tab_inscricoes" data-toggle="tab" aria-expanded="false">
                            <strong>Inscrições</strong>
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_infoGeral" style="min-height:220px;">
                        {!! Form::model($expedicao, [
                        'route' => ['expedicaos.update', $expedicao->id], 
                        'method' => 'patch']) !!}

                        @include('expedicaos.fields')

                        {!! Form::close() !!}

                    </div>
                    <div class="tab-pane" id="tab_blocosDescricao">

                                <a class="btn btn-primary" href="#modal-foto" data-toggle="modal" data-target="#modal-blocosDescricao">Adicionar bloco de descricao &nbsp; <i class="fa fa-file-text"></i></a>
                        <hr>

                        @include('bloco_descricaos.create-modal', [
                        'modal_id' => 'modal-blocosDescricao',
                        'owner_id' => $expedicao->id,
                        'owner_type' => get_class($expedicao)
                        ])

                        @include('bloco_descricaos.table', ['blocoDescricaos' => $expedicao->blocosDescricao])
                    </div>
                    <div class="tab-pane" id="tab_fotoListagem">
                        <img src="//res.cloudinary.com/vivala/image/upload/{{ $expedicao->mediaListagem ? $expedicao->mediaListagem->cloudinary_id : '' }}" alt="Foto da {{ $expedicao->titulo}}">
                        <a class="btn btn-primary" href="/expedicaos/{{$expedicao->id}}/foto-listagem">Trocar Foto &nbsp; <i class="fa fa-pencil"></i></a>

                    </div>
                    <div class="tab-pane" id="tab_medias_slider">
                        <div class="col-xs-12 text-center" style="margin-top:2rem">
                            <div class="col-xs-6">
                                <a class="btn btn-primary" href="#modal-video" data-toggle="modal" data-target="#modal-video">Adicionar Video &nbsp; <i class="fa fa-play"></i></a>
                            </div>
                            <div class="col-xs-6">
                                <a class="btn btn-primary" href="#modal-foto" data-toggle="modal" data-target="#modal-foto">Adicionar Foto &nbsp; <i class="fa fa-image"></i></a>
                            </div>
                        </div>
                        <div class="col-xs-12 text-center mx-auto">
                            @include('expedicaos.medias_slider', [
                                'expedicao' => $expedicao
                            ])
                        </div>
                        <div class="container-modal-videos ">
                            @include('expedicaos.partials.modal_video_slider', [
                                'modal_id' => 'modal-video',
                                'owner_id' => $expedicao->id,
                                'owner_type' => get_class($expedicao),
                                'ordem' => count($expedicao->mediasSlider)
                            ])
                        </div>
                        <div class="container-modal-fotos ">
                            @include('expedicaos.partials.modal_foto_slider', [
                                'modal_id' => 'modal-foto',
                                'owner_id' => $expedicao->id,
                                'owner_type' => get_class($expedicao),
                                'ordem' => count($expedicao->mediasSlider)
                            ])
                        </div>
                    </div>
                    <div class="tab-pane" id="tab_inscricoes">
                        <h3>Numero de Inscritos: {{ $expedicao->inscricoes()->count() }}</h3>
                        <hr>
                        <a class="btn btn-primary" href="/expedicaos/{{$expedicao->id}}/inscricoes">Ver tabela de Inscritos &nbsp; <i class="fa fa-eye"></i></a>
                    </div>





                    <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
            </div>
            <!-- nav-tabs-custom -->

</div>
@endsection
