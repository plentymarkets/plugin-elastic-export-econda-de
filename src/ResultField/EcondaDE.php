<?php

namespace ElasticExportEcondaDE\ResultField;

use Plenty\Modules\DataExchange\Contracts\ResultFields;
use Plenty\Modules\DataExchange\Models\FormatSetting;
use Plenty\Modules\Helper\Services\ArrayHelper;
use Plenty\Modules\Item\Search\Mutators\BarcodeMutator;
use Plenty\Modules\Item\Search\Mutators\DefaultCategoryMutator;
use Plenty\Modules\Item\Search\Mutators\ImageMutator;
use Plenty\Modules\Cloud\ElasticSearch\Lib\Source\Mutator\BuiltIn\LanguageMutator;
use Plenty\Modules\Item\Search\Mutators\KeyMutator;


/**
 * Class EcondaDE
 * @package ElasticExportEcondaDE\ResultField
 */
class EcondaDE extends ResultFields
{
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
     * Creates the fields set to be retrieved from ElasticSearch.
     *
     * @param  array $formatSettings = []
     * @return array
     */
    public function generateResultFields(array $formatSettings = []):array
    {
        $settings = $this->arrayHelper->buildMapFromObjectList($formatSettings, 'key', 'value');

        $reference = $settings->get('referrerId') ? $settings->get('referrerId') : -1;

        $itemDescriptionFields = ['texts.urlPath'];
        $itemDescriptionFields[] = ($settings->get('nameId')) ? 'texts.name' . $settings->get('nameId') : 'texts.name1';

        if($settings->get('descriptionType') == 'itemShortDescription'
            || $settings->get('previewTextType') == 'itemShortDescription')
        {
            $itemDescriptionFields[] = 'texts.shortDescription';
        }

        if($settings->get('descriptionType') == 'itemDescription'
            || $settings->get('descriptionType') == 'itemDescriptionAndTechnicalData'
            || $settings->get('previewTextType') == 'itemDescription'
            || $settings->get('previewTextType') == 'itemDescriptionAndTechnicalData')
        {
            $itemDescriptionFields[] = 'texts.description';
        }

        if($settings->get('descriptionType') == 'technicalData'
            || $settings->get('descriptionType') == 'itemDescriptionAndTechnicalData'
            || $settings->get('previewTextType') == 'technicalData'
            || $settings->get('previewTextType') == 'itemDescriptionAndTechnicalData')
        {
            $itemDescriptionFields[] = 'texts.technicalData';
        }

        $itemDescriptionFields[] = 'texts.lang';

        //Mutator

		/**
		 * @var BarcodeMutator $barcodeMutator
		 */
		$barcodeMutator = pluginApp(BarcodeMutator::class);
		if($barcodeMutator instanceof BarcodeMutator)
		{
			$barcodeMutator->addMarket($reference);
		}

        /**
         * @var ImageMutator $imageMutator
         */
        $imageMutator = pluginApp(ImageMutator::class);
        if($imageMutator instanceof ImageMutator)
        {
            $imageMutator->addMarket($reference);
        }

		/**
		 * @var KeyMutator
		 */
		$keyMutator = pluginApp(KeyMutator::class);

		if($keyMutator instanceof KeyMutator)
		{
			$keyMutator->setKeyList($this->getKeyList());
			$keyMutator->setNestedKeyList($this->getNestedKeyList());
		}

		/**
		 * @var DefaultCategoryMutator $defaultCategoryMutator
		 */
		$defaultCategoryMutator = pluginApp(DefaultCategoryMutator::class);

		if($defaultCategoryMutator instanceof DefaultCategoryMutator)
		{
			$defaultCategoryMutator->setPlentyId($settings->get('plentyId'));
		}

        /**
         * @var LanguageMutator $languageMutator
         */
        $languageMutator = pluginApp(LanguageMutator::class, [[$settings->get('lang')]]);

        //Fields
        $fields = [
            [
                //item
                'item.id',
                'item.manufacturer.id',
                'item.conditionApi.id',

                //variation
                'id',

                //images
                'images.all.urlMiddle',
                'images.all.urlPreview',
                'images.all.urlSecondPreview',
                'images.all.url',
                'images.all.path',
                'images.all.position',

                'images.item.urlMiddle',
                'images.item.urlPreview',
                'images.item.urlSecondPreview',
                'images.item.url',
                'images.item.path',
                'images.item.position',

                'images.variation.urlMiddle',
                'images.variation.urlPreview',
                'images.variation.urlSecondPreview',
                'images.variation.url',
                'images.variation.path',
                'images.variation.position',

                //unit
                'unit.content',
                'unit.id',

                //defaultCategories
                'defaultCategories.id',

                //barcodes
                'barcodes.code',
                'barcodes.type',
            ],

            [
                $languageMutator,
				$defaultCategoryMutator,
				$barcodeMutator,
				$keyMutator
            ],
        ];

        // Get the associated images if reference is selected
        if($reference != -1)
        {
            $fields[1][] = $imageMutator;
        }

        foreach($itemDescriptionFields as $itemDescriptionField)
        {
            //texts
            $fields[0][] = $itemDescriptionField;
        }

        return $fields;
    }

	/**
	 * @return array
	 */
	private function getKeyList()
	{
		return [
			// Item
			'item.id',
			'item.manufacturer.id',
			'item.conditionApi',

			// Unit
			'unit.content',
			'unit.id',
		];
	}

	/**
	 * @return array
	 */
	private function getNestedKeyList()
	{
		return [
			'keys' => [
				// Barcodes
				'barcodes',

				// Default categories
				'defaultCategories',

				// Images
				'images.all',
				'images.item',
				'images.variation',
			],

			'nestedKeys' => [
				// Barcodes
				'barcodes' => [
					'code',
					'type'
				],

				// Default categories
				'defaultCategories' => [
					'id'
				],

				// Images
				'images.all' => [
					'urlMiddle',
					'urlPreview',
					'urlSecondPreview',
					'url',
					'path',
					'position',
				],
				'images.item' => [
					'urlMiddle',
					'urlPreview',
					'urlSecondPreview',
					'url',
					'path',
					'position',
				],
				'images.variation' => [
					'urlMiddle',
					'urlPreview',
					'urlSecondPreview',
					'url',
					'path',
					'position',
				],

				// texts
				'texts' => [
					'urlPath',
					'name1',
					'name2',
					'name3',
					'shortDescription',
					'description',
					'technicalData',
				],
			]
		];
	}
}
