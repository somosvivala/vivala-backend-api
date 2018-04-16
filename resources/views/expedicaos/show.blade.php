@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Detalhes da Expedição {{ $expedicao->titulo }}
        </h1>
    </section>
    <div class="content">
        @include('flash::message')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('expedicaos.show_fields')
                    <a href="{!! route('expedicaos.index') !!}" class="btn btn-default">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
