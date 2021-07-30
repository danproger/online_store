<div class="main-part">
    <div class="container pt-2">
        <div class="products-block">
            <?php if (isset($data['block-title'])): ?>
                <h1><?= $data['block-title']; ?></h1>
            <?php else: ?>
                <h1>Товары</h1>
            <?php endif; ?>
            <div class="row d-flex align-items-center justify-content-between">
                <?php if ($data['products'] !== null): ?>
                    <?php foreach($data['products'] as $product): ?>
                        <div class="col-12 col-md-6 col-lg-4 mt-3">
                            <div class="product rounded">
                                <div class="q-iw text-center" style="width: 100%; height: 320px; overflow: hidden;">
                                    <img class="product-image" style="height: 320px;" src="/public/img/<?= $product->img; ?>" alt="">
                                </div>
                                <div class="card-body">
                                    <a href="/product/<?= $product->id; ?>" class="q-link">
                                        <h3><?= $product->title; ?></h3>
                                    </a>
                                    <p class="card-text">
                                        <?= $product->announce; ?>
                                    </p>
                                    <div class="d-flex flex-row align-items-center justify-content-between">
                                        <span style="color: #43CD8E; font-size: 1.5em;"><b><?= $product->price; ?> UAH</b></span>
                                        <a href="/product/<?= $product->id; ?>">
                                            <button type="button" class="q-btn q-btn-ol-k">
                                                Купить
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <?php if (isset($data['pages'])): ?>
                        <div class="my-3">
                            <?php for ($n = 1; $n <= $data['pages']; $n++): ?>
                                <a href="/categories/<?= $n; ?>" class="pagination-my text-decoration-underline<?= $data['page'] == $n ? " text-white" : ""; ?> q-link mx-1">
                                    <?= $n; ?>
                                </a>
                            <?php endfor; ?>
                        </div>
                    <?php endif; ?>
                <?php else: ?>
                    <div class="text-center">
                        <h1>К сожалению, пока что тут нет никаких товаров...</h1>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>