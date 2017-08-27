@extends('layouts.partials.modal')

@section('modal-id') id='modal-foto' @overwrite

@section('modal-title')
Adicionando uma foto ao slider da expedicao
@overwrite

@section('modal-body')

@include('dropzone.upload', [
    'formUrl' => 'expedicaos/'.$expedicao->id.'/create-medias-interna',
    'owner_id' => $owner_id,
    'owner_type' => $owner_type,
    'ordem' => $ordem
])

 @overwrite

