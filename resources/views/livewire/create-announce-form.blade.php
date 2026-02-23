<div class="mt-4">
    @if (session()->has("status"))
    <div class="alert alert-create-announce text-center">
        {{ session('status') }}
    </div>
    @endif
    
    <form class="form-container-announce" wire:submit="save">
        
        <div class="mb-2">
            <label for="title" class="form-label">Titolo:</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" wire:model.blur="title">
            @error('title')
            <p class="error-message">{{$message}}</p>
            @enderror
        </div>
        
        <div class="mb-2">
            <label for="description" class="form-label">Descrizione:</label>
            <textarea class="form-control @error('description') is-invalid @enderror" id="description" cols="20" rows="6" wire:model.blur="description"></textarea>
            @error('description')
            <p class="error-message">{{$message}}</p>
            @enderror
        </div>
        
        <div class="mb-3">
            <label for="price" class="form-label">Prezzo:</label>
            <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" wire:model.blur="price">
            @error('price')
            <p class="error-message">{{$message}}</p>
            @enderror
        </div>
        
        <div class="mb-2">
            <select class="form-control shadow @error('category') is-invalid @enderror" id="category" wire:model.blur="category">
                <option value="">Seleziona una categoria:</option>
                @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
            @error('category')
            <p class="error-message">{{$message}}</p>
            @enderror
        </div>
        
        
        <div class="mb-3">
            <label class="form-label">Carica immagini:</label>
            
            <input type="file" wire:model.live="temporary_images" multiple class="form-control shadow @error('temporary_images.*') is-invalid @enderror">
            
            @error('temporary_images.*')
            <p class="error-message">{{ $message }}</p>
            @enderror
            
            @error('temporary_images')
            <p class="error-message">{{ $message }}</p>
            @enderror
        </div>
        
        
        @if (!empty($images))
        <p class="mb-2">Photo preview:</p>
        
        <div class="row border border-4 border-success rounded shadow py-4">
            @foreach ($images as $key => $image)
            <div class="col d-flex flex-column align-items-center my-3">
                
                <div class="mx-auto shadow rounded overflow-hidden img-preview">
                    <img src="{{ $image->temporaryUrl() }}" class="w-100 h-100 object-fit-cover">
                </div>
                
                <button type="button"   class="btn mt-1 btn-danger" wire:click="removeImage({{ $key }})">
                    <span class="trash-icon">
                        <i class="bi bi-trash3"></i>
                        <i class="bi bi-trash3-fill"></i>
                    </span>
                </button>
                
            </div>
            @endforeach
        </div>
        @endif
        
        <button type="submit" class="btn btn-register">Crea</button>
    </form>
</div>
