<?php
require_once './app/models/GameModel.php';
$this->model = new GameModel;
?>

<h1>
    Hello <?php echo explode(" ", $_SESSION['usersName'])[0]; ?>,
    <br>
    Welcome to Fighter plane
</h1>

<a class="btn btn-outline-success btn-lg px-5 my-3" href="index.php?controller=game&action=play">
    <i class="bi bi-controller me-2"></i>
    Play
</a>

<div class="my-4">
    <span class="fs-4">Your best score is :
        <?php $this->model->getUsersBestScore(); ?>
    </span>
</div>

<div class="col-lg-8">
    <?php
    $usersScores  = $this->model->getTopScores(10);
    // Sort the array by 'usersScore' in descending order
    usort($usersScores, function ($a, $b) {
        return $b->usersScore - $a->usersScore;
    });

    // Define medal colors
    $medalColors = ['#d4af37', '#c0c0c0', '#614e1a'];

    // Start the ranking at 1
    $ranking = 1;

    echo '
    <table class="table table-hover">
    <thead><tr><th scope="col">Ranking</th><th scope="col">Username</th><th scope="col">Score</th></tr></thead>
    <tbody>';

    // Loop through the sorted array and generate table rows
    foreach ($usersScores as $user) {
        // Determine the medal color based on the ranking
        $medalColor = isset($medalColors[$ranking - 1]) ? $medalColors[$ranking - 1] : '';

        echo '<tr><th scope="row">';
        if ($ranking <= 3) {
            echo '<i class="bi bi-trophy-fill me-1" style="color: ' . $medalColor . ';"></i>';
        }
        echo $ranking;
        echo '</th>';
        echo '<td>' . htmlspecialchars($user->usersName) . '</td>';
        echo '<td>' . htmlspecialchars($user->usersScore) . '</td></tr>';

        // Increment the ranking
        $ranking++;
    }

    echo '</tbody></table>';
    ?>
</div>