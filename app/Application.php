<?php

namespace Application;

use Application\Controllers\SampleController;
use Application\Controllers\TwigController;
use Application\Models\Samples\ViewHelpers\SillyHelper;
use H4D\Leveret\Http\Request;

class Application extends \H4D\Leveret\Application
{

    /**
     * Register app's services here...
     */
    protected function initServices()
    {
        Services::i()->initServices($this);
    }

    /**
     * Register app's ACLs here...
     */
    protected function initAcls()
    {

    }

    /**
     * Register app's view helpers here...
     */
    protected function initViewHelpers()
    {
        // Sample to illustrate howto register a custom view helper.
        $mySillyHelper = new SillyHelper('sillyHelper');
        $this->getView()->registerHelper($mySillyHelper);
    }

    /**
     * Register app's reoutes here...
     */
    protected function initRoutes()
    {
        if ($this->getConfig()->get('views', 'useExternalRenderer', false))
        {
            $this->iniTwigSamples();
        }
        else
        {
            $this->initSamples();
        }
    }

    protected function initSamples()
    {
        // Index
        $this->registerRoute(Request::METHOD_GET, '/')
             ->useController(SampleController::class, 'indexAction')
             ->setName('index');

        // Partials sample
        $this->registerRoute(Request::METHOD_GET, '/samples/partials')
             ->useController(SampleController::class, 'partialsSampleAction')
             ->setName('partials sample');

        // View helpers sample
        $this->registerRoute(Request::METHOD_GET, '/samples/view-helpers')
             ->useController(SampleController::class, 'viewHelpersSampleAction')
             ->setName('view helpers sample');

        // Test route
        $this->registerRoute(Request::METHOD_GET, '/samples/vars/:name')
             ->useController(SampleController::class, 'varsAction')
             ->setName('route vars sample');
    }

    protected function iniTwigSamples()
    {
        // Index
        $this->registerRoute(Request::METHOD_GET, '/')
             ->useController(TwigController::class, 'indexAction')
             ->setName('twig');
    }


}