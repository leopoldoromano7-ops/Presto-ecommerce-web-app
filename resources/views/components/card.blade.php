<div class="card card-announce mt-3">

    <img src="{{ $announce->images->isNotEmpty()
        ? Storage::url($announce->images->first()->path)
        : asset('/img/segnaposto.jpeg') }}"
        class="card-img-top card-img-fixed"
        alt="immagine annuncio">

    <div class="card-body">
        <h6 class="card-title">{{$announce->title}}</h6>
        <p class="card-text">{{$announce->price}} €</p>
        
        @if(Route::currentRouteName() != 'category_show')
        <a class="btn btn-category" href="{{route("category_show",["category"=>$announce->category])}}">
            {{ __("ui.".$announce->category->name) }}
        </a>
        @endif
        <div class="d-flex justify-content-center">
            <a href="{{route("announces_show",compact("announce"))}}" class="btn btn-detail">
                {{__("ui.Detail")}}
            </a>
        </div>
    </div>

</div>
