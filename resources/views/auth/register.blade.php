<x-layout>
  <main class="container-fluid"> 
    <section class="row register-custom mobile-bg-register align-items-start">
      <div class="col-12 col-lg-7 mt-5 text-center text-lg-start">
        <h3 class="tx-white text-center">Registrazione</h3>
      </div>

      <div class="col-12 col-lg-5">
        <div class="form-container">
          <form method="POST" action="{{ route('register') }}">
            @csrf
            
            <div class="mb-2">
              <label class="mb-2">Nome</label>
              <input type="text" name="name" class="form-control" required>
              @error('name') 
              <p class="error-message">{{ $message }}</p> 
              @enderror
            </div>
            
            <div class="mb-2">
              <label class="mb-2">Email</label>
              <input type="email" name="email" class="form-control" required>
              @error('email') 
              <p class="error-message">{{ $message }}</p> 
              @enderror
            </div>
            
            <div class="mb-2">
              <label class="mb-2">Password</label>
              <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" required autofocus>
              @error('password')  
              <p class="error-message">{{ $message }}</p> 
              @enderror
            </div>
            
            <div class="mb-3">
              <label class="mb-2">Conferma Password</label>
              <input type="password" name="password_confirmation" class="form-control" required>
            </div>
            
            <button type="submit" class="btn btn-register">Registrati</button>
          </form>
          
          <p class="mt-3 text-center">
            Hai già un account?  
            <a href="{{ route('login') }}">Accedi qui</a>
          </p>
          
        </div>
      </div>
    </section>
  </main>
  
</x-layout>
