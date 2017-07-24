<li class="{{ Request::is('inscricaoNewsletters*') ? 'active' : '' }}">
    <a href="{!! route('inscricaoNewsletters.index') !!}"><i class="fa fa-edit"></i><span>InscricaoNewsletters</span></a>
</li>

<li class="{{ Request::is('experiencias*') ? 'active' : '' }}">
    <a href="{!! route('experiencias.index') !!}"><i class="fa fa-edit"></i><span>Experiencias</span></a>
</li>

{{-- ROTA DESATIVADA, VAI SER ACESSADA DE DENTRO DA EXP
<li class="{{ Request::is('blocoDescricaos*') ? 'active' : '' }}">
    <a href="{!! route('blocoDescricaos.index') !!}"><i class="fa fa-edit"></i><span>BlocoDescricaos</span></a>
</li>
--}}

{{-- ROTA DESATIVADA, VAI SER ACESSADA DE DENTRO DA EXP
<li class="{{ Request::is('fotos*') ? 'active' : '' }}">
    <a href="{!! route('fotos.index') !!}"><i class="fa fa-edit"></i><span>Fotos</span></a>
</li>
--}}



<li class="{{ Request::is('expedicaos*') ? 'active' : '' }}">
    <a href="{!! route('expedicaos.index') !!}"><i class="fa fa-edit"></i><span>Expedicaos</span></a>
</li>

{{--  ROTA DESATIVADA, VAI SER ACESSADA DE DENTRO DA EXP
<li class="{{ Request::is('inscricaoExpedicaos*') ? 'active' : '' }}">
    <a href="{!! route('inscricaoExpedicaos.index') !!}"><i class="fa fa-edit"></i><span>InscricaoExpedicaos</span></a>
</li>
--}}

{{--  ROTA DESATIVADA, VAI SER ACESSADA DE DENTRO DA EXP
<li class="{{ Request::is('inscricaoExperiencias*') ? 'active' : '' }}">
    <a href="{!! route('inscricaoExperiencias.index') !!}"><i class="fa fa-edit"></i><span>InscricaoExperiencias</span></a>
</li>
--}}

<li class="{{ Request::is('cotacaoHospedagems*') ? 'active' : '' }}">
    <a href="{!! route('cotacaoHospedagems.index') !!}"><i class="fa fa-edit"></i><span>CotacaoHospedagems</span></a>
</li>

