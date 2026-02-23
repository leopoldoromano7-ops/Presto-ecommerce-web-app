<x-layout>
  <main class="container-fluid">
    <section class="row reset-password d-flex align-items-center">
      <article class="col-12">
        <h3 class="tx-white text-center m-5">Nuova password</h3>
        <div class="form-container-login h-50">
          <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $token ?? $request->route('token') ?? $request->token }}">
            
            <div class="mb-3">
              <label>Email</label>
              <input type="email" name="email" class="form-control" required readonly value="{{ old('email', $request->email) }}">
              @error('email') <p class="error-message">{{ $message }}</p> @enderror
            </div>
            
            <div class="mb-3">
              <label>Password</label>
              <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" required autofocus>
              @error('password') <p class="error-message">{{ $message }}</p> @enderror
            </div>

            <div class="mb-3">
              <label class="mb-2">Conferma Password</label>
              <input type="password" name="password_confirmation" class="form-control" required>
            </div>
            
            <button type="submit" class="btn btn-register mt-2">Aggiorna password</button>
          </form>
        </div>
        
      </article>
    </section>
  </main>
</x-layout>
