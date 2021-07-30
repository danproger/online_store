<?php
    class ProductController extends Controller {
        public function index ($id) {
            $product = $this->model('Product');
            $product = $product->getProductById($id);
            $this->view('product/index', ['title' => $product[0]->title, 'meta-desc' => $product[0]->announce, 'product' => $product]);
        }
    }