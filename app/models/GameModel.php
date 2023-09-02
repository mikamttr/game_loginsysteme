<?php

class GameModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    private function compareUserScore($score)
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
                echo "\n Your best score is now : " . $new_best_score;
            } else {
                echo "\n Better luck next time ... Your best score is : " . $user->usersBestScore;
            }
        }
    }

    private function compareBestScores($score)
    {
        // Select the lowest score from the scores table
        $sql = "SELECT MIN(usersScore) AS lowestScore FROM scores";
        $this->db->query($sql);
        $this->db->execute();

        // Fetch the lowest score
        $lowestScore = $this->db->single();

        if ($score > $lowestScore->lowestScore) {
            // Update the scores table if $score is higher than the lowest score
            $updateSql = "UPDATE scores SET usersScore = :score, usersName = :usersName WHERE usersScore = :lowestScore";
            $this->db->query($updateSql);
            $this->db->bind(':score', $score);
            $this->db->bind(':usersName', $_SESSION['usersUid']);
            $this->db->bind(':lowestScore', $lowestScore->lowestScore);
            $this->db->execute();

            // Print a message indicating the update
            echo "\n You just dropped the lowest best score from the table : "
                . $lowestScore->lowestScore . "\n With your score of " . $score . " points";
        } else {
            echo "\n You didn't beat the lowest best score";
        }
    }

    public function handleGameover($score)
    {
        $this->compareUserScore($score);
        $this->compareBestScores($score);
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

    public function getAllBestScores()
    {
        $sql = "SELECT * FROM `scores`";
        $this->db->query($sql);
        $this->db->execute();
        $scores = $this->db->resultSet();

        return $scores;
    }
}
