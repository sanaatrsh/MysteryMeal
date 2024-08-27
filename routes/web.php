<?php

use Illuminate\Support\Facades\Route;

Route::get('https://api.spoonacular.com/recipes/findByIngredients?ingredients={tags}&number=1&limitLicense=true&ranking=1&ignorePantry=false&apiKey=40308bde26da47b79538d26b684bd663')
    ->name('search_results');
Route::get('https://api.spoonacular.com/recipes/{id}/information?apiKey=40308bde26da47b79538d26b684bd663')
    ->name('recipe');


Route::get('/', function () {
    return view('welcome');
});
