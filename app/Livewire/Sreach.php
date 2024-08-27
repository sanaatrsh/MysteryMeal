<?php

namespace App\Livewire;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use Livewire\Component;

class Sreach extends Component
{

    public $tags;
    public $searchUrl = '';
    public $data = [];
    public $randomData = [];
    public $strangeIngredients = [];
    public $recipeData;
    public $id;

    public function mount()
    {
        $this->getRandom();
        $tags = $this->tags;
        $id = $this->id;
    }

    public function getRandom()
    {

        $response = Http::get('https://api.spoonacular.com/recipes/random?limitLicense=true&number=1&apiKey=40308bde26da47b79538d26b684bd663');
        // dd($response->json());
        // $this->info = Http::get('https://api.spoonacular.com/recipes/{id}/information?apiKey=40308bde26da47b79538d26b684bd663');
        $this->randomData = $response->json();
    }

    public function search()
    {
        // dd($this->tags);
        if ($this->tags) {
            $this->searchUrl  = route(
                'search_results',
                ['tags' => $this->tags],
                false,
                true
            );

            $response = Http::get($this->searchUrl);
            // dd($response->json());
            $this->data = $response->json();
        }
    }

    public function mystery_twist()
    {
        $this->strangeIngredients = ['wasabi', 'vinegar', 'honey', 'chocolate', 'chili', 'eggs', 'icecream'];
        $random = Arr::random($this->strangeIngredients);
        if ($this->tags)
            $this->tags = $this->tags . $random . ' ,';
        else
            $this->tags = $random . ' ,';
        // dd($this->tags);
    }

    // public function selectRecipe()
    // {
    //     dd($this->id);
    //     $url = route('recipe', $id, false, true);
    //     $response = Http::get($url);
    //     $this->recipeData = $response->json();
    // }

    public function selectRecipe()
    {
        dd($this->id);
        $url = route('recipe', $this->id, false, true);
        $response = Http::get($url);
        $this->recipeData = $response->json();
    }



    public function render()
    {
        // dd($this->recipeData);
        return view('livewire.sreach', ['recipeData' => $this->recipeData]);
    }
}
