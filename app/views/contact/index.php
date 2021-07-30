<div class="main-part">
    <div class="container">
        <div class="contact-block">
            <h1>Обратная связь</h1>
            <p>Наришите нам, если у вас есть вопросы!</p>
            <div class="form-wrapper">
                <form action="/contacts" method="POST" class="q-form">
                    <input type="text" name="name" placeholder="Введите имя..." value="<?= $_POST['name'] ?>">
                    <input type="email" name="email" placeholder="Введите email..." value="<?= $_POST['email'] ?>">
                    <input type="text" name="age" placeholder="Введите возраст..." value="<?= $_POST['age'] ?>">
                    <textarea name="message" id="#message" rows="5" placeholder="Введите сообщение..."><?= $_POST['message'] ?></textarea>
                    <div class="error"><?= $data['message']; ?></div>
                    <div class="success"><?= $data['success']; ?></div>
                    <button id="send" class="q-btn q-btn-k">Отправить</button>
                </form>
            </div>
        </div>
    </div>
</div>