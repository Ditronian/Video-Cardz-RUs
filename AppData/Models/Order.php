<?php
    class Order
    {
        public $userID;
        public $orderDate;
        public $orderID;
        public $orderItems = array();

        public function __construct($userID, $orderDate, $orderID)
        {
            $this->userID = $userID;
            $this->orderDate = $orderDate;
            $this->orderID = $orderID;
        }
    }
?>