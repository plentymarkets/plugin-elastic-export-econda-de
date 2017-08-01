<?php

namespace ElasticExportEcondaDE;

use Plenty\Modules\DataExchange\Services\ExportPresetContainer;
use Plenty\Plugin\DataExchangeServiceProvider;

/**
 * Class ElasticExportEcondaDEServiceProvider
 * @package ElasticExportEcondaDE
 */
class ElasticExportEcondaDEServiceProvider extends DataExchangeServiceProvider
{
    /**
     * Abstract function for registering the service provider.
     */
    public function register()
    {

    }

    /**
     * Adds the export format to the export container.
     * @param ExportPresetContainer $container
     */
    public function exports(ExportPresetContainer $container)
    {
        $container->add(
            'EcondaDE-Plugin',
            'ElasticExportEcondaDE\ResultField\EcondaDE',
            'ElasticExportEcondaDE\Generator\EcondaDE',
            '',
            true,
			true
        );
    }
}