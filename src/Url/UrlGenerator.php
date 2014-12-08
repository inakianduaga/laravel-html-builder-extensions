<?php namespace InakiAnduaga\LaravelHtmlBuilderExtensions\Url;

use Illuminate\Routing\UrlGenerator as LaravelUrlGenerator;
use Illuminate\Http\Request;
use Illuminate\Routing\RouteCollection;

use Illuminate\Config\Repository as Config;

/**
 * Extended UrlGenerator
 */
class UrlGenerator extends LaravelUrlGenerator {

    /**
     * Generate a URL to an application asset.
     *
     * @param  string  $path
     * @param  bool|null  $secure
     * @return string
     */
    public function asset($path, $secure = null)
    {
        if ($this->isValidUrl($path)) return $path;

        //Get redirection config for this url
        $redirector = $this->getRedirectorConfigByAssetExtension($this->getFilepathExtension($path));

        // Once we get the root URL, we will check to see if it contains an index.php
        // file in the paths. If it does, we will remove it since it is not needed
        // for asset paths, but only for routes to endpoints in the application.
        if($redirector['enabled']) {
            $root = $this->getRootUrl($this->getScheme($secure), $this->getScheme($secure).$redirector['endpoint']);
        } else {
            $root = $this->getRootUrl($this->getScheme($secure));
        }

        return $this->removeIndex($root).'/'.trim($path, '/');
    }

    /**
     * Returns the file extension for a given file path
     *
     * @param $filePath
     *
     * @return string
     */
    private function getFilepathExtension($filePath)
    {
        $pathParts = pathinfo($filePath);

        return !empty($pathParts['extension']) ? $pathParts['extension'] : '';

    }

    /**
     * Determines whether redirection should be enabled by extension
     * @param string $extension
     *
     * @return array
     */
    private function getRedirectorConfigByAssetExtension($extension)
    {
        $configuration = app(Config::class)->get('laravel-html-builder-extensions::config.redirector');

        $out = array(
            'enabled' => $configuration['globalDisable'] ? false : true,
            'endpoint' => null,
        );

        switch ($extension) {

            //Scripts
            case 'js':

                if($configuration['scripts']['enabled']) {
                    $out['endpoint'] = $configuration['scripts']['endpoint'];
                } else {
                    $out['enabled'] = false;
                }
                break;

            //Styles
            case 'css':

                if($configuration['styles']['enabled']) {
                    $out['endpoint'] = $configuration['styles']['endpoint'];
                } else {
                    $out['enabled'] = false;
                }
                break;

            //Images
            default:

                if(in_array($extension, $configuration['images']['allowedTypes'])) {
                    $out['endpoint'] = $configuration['images']['endpoint'];
                } else {
                    $out['enabled'] = false;
                }
        }

        return $out;
    }

}
