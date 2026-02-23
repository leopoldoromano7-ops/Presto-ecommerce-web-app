<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    
      public $categories=[
            "Arredamento",
            "Elettronica",
            "Automobili",
            "Giardinaggio",
            "Sport",
            "Giocattoli",
            "Animali domestici",
            "Libri o riviste",
            "Abbigliamento",
            "Salute e bellezza"
        ];

       public function run(){
        foreach($this->categories as $category){
            Category::create([
                "name"=>$category
            ]);
        }
    }
}
