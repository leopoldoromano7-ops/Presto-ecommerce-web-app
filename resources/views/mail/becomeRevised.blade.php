<x-layout>
  <main class="container-fluid">
    <section class="row become-revisor">
      <div class="col-7">

        <div class="d-flex justify-content-center mt-5">

          @if (session('errorMessage'))
          <div class="alert alert-danger text-center">
            {{ session('errorMessage') }}
          </div>
          @endif
          
          @if (session('status'))
          <div class="alert alert-yellow text-center">
            {{ session('status') }}
          </div>
          @endif
        </div>
        
        @if(Auth::user()->is_revisor==false)
        <div class="form-container-job">
          <form action="{{route("become.revisor")}}" method="POST">
            @csrf
            <div class="mb-3">
              <label for="name" class="form-label">Nome</label>
              <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror">
              @error('name')
              <p class="error-message">{{$message}}</p>
              @enderror
            </div>
            
            <div class="mb-3">
              <label for="mail1" class="form-label">Email </label>
              <input type="email" name="email" class="form-control @error('email') is-invalid @enderror">
              @error('email')
              <p class="error-message">{{$message}}</p>
              @enderror
            </div>
    
            <div class="mb-2">
              <label for="mail1" class="form-label">Lettera di presentazione</label>
              <textarea name="description" id="description" cols="30" rows="6" class="form-control @error('description') is-invalid @enderror"></textarea>
               @error('description')
              <p class="error-message">{{$message}}</p>
              @enderror
            </div>
            <button type="submit" class="btn btn-register mt-2">Invia</button>
          </form>
          @endif
        </div>
      </div>
    </section>
  </main>
</x-layout>