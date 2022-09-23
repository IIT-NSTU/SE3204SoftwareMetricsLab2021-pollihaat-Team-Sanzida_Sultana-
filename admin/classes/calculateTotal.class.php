<?php

class CalculateTotal
{
    private $category;
    private $products;
    private $entrepreneur;
    private $customer;
    private $order;
    public function __construct()
    {
        $conn = DbConnection::getInstance();
        $this->connection = $conn->getConnection();

        $this->category = new Categories();
        $this->products = new Products();
        $this->entrepreneur = new Entrepreneur();
        $this->customer = new Customer();
        $this->order = new Order();
        // $order=new Order();

    }
    public function calculateCategory()
    {

        return $this->category->countCategory();

    }
    public function calculateEntrepreneur()
    {

        return $this->entrepreneur->countEntrepreneur();

    }
    public function calculateProducts()
    {

        return $this->products->countProduct();

    }

    public function calculateCustomer()
    {

        return $this->customer->countCustomer();

    }

    public function calculateOrder()
    {
        return $this->order->totalOrder();

    }

    public function calculateOrderPending()
    {
        return $this->order->OrderPending();

    }

    public function calculatedDeliveryComplete()
    {
        return $this->order->orderDelivery();

    }
}
