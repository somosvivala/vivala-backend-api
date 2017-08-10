@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Cotacao Cruzeiro
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($cotacaoCruzeiro, ['route' => ['cotacaoCruzeiros.update', $cotacaoCruzeiro->id], 'method' => 'patch']) !!}

                        @include('cotacao_cruzeiros.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection