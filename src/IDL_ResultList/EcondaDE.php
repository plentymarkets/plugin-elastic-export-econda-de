<?php

namespace ElasticExportEcondaDE\IDL_ResultList;

use Plenty\Modules\Helper\Models\KeyValue;
use Plenty\Modules\Item\DataLayer\Contracts\ItemDataLayerRepositoryContract;
use Plenty\Modules\Item\DataLayer\Models\RecordList;


/**
 * Class EcondaDE
 * @package ElasticExportEcondaDE\IDL_ResultList
 */
class EcondaDE
{
    /**
     * Creates and retrieves the extra needed data from ItemDataLayer.
     * @param array $variationIds
     * @param KeyValue $settings
     * @param array $filter
     * @return RecordList|string
     */
    public function getResultList($variationIds, $settings, array $filter = [])
    {
        if(is_array($variationIds) && count($variationIds) > 0)
        {
            $searchFilter = array(
                'variationBase.hasId' => array(
                    'id' => $variationIds
                )
            );

            if(array_key_exists('variationStock.netPositive' ,$filter))
            {
                $searchFilter['variationStock.netPositive'] = $filter['variationStock.netPositive'];
            }
            elseif(array_key_exists('variationStock.isSalable' ,$filter))
            {
                $searchFilter['variationStock.isSalable'] = $filter['variationStock.isSalable'];
            }

            $resultFields = array(
                'itemBase' => array(
                    'id',
                ),

                'variationBase' => array(
                    'id'
                ),

                'variationStock' => array(
                    'params' => array(
                        'type' => 'virtual'
                    ),
                    'fields' => array(
                        'stockNet'
                    )
                ),

                'variationRetailPrice' => array(
                    'params' => array(
                        'referrerId' => $settings->get('referrerId') ? $settings->get('referrerId') : -1,
                    ),
                    'fields' => array(
                        'price',
                    ),
                ),

                'variationRecommendedRetailPrice' => array(
                    'params' => array(
                        'referrerId' => $settings->get('referrerId') ? $settings->get('referrerId') : -1,
                    ),
                    'fields' => array(
                        'price',
                    ),
                ),

            );

            $itemDataLayer = pluginApp(ItemDataLayerRepositoryContract::class);
            /**
             * @var ItemDataLayerRepositoryContract $itemDataLayer
             */
            $itemDataLayer = $itemDataLayer->search($resultFields, $searchFilter);

            return $itemDataLayer;
        }

        return '';
    }
}