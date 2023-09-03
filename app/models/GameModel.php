<?php

class GameModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    private function updateUserScore($score)
    {
        $sql = "SELECT usersUid, usersBestScore FROM users WHERE usersUid = :userUid";
        $this->db->query($sql);
        $this->db->bind(':userUid', $_SESSION["usersUid"]);
        $this->db->execute();

        $user = $this->db->single();
        if ($user) {
            if ($score > $user->usersBestScore) {
                $new_best_score = $score;
                // Update the scores table if $score is higher than lowest best score
                $updateSql = "UPDATE `users` SET `usersBestScore` = :newBestScore WHERE `users`.`usersUid` = :userUid";
                $this->db->query($updateSql);
                $this->db->bind(':newBestScore', $new_best_score);
                $this->db->bind(':userUid', $_SESSION["usersUid"]);
                $this->db->execute();
                echo "\n New best score : " . $new_best_score;
            } else {
                echo "\n Current best score : " . $user->usersBestScore;
            }
        }
    }

    private function updateBestScores($score)
    {
        // Select the lowest score from the scores table
        $sql = "SELECT MIN(usersScore) AS lowestScore FROM scores";
        $this->db->query($sql);
        $this->db->execute();

        // Fetch the lowest score
        $lowestScore = $this->db->single();

        if ($score > $lowestScore->lowestScore) {
            // Insert the score and username into the scores table
            $insertSql = "INSERT INTO scores (usersScore, usersName) VALUES (:score, :usersName)";
            $this->db->query($insertSql);
            $this->db->bind(':score', $score);
            $this->db->bind(':usersName', $_SESSION['usersUid']);
            $this->db->execute();

            // Delete the lowest score from the scores table
            $deleteSql = "DELETE FROM scores WHERE usersScore = :lowestScore LIMIT 1";
            $this->db->query($deleteSql);
            $this->db->bind(':lowestScore', $lowestScore->lowestScore);
            $this->db->execute();
            // Print a message indicating the update
            echo "\n You just dropped the lowest best score : "
                . $lowestScore->lowestScore . "\n With your score of " . $score . " points";
        } else {
            echo "\n You didn't beat the lowest best score";
        }
    }

    public function handleGameover($score)
    {
        $this->updateUserScore($score);
        $this->updateBestScores($score);
    }

    public function getUsersBestScore()
    {
        $sql = "SELECT usersBestScore FROM users WHERE usersUid = :userUid";
        $this->db->query($sql);
        $this->db->bind(':userUid', $_SESSION["usersUid"]);
        $this->db->execute();

        $user = $this->db->single();
        if ($user) {
            echo $user->usersBestScore;
        }
    }

    public function getTopScores($nb)
    {
        $sql = "SELECT * FROM `scores` ORDER BY usersScore DESC LIMIT $nb";
        $this->db->query($sql);
        $this->db->execute();
        $scores = $this->db->resultSet();

        return $scores;
    }
}
