@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Agente
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row row-agentes" style="padding-left: 20px">
                    
                    <img class="foto-agente" src="{{ $agente->foto ? $agente->foto->url : '' }}" alt="Foto {{ $agente->nome }}">
                    <a href="{!! url('agentes/'.$agente->id.'/foto') !!}" class="btn btn-default">Trocar Foto</a>

                    @include('agentes.show_fields')
                    <a href="{!! route('agentes.index') !!}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
