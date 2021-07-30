<?php
    class Product {
        public function __construct () {
            $db = DB::getInstance();
        }

        public function getProducts () {
            $result = DB::ja_query("SELECT * FROM `products` ORDER BY `id` DESC");
            return $result;
        }

        public function getShuffledProductsLimited(int $limit) {
            $result = [];
            $fres = $this->getProducts();
            shuffle($fres);

            for ($i = 0; $i < $limit; $i++)
                array_push($result, $fres[$i]);

            return $result;
        }

        public function getProductsByCategory (string $category) {
            $result = DB::ja_query("SELECT * FROM `products` WHERE `category` = '" . $category . "' ORDER BY `id` DESC");
            return $result;
        }

        public function getProductById ($id) {
            $result = DB::ja_query("SELECT * FROM `products` WHERE `id` = " . $id);
            if ($result === false)
                return false;

            return $result;
        }

        public function getProductsBasket ($items) {
            $result = DB::ja_query("SELECT * FROM `products` WHERE `id` IN (" . $items . ")");
            return $result;
        }
    }