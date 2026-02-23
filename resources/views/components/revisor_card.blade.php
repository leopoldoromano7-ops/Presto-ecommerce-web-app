<div class="card border-0 container">
    <section class="row justify-content-center">
        
        <article class="col-12 col-md-6 mt-2">
            <div class="row g-2"> 
                @if($announce->images->isNotEmpty())
                    @foreach ($announce->images as $image)
                        <div class="col-4 col-md-4">
                            <div class="position-relative mb-3">
                                <a href="{{ $image->getUrl(600,600)}}" target="_blank">
                                    <img src="{{ $image->getUrl(600,600) }}" class="img-fluid rounded square-img">
                                </a>
                                <i class="bi bi-zoom-in zoom-icon"></i>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-12 text-center mb-5">
                        <div class="position-relative d-inline-block">
                            <a href="{{ asset('/img/segnaposto.jpeg') }}" target="_blank">
                                <img src="{{ asset('/img/segnaposto.jpeg') }}" class="rounded square-img img-fluid">
                                <i class="bi bi-zoom-in zoom-icon"></i>
                            </a>
                        </div>
                    </div>
                @endif
            </div>
        </article>

        <article class="col-12 col-md-6 mt-2">
            <h5 class="announce-title">{{ $announce->title }}</h5>
            <p class="announce-price">{{ $announce->price }} €</p>
            <p>
                <span class="announce-label">Categoria:</span> 
                {{ $announce->category->name }}
            </p>
            <div class="divider"></div>
            <p class="announce-description">
                {{ $announce->description }}
            </p>
        </article>
    </section>    

    <section class="row mt-4">
        @if($announce->images->isNotEmpty())
            @foreach($announce->images as $image)
                <div class="col-12 border-bottom mb-3 pb-3">
                    <div class="row">
                        <article class="col-12 col-md-4">
                            <h6>Labels</h6>
                            @if (!empty($image->labels))
                                @foreach ($image->labels as $label)
                                    <span class="badge bg-grey me-1">{{ $label }}</span>
                                @endforeach
                            @else
                                <small class="text-muted">no labels</small>
                            @endif
                        </article>

                        <article class="col-12 col-md-8">
                            <h6>Ratings</h6>
                            <div class="d-flex flex-wrap">
                                <div class="me-4"><div class="{{$image->adult}}"></div> <small>Adult</small></div>
                                <div class="me-4"><div class="{{$image->spoof}}"></div> <small>Spoof</small></div>
                                <div class="me-4"><div class="{{$image->violence}}"></div> <small>Violence</small></div>
                                <div class="me-4"><div class="{{$image->medical}}"></div> <small>Medical</small></div>
                                <div class="me-4"><div class="{{$image->racy}}"></div> <small>Racy</small></div>
                            </div>
                        </article>
                    </div>
                </div>
            @endforeach
        @endif
    </section>
</div>