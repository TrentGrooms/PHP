<?php

class Order {


    private $item_id;
    private $quantity;
    private $order_date;
    private $total_cost;


    public function __construct($item_id, $quantity, $order_date, $total_cost) {
        $this->item_id = $item_id;
        $this->quantity = $quantity;
        $this->order_date = $order_date;
        $this->total_cost = $total_cost;
    }


    public function getItemId() {
        return $this->item_id;
    }

    public function getQuantity() {
        return $this->quantity;
    }

    public function getOrderDate() {
        return $this->order_date;
    }

    public function getTotalCost() {
        return $this->total_cost;
    }


    public function setItemId($item_id) {
        $this->item_id = $item_id;
    }

    public function setQuantity($quantity) {
        $this->quantity = $quantity;
    }

    public function setOrderDate($order_date) {
        $this->order_date = $order_date;
    }

    public function setTotalCost($total_cost) {
        $this->total_cost = $total_cost;
    }
}
?>