<?php

namespace ActiveSupport\Test;
use \ActiveSupport\Helpers\Decorator as Decorator;

class DecoratorTest extends \PHPUnit_Framework_TestCase
{
    protected $mock;
    protected $model;
    
    protected function setUp()
    {
        parent::setUp();
        $this->mock = new \Person("Frank");
        $this->model = Decorator::decorate($this->mock,false);
    }
    
    public function testDecoratorAddsMethod()
    {
      $this->assertTrue(method_exists($this->model,'changeName'),
        "Decorator failed to add method changeName to object Person"
      );
    }
    
    public function testDecoratorExecutesNativeMethod()
    {
      $this->assertSame($this->model->getName(),"Frank",
        "Decorator failed to execute native object method"
      );
    }
    
    public function testsGetsPropertiesFromUnmodelObject()
    {
      $this->assertSame($this->model->status,"Married",
        "Decorator failed to retrieve property from unmodel object"
      );      
    }
    
    public function testSetsPublicDecoratorProperties()
    {
      $this->model->age = 10;
      $this->assertEquals($this->model->age,10,
        "Decorator failed to update local properties"
      );
    }
    
    public function testDecoratorMethodUpdatesNativeObject()
    {
      $this->model->changeName("Bob");
      $this->assertSame($this->model->getName(),"Bob",
        "Decorator failed to update property from unmodel object"
      );          
    }
}