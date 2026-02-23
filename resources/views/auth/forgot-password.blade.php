<x-layout>
  <main class="container-fluid position-relative">
    <div class="mt-navbar mt-5">
      @if (session("status"))
      <div class="status-message-resend-password">
          {{ __('ui.reset_link_sent') }}
      </div>
      @endif
      <section class="row forgot-password mobile-bg-forgot align-items-center">
        <article class="col-12">
          <h3 class="tx-white text-center">Reset password</h3>
          <div class="form-container-password">
            <form method="POST" action="{{route('password.email')}}">
              @csrf
              <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" required autofocus>
                @error('email') <p class="error-message">{{ $message }}</p> @enderror
              </div>
              
              <button type="submit" class="btn btn-register mt-2">Recupero password</button>
            </form>
            
            <div class="mt-3 mb-5 text-center">
              <a href="{{ route('login') }}"><i class="bi bi-arrow-return-left me-1"></i>Torna al Login</a>
            </div>
            
          </article>
        </section>
      </main>
    </div>
</x-layout>
