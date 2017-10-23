@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Contato Corporativo
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($contatoCorporativo, ['route' => ['contatoCorporativo.update', $contatoCorporativo->id], 'method' => 'patch']) !!}

                        @include('contato_corporativos.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
