<h1>
    Hello <?php echo explode(" ", $_SESSION['usersName'])[0]; ?>,
    <br>
    Welcome to Fighter plane !
</h1>

<div class="">
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Username</th>
                <th scope="col">Score</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Jacob</td>
                <td>Thornton</td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td colspan="2">Larry the Bird</td>
            </tr>
        </tbody>

    </table>
</div>

<br>
<a href="index.php?controller=home&action=play">Start Game</a>