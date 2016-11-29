<?php

namespace Application\Models\Samples\ViewRenderers;

use H4D\Leveret\Application\View;
use H4D\Leveret\Application\View\RendererInterface;
use Twig_Environment;
use Twig_Loader_Filesystem;

/**
 * Class TwigRenderer
 * @package Application\Models\Samples\ViewRenderers
 */
class TwigRenderer implements RendererInterface
{
    /**
     * @var Twig_Environment
     */
    protected $twig;
    /**
     * @var string;
     */
    protected $viewsPath;
    /**
     * TwigRenderer constructor.
     */
    public function __construct()
    {
        $this->viewsPath = realpath(APP_VIEWS_DIR);
        // Configure twig
        $loader = new Twig_Loader_Filesystem([$this->viewsPath]);
        $this->twig = new Twig_Environment($loader);
    }

    /**
     * @param View $view
     * @param string $templatePath
     *
     * @return string
     */
    public function render(View $view, $templatePath)
    {
        // Twig needs relative paths...
        $templatePath = str_replace($this->viewsPath . DIRECTORY_SEPARATOR, '',
                                    realpath($templatePath));

        return $this->twig->render($templatePath, $view->getTemplateVars());
    }
}