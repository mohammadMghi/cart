<?php

namespace Ramin\Cart\Controller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Ramin\Cart\Basket\Basket;

class BasketController extends Controller
{
    private $basket;
    public function __construct(Basket $basket)
    {
        $basket = $this->basket;
    }

    public function get($product)
    {
        $this->basket->get($product);
    }

    public function add($product , $quantity)
    {
        return $this->basket->add($product->id , $quantity);
    }

    public function remove($product)
    {
        return $this->basket->remove($product->id);
    }

    public function all()
    {
        return $this->basket->all();
    }


}
