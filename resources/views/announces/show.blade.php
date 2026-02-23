    <x-layout>
        <div class="container py-5 mt-navbar">
            <div class="announce-wrapper row align-items-start">
                
                {{-- carouselll --}}
                <div class="col-12 col-md-6 position-relative">  
                    
                    @if ($announce->images->count() > 0)
                    
                    <div id="announceCarousel" class="carousel slide">
                        <div class="carousel-inner">
                            @foreach ($announce->images as $key => $image)
                            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                <a href="{{ $image->getUrl(600,600) }}" target="_blank">
                                    <img src="{{ $image->getUrl(600,600) }}"class="d-block w-100 rounded carousel-img-fixed"alt="Immagine {{ $key }}">
                                    <i class="bi bi-zoom-in zoom-icon"></i>
                                </a>
                            </div>
                            @endforeach
                        </div>
                        
                        {{-- Contatore slide --}}
                        <div class="carousel-counter">
                            <span id="current-slide">1</span> / 
                            <span id="total-slides">{{ $announce->images->count() }}</span>
                        </div>
                        
                        @if ($announce->images->count() > 1)
                        <button class="carousel-control-prev" type="button" data-bs-target="#announceCarousel" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                        </button>
                        
                        <button class="carousel-control-next" type="button" data-bs-target="#announceCarousel" data-bs-slide="next">
                            <span class="carousel-control-next-icon"></span>
                        </button>
                        @endif
                        
                    </div>
                    
                    {{-- altrimenti carusiello con img stock! --}}
                    @else
                    <div id="announceCarousel" class="carousel slide">
                        <div class="carousel-inner">
                            @for ($i = 1; $i <= 4; $i++)
                            <div class="carousel-item @if($i == 1) active @endif">
                                <a href="{{ asset("img/stock{$i}.jpg") }}" target="_blank">
                                    <img src="{{ asset("img/stock{$i}.jpg") }}" class="d-block w-100 rounded carousel-img-fixed" alt="Immagine {{$i}}">
                                    <i class="bi bi-zoom-in zoom-icon"></i>
                                </a>
                            </div>
                            @endfor
                        </div>
                        
                        <div class="carousel-counter">
                            <span>1</span> / <span>4</span>
                        </div>
                        
                        <button class="carousel-control-prev" type="button" data-bs-target="#announceCarousel" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                        </button>
                        
                        <button class="carousel-control-next" type="button" data-bs-target="#announceCarousel" data-bs-slide="next">
                            <span class="carousel-control-next-icon"></span>
                        </button>
                    </div>
                    @endif
                </div>
                
                
                <div class="col-12 col-md-6">
                    <h1 class="announce-title">{{ $announce->title }}</h1>
                    <p class="announce-price">{{ $announce->price }} €</p>
                    <p><span class="announce-label">Categoria:</span> {{ $announce->category->name }}</p>
                    <div class="divider"></div>
                    <p class="announce-description">{{ $announce->description }}</p>
                    <a href="{{ route('announces_index') }}" class="btn-back">
                        <i class="bi bi-arrow-return-left me-1"></i> Torna agli annunci
                    </a>
                </div>  
                
            </div>
        </div>
    </x-layout>
    