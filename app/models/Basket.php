<?php
    class Basket {
        private $session_name = 'basket';

        public function isSetSession () {
            return isset($_SESSION[$this->session_name]);
        }

        public function unsetSession () {
            unset($_SESSION[$this->session_name]);
        }

        public function getSession () {
            return $_SESSION[$this->session_name];
        }

        public function addToBasket ($itemId) {
            if (!$this->isSetSession())
                $_SESSION[$this->session_name] = $itemId;
            else {
                $itemExists = false;
                $items = explode(',', $_SESSION[$this->session_name]);
                foreach ($items as $item) {
                    if ($item == $itemId)
                        $itemExists = true;
                }

                if ($itemExists === false)
                    $_SESSION[$this->session_name] = $_SESSION[$this->session_name] . ',' . $itemId;
            }
        }

        public function deleteFromBasket ($itemId) {
            $items = explode(',', $this->getSession());
            $this->unsetSession();
            foreach ($items as $item) {
                if ($itemId == $item) {
                    unset($item);
                } else {
                    $this->addToBasket($item);
                }
            }
        }

        public function countItems () {
            if (!$this->isSetSession())
                return 0;

            $items = explode(',', $_SESSION[$this->session_name]);
            return count($items);
        }
    }