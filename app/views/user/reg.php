<div class="main-part">
    <div class="container">
        <div class="contact-block">
            <h1>Регистрация</h1>
            <p>Для регистрации на сайте заполните форму ниже</p>
            <div class="form-wrapper">
                <form action="/user/reg" method="POST" class="q-form">
                    <input type="text" name="name" placeholder="Введите имя..." value="<?= $_POST['name']; ?>">
                    <input type="email" name="email" placeholder="Введите email..." value="<?= $_POST['email']; ?>">
                    <input type="password" name="password" placeholder="Введите пароль..." value="<?= $_POST['password']; ?>">
                    <input type="password" name="re_password" placeholder="Повторите пароль...">
                    <div class="error"><?= $data['message']; ?></div>
                    <button id="send" class="q-btn q-btn-k">Зарегистрироваться</button>
                </form>
            </div>
        </div>
    </div>
</div>