<link rel="stylesheet" href="app/game/game.css">
<script src="https://kit.fontawesome.com/e9f6068462.js" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

<div class="game_container">
    <div id="player_info">
        <span id="score"></span>
        <div id="hearts"></div>
    </div>
    <canvas></canvas>
</div>

<!-- game props -->
<img id="player" src="app/game/src/fighter-jet.png">
<img id="rocket" src="app/game/src/rocket.png">

<!-- background layers -->
<img id="layer1" src="app/game/assets/layer1.png">
<img id="layer2" src="app/game/assets/layer2.png">
<img id="layer3" src="app/game/assets/layer3.png">
<img id="layer4" src="app/game/assets/layer4.png">
<img id="layer5" src="app/game/assets/layer5.png">

<script type="module" src="app/game/script/main.js"></script>