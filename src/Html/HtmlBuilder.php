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
