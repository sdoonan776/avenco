<?php

namespace Tests\Browser;

class AddProductToCartTest extends PHPUnit_Extensions_Selenium2TestCase
{
    public function setUp()
    {
    	$this->setHost('172.24.0.2');
    	$this->port('4444');
    	$this->setBrowserUrl('http://localhost');
    	$this->setBrowser('chrome');
    }

    

    public function tearDown()
	{
	    $this->stop();
	}
}
