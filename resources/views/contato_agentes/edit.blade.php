@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Contato Agente
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($contatoAgente, ['route' => ['contatoAgentes.update', $contatoAgente->id], 'method' => 'patch']) !!}

                        @include('contato_agentes.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection