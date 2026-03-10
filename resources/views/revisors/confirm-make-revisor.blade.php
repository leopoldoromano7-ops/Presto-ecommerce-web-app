<x-layout>
    <main class="container mt-navbar py-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-6">
                <div class="card border-0 shadow-sm p-4">
                    <h1 class="h3 mb-3">Conferma promozione revisore</h1>
                    <p class="mb-2">
                        Stai per rendere revisore:
                        <strong>{{ $user->name }}</strong>
                    </p>
                    <p class="text-muted mb-4">{{ $user->email }}</p>

                    <form action="{{ request()->fullUrl() }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-register">
                            Conferma
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </main>
</x-layout>
