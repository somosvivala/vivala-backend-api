@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Cotacao Rodoviario
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($cotacaoRodoviario, ['route' => ['cotacaoRodoviarios.update', $cotacaoRodoviario->id], 'method' => 'patch']) !!}

                        @include('cotacao_rodoviarios.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection