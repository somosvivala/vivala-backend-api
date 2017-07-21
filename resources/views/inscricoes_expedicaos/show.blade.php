@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Inscricoes Expedicao
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('inscricoes_expedicaos.show_fields')
                    <a href="{!! route('inscricoesExpedicaos.index') !!}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
