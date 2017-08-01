<?php

namespace ElasticExportEcondaDE\Generator;

use ElasticExport\Helper\ElasticExportCoreHelper;
use ElasticExport\Helper\ElasticExportPriceHelper;
use ElasticExport\Helper\ElasticExportStockHelper;
use Plenty\Modules\DataExchange\Contracts\CSVPluginGenerator;
use Plenty\Modules\Helper\Services\ArrayHelper;
use Plenty\Modules\Helper\Models\KeyValue;
use Plenty\Modules\Item\Search\Contracts\VariationElasticSearchScrollRepositoryContract;
use Plenty\Plugin\Log\Loggable;

/**
 * Class EcondaDE
 * @package ElasticExportEcondaDE\Generator
 */
class EcondaDE extends CSVPluginGenerator
{
	use Loggable;

    const DELIMITER = ';';

    /**
     * @var ElasticExportCoreHelper
     */
    private $elasticExportCoreHelper;

	/**
	 * @var ElasticExportPriceHelper
	 */
	private $elasticExportPriceHelper;

	/**
	 * @var ElasticExportStockHelper
	 */
	private $elasticExportStockHelper;

    /**
     * @var ArrayHelper
     */
    private $arrayHelper;

	/**
     * EcondaDE constructor.
     *
     * @param ArrayHelper $arrayHelper
     */
    public function __construct(ArrayHelper $arrayHelper)
    {
        $this->arrayHelper = $arrayHelper;
    }

    /**
     * Generates and populates the data into the CSV file.
     *
     * @param VariationElasticSearchScrollRepositoryContract $elasticSearch
     * @param array $formatSettings
     * @param array $filter
     */
    protected function generatePluginContent($elasticSearch, array $formatSettings = [], array $filter = [])
    {
		$this->elasticExportPriceHelper = pluginApp(ElasticExportPriceHelper::class);
		$this->elasticExportStockHelper = pluginApp(ElasticExportStockHelper::class);
        $this->elasticExportCoreHelper = pluginApp(ElasticExportCoreHelper::class);

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

		if($elasticSearch instanceof VariationElasticSearchScrollRepositoryContract)
		{
			$limitReached = false;
			$lines = 0;
			do
			{
				if($limitReached === true)
				{
					break;
				}

				$resultList = $elasticSearch->execute();

				foreach($resultList['documents'] as $variation)
				{
					if($lines == $filter['limit'])
					{
						$limitReached = true;
						break;
					}

					if(is_array($resultList['documents']) && count($resultList['documents']) > 0)
					{
						if($this->elasticExportStockHelper->isFilteredByStock($variation, $filter) === true)
						{
							continue;
						}

						try
						{
							$this->buildRow($variation, $settings);
						}
						catch(\Throwable $throwable)
						{
							$this->getLogger(__METHOD__)->error('ElasticExportEconda::logs.fillRowError', [
								'Error message ' => $throwable->getMessage(),
								'Error line'    => $throwable->getLine(),
								'VariationId'   => $variation['id']
							]);
						}
						$lines = $lines +1;
					}
				}
			}while ($elasticSearch->hasNext());
		}
    }

	/**
	 * @param array $variation
	 * @param KeyValue $settings
	 */
    private function buildRow($variation, $settings)
	{
		$priceList = $this->elasticExportPriceHelper->getPriceList($variation, $settings, 2, ',');

		// Get and set the price and rrp
		$rrp = $priceList['recommendedRetailPrice'] > $priceList['price'] ? $priceList['recommendedRetailPrice'] : '';

		$data = [
			'Id'                => $variation['id'],
			'Name'              => $this->elasticExportCoreHelper->getMutatedName($variation, $settings),
			'Description'       => $this->elasticExportCoreHelper->getMutatedDescription($variation, $settings),
			'ProductURL'        => $this->elasticExportCoreHelper->getMutatedUrl($variation, $settings, true, false),
			'ImageURL'          => $this->elasticExportCoreHelper->getMainImage($variation, $settings),
			'Price'             => $priceList['price'],
			'MSRP'              => $rrp,
			'New'               => $this->getVariationCondition((int)$variation['data']['item']['conditionApi']['id']),
			'Stock'             => $this->elasticExportStockHelper->getStock($variation),
			'EAN'               => $this->elasticExportCoreHelper->getBarcodeByType($variation, $settings->get('barcode')),
			'Brand'             => $this->elasticExportCoreHelper->getExternalManufacturerName((int)$variation['data']['item']['manufacturer']['id']),
			'ProductCategory'   => $this->elasticExportCoreHelper->getCategory((int)$variation['data']['defaultCategories'][0]['id'], $settings->get('lang'), $settings->get('plentyId')),
			'Grundpreis'        => $this->elasticExportPriceHelper->getBasePrice($variation, (float)$priceList['price'], $settings->get('lang'), '/', false, false, $priceList['currency']),
		];

		$this->addCSVContent(array_values($data));
	}

    /**
     * Get the condition of the variation.
     *
     * @param int $condition
     * @return string
     */
    private function getVariationCondition(int $condition): string
    {
        $variationCondition = [
			0 => '1', // plenty condition: New
			1 => '0', // plenty condition: Used but as new
			2 => '0', // plenty condition: Used but very good
			3 => '0', // plenty condition: Used but good
			4 => '0', // plenty condition: Used but acceptable
			5 => '0', // plenty condition: Factory Seconds
        ];

        return (array_key_exists($condition, $variationCondition) ? $variationCondition[$condition] : '0');
    }
}
