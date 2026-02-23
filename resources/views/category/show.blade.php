<x-layout>
    <main class="container">
        <section class="row index-category g-4">
            <h3 class="tx-darkBlu text-center">
                {{ $category->name }}
            </h3>
            @forelse($announces as $announce) 
            <article class="col-12 col-md-6 col-lg-4">
                <x-card :announce="$announce"/>
            </article>
            @empty
            <div class="text-center">
                <h5 class="tx-grey">Non ci sono ancora annunci inseriti in questa categoria!</h5>
                
                @auth
                <a class="btn btn-plus mt-5 mb-5" href="{{ route('announces_create') }}">
                    <i class="fa-solid fa-plus"></i>
                </a>
                @endauth
            </div>
            @endforelse
        </section>
    </main>
</x-layout>
