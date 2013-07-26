<?php
class ApiUpTest extends PHPUnit_Framework_TestCase {

  public static function setUpBeforeClass () {
    
  }

  public function testCheckWithNoEndpointShouldReturnException () {
    try {
      ApiUp\ApiUp::check();
    } catch (Exception $e) {
      $this->assertEquals($e->getMessage(), 'No endpoint received');
    }
  }

  public function testCheckWithInvalidEndpointShouldReturnException () {
    try {
      ApiUp\ApiUp::check('invalidurl');
    } catch (Exception $e) {
      $this->assertEquals($e->getMessage(), 'Endpoint not a valid url');
    }
  }

  public function testCheckWithValidEndpointShouldReturnTrue () {
    $this->assertTrue(ApiUp\ApiUp::check('http://www.petflow.com'));
  }

  public function testCheckWithEndpointThatDoesntExistShouldReturnFalse () {
    $this->assertFalse(ApiUp\ApiUp::check('http://www.domainthatdoesntexist1234.com'));
  }

}