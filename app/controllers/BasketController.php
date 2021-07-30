<?php
    class BasketController extends Controller {
        public function index () {
            $data = ['title' => 'Корзина', 'products' => []];
            $basket = $this->model('Basket');

            if (isset($_POST['add-item']))
                $basket->addToBasket($_POST['add-item']);

            if (isset($_POST['clean-basket']))
                $basket->unsetSession();

            if (isset($_POST['delete-item']))
                $basket->deleteFromBasket($_POST['delete-item']);

            if (!$basket->isSetSession())
                $data['empty'] = "Корзина пуста...";
            else {
                $products = $this->model('Product');
                $data['products'] = $products->getProductsBasket($basket->getSession());
            }

            $this->view('basket/index', $data);
        }
    }