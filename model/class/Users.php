<?php
session_start();

class Users extends Database
{
    public function __construct(string $password, string $mail, ?string $name = null, ?string $firstname = null)
    {
        $this->password = $password;
        $this->name = $name;
        $this->firstname = $firstname;
        $this->mail = $mail;
    }

    public function checkValue()
    {
        $params = [
            "mail" => $this->mail,
        ];
        $query = $this->prepare('SELECT mail FROM users WHERE mail = :mail ', $params, true);
        if ($query === false) {
            if (strlen($this->firstname) <= 100 && !empty($this->firstname)) {
                if (strlen($this->name) <= 100 && !empty($this->name)) {
                    if (strlen($this->password) <= 100 && !empty($this->password)) {
                        if (strlen($this->mail) <= 100 && !empty($this->mail)) {
                            $this->register();
                            header('Location:index.php?login_err=success');
                        } else header('Location: index.php?reg_err=mail_length');
                    } else header('Location: index.php?reg_err=password_length');
                } else header('Location: index.php?reg_err=name_length');
            } else header('Location: index.php?reg_err=firstname_length');
        } else header('Location: index.php?reg_err=already');
    }

    public function register()
    {
        $params = [
            "name" => $this->name,
            "firstname" => $this->firstname,
            "mail" => $this->mail,
            "password" => hash('ripemd160', $this->password),
        ];
        $this->prepare('INSERT INTO users(name, firstname, mail, password) VALUES (:name, :firstname, :mail, :password)', $params, true);
    }

    public function checkAccount()
    {
        $params = [
            "mail" => $this->mail,
        ];
        $query = $this->prepare('SELECT id, role, firstname ,password, mail FROM users WHERE mail = :mail ', $params, true);
        if ($query !== false) {
            $this->login();
        } else header('Location:./index.php?login_err=mail');
    }


    public function login()
    {
        $pass = hash('ripemd160', $this->password);
        $params = [
            "mail" => $this->mail,
        ];
        $query = $this->prepare('SELECT id, role, firstname , name,password, mail FROM users WHERE mail = :mail ', $params, false);
        if ($pass === $query[0]['password']) {
            $_SESSION['id'] = $query[0]['id'];
            $_SESSION['role'] = $query[0]['role'];
            $_SESSION['password'] = $query[0]['password'];
            $_SESSION['mail'] = $query[0]['mail'];
            $_SESSION['user'] = $query[0]['firstname'];
            $_SESSION['username'] = $query[0]['name'];


            header('Location:./index.php?page=connected');
        } else header('Location:./index.php?login_err=password');
    }

    public function changePassword($firstpass, $newpassword, $repeatpassword)
    {

        $firstpass = hash('ripemd160', $firstpass);
        $newpassword = hash('ripemd160', $newpassword);
        $repeatpassword = hash('ripemd160', $repeatpassword);
        $params = [
            'mail' => $_SESSION['mail']
        ];
        $query = $this->prepare('SELECT password FROM users WHERE mail = :mail', $params, true);

        if ($firstpass === $query['password']) {
            echo "ok";
            if ($newpassword === $repeatpassword) {
                $params = [
                    'mail' => $_SESSION['mail'],
                    'password' => $newpassword
                ];
                $query = $this->prepare('UPDATE users SET password = :password WHERE mail= :mail', $params,);

                header('Location:./index.php?password_err=success');
            } else header('Location:./index.php?password_err=repeatnotsame');
        } else header('Location:./index.php?password_err=notsame');
    }

    public function deleteAccount()
    {
        $params = [
            'mail' => $_SESSION['mail'],
        ];
        $query = $this->prepare('DELETE FROM users where users.mail = :mail', $params, true);
        session_destroy();
        header('Location:./index.php?page=home');
    }
    
    public function sendMessage(string $text)
    {
        $params = [
            "firstname" => $this->firstname,
            "name"=> $this->name,
            "mail" =>  $this->mail,
            "text" => $text,
            ];
        $this->prepare('INSERT INTO messages(name, firstname, mail, text) VALUES (:name, :firstname, :mail, :text)', $params, true);
        header('Location:./index.php?contact_msg=success');
            
    }
}
