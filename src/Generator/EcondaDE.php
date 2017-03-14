<?php

namespace ElasticExportEcondaDE\Generator;

use ElasticExport\Helper\ElasticExportCoreHelper;
use Plenty\Modules\DataExchange\Contracts\CSVPluginGenerator;
use Plenty\Modules\Helper\Services\ArrayHelper;
use Plenty\Modules\Item\DataLayer\Models\Record;
use Plenty\Modules\Item\DataLayer\Models\RecordList;
use Plenty\Modules\Helper\Contracts\UrlBuilderRepositoryContract;
use Plenty\Modules\Helper\Models\KeyValue;

class EcondaDE extends CSVPluginGenerator
{
    const DELIMITER = ';';

    const IMAGE_SIZE_WIDTH = 'width';
    const IMAGE_SIZE_HEIGHT = 'height';

    /**
     * @var ElasticExportCoreHelper
     */
    private $elasticExportCoreHelper;

    /**
     * @var ArrayHelper
     */
    private $arrayHelper;

    /**
     * @var array $idlVariations
     */
    private $idlVariations = array();


    /**
     * EcondaDE constructor.
     * @param ArrayHelper $arrayHelper
     */
    public function __construct(ArrayHelper $arrayHelper)
    {
        $this->arrayHelper = $arrayHelper;
    }

    /**
     * @param array $resultData
     * @param array $formatSettings
     * @param array $filter
     */
    protected function generatePluginContent($resultData, array $formatSettings = [], array $filter = [])
    {
        $this->elasticExportCoreHelper = pluginApp(ElasticExportCoreHelper::class);

        if(is_array($resultData) && count($resultData['documents']) > 0) 
        {
            $settings = $this->arrayHelper->buildMapFromObjectList($formatSettings, 'key', 'value');

            $this->setDelimiter(self::DELIMITER);

            $this->addCSVContent([
                'Id',
                'Name',
                'Description',
                'ProductURL',
                'ImageURL',
                'Price',
                'MSRP',
                'New',
                'Stock',
                'EAN',
                'Brand',
                'ProductCategory',
                'Grundpreis'

            ]);

            $variationCondition = [
                0 => '1', // plenty condition: NEU
                1 => '0', // plenty condition: GEBRAUCHT
                2 => '1', // plenty condition: NEU & OVP
                3 => '1', // plenty condition: NEU mit Etikett
                4 => '0', // plenty condition: B-WARE
            ];

            // Create a List of all VariationIds
            $variationIdList = array();
            foreach($resultData['documents'] as $variation)
            {
                $variationIdList[] = $variation['id'];
            }

            // Get the ElasticSearch missing fields from IDL(ItemDataLayer)
            if(is_array($variationIdList) && count($variationIdList) > 0)
            {
                /**
                 * @var \ElasticExportEcondaDE\IDL_ResultList\EcondaDE $idlResultList
                 */
                $idlResultList = pluginApp(\ElasticExportEcondaDE\IDL_ResultList\EcondaDE::class);
                $idlResultList = $idlResultList->getResultList($variationIdList, $settings, $filter);
            }

            //Creates an array with the variationId as key to surpass the sorting problem
            if(isset($idlResultList) && $idlResultList instanceof RecordList)
            {
                $this->createIdlArray($idlResultList);
            }

            foreach($resultData['documents'] as $variation)
            {
                $price = $this->idlVariations[$variation['id']]['variationRetailPrice.price'];
                $rrp = $this->elasticExportCoreHelper->getRecommendedRetailPrice($this->idlVariations[$variation['id']]['variationRecommendedRetailPrice.price'], $settings);

                $rrp =  $rrp > $price ? $rrp : '';

                $data = [

                    'Id'                => $variation['id'],
                    'Name'              => $this->elasticExportCoreHelper->getName($variation, $settings),
                    'Description'       => $this->elasticExportCoreHelper->getDescription($variation, $settings),
                    'ProductURL'        => $this->elasticExportCoreHelper->getUrl($variation, $settings, true, false),
                    'ImageURL'          => $this->elasticExportCoreHelper->getMainImage($variation, $settings),
                    'Price'             => number_format((float)$price, 2, ',', ''),
                    'MSRP'              => number_format((float)$rrp, 2, ',', ''),
                    'New'               => $variationCondition[(int)$variation->itemBase->condition],
                    'Stock'             => $this->idlVariations[$variation['id']]['variationStock.stockNet'],
                    'EAN'               => $this->elasticExportCoreHelper->getBarcodeByType($variation, $settings->get('barcode')),
                    'Brand'             => $this->elasticExportCoreHelper->getExternalManufacturerName((int)$variation->itemBase->producerId),
                    'ProductCategory'   => $this->elasticExportCoreHelper->getCategory((int)$variation->variationStandardCategory->categoryId, $settings->get('lang'), $settings->get('plentyId')),
                    'Grundpreis'        => $this->elasticExportCoreHelper->getBasePrice($variation, $settings),
                ];

                $this->addCSVContent(array_values($data));
            }
        }
    }

    /**
     * Creates an array with the rest of data needed from the ItemDataLayer.
     * @param RecordList $idlResultList
     */
    private function createIdlArray($idlResultList)
    {
        if ($idlResultList instanceof RecordList) {
            foreach ($idlResultList as $idlVariation) {
                if ($idlVariation instanceof Record) {
                    $this->idlVariations[$idlVariation->variationBase->id] = [
                        'itemBase.id' => $idlVariation->itemBase->id,
                        'variationBase.id' => $idlVariation->variationBase->id,
                        'variationStock.stockNet' => $idlVariation->variationStock->stockNet,
                        'variationRetailPrice.price' => $idlVariation->variationRetailPrice->price,
                        'variationRecommendedRetailPrice.price' => $idlVariation->variationRecommendedRetailPrice->price,
                    ];
                }
            }
        }
    }

}
