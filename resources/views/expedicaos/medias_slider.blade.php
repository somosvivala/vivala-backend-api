

<ul id="listagem-medias-slider-exp">

@forelse ($expedicao->mediasSlider as $Media)

    <li class="col-xs-12 col-sm-6 col-md-3 media-item">
    @if ($Media && $Media['type'] == 'photo')
        <img class="img-media-slider" src="//res.cloudinary.com/vivala/image/upload/{{ $Media['code'] }}" alt="Foto da {{ $expedicao->titulo}}">
    @else
        <iframe class="video-media-slider" id="ytplayer" type="text/html" width="300" height="360" src="http://www.youtube.com/embed/{{$Media['code']}}" frameborder="0"/></iframe>
    @endif
    </li>

@empty

    <li> Essa expedição não possui nenhuma foto ou video </li>

@endforelse

</ul>
