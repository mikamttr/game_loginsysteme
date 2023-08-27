<?php
require_once './app/Database.php';
require_once './app/helpers/helper.php';

class AuthModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
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

    //Login request
    private function login_request($nameOrEmail, $password)
    {
        $row = $this->findUserByEmailOrUsername($nameOrEmail, $nameOrEmail);

        if ($row == false) return false;

        $hashedPassword = $row->usersPwd;
        if (password_verify($password, $hashedPassword)) {
            return $row;
        } else {
            return false;
        }
    }

    //Register request
    private function register_request($data)
    {
        $this->db->query('INSERT INTO users (usersName, usersEmail, usersUid, usersPwd) 
        VALUES (:name, :email, :Uid, :password)');
        //Bind values
        $this->db->bind(':name', $data['usersName']);
        $this->db->bind(':email', $data['usersEmail']);
        $this->db->bind(':Uid', $data['usersUid']);
        $this->db->bind(':password', $data['usersPwd']);

        //Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    private function createUserSession($user)
    {
        $_SESSION['usersId'] = $user->usersId;
        $_SESSION['usersName'] = $user->usersName;
        $_SESSION['usersEmail'] = $user->usersEmail;
        redirect("index.php");
    }

    public function login()
    {
        //Sanitize POST data
        $data = [
            'name/email' => htmlspecialchars((trim($_POST['name/email'])), ENT_QUOTES, 'UTF-8'),
            'usersPwd' => htmlspecialchars((trim($_POST['usersPwd'])), ENT_QUOTES, 'UTF-8')
        ];

        if (empty($data['name/email']) || empty($data['usersPwd'])) {
            flash("login", "Please fill out all inputs");
        }

        //Check for user/email
        if ($this->findUserByEmailOrUsername($data['name/email'], $data['name/email'])) {
            //User Found
            $loggedInUser = $this->login_request($data['name/email'], $data['usersPwd']);
            if ($loggedInUser) {
                //Create session
                $this->createUserSession($loggedInUser);
            } else {
                flash("login", "Password Incorrect");
            }
        } else {
            flash("login", "No user found");
        }
    }

    public function register()
    {
        //Sanitize POST data
        $data = [
            'usersName' => htmlspecialchars((trim($_POST['usersName'])), ENT_QUOTES, 'UTF-8'),
            'usersEmail' => htmlspecialchars((trim($_POST['usersEmail'])), ENT_QUOTES, 'UTF-8'),
            'usersUid' => htmlspecialchars((trim($_POST['usersUid'])), ENT_QUOTES, 'UTF-8'),
            'usersPwd' => htmlspecialchars((trim($_POST['usersPwd'])), ENT_QUOTES, 'UTF-8'),
            'pwdRepeat' => htmlspecialchars((trim($_POST['pwdRepeat'])), ENT_QUOTES, 'UTF-8')
        ];

        //Validate inputs
        if (
            empty($data['usersName']) || empty($data['usersEmail']) || empty($data['usersUid']) ||
            empty($data['usersPwd']) || empty($data['pwdRepeat'])
        ) {
            flash("register", "Please fill out all inputs");
            redirect("index.php?controller=auth&action=signup");
        }

        if (!preg_match("/^[a-zA-Z0-9]*$/", $data['usersUid'])) {
            flash("register", "Invalid username");
            redirect("index.php?controller=auth&action=signup");
        }

        if (!filter_var($data['usersEmail'], FILTER_VALIDATE_EMAIL)) {
            flash("register", "Invalid email");
            redirect("index.php?controller=auth&action=signup");
        }

        if (strlen($data['usersPwd']) < 6) {
            flash("register", "Invalid password");
            redirect("index.php?controller=auth&action=signup");
        } else if ($data['usersPwd'] !== $data['pwdRepeat']) {
            flash("register", "Passwords don't match");
            redirect("index.php?controller=auth&action=signup");
        }

        //User with the same email or password already exists
        if ($this->findUserByEmailOrUsername($data['usersEmail'], $data['usersName'])) {
            flash("register", "Username or email already taken");
            redirect("index.php?controller=auth&action=signup");
        }

        //Passed all validation checks.
        //Now going to hash password
        $data['usersPwd'] = password_hash($data['usersPwd'], PASSWORD_DEFAULT);

        //Register User
        if ($this->register_request($data)) {
            redirect("index.php?controller=auth&action=login");
        } else {
            die("Something went wrong");
        }
    }
}
