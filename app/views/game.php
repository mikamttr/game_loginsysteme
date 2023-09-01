<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fighter plane</title>
    <link rel="icon" type="image/x-icon" href="/public/images/favicon.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="app/game/game.css">
</head>

<body>
    <div class="game_container">
        <div id="player_info">
            <span id="score"></span>
            <div id="hearts"></div>
        </div>
        <canvas></canvas>

        <div id="game_launcher">
            <span class="fs-1 fw-bold mb-4">Ready to start ?</span>
            <button id="launchGameBtn" class="btn btn-dark btn-lg">Launch Game</button>
            <a class="btn btn-lg px-0 my-3" href="index.php">
                <i class="bi bi-arrow-left"></i>
                Back to Home
            </a>
        </div>

        <div id="gameover_info">
            <span class="fs-1 fw-bold mb-4">Game Over</span>
            <span id="endgameScore" class="fs-2 mb-5"></span>
            <button id="newgameBtn" class="btn btn-dark btn-lg">Start New Game</button>
            <a class="btn btn-lg px-0 my-3" href="index.php">
                <i class="bi bi-arrow-left"></i>
                Back to Home
            </a>
        </div>

        <div id="game_arrows">
            <button id="btnDown" class="btn btn-light">
                <i class="bi bi-arrow-down"></i>
            </button>
            <button id="btnUp" class="btn btn-light">
                <i class="bi bi-arrow-up"></i>
            </button>
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

</body>

</html>