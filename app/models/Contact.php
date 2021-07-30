<?php
    class Contact {
        private $name;
        private $email;
        private $age;
        private $message;

        public function setData ($name, $email, $age, $message) {
            $this->name = $name;
            $this->email = $email;
            $this->age = $age;
            $this->message = $message;
        }

        public function validateForm () {
            if (strlen($this->name) < 2)
                return "Имя слишком короткое";
            else if (strlen($this->email) < 5)
                return "Введите корректный email";
            else if (!is_numeric($this->age) || $this->age <= 5 || $this->age > 100)
                return "Введите корректный возраст";
            else if (strlen($this->message) < 10)
                return "Сообщение слишком короткое";
            else
                return true;
        }

        public function send_mail() {
            $to = "danil246624@gmail.com";
            $message = "Имя: " . $this->name . ". Возраст: " . $this->age . ". Сообщение: " . $this->message;
            $subject = "=?utf-8?B?" . base64_encode("Вопрос пользователя интернет-магазина") . "?=";
            $headers = "From: $this->email\r\nReply-to: $this->email\r\nContent-type: text/html; charset=utf-8\r\n";
            $success = mail($to, $subject, $message, $headers);

            if (!$success)
                return "Не удалось отправить сообщение...";
            else
                return "Сообщение отправлено! Ожидайте ответа на вашу электронную почту!";
        }
    }