<x-layout>    
    <main class="container mt-navbar-revisors">
        
        <div class="d-flex justify-content-center">
            @if (session('status'))
                <div class="alert alert-{{session('type')}} text-center w-75">
                    {{ session('status') }}
                </div>
            @endif 
        </div>

        <section>
            
            @if($announce)
            <div class="row justify-content-center mb-5">
                <div class="col-12 col-lg-9 position-relative">
                    
                    <div class="position-absolute top-0 start-0 m-3 d-flex z-3">
                        
                        <form action="{{route('accept', $announce)}}" method="POST">
                            @csrf
                            @method("patch")
                            <button class="btn icon-confirm me-2">
                                <i class="bi bi-check-lg"></i>
                            </button>  
                        </form>
                        
                        <form action="{{route('reject', $announce)}}" method="POST">
                            @csrf
                            @method("patch")
                            <button class="btn icon-reject">
                                <i class="bi bi-x-lg"></i>
                            </button>
                        </form>
                        
                    </div>

                    <div class="card announce-wrapper mb-5 p-4 border-0">
                        <x-revisor_card :announce="$announce" />  
                    </div>

                </div>
            </div>
            @else
            <div class="text-center my-5">
                <h5 class="text-muted">
                    Ottimo lavoro! Non ci sono annunci da revisionare
                </h5>
            </div>
            @endif

            @if($last_announcement)
            <div class="text-center mb-5">
                <form action="{{route('back_announce', $last_announcement)}}" method="POST">
                    @csrf
                    @method("patch")
                    <button class="btn btn-secondary">
                        Ripristina revisione
                    </button>  
                </form>
            </div>
            @endif

            @if(isset($rejected_announces) && $rejected_announces->isNotEmpty())
            <div class="section-header-rejected mb-4">
                <h4>
                    Annunci rifiutati
                    <span class="badge-rejected">{{ $rejected_announces->count() }}</span>
                </h4>
            </div>

            <div class="rejected-scroll">
                <div class="row">
                    @foreach($rejected_announces as $rejected)
                    <div class="col-12 col-md-4 mb-3">

                        <div class="card rejected-card p-3">

                            <h5>{{ $rejected->title }}</h5>
                            <p>{{ $rejected->price }} €</p>

                            <form action="{{route('back_announce', $rejected)}}" method="POST">
                                @csrf
                                @method("patch")
                                <button class="btn btn-warning">
                                    Rimetti in revisione
                                </button>
                            </form>

                        </div>

                    </div>
                    @endforeach
                </div>
            </div>
            @endif

        </section>

    </main>
</x-layout>
