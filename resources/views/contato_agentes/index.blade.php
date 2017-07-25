@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="">Contatos pelo formulário de Agentes</h1>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('contato_agentes.table')
            </div>
        </div>
    </div>
@endsection

