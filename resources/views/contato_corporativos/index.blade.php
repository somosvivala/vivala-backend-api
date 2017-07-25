@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>Contatos pelo formulário Corporativo</h1>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('contato_corporativos.table')
            </div>
        </div>
    </div>
@endsection

