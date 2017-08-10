@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Cotacao Seguro
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($cotacaoSeguro, ['route' => ['cotacaoSeguros.update', $cotacaoSeguro->id], 'method' => 'patch']) !!}

                        @include('cotacao_seguros.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection