<?php
    class UserController extends Controller {
        public function dashboard () {
            if (!isset($_COOKIE['logged'])) {
                header('Location: /user/auth');
                exit();
            }

            $data = ['title' => "Личный кабинет", 'error' => '', 'success' => ''];
            $user_db = $this->model('User');

            if (isset($_REQUEST['set-user-image'])) {
                if ($_FILES['user-image']['name'] == "")
                    $data['error'] = "Выберите изображение!";
                else if ($_FILES['user-image']['size'] > 500000)
                    $data['error'] = "Слишком большой размер файла!";
                else {
                    $result = $user_db->setUserImage('user-image', $_COOKIE['logged']);
                    if ($result == true) {
                        $data['success'] = "Картинки была успешно добавлена!";
                    }
                }

                unset($_REQUEST['set-user-image'], $_POST['user-image'], $_FILES['user-image']);
            }


            if (isset($_POST['exit_btn']))
                $user_db->logOut();

            $user = $user_db->getUserInfo($_COOKIE['logged']);
            $data['user'] = $user;

            $this->view('user/dashboard', $data);
        }

        public function auth () {
            $data = ['title' => "Авторизация"];
            if (isset($_POST['email']) || isset($_POST['password'])) {
                $user = $this->model('User');
                $data['message'] = $user->logIn($_POST['email'], $_POST['password']);
            }

            $this->view('user/auth', $data);
        }

        public function reg () {
            $data = ['title' => 'Регистрация', 'message' => '', 'success' => ''];

            if (isset($_POST['name']) || isset($_POST['email']) || isset($_POST['password']) || isset($_POST['re_password'])) {
                $user = $this->model('User');
                $user->setData($_POST['name'], $_POST['email'], $_POST['password'], $_POST['re_password']);
                $isValid = $user->validateRegForm();
                if ($isValid === true) {
                    $user->addUser();
                } else
                    $data['message'] = $isValid;
            }

            $this->view('user/reg', $data);
            unset($_POST['name'], $_POST['email'], $_POST['age'], $_POST['message']);
        }
    }