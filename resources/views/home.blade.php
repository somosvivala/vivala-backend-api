@extends('layouts.app')

@section('css') 

<link rel="stylesheet" href="/css/dropzone.css">
<link rel="stylesheet" href="/css/tesseract.css">
<link rel="stylesheet" href="/css/cropper.css">

@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xs-12 text-center">

            <h2>Testando Dropzone</h2>

            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-blocosDescricao">
                <i class="fa fa-plus margin-r-3"></i> &nbsp; Adicionar Foto
            </button>

            @include('dropzone.modal', [
            'modal_id' => 'modal-blocosDescricao',
            'formUrl' => 'photo-upload',
            'owner_id' => '1',
            'owner_type' => 'App\Models\Agente'
            ])
        </div>

    </div>
</div>



@endsection

@section('scripts')


@endsection
