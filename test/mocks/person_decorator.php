<?php

class PersonDecorator extends \ActiveSupport\Helpers\Decorator
{
  public $age;
  
  public function changeName( $name )
  {
    $this->name = $name;
  }

}