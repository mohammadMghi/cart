<?php
namespace Ramin\Cart\Basket;

use Ramin\Cart\Storage\Contracts\StorageInterface;
use Ramin\Product;

class Basket
{
    private $storage;

    public function __construct(StorageInterface $storage)
    {
        $this->storage = $storage;
    }
    
    public function add(Product $product, int $quantity)
    {
       
        $quantity = $this->quantity($product,$quantity);

        $this->storage->set($product->id ,[
            'quantity' => $quantity
        ]);
    }

    public function get(Product $product)
    {
        return $this->storage->get($product);
    }

    public function has(Product $product)
    {
         $this->storage->exists($product->id );
    }

    public function remove($product)
    {
        if(!$this->has($product))
            return false;
        $this->storage->unset($product->id);
        return true;
    }


    public function getAll()
    {
        return $this->storage->all();
    }

    public function quantity($product,$quantity)
    {
        if($this->has($product)){
            return $quantity = $this->get($product)['quantity'] + $quantity ;
        }
    }
}