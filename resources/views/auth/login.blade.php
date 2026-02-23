<x-layout>
  <main class="container-fluid">
    <div class="mt-navbar mt-5">
      @if (session("status"))
      <div class="status-message-resend-password">
        {{ __('ui.update_password') }}
      </div>
      @endif
      <section class="row login-custom d-flex align-items-center mobile-bg-login">
        <h3 class="tx-white text-center mt-5">Accedi</h3>
        <article class="col-12">
          <div class="form-container-login">
            <form method="POST" action="{{ route('login') }}">
              @csrf
              
              <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" required autofocus>
                @error('email') <p class="error-message">{{ $message }}</p> @enderror
              </div>
              
              <div class="mb-3">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required>
                @error('password') <p class="error-message">{{ $message }}</p> @enderror
                <div class="text-center mt-1">
                  <a href="{{route('password.request')}}">Password dimenticata?</a>
                </div>
              </div>
              
              <button type="submit" class="btn btn-register mt-2">Login</button>
            </form>
            
            <p class="mt-3 text-center">Non hai un account? <a href="{{ route('register') }}">Registrati qui</a></p>
          </div>
          
        </article>
      </section>
    </main>
  </x-layout>
  