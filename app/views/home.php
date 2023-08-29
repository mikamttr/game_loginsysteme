<h1>
    Hello <?php echo explode(" ", $_SESSION['usersName'])[0]; ?>,
    <br>
    Welcome to Fighter plane
</h1>

<a class="btn btn-outline-success btn-lg px-5 my-3" href="index.php?controller=home&action=play">
    <i class="bi bi-controller mx-1"></i>
    Start Game
</a>

<h4 class="my-3">Best Scores</h4>

<div class="col-lg-8">
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Ranking</th>
                <th scope="col">Username</th>
                <th scope="col">Score</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">
                    <i class="fa-solid fa-medal" style="color: #d4af37;"></i> 1
                </th>
                <td>Mark</td>
                <td>145</td>
            </tr>
            <tr>
                <th scope="row">
                    <i class="fa-solid fa-medal" style="color: #c0c0c0;"></i> 2
                </th>
                <td>Jacob</td>
                <td>114</td>
            </tr>
            <tr>
                <th scope="row">
                    <i class="fa-solid fa-medal" style="color: #614e1a;"></i> 3
                </th>
                <td>Larry</td>
                <td>103</td>
            </tr>
        </tbody>

    </table>
</div>