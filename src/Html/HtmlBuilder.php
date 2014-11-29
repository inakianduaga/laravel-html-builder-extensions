<?php namespace InakiAnduaga\LaravelHtmlBuilderExtensions\Html;

use Illuminate\Html\HtmlBuilder as LaravelHtmlBuilder;
use InakiAnduaga\LaravelHtmlBuilderExtensions\Url\UrlGenerator;

class HtmlBuilder extends LaravelHtmlBuilder {

    /**
     * Create a new HTML builder instance.
     *
     * @param  UrlGenerator  $url
     */
    public function __construct(UrlGenerator $url = null)
    {
        $this->url = $url;
    }

	/**
	 * Generate a link to a JavaScript file.
	 *
	 * @param  string  $url
	 * @param  array   $attributes
	 * @param  bool    $secure
	 * @return string
	 */
	public function script($url, $attributes = array(), $secure = null)
	{
		$attributes['src'] = $this->url->asset($url, $secure);

		return '<script'.$this->attributes($attributes).'></script>'.PHP_EOL;
	}

	/**
	 * Generate a link to a CSS file.
	 *
	 * @param  string  $url
	 * @param  array   $attributes
	 * @param  bool    $secure
	 * @return string
	 */
	public function style($url, $attributes = array(), $secure = null)
	{
		$defaults = array('media' => 'all', 'type' => 'text/css', 'rel' => 'stylesheet');

		$attributes = $attributes + $defaults;

		$attributes['href'] = $this->url->asset($url, $secure);

		return '<link'.$this->attributes($attributes).'>'.PHP_EOL;
	}

	/**
	 * Generate an HTML image element.
	 *
	 * @param  string  $url
	 * @param  string  $alt
	 * @param  array   $attributes
	 * @param  bool    $secure
	 * @return string
	 */
	public function image($url, $alt = null, $attributes = array(), $secure = null)
	{
		$attributes['alt'] = $alt;

		return '<img src="'.$this->url->asset($url, $secure).'"'.$this->attributes($attributes).'>';
	}
}
