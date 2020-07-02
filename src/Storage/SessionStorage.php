<?php

namespace Ramin\Cart\Storage;

 
use Countable;
use Ramin\Cart\Storage\Contracts\StorageInterface;

class SessionStorage implements StorageInterface , Countable
{
    private $bucket;
    
    public function __construct($bucket = 'defulte'){
        $this->bucket = $bucket;  
    }

    public function get($index){
        return session()->get($this->bucket . '.' . $index);
    }
    public function set($index, $value){
        return session()->put($this->bucket . '.' . $index , $value);
    }
    public function all(){
        return session()->get($this->bucket);
    }
    public function exists($index){
        return session()->has($this->bucket . '.' . $index);
    }
    public function unset($index){
        return session()->forget($this->bucket . '.' .  $index);
    }
    public function clear(){
        return session()->forget($this->bucket);
    }
    public function count()
    {
        return count($this->all());
    }
}