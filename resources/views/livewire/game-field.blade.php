<div class="field-container">
    @foreach ($field as $row => $cell)
        <div class="row">
            @foreach ($field[$row] as $key => $cell)
                <div class="cell" wire:click="openCell({{$row}}, {{$key}})"></div>
            @endforeach
        </div>
    @endforeach
</div>