<?php


namespace Application\Controllers;

use H4D\Leveret\Application\Controller;


/**
 * Class TwigController
 * @package Application\Controllers
 */
class TwigController extends Controller
{

    public function indexAction()
    {
        $this->getView()->addVar('name', 'twig');
        $this->getView()->addVar('numbers', range(1, 3));
        $this->render('twig/twig.html');
    }

}