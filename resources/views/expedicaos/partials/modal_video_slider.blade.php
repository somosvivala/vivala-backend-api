@extends('layouts.partials.modal')

@section('modal-id') id='modal-video' @overwrite

@section('modal-title', 'Adicionando um video ao slider da expedicao')

@section('modal-body')

{!! Form::open(['route' => 'videos.store']) !!}

    @include('videos.fields', [
        'owner_id' => $owner_id,
        'owner_type' => $owner_type
    ])

    {!! Form::hidden('ordem', $ordem) !!}

{!! Form::close() !!}

 @overwrite

