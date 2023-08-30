<link rel="stylesheet" href="app/game/game.css">

<!-- <a class="btn btn-lg px-0 my-3" href="index.php">
    <i class="bi bi-arrow-left"></i>
    Back to Home
</a> -->

<div class="game_container">
    <div id="player_info">
        <span id="score"></span>
        <div id="hearts"></div>
    </div>
    <canvas></canvas>

    <div id="game_launcher">
        <span class="fs-1 fw-bold mb-4">Ready to start ?</span>
        <button id="launchGameBtn" class="btn btn-outline-light btn-lg">Launch Game</button>
    </div>

    <div id="gameover_info">
        <span class="fs-1 fw-bold mb-4">Game Over</span>
        <span class="fs-2 mb-5">Score : 111</span>
        <button id="newgameBtn" class="btn btn-outline-light btn-lg">Start New Game</button>
    </div>
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