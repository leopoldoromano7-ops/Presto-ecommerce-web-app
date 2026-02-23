<x-layout>
    <header class="container-fluid">
        <section class="row header-custom">
            <article class="col-12 d-flex align-items-center justify-content-center" data-aos="fade-up" data-aos-duration="3000">
                <form class="form-search mt-2" action="{{route('announce_search')}}" method="GET">
                    <div class="d-flex">
                        <label class="form-label m-0"></label>
                        <input type="search" name="query" class="form-control" placeholder= "{{ __('ui.SearchBar') }}" aria-label="Search"/>                        
                        <div class="dropdown">
                            <button class="btn btn-dropdown dropdown-toggle " type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ __('ui.allCategory') }}
                            </button>                            
                            <ul class="dropdown-menu">
                            @foreach ($categories as $category)
                                <li>
                                    <a class="dropdown-item tx-darkBlu" href="{{ route('category_show', ['category' => $category])}}">
                                        {{ __("ui.$category->name") }}
                                    </a>
                                </li>
                                 @if(!$loop->last)
                                  <hr class="dropdown-divider">
                                 @endif
                            @endforeach
                            </ul>   
                        </div>
                        <button class="btn btn-search" type="submit">
                            <i class="bi bi-search"></i>
                        </button>
                    </div>  
                </form>
            </article> 
        </section> 
    </header>
    <main class="container mt-5">
        <h4 class="tx-darkBlu">{{ __('ui.Evidence') }}</h4>
        <section class="row announce-scroll mb-4 ">
            @foreach($announces as $announce)
             <article class="col-12 col-md-4">
                <x-card :announce="$announce"/>
             </article>
            @endforeach
        </section>
    </main>
</x-layout>
