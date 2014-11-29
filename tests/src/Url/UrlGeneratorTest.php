<?php namespace InakiAnduaga\LaravelHtmlBuilderExtensions\Tests\Url;

use InakiAnduaga\LaravelHtmlBuilderExtensions\Tests\BaseTest;
use Illuminate\Config\Repository as Config;

use InakiAnduaga\LaravelHtmlBuilderExtensions\Url\UrlGenerator;
use Illuminate\Routing\RouteCollection;
use Illuminate\Http\Request;

//use Illuminate\Container\Container as App;

class UrlGeneratorTest extends baseTest {

    /** @var UrlGenerator */
    private $urlGenerator;

    /**
     * Set dependencies
     */
    public function __construct()
    {
        $this->urlGenerator = new UrlGenerator(new RouteCollection(), new Request);
    }

    public function testPlaceholder()
    {
        $this->assertEquals(true, true);
    }


} 