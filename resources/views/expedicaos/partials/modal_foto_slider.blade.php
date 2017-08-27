@extends('layouts.partials.modal')

@section('modal-id', $modal_id)

@section('modal-title', 'Adicionando uma foto ao slider da expedicao')

@section('modal-body')

@include('dropzone.upload', [
    'formUrl' => 'expedicaos/'.$expedicao->id.'/create-medias-interna',
    'owner_id' => $owner_id,
    'owner_type' => $owner_type,
])

@endsection

