@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Passo 1/4 - Informações gerais da experiência
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'experiencias.store']) !!}

                        @include('experiencias.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
