<div class="main-part">
    <div class="container">
        <div class="row my-3">
            <div class="col-0 col-md-2 col-lg-3"></div>
            <div class="col-12 col-md-8 col-lg-6">
                <h1>Авторизация</h1>
                <p>Для авторизации на сайте заполните форму ниже</p>
                <div class="form-wrapper">
                    <form action="/user/auth" method="POST" class="q-form">
                        <input type="email" name="email" placeholder="Введите email..." value="<?= $_POST['email']; ?>">
                        <input type="password" name="password" placeholder="Введите пароль..." value="<?= $_POST['password']; ?>">
                        <div class="error"><?= $data['message']; ?></div>
                        <div class="d-flex flex-row align-items-center justify-content-between">
                            <button id="send" class="q-btn q-btn-k">Войти</button>
                            <a href="#" class="q-link fs-my">
                                Забыли пароль?
                            </a>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-0 col-md-2 col-lg-3"></div>
        </div>
    </div>
</div>