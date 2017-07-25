<!-- Dropdown Menu Contatos -->
<li class="treeview" id="scrollspy-components">
  <a href="javascript:void(0)"><i class="fa fa-newspaper-o"></i>Contatos</a>
  <ul class="nav treeview-menu">
    <li class="{{ Request::is('contatoAgentes*') ? 'active' : '' }}">
        <a href="{!! route('contatoAgentes.index') !!}"><i class="fa fa-group" aria-hidden="true"></i><span>Agentes</span></a>
    </li>

    <li class="{{ Request::is('contatoCorporativo*') ? 'active' : '' }}">
        <a href="{{-- route('contatoCorporativo.index') --}}"><i class="fa fa-suitcase" aria-hidden="true"></i></i><span>Corporativo</span></a>
    </li>

    <li class="{{ Request::is('contatoGeral*') ? 'active' : '' }}">
        <a href="{{-- route('contatoGeral.index') --}}"><i class="fa fa-envelope-o" aria-hidden="true"></i></i><span>Geral</span></a>
    </li>
  </ul>
</li>


<!-- Dropdown Menu Cotações -->
<li class="treeview" id="scrollspy-components">
  <a href="javascript:void(0)"><i class="fa fa-circle-o"></i>Cotações</a>
  <ul class="nav treeview-menu">
    <li class="{{ Request::is('cotacaoHospedagems*') ? 'active' : '' }}">
        <a href="{!! route('cotacaoHospedagems.index') !!}"><i class="fa fa-bed" aria-hidden="true"></i><span>Hospedagens</span></a>
    </li>

    <li class="{{ Request::is('cotacaoPacotes*') ? 'active' : '' }}">
        <a href="{!! route('cotacaoPacotes.index') !!}"><i class="fa fa-cubes" aria-hidden="true"></i></i><span>Pacotes</span></a>
    </li>

    <li class="{{ Request::is('cotacaoAereos*') ? 'active' : '' }}">
        <a href="{!! route('cotacaoAereos.index') !!}"><i class="fa fa-plane" aria-hidden="true"></i></i><span>Aéreos</span></a>
    </li>
  </ul>
</li>

<li class="{{ Request::is('expedicaos*') ? 'active' : '' }}">
    <a href="{!! route('expedicaos.index') !!}"><i class="fa fa-heartbeat" aria-hidden="true"></i></i><span>Expedições</span></a>
</li>

<li class="{{ Request::is('experiencias*') ? 'active' : '' }}">
    <a href="{!! route('experiencias.index') !!}"><i class="fa fa-safari" aria-hidden="true"></i><span>Experiências</span></a>
</li>

<li class="{{ Request::is('inscricaoNewsletters*') ? 'active' : '' }}">
    <a href="{!! route('inscricaoNewsletters.index') !!}"><i class="fa fa-envelope-o" aria-hidden="true"></i><span>Newsletter</span></a>
</li>
