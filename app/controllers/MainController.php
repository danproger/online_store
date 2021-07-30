<?php
    class MainController extends Controller {
        public function index ($page = 1) {
            $products = $this->model('Product');

            $this->view("main/index", ['title' => "Главная", 'products' => $products->getShuffledProductsLimited(6)]);
        }
    }