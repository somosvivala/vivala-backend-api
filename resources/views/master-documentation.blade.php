<!-- HTML for static distribution bundle build -->
<!DOCTYPE html>
<html lang="en">

@yield('documentation-head')

<body>

<!-- Barra de Navegação do Swagger Customizada -->
<nav>
  <img src="{{ asset('icones/vivala-branco-100px.png') }}">
</nav>

<!-- Documentação Gerada Pelo Swagger -->
<div id="swagger-ui"></div>

@yield('documentation-footer')

</body>

</html>
