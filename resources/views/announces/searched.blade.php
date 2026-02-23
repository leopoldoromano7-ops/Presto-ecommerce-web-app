<x-layout>
    <main class="container">
        <section class="row row-searched g-4">
            <h3 class="tx-darkBlu text-center">Risultati per la ricerca: <span>{{$query}}</span></h3>
            
            @forelse($announces as $announce)
            <div class="col-12 col-md-6 col-lg-4">
                <x-card :announce="$announce"/>
            </div>
            @empty
            <div class="text-center">
                <h5 class="tx-grey">Non ci sono annunci corrispondenti alla tua ricerca!</h5>
            </div>
            @endforelse
        </section>
        <div class="mt-4">
            {{$announces->links()}}
        </div>
    </main> 
</x-layout>