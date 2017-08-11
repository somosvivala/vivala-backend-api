@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>Pedidos de cotação de aluguel de carros</h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('cotacao_carros.table')
            </div>
        </div>
    </div>
@endsection

