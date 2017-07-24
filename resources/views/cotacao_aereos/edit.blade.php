@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Cotacao Aereo
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($cotacaoAereo, ['route' => ['cotacaoAereos.update', $cotacaoAereo->id], 'method' => 'patch']) !!}

                        @include('cotacao_aereos.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection