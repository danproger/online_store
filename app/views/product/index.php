<div class="main-part">
    <div class="container">
        <?php if ($data['product'] == []): ?>
            <div class="text-center my-5 py-5">
                <h2>Такого товара не существует...</h2>
            </div>
        <?php else: ?>
            <h1 class="text-center text-md-start"><?= $data['product'][0]->title; ?></h1>
            <div class="row align-items-center my-3">
                <div class="col-12 col-md-4 col-lg-3 text-center">
                    <img class="img-thumbnail" style="width: 300px;" src="/public/img/<?= $data['product'][0]->img; ?>" alt="">
                </div>
                <div class="col-12 col-md-8 col-lg-9 mt-4">
                    <p><?= $data['product'][0]->announce; ?></p>
                    <p><?= $data['product'][0]->text; ?></p>
                </div>
            </div>
            <div class="d-flex flex-row justify-content-between my-3 q-text-k">
                <div style="font-size: 2em;">
                    Цена: <b><?= $data['product'][0]->price; ?> UAH</b>
                </div>
                <form action="/basket" method="POST">
                    <input type="hidden" name="add-item" value="<?= $data['product'][0]->id; ?>">
                    <button type="submit" class="q-btn q-btn-k">
                        В корзину
                    </button>
                </form>
            </div>
        <?php endif; ?>
    </div>
</div>