@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Cotacao Hospedagem
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'cotacaoHospedagems.store']) !!}

                        @include('cotacao_hospedagems.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
