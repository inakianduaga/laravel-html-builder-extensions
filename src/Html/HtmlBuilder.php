<?php namespace InakiAnduaga\LaravelHtmlBuilderExtensions\Html;

use Illuminate\Html\HtmlBuilder as LaravelHtmlBuilder;
use InakiAnduaga\LaravelHtmlBuilderExtensions\Url\UrlGenerator;
use Illuminate\Config\Repository as Config;

class HtmlBuilder extends LaravelHtmlBuilder {

    /**
     * Create a new HTML builder instance.
     *
     * @param  UrlGenerator  $url
     * @param  Config  $config
     */
    public function __construct(UrlGenerator $url = null, Config $config)
    {
        $this->url = $url;
        $this->config = $config;
    }

//    /**
//     * Generate an HTML image element.
//     *
//     * @param  string  $url
//     * @param  string  $alt
//     * @param  array   $attributes
//     * @param  bool    $secure
//     * @return string
//     */
//    public function image($url, $alt = null, $attributes = array(), $secure = null)
//    {
//        $attributes['alt'] = $alt;
//
//        return '<img src="'.$this->url->asset($url, $secure).'"'.$this->attributes($attributes).'>';
//    }


    /**
	 * Generate an HTML image element that lazy loads.
     * @TODO
	 *
	 * @param  string  $url
	 * @param  string  $alt
	 * @param  array   $attributes
	 * @param  bool    $secure
	 * @return string
	 */
	public function imageLazy($url, $alt = null, $attributes = array(), $secure = null)
	{
        $attributes['alt'] = $alt;

		return '<img src="'.$this->url->asset($url, $secure).'"'.$this->attributes($attributes).'>';
	}


}
