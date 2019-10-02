<li class="treeview {{ (Request::is('expedicaos*') || Request::is('volunturismo*')) ? 'active' : '' }}" id="scrollspy-components">
    <a href="javascript:void(0)"><i class="fa fa-handshake-o"></i>&nbsp;Volunturismo</a>
    <ul class="nav treeview-menu">
        <li class="{{ Request::is('volunturismo/video') ? 'active' : '' }}">
            <a href="/volunturismo/video"><i class="fa fa-play" aria-hidden="true"></i><span>Video</span></a>
        </li>
        <li class="{{ Request::is('volunturismo/foto-home') ? 'active' : '' }}">
            <a href="/volunturismo/foto-home"><i class="fa fa-image" aria-hidden="true"></i><span>Foto da Home</span></a>
        </li>
        <li class="{{ Request::is('expedicaos') ? 'active' : '' }}">
            <a href="{!! route('expedicaos.index') !!}"><i class="fa fa-heartbeat" aria-hidden="true"></i><span>Expedições</span></a>
        </li>
    </ul>
</li>

<li class="treeview {{ (Request::is('experiencias*') || Request::is('ecoturismo*')) ? 'active' : '' }}" id="scrollspy-components">
    <a href="javascript:void(0)"><i class="fa fa-leaf"></i>Ecoturismo</a>
    <ul class="nav treeview-menu">
        <li class="{{ Request::is('ecoturismo/video') ? 'active' : '' }}">
            <a href="/ecoturismo/video"><i class="fa fa-play" aria-hidden="true"></i><span>Video</span></a>
        </li>
        <li class="{{ Request::is('ecoturismo/foto-home') ? 'active' : '' }}">
            <a href="/ecoturismo/foto-home"><i class="fa fa-image" aria-hidden="true"></i><span>Foto da Home</span></a>
        </li>
        <li class="{{ Request::is('experiencias*') ? 'active' : '' }}">
            <a href="{!! route('experiencias.index') !!}"><i class="fa fa-tree" aria-hidden="true"></i><span>Experiências</span></a>
        </li>
    </ul>
</li>

<li class="treeview {{ (Request::is('imersaos*') || Request::is('imersoes*')) ? 'active' : '' }}" id="scrollspy-components">
    <a href="javascript:void(0)"><i class="fa fa-globe"></i>Imersões</a>
    <ul class="nav treeview-menu">
        <li class="{{ Request::is('imersoes/video') ? 'active' : '' }}">
            <a href="/imersoes/video"><i class="fa fa-play" aria-hidden="true"></i><span>Video</span></a>
        </li>
        <li class="{{ Request::is('imersoes/foto-home') ? 'active' : '' }}">
            <a href="/imersoes/foto-home"><i class="fa fa-image" aria-hidden="true"></i><span>Foto da Home</span></a>
        </li>
        <li class="{{ Request::is('imersaos*') ? 'active' : '' }}">
            <a href="{!! route('imersaos.index') !!}"><i class="fa fa-globe"></i><span>Imersões</span></a>
        </li>
    </ul>
</li>

<li class="treeview {{ (Request::is('instituto*') || Request::is('instituto*')) ? 'active' : '' }}" id="scrollspy-components">
    <a href="javascript:void(0)"><i class="fa fa-heart"></i>Instituto</a>
    <ul class="nav treeview-menu">
        <li class="{{ Request::is('instituto/foto-home') ? 'active' : '' }}">
            <a href="/instituto/foto-home"><i class="fa fa-image" aria-hidden="true"></i><span>Foto da Home</span></a>
        </li>
    </ul>
</li>

<!-- Dropdown Menu Contatos -->
<li class="treeview" id="scrollspy-components">
    <a href="javascript:void(0)"><i class="fa fa-newspaper-o"></i>Contatos</a>
    <ul class="nav treeview-menu">
        <li class="{{ Request::is('contatoCorporativo*') ? 'active' : '' }}">
            <a href="{!! route('contatoCorporativo.index') !!}"><i class="fa fa-suitcase" aria-hidden="true"></i></i><span>Corporativo</span></a>
        </li>

        <li class="{{ Request::is('contatoGeral*') ? 'active' : '' }}">
            <a href="{!! route('contatoGeral.index') !!}"><i class="fa fa-envelope-o" aria-hidden="true"></i></i><span>Geral</span></a>
        </li>
    </ul>
</li>

<li class="{{ Request::is('inscricaoNewsletters*') ? 'active' : '' }}">
    <a href="{!! route('inscricaoNewsletters.index') !!}"><i class="fa fa-envelope-o" aria-hidden="true"></i><span>Newsletter</span></a>
</li>
