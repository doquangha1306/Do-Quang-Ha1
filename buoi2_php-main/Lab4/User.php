<?php
class User {
    private $name;
    private $email;
    private $password;

    public function __construct($name, $email, $password) {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
    }

    public function getName() {
        return $this->name;
    }

    public function getEmail() {
        return $this->email;
    }

    public function login($inputEmail, $inputPassword) {
        if ($this->email === $inputEmail && $this->password === $inputPassword) {
            return "Đăng nhập thành công";
        }

        return "Sai thông tin";
    }
}

// Test
$user = new User("Alice", "alice@example.com", "secret123");
echo $user->login("alice@example.com", "secret123") . "\n";
echo $user->login("alice@example.com", "wrongpass") . "\n";







