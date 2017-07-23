<!-- Footer -->
<footer>
  <a href="http://grupotesseract.com.br/" target="_blank">
    <h4>Grupo Tesseract</h4></a>

  <a href="http://grupotesseract.com.br/" target="_blank">
    <img src="{{ asset('icones/logo-tesseract-preto-simples.svg') }}"></a>

  <a href="http://grupotesseract.com.br/" target="_blank">
    <i class="fa fa-home" aria-hidden="true"></i></a>

  <a href="https://www.facebook.com/grupotesseract" target="_blank">
    <i class="fa fa-facebook-official" aria-hidden="true"></i></a>

  <a href="https://github.com/grupotesseract" target="_blank">
    <i class="fa fa-github" aria-hidden="true"></i></a>

  <a href="http://grupotesseract.com.br/" target="_blank">
    <i class="fa fa-linkedin-square" aria-hidden="true"></i>
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