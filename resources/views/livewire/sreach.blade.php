<div class="s004">

    <form wire:submit.prevent="search">
        <fieldset>
            <legend>WHAT'S IN YOUR KITCHEN? LET'S CREATE SOMETHING AMAZING!</legend>

            <div class="inner-form">
                <div class="input-field">
                    @if ($tags)
                    <p style="color: white;">Separate the ingredients with a comma ",".</p>
                    @endif
                    <input wire:model="tags" class="search" type="text" name="tags"
                        placeholder="Type to search..." />

                    <button class="btn-search" type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path
                                d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z">
                            </path>
                        </svg>
                    </button>

                </div>
            </div>

            <div class="suggestion-wrap">

            </div>
        </fieldset>
    </form>
    <form wire:submit.prevent="mystery_twist">
        <input type="submit" value="Mystery Twist🍄🌶️🍣">
    </form>

    <div>
        <div class="main2 ">
            <ul class="cards">
                @if (!$data || !$tags )
                <h2 style="color: white;">There is no recipe like this, but here's an other recipe: </h2>
                @foreach ($randomData['recipes'] as $item )

                <li class="cards_item">
                    <div class="card">
                        <div class="card_image"><img src="{{$item['image']}}" alt="{{$item['title']}}. "></div>
                        <div class="card_content">
                            <h2 class="card_title"> {{$item['title']}} </h2>
                            <div class="card_text">
                                {{!! $item['instructions'] !!}}


                            </div>
                        </div>
                    </div>
                </li>
                @endforeach
                @else
                @foreach ($data as $item )
                <h2 style="color: white;">Here is Your Recipe: </h2>

                <li class="cards_item">
                    <div class="card">
                        <div class="card_image"><img src="{{$item['image']}}" alt="{{$item['title']}}. "></div>
                        <div class="card_content">
                            <h2 class="card_title"> {{$item['title']}} &#x2022; </h2>
                            <div class="card_text">

                                <?php

                                // dd($item['id']);
                                $url = route('recipe', $item['id'], false, true);
                                $response = Illuminate\Support\Facades\Http::get($url);
                                // dd($response->json());
                                $this->recipeData = $response->json();
                                ?>


                                <p>{{!! $this->recipeData['summary'] !!}} </p>

                            </div>
                        </div>
                    </div>
                </li>
                @endforeach
                @endif

            </ul>
        </div>
    </div>


</div>