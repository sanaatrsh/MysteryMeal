<div>
    <div class="main">
        <ul class="cards">
            @forelse ($data as $d )

            <li class="cards_item">
                <div class="card">
                    <div class="card_image"><img src="{{$d['image']}}" alt="{{$d['title']}}. "></div>
                    <div class="card_content">
                        <h2 class="card_title"> {{$d['title']}} &#x2022; </h2>
                        <div class="card_text">

                        </div>
                    </div>
                </div>
            </li>

            @empty
            <p>Pooo! </p>

            @endforelse
        </ul>
    </div>
</div>

@livewireScripts
<script src="{{asset('js/extention/choices.js')}}">
</script>
<script>
    var textPresetVal = new Choices('#choices-text-preset-values', {
        removeItemButton: true,
    });
</script>