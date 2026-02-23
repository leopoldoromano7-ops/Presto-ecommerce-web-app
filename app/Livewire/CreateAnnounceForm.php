<?php

namespace App\Livewire;

use App\Jobs\RemoveFaces;
use App\Jobs\ResizeImage;
use App\Jobs\GoogleVisionSafeSearch;
use App\Jobs\GoogleVisionLabelImage;
use Livewire\Component;
use App\Models\Announce;
use App\Models\Category;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\File;

class CreateAnnounceForm extends Component
{

    use WithFileUploads;

    #[Validate('required|min:5')]
    public $title;

    #[Validate('required|numeric|min:0')]
    public $price;

    #[Validate('required|min:10')]
    public $description;

    #[Validate('required')]
    public $category;


    public $images = [];
    public $temporary_images;
    public $announce;
    // actions

    //gestire le immagini

    public function updatedTemporaryImages()
    {
        $this->validate([
            'temporary_images.*' => 'image|max:1024',
            // 'temporary_images' => 'max:6'
        ]);

        foreach ($this->temporary_images as $image) {

            if (count($this->images) >= 6) {
                $this->addError('temporary_images', 'Puoi caricare massimo 6 immaginii!');
                return;
            }

            $this->images[] = $image;
        }
    }

    // rimuovere img


    public function removeImage($key)
    {
        if (in_array($key, array_keys($this->images))) {
            unset($this->images[$key]);
        }
    }

    public function save()
    {
        $this->validate();
        $this->announce = Announce::create([
            'title' => $this->title,
            'price' => $this->price,
            'description' => $this->description,
            'user_id' => Auth::user()->id,
            'category_id' => $this->category
        ]);

        if (!empty($this->images)) {
            foreach ($this->images as $image) {
                         
                $newFileName = "announces/{$this->announce->id}";
                $path = $image->store($newFileName, 'public');

                $newImage = $this->announce->images()->create([
                    'path' => $path,
                ]);

                RemoveFaces::withChain([
                    new ResizeImage($newImage->path, 600, 600),
                    new GoogleVisionSafeSearch($newImage->id),
                    new GoogleVisionLabelImage($newImage->id),
                ])->dispatch($newImage->id);
            }

            File::deleteDirectory(storage_path('/app/livewire-tmp'));
        }

        session()->flash('status', __('ui.announce_pending'));
        $this->cleanForm();

        // return redirect(route('homepage'));
    }

    protected function cleanForm()
    {
        $this->title = '';
        $this->description = '';
        $this->category = '';
        $this->price = '';
        $this->images = [];
        $this->temporary_images = [];
    }


    protected function messages()
    {
        return [
            'title.min' => 'Deve contenere almeno 5 caratteri!',
            'price.numeric' => 'Il prezzo deve essere un numero valido!',
            'price.min' => 'Il prezzo deve essere maggiore o uguale a 0!',
            'description.min' => 'Deve contenere almeno 10 caratteri',
            'category.required' => 'Devi selezionare una categoria!'
        ];
    }

    public function render()
    {
        $categories = Category::all();
        return view('livewire.create-announce-form', compact("categories"));
    }
}
