<?php

use PHPMailer\PHPMailer\PHPMailer;

require_once './app/models/AuthModel.php';
//Require PHP Mailer
require_once './app/PHPMailer/src/PHPMailer.php';
require_once './app/PHPMailer/src/Exception.php';
require_once './app/PHPMailer/src/SMTP.php';

class ResetPasswordModel extends AuthModel
{
    private $db;
    private $mail;

    public function __construct()
    {
        $this->db = new Database;

        //Setup PHPMailer
        $this->mail = new PHPMailer();
        $this->mail->isSMTP();
        $this->mail->Host = 'sandbox.smtp.mailtrap.io';
        $this->mail->SMTPAuth = true;
        $this->mail->Port = 2525;
        $this->mail->Username = '9b0dfe18f44718';
        $this->mail->Password = '966469e2f87394';
    }

    private function deleteEmail($email)
    {
        $this->db->query('DELETE FROM pwdreset WHERE pwdResetEmail=:email');
        $this->db->bind(':email', $email);
        //Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    private function insertToken($email, $selector, $hashedToken, $expires)
    {
        $this->db->query('INSERT INTO pwdreset (pwdResetEmail, pwdResetSelector, pwdResetToken, 
        pwdResetExpires) VALUES (:email, :selector, :token, :expires)');
        $this->db->bind(':email', $email);
        $this->db->bind(':selector', $selector);
        $this->db->bind(':token', $hashedToken);
        $this->db->bind(':expires', $expires);
        //Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    //Find user by email or username
    private function findUserByEmailOrUsername($email, $username)
    {
        $this->db->query('SELECT * FROM users WHERE usersUid = :username OR usersEmail = :email');
        $this->db->bind(':username', $username);
        $this->db->bind(':email', $email);

        $row = $this->db->single();
        if ($this->db->rowCount() > 0) {
            return $row;
        } else {
            return false;
        }
    }

    private function request_is_valid($selector, $currentDate)
    {
        $this->db->query('SELECT * FROM pwdreset WHERE  pwdResetSelector=:selector AND pwdResetExpires >= :currentDate');
        $this->db->bind(':selector', $selector);
        $this->db->bind(':currentDate', $currentDate);
        //Execute
        $row = $this->db->single();

        //Check row
        if ($this->db->rowCount() > 0) {
            return $row;
        } else {
            return false;
        }
    }

    //Reset Password
    private function resetPassword($newPwdHash, $tokenEmail)
    {
        $this->db->query('UPDATE users SET usersPwd=:pwd WHERE usersEmail=:email');
        $this->db->bind(':pwd', $newPwdHash);
        $this->db->bind(':email', $tokenEmail);

        //Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function sendEmail()
    {
        //Sanitize POST data
        $usersEmail = htmlspecialchars((trim($_POST['usersEmail'])), ENT_QUOTES, 'UTF-8');
        if (empty($usersEmail)) {
            flash("reset", "Please fill email input");
        }
        if (!filter_var($usersEmail, FILTER_VALIDATE_EMAIL)) {
            flash("reset", "Invalid email");
        }
        //Will be used to query the user from the database
        $selector = bin2hex(random_bytes(8));
        //Will be used for confirmation once the database entry has been matched
        $token = random_bytes(32);
        //URL will vary depending on where the website is being hosted from
        $url = 'http://monapplication/index.php?controller=resetPassword&action=create_new_password&selector=' . $selector . '&validator=' . bin2hex($token);

        //Expiration date will last for half an hour
        $expires = date("U") + 1800;
        if (!$this->deleteEmail($usersEmail)) {
            die("There was an error");
        }
        $hashedToken = password_hash($token, PASSWORD_DEFAULT);
        if (!$this->insertToken($usersEmail, $selector, $hashedToken, $expires)) {
            die("There was an error");
        }
        //Send the password validation link to the user
        $subject = "Reset your password";
        $message = "<p>We recieved a password reset request.</p>";
        $message .= "<p>Here is your password reset link: </p>";
        $message .= "<a href='" . $url . "'>" . $url . "</a>";

        $this->mail->setFrom('noreply@fighterplane.com');
        $this->mail->isHTML(true);
        $this->mail->Subject = $subject;
        $this->mail->Body = $message;
        $this->mail->addAddress($usersEmail);
        $this->mail->send();

        flash("reset", "Check your email", 'alert alert-success');
    }

    public function validate_request()
    {
        //Sanitize POST data
        $data = [
            'selector' => htmlspecialchars((trim($_POST['selector'])), ENT_QUOTES, 'UTF-8'),
            'validator' => htmlspecialchars((trim($_POST['validator'])), ENT_QUOTES, 'UTF-8'),
            'pwd' => htmlspecialchars((trim($_POST['pwd'])), ENT_QUOTES, 'UTF-8'),
            'pwd-repeat' => htmlspecialchars((trim($_POST['pwd-repeat'])), ENT_QUOTES, 'UTF-8')
        ];
        $url = 'http://monapplication/index.php?controller=resetPassword&action=create_new_password&selector=' . $data['selector'] . '&validator=' . $data['validator'];

        if (empty($_POST['pwd'] || $_POST['pwd-repeat'])) {
            flash("newReset", "Please fill out all fields");
            redirect($url);
        } else if ($data['pwd'] != $data['pwd-repeat']) {
            flash("newReset", "Passwords do not match");
            redirect($url);
        } else if (strlen($data['pwd']) < 6) {
            flash("newReset", "Invalid password");
            redirect($url);
        }

        $currentDate = date("U");
        if (!$row = $this->request_is_valid($data['selector'], $currentDate)) {
            flash("newReset", "Sorry. The link is no longer valid");
            redirect($url);
        }

        $tokenBin = hex2bin($data['validator']);
        $tokenCheck = password_verify($tokenBin, $row->pwdResetToken);
        if (!$tokenCheck) {
            flash("newReset", "You need to re-submit your reset request");
            redirect($url);
        }

        $tokenEmail = $row->pwdResetEmail;
        if (!$this->findUserByEmailOrUsername($tokenEmail, $tokenEmail)) {
            flash("newReset", "There was an error");
            redirect($url);
        }

        $newPwdHash = password_hash($data['pwd'], PASSWORD_DEFAULT);
        if (!$this->resetPassword($newPwdHash, $tokenEmail)) {
            flash("newReset", "There was an error");
            redirect($url);
        }

        if (!$this->deleteEmail($tokenEmail)) {
            flash("newReset", "There was an error");
            redirect($url);
        }

        flash("newReset", "Password Updated", 'alert alert-success');
        redirect($url);
    }
}
