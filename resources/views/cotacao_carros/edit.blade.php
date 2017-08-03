@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Cotacao Carro
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($cotacaoCarro, ['route' => ['cotacaoCarros.update', $cotacaoCarro->id], 'method' => 'patch']) !!}

                        @include('cotacao_carros.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection