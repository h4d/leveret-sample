<?php


namespace Application\Controllers;

use H4D\Leveret\Application\Controller;


/**
 * Class SampleController
 * @package Application\Controllers
 */
class SampleController extends Controller
{

    public function init()
    {
        parent::init();
        $this->useLayout('layouts/main.phtml');
        $this->getLayout()->addVar('title', 'Leveret application sample');
    }

    /**
     * @param \Exception $exception
     */
    private function renderException($exception)
    {
        $this->getView()->addVar('exception', $exception);
        $this->render('samples/exception.phtml');
    }


    /**
     * Basic action
     */
    public function indexAction()
    {
        try
        {
            $this->render('samples/index.phtml');

        }
        catch (\Exception $e)
        {
            $this->renderException($e);
        }
    }

    /**
     * Partials sample
     */
    public function partialsSampleAction()
    {
        try
        {
            // Some silly data...
            $fruits = ['orange', 'apple', 'lemon', 'banana'];
            $tableHeaders = ['Fruit', 'Color'];
            $tableData = [
                ['orange', 'orange' ],
                ['apple', 'green/red'],
                ['lemon', 'yellow'],
                ['banana', 'yellow'],
            ];

            $this->getView()->addVar('fruits', $fruits);
            $this->getView()->addVar('tableHeaders', $tableHeaders);
            $this->getView()->addVar('tableData', $tableData);

            $this->render('samples/partials.phtml');

        }
        catch (\Exception $e)
        {
            $this->renderException($e);
        }
    }

    /**
     * View helpers samples
     */
    public function viewHelpersSampleAction()
    {
        try
        {
            // Some silly data...
            $name = 'Frank';
            $date = new \DateTime();

            $this->getView()->addVar('name', $name);
            $this->getView()->addVar('date', $date);

            $this->render('samples/view-helpers.phtml');

        }
        catch (\Exception $e)
        {
            $this->renderException($e);
        }

    }

    /**
     * Route with vars sample
     *
     * @param $name
     */
    public function varsAction($name)
    {
        try
        {
            // Add wiew vars
            $this->getView()->addVar('name', $name);
            // Sample: Use monolog to log var value...
            $this->logger->info('Received value!', ['name' => $name]);
            // Render view
            $this->render('samples/vars.phtml');
        }
        catch (\Exception $e)
        {
            $this->renderException($e);
        }
    }

}