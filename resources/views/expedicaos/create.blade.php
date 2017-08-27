@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Passo 1 - Informações gerais da expedição
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'expedicaos.store']) !!}

                        @include('expedicaos.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
