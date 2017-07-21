@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Inscricao Expedicao
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($inscricaoExpedicao, ['route' => ['inscricaoExpedicaos.update', $inscricaoExpedicao->id], 'method' => 'patch']) !!}

                        @include('inscricao_expedicaos.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection