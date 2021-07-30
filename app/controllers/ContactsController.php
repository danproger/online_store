<?php
    class ContactsController extends Controller {
        public function index() {
            $data = ['title' => 'Контакты', 'message' => '', 'success' => ''];

            if (isset($_POST['name']) || isset($_POST['email']) || isset($_POST['age']) || isset($_POST['message'])) {
                $mail = $this->model('Contact');
                $mail->setData($_POST['name'], $_POST['email'], $_POST['age'], $_POST['message']);
                $isValid = $mail->validateForm();
                if ($isValid === true) {
                    if ($mail->send_mail() == "Сообщение отправлено! Ожидайте ответа на вашу электронную почту!"){
                        $data['success'] = $mail->send_mail();
                        unset($_POST['name'], $_POST['email'], $_POST['age'], $_POST['message']);
                    } else
                        $data['error'] = $mail->send_mail();
                } else
                    $data['message'] = $isValid;
            }

            $this->view('contact/index', $data);
            unset($_POST['name'], $_POST['email'], $_POST['age'], $_POST['message']);
        }

        public function about() {
            $this->view('contact/about', ['title' => 'Про нас']);
        }
    }