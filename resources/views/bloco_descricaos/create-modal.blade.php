@extends('layouts.partials.modal')

@section('modal-id', $modal_id)

@section('modal-title', 'Criando um bloco de descrição')

@section('modal-body')

{!! Form::open(['route' => 'blocoDescricaos.store', 'class' => 'ajax-form']) !!}

@include('bloco_descricaos.fields', [
    'owner_id' => $owner_id,
    'owner_type' => $owner_type,
])

{!! Form::close() !!}

@endsection

@section('scripts')
@include('ckeditor.builder', ['textAreaClass' =>"textarea-ck"])

<script>
$.ajax({
    url: 'mydomain.com/url',
    type: 'POST',
    dataType: 'xml/html/script/json',
    data: $.param( $('Element or Expression') ),
    complete: function (jqXHR, textStatus) {
        // callback
    },
    success: function (data, textStatus, jqXHR) {
        // success callback
    },
    error: function (jqXHR, textStatus, errorThrown) {
        // error callback
    }
});
</script>

@endsection


