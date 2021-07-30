<?php
    class User {
        private $name;
        private $email;
        private $pass;
        private $re_pass;

        public function __construct () {
            $db = DB::getInstance();
        }

        public function getUserInfo ($email) {
            $user = DB::ja_query("SELECT * FROM `users` WHERE `email` = '" . $email . "'");
            return $user;
        }

        public function logIn ($email, $password)
        {
            if (trim($email) == "" || trim($password) == "")
                return "Введите все необходимые данные";

            $user = DB::ja_query("SELECT * FROM `users` WHERE `email` = '" . $email . "'");
            if ($user == [])
                return "Пользователя с таким email-ом не существует";
            else if (password_verify($password, $user[0]->password)) {
                $this->setAuth($email);
            } else
                return "Неверный логин или пароль!";
        }

        public function logOut () {
            setcookie('logged', "", time() - 3600 * 24, '/');
            unset($_COOKIE['logged']);
            header('Location: /user/auth');
            exit();
        }

        public function setData ($name, $email, $pass, $re_pass) {
            $this->name = $name;
            $this->email = $email;
            $this->pass = $pass;
            $this->re_pass = $re_pass;
        }

        public function validateRegForm () {
            $email_exists = DB::ja_query("SELECT `id` FROM `users` WHERE `email` = '" . $this->email . "'");
            if (strlen($this->name) < 2)
                return "Имя слишком короткое";
            else if (strlen($this->email) < 5)
                return "Введите корректный email";
            else if ($email_exists != [])
                return "Пользователь с таким email-ом уже существует";
            else if (strlen($this->pass) < 6)
                return "Пароль слишком короткий";
            else if ($this->pass != $this->re_pass)
                return "Повторный пароль не совпадает с изначальным";
            else
                return true;
        }

        public function addUser () {
            $vars = [
                'name' => $this->name,
                'email' => $this->email,
                'password' => password_hash($this->pass, PASSWORD_DEFAULT)
            ];

            $query = "INSERT INTO users(name, email, password, image) VALUES(:name, :email, :password, 'user.png')";
            $result = DB::safe_query($query, $vars);

            $this->setAuth($this->email);
        }

        public function setAuth ($email) {
            setcookie('logged', $email, time() + 3600, '/');
            header('Location: /user/dashboard');
        }

        public function setUserImage ($file_input_name, $email) {
            $img_was_set = DB::ja_query("SELECT `img` FROM `users` WHERE `email` = '" . $email . "'");

            $target_dir = "public/img/user-icons/";
            $file = $_FILES['user-image']['name'];
            if ($file == $img_was_set)
                return false;

            $path = pathinfo($file);
            $filename = $path['filename'];
            $ext = $path['extension'];
            $temp_name = $_FILES['user-image']['tmp_name'];
            $path_filename_ext = $target_dir . $filename . '.' . $ext;

            $moved = move_uploaded_file($temp_name, $path_filename_ext);
            $img_title = time() . '.' . explode('.', $_FILES[$file_input_name]['name'])[1];
            $renamed = rename($path_filename_ext, $target_dir . $img_title);

            $result = DB::ja_query("UPDATE `users` SET `image` = '" . $img_title . "' WHERE `email` = '" . $email . "'");
            return $result;
        }
    }