<div class="main-part">
    <div class="container text-center text-md-start">
        <div class="text-center text-md-start">
            <h1>Кабинет пользователя: <b class="q-text-k"><?= $data['user'][0]->name; ?></b></h1>
        </div>
        <div class="row my-3 p-3 align-items-center">
            <div class="col-12 col-lg-3 text-center">
                <div class="text-center my-1">
                    <img class="img-thumbnail user-image" src="/public/img/user-icons/<?= $data['user'][0]->image; ?>" alt="">
                </div>
                <div>
                    <form action="/user/dashboard" method="POST" enctype="multipart/form-data" class="text-center">
                        <label for="user-image">Выберите изображение:</label>
                        <div class="text-center">
                            <!--<input type="hidden" name="MAX_FILE_SIZE" value="500">-->
                            <input name="user-image" type="file" class="file-sender q-link my-2">
                        </div>
                        <div class="error"><?= $data['error']; ?></div>
                        <div class="success"><?= $data['success']; ?></div>
                        <button name="set-user-image" class="q-btn q-btn-ol-k">
                            Загрузить
                        </button>
                    </form>
                </div>
            </div>
            <div class="col-12 col-lg-9 my-3">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequuntur et impedit ratione repudiandae.
                Adipisci amet, aut delectus ea esse fugit ipsa laboriosam minus natus nihil nisi non porro provident
                quis quos rem sit suscipit vel veritatis voluptatibus. Amet dignissimos error explicabo incidunt non
                quam ratione? Aliquam aliquid cumque harum, magni quibusdam repellendus veritatis. Ad aliquid assumenda,
                corporis cumque eius est facere impedit ipsum iure modi nostrum pariatur quae, quis sit veritatis.
                A aliquam, distinctio facere labore modi nisi quia rem sed sit tenetur. Amet cupiditate laboriosam
                numquam odit voluptatem. A accusamus adipisci aliquam asperiores, blanditiis commodi dolor dolores
                doloribus earum eligendi ex facere facilis harum impedit in ipsa itaque laborum minus natus nihil nisi
                nulla optio porro, provident quae quam quas quibusdam repellat sapiente sint temporibus vitae voluptas
                voluptate. Culpa eligendi esse repellat! Aliquam itaque laboriosam laborum nostrum omnis quia? Ab
                accusamus aut, beatae deserunt dolores facilis in laborum totam.
            </div>
        <div>
        <div class="text-center text-md-end">
            <form action="/user/dashboard" method="POST">
                <input type="hidden" name="exit_btn">
                <button type="submit" class="q-btn q-btn-k">
                    Выйти
                </button>
            </form>
        </div>
    </div>
</div>