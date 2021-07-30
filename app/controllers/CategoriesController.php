<?php
    class CategoriesController extends  Controller {
        public function index ($page = 1) {
            $products_limit = [];
            $products = $this->model('Product')->getProducts();
            $amount_of_pages = ceil(count($products)/6);
            if ($page > $amount_of_pages)
                $products_limit = null;
            else {
                for ($n = 0; $n < 6; $n++) {
                    array_push($products_limit, $products[($page-1)*6+$n]);
                }
            }

            $this->view('categories/index', ['title' => 'Все товары', 'block-title' => 'Все товары', 'pages' => $amount_of_pages, 'page' => $page, 'products' => $products_limit]);
        }

        private function getCategoryView ($en_title, $ru_title) {
            $ru_title = ucfirst($ru_title);
            $en_title = strtolower($en_title);
            $products = $this->model('Product');
            $this->view('categories/index', ['title' => $ru_title, 'block-title' => $ru_title, 'products' => $products->getProductsByCategory($en_title)]);
        }

        public function footwear () {
             $this->getCategoryView('footwear', 'Обувь');
        }

        public function hats () {
            $this->getCategoryView('hats', 'Головные уборы');
        }

        public function shirts () {
            $this->getCategoryView('shirts', 'Футболки');
        }

        public function watches () {
            $this->getCategoryView('watches', 'Часы');
        }
    }