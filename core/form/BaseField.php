<?php

namespace app\core\form;

use app\core\Model;

abstract class BaseField
{
    public Model $model;
    public string $attribute;
      /**
     * Field Constructor
     * 
     * @param \app\core\Model $model
     * @param string   $attribute
     */

    public function __contruct(Model $model, string $attribute)
    {
        $this->model = $model;
        $this->attribute = $attribute;
    }
    
    abstract public function renderinput(): string;
  
}