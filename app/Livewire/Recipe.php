<?php

namespace App\Livewire;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use Livewire\Component;

class Recipe extends Component
{


    public $data = [];

    public function mount()
    {
        $this->fetchData();
    }

    public function fetchData()
    {
        // $response = Route::get('https://api.spoonacular.com/recipes/findByIngredients?{tags}$apiKey=40308bde26da47b79538d26b684bd663');
        $response = Http::get('https://api.spoonacular.com/recipes/findByIngredients?ingredients={tags}&number=10&limitLicense=true&ranking=1&ignorePantry=false&apiKey=40308bde26da47b79538d26b684bd663');
        // dd($response);
        $this->data = $response->json();
        // dd($this->data['recipes']);
    }



    public function render()
    {
        return view('livewire.recipe');
    }
}
