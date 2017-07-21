@extends('layouts.app')

@section('content')
<section class="content-header">
    <h1>
        Expedição {{ $expedicao->titulo }}
    </h1>
</section>
<div class="content">
    @include('adminlte-templates::common.errors')

            <!-- Custom Tabs -->
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a href="#tab_infoGeral" data-toggle="tab" aria-expanded="true">
                            <strong>Geral</strong>
                        </a>
                    </li>
                    <li class="">
                        <a href="#tab_blocosDescricao" data-toggle="tab" aria-expanded="false">
                            <strong>Descrições</strong>
                        </a>
                    </li>
                    <li class="">
                        <a href="#tab_fotos" data-toggle="tab" aria-expanded="false">
                            <strong>Fotos</strong>
                        </a>
                    </li>
                    <li class="">
                        <a href="#tab_videos" data-toggle="tab" aria-expanded="false">
                            <strong>Videos</strong>
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
                        <!-- Submit Field -->
                        <div class="form-group col-sm-12">
                            {!! Form::submit('Atualizar', ['class' => 'btn btn-primary']) !!}
                            <a href="{!! route('expedicaos.index') !!}" class="btn btn-default">Cancelar</a>
                        </div>


                        {!! Form::close() !!}

                    </div>
                    <div class="tab-pane" id="tab_blocosDescricao">
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-blocosDescricao">
                            <i class="fa fa-plus margin-r-3"></i> &nbsp; Adicionar descrição
                        </button>

                        <hr>

                        @include('bloco_descricaos.create-modal', [
                        'modal_id' => 'modal-blocosDescricao',
                        'owner_id' => $expedicao->id,
                        'owner_type' => get_class($expedicao)
                        ])

                        @include('bloco_descricaos.table', ['blocoDescricaos' => $expedicao->blocosDescricao])
                    </div>
                    <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
            </div>
            <!-- nav-tabs-custom -->

</div>
@endsection
