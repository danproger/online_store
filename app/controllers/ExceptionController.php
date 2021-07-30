<?php
    class ExceptionController extends Controller {
        public function index () {
            $this->error('errors/404');
        }
    }