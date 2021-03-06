@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Agente
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($agente, ['route' => ['agentes.update', $agente->id], 'method' => 'patch']) !!}

                        @include('agentes.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection