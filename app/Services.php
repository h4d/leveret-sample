<?php

namespace Application;

use Application\Models\Samples\ViewRenderers\TwigRenderer;
use H4D\I18n\DateDecorator;
use H4D\I18n\NullTranslator;
use H4D\I18n\Translator;
use H4D\I18n\Translator\Adapters\CsvAdapter;
use H4D\Leveret\Application as LeveretApplication;
use H4D\Patterns\Traits\SingletonTrait;

class Services
{
    use SingletonTrait;

    /**
     * @param LeveretApplication $app
     */
    public function initServices(LeveretApplication $app)
    {
        // Register the app's Logger as service
        $app->getServiceContainer()->register('Logger', function () use ($app)
        {
            return $app->getLogger();
        });

        // Register a DateDecorator as a service
        $app->registerService($app::DATE_DECORATION_SERVICE_NAME, function () use ($app)
        {
            $decorator = new DateDecorator();
            $decorator->setDefaultLocale('es_ES');

            return $decorator;
        }, true);

        // Register a Translator as a service
        $app->registerService($app::TRANSLATION_SERVICE_NAME, function () use ($app)
        {
            try
            {
                // Use a CSV file as translations source & dump unstranslated to /data/tranlastions/untranslated-strings.txt
                $options = [CsvAdapter::OPTION_TRANSLATIONS_DIRECTORY => APP_DATA_DIR . '/translations',
                            CsvAdapter::OPTION_LOG_UNTRANSLATED_STRING => true,
                            CsvAdapter::OPTION_UNTRANSLATED_STRING_LOG_FILE => APP_DATA_DIR . '/translations/untranslated-strings.txt'];
                $adaptor = new CsvAdapter('es_ES', $options);
                $translator = new Translator($adaptor);
            }
            catch (\Exception $e)
            {
                // If something fails use NullTranslator as default translator
                $translator = new NullTranslator();
            }

            return $translator;
        }, true);

        if ($app->getConfig()->get('views', 'useExternalRenderer', false))
        {
            // Register TwigRenderer as a service
            $app->registerService($app::VIEW_RENDERER_SERVICE_NAME, function () use ($app)
            {
                return new TwigRenderer();
            }, true);
        }

    }

}