<div class="main-part">
    <div class="container">
        <div class="d-flex flex-row justify-content-between">
            <h1>Корзина</h1>
            <form action="/basket" method="POST">
                <input type="hidden" name="clean-basket" value="do">
                <button class="q-btn q-btn-ol-k">
                    Очистить
                </button>
            </form>
        </div>
        <?php
            $final_price = 0;
            if (count($data['products']) == 0):
        ?>
            <div class="text-center q-text-k my-5 py-5 d-flex flex-column align-items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-cart4" viewBox="0 0 16 16">
                    <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/>
                </svg>
                <h2><b><?= $data['empty']; ?></b></h2>
            </div>
        <?php else: ?>
            <div>
                <?php foreach ($data['products'] as $product): ?>
                    <?php $final_price += $product->price; ?>
                    <div class="product rounded my-2 p-3">
                        <div class="d-flex flex-column flex-md-row justify-content-md-between align-items-center w-100">
                            <div class="text-center" style="height: 180px; width: 300px;">
                                <img class="product-image h-100" src="/public/img/<?= $product->img; ?>" alt="">
                            </div>
                            <div class="mx-3 my-3 my-md-0">
                                <h2><?= $product->title; ?></h2>
                                <h3 class="q-text-k text-center">
                                    <b><?= $product->price; ?> UAH</b>
                                </h3>
                            </div>
                            <div>
                                <div>
                                    <form action="/basket" method="POST">
                                        <input type="hidden" name="delete-item" value="<?= $product->id; ?>">
                                        <button class="q-btn q-btn-ol-k w-100">
                                            Удалить
                                        </button>
                                    </form>
                                </div>
                                <div class="mt-2">
                                    <a href="/product/<?= $product->id; ?>">
                                        <button class="q-btn q-btn-ol-k w-100">
                                            Детальнее
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <div class="d-flex flex-row justify-content-between mt-3">
            <a href="/">
                <button class="q-btn q-btn-k">
                    Продолжить покупки
                </button>
            </a>
            <button class="q-btn q-btn-w bg-white" type="button" id="pay-button-id" onclick="pay();">
                Оплатить (<span class="q-text-k"><b><?= $final_price; ?> UAH</b></span>)
            </button>
            <script async>
                function pay() {
                    var pay_btn = document.getElementById('pay-button-id');
                    pay_btn.setAttribute('disabled', 'disabled');
                    pay_btn.innerText = 'Система оплаты временно недоступна...';
                    pay_btn.classList.remove('q-btn');
                    pay_btn.classList.add('rounded')
                    pay_btn.style.color = 'orangered';
                    pay_btn.style.boxSizing = 'border-box';
                    pay_btn.style.border = '0px';
                }
            </script>
        </div>
    </div>
</div>