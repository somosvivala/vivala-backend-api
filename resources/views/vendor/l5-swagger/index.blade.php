<!-- HTML for static distribution bundle build -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>{{config('l5-swagger.api.title')}}</title>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700|Source+Code+Pro:300,600|Titillium+Web:400,600,700" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Titillium+Web:300,400,600,700" rel="stylesheet">
  <link href="{{ asset('icones/font-awesome/css/font-awesome.min.css') }}" media="all" rel="stylesheet" type="text/css" />
  <link href="{{ asset('fonts/jaapokki-regular.ttf') }}" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="{{ l5_swagger_asset('swagger-ui.css') }}" >
  <link rel="icon" type="image/png" href="{{ l5_swagger_asset('favicon-32x32.png') }}" sizes="32x32" />
  <link rel="icon" type="image/png" href="{{ l5_swagger_asset('favicon-16x16.png') }}" sizes="16x16" />
  <style>
    html
    {
        box-sizing: border-box;
        overflow: -moz-scrollbars-vertical;
        overflow-y: scroll;
    }
    *,
    *:before,
    *:after
    {
        box-sizing: inherit;
    }

    body {
      margin:0;
      background: #fafafa;
    }
  </style>
  <link href="{{ asset('css/documentation-style.css') }}" media="all" rel="stylesheet" type="text/css" />
</head>

<body>

<!-- Barra de Navegação do Swagger Customizada -->
<nav>
  <img src="{{ asset('icones/vivala-branco-100px.png') }}">
</nav>

<div id="swagger-ui"></div>

<!-- Footer -->
<footer>
  <a href="http://grupotesseract.com.br/" target="_blank">
    <h2>Grupo Tesseract</h2>
  </a>

  <a href="http://grupotesseract.com.br/" target="_blank">
    <img src="{{ asset('icones/logo-tesseract-preto-simples.svg') }}">
  </a>

  <a href="http://grupotesseract.com.br/" target="_blank">
    <i class="fa fa-home fa-2x" aria-hidden="true"></i>
  </a>

  <a href="https://www.facebook.com/grupotesseract" target="_blank">
    <i class="fa fa-facebook-official fa-2x" aria-hidden="true"></i>
  </a>

  <a href="https://github.com/grupotesseract" target="_blank">
    <i class="fa fa-github fa-2x" aria-hidden="true"></i>
  </a>

  <i class="fa fa-linkedin-square fa-2x" aria-hidden="true"></i>
</footer>

<script src="{{ l5_swagger_asset('swagger-ui-bundle.js') }}"> </script>
<script src="{{ l5_swagger_asset('swagger-ui-standalone-preset.js') }}"> </script>
<script>
window.onload = function() {
  // Build a system
  const ui = SwaggerUIBundle({
    dom_id: '#swagger-ui',

    url: "{!! $urlToDocs !!}",
    operationsSorter: {!! isset($operationsSorter) ? '"' . $operationsSorter . '"' : 'null' !!},
    configUrl: {!! isset($additionalConfigUrl) ? '"' . $additionalConfigUrl . '"' : 'null' !!},
    validatorUrl: {!! isset($validatorUrl) ? '"' . $validatorUrl . '"' : 'null' !!},
    oauth2RedirectUrl: "{{ route('l5-swagger.oauth2_callback') }}",

    presets: [
      SwaggerUIBundle.presets.apis,
      SwaggerUIStandalonePreset
    ],

    plugins: [
      SwaggerUIBundle.plugins.DownloadUrl
    ],

    layout: "StandaloneLayout"
  })

  window.ui = ui
}
</script>
</body>

</html>
