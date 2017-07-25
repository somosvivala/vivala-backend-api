@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>Contatos pelo formulário Geral</h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('contato_gerals.table')
            </div>
        </div>
    </div>
@endsection

