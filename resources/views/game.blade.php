<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>mulenokd.</title>
        <!-- Fonts -->
        <link rel="stylesheet" href="/css/main.css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    </head>
    <body>
        <div class="container">
            <h1> Miner Game </h1>
            
            <div class="field-container">
                @foreach ($field as $row => $cell)
                    <div class="row">
                        @foreach ($field[$row] as $key => $cell)
                            <div 
                                class="cell" 
                                id="{{$row}}_{{$key}}" 
                                onclick="openCell({{$row}}, {{$key}})"
                                oncontextmenu="setFlag({{$row}}, {{$key}})"
                            ></div>
                        @endforeach
                    </div>
                @endforeach
            </div>

        </div>
    </body>
</html>
<script>
        var field = {!! json_encode($field) !!}
        function openCell(row, cell, checkEmpty = false) {

            let currentCell = document.getElementById(row+'_'+cell);

            if(currentCell === null || currentCell.classList.contains("check")){
                return;
            }

            let span = document.createElement("span");
            span.className = 'cell-' + field[row][cell];
            
            if(field[row][cell] !== 'B' && field[row][cell] !== 0){
                span.innerHTML = field[row][cell];
            }
            
            if (!currentCell.classList.contains("open")) {
                currentCell.className += " open";
                
                if(checkEmpty){ 
                    currentCell.className += " check";
                }

                if (currentCell.classList.contains("flag")) {
                    currentCell.classList.remove("flag");
                }

                currentCell.append(span);
            }

            if (field[row][cell] === 0){
                openCell(row - 1, cell - 1, true);
                openCell(row - 1, cell, true);
                openCell(row - 1, cell + 1, true);
                openCell(row, cell - 1, true)
                openCell(row, cell + 1, true)
                openCell(row + 1, cell - 1, true);
                openCell(row + 1, cell, true);
                openCell(row + 1, cell + 1, true);
            }

        }

        document.addEventListener('contextmenu', event => event.preventDefault());

        function setFlag(row, cell){

            let currentCell = document.getElementById(row+'_'+cell);
            
            if (currentCell === null){
                return false;
            } else {
                if (!currentCell.classList.contains("flag")) {
                    currentCell.classList += " flag";
                } else {
                    currentCell.classList.remove("flag");
                }
            }
            
            let span = document.createElement("span");
            span.className = "flag";

            currentCell.append(span);
            return false;
        }

</script>
