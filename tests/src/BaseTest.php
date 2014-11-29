<?php namespace InakiAnduaga\LaravelHtmlBuilderExtensions\Tests;

use PHPUnit_Framework_TestCase;
use Mockery as m;
use Illuminate\Support\Facades\App;

/**
 * Class BaseTest
 */
abstract class BaseTest extends PHPUnit_Framework_TestCase {

    /**
     * Mockery helper function to register the mocks for a class into the application
     *
     * @param  string $class is the class we want to mock
     * @return \Mockery\MockInterface
     */
    protected function m($class)
    {
        $mock = m::mock($class);

        // Binding mock instance as class into the IoC container
        App::instance($class, $mock);

        return $mock;
    }

    /**
     * Clean mocks after test
     * @return void
     */
    public function tearDown()
    {
        m::close();

        //Clear IoC registered instances
//        App::forgetInstances();
    }

} 