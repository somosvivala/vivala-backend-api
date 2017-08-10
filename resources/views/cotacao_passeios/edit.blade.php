@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Cotacao Passeio
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($cotacaoPasseio, ['route' => ['cotacaoPasseios.update', $cotacaoPasseio->id], 'method' => 'patch']) !!}

                        @include('cotacao_passeios.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection