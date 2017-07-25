@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Experiencia
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($experiencia, ['route' => ['experiencias.update', $experiencia->id], 'method' => 'patch']) !!}

                        @include('experiencias.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection