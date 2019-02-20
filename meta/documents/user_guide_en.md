
# ElasticExportEcondaDE plugin user guide

<div class="container-toc"></div>

## 1 Registering with Econda.de

econda offers a controlling solution for analysing and improving online stores comprehensively.

## 2 Setting up the data format EcondaDE-Plugin in plentymarkets

By installing this plugin you will receive the export format **EcondaDE-Plugin**. Use this format to exchange data between plentymarkets and econda. It is required to install the Plugin **Elastic Export** from the plentyMarketplace first before you can use the format **EcondaDE-Plugin** in plentymarkets.

Once both plugins are installed, you can create the export format **EcondaDE-Plugin**. Refer to the [Elastic Export](https://knowledge.plentymarkets.com/en/data/exporting-data/elastic-export) page of the manual for further details about the individual format settings.

Creating a new export format:

1. Go to **Data » Elastic export**.
2. Click on **New export**.
3. Carry out the settings as desired. Pay attention to the information given in table 1.
4. **Save** the settings.
→ The export format will be given an ID and it will appear in the overview within the **Exports** tab.

The following table lists details for settings, format settings and recommended item filters for the format **EcondaDE-Plugin**.

|**Setting**                                           |**Explanation** |
|:---                                                  |:--- |
|**Settings**                                          | |
|**Name**                                              |Enter a name. The export format is listed by this name in the overview within the **Exports** tab. |
|**Type**                                              |Select the data type that should be exported from the drop-down list. |
|**Format**                                            |Select **EcondaDE-Plugin**. |
|**Limit**                                             |Enter a number. If you want to transfer more than 9,999 data records, then the output file will not be generated again for another 24 hours. This is to save resources. If more than 9,999 data records are necessary, the setting **Generate cache file** has to be active. |
|**Generate cache file**                               |Place a check mark if you want to transfer more than 9,999 data records. We recommend that you do not activate this setting for more than 20 export formats. This is to ensure a high performance of the elastic export. |
|**Provisioning**                                      |Select **URL**. This option generates a token for authentication in order to allow external access. |
|**Token, URL**                                        |If you have selected the option **URL** under **Provisioning**, then click on **Generate token**. The token is entered automatically. The URL is entered automatically if the token has been generated under **Token**. |
|**File name**                                         |The file name must have the ending .csv or .txt for econda to be able to import the file successfully. |
|**Item filters**                                      | |
|**Add item filters**                                  |Select the items that you wish to export. Select an item filter from the drop-down list and click on **Add**. There are no filters set by default. It is possible to add multiple item filters from the drop-down list one after the other.<br/> **Variations** = Select the variations to be transferred. **Transfer all** = All variations are transferred. **Only transfer main variations** = Only main variations are transferred. **Do not transfer main variations** = Only the other variations of an item are transferred. Main variations are not transferred. _Tip:_ Use this option if the main variations are virtual and not for sale. **Only transfer single variations** = Only those main variations of items are transferred that only have a main variation and no other variations.<br/> **Markets** = Select one or multiple order referrers. The selected order referrer has to be active at the variation for the item to be exported.<br/> **Currency** = Select a currency.<br/> **Category** = Activate to transfer the item with its category link. Only items belonging to this category are exported.<br/> **Image** = Activate to transfer the item with its image. Only items with images are exported.<br/> **Client** = Select a client.<br/> **Stock** = Select which stock you want to export.<br/> **Flag 1-2** = Select the flag.<br/> **Manufacturer** = Select one, several, or **ALL** manufacturers.<br/> **Active** = Select active. Only active variations are exported. |
|**Format settings**                                   | |
|**Product URL**                                       |Select the URL that you wish to transfer to the interface. You can choose between the item's URL and the variation's URL. URLs of variations can only be transferred in combination with the Ceres store. |
|**Client**                                            |Select a client. This setting is used for the URL structure. |
|**URL parameter**                                     |Enter a suffix for the product URL if this is required for the export. This character string is added to the product URL if you have activated the **transfer** option for the product URL further up. |
|**Order referrer**                                    |**Mandatory field**<br/> Select the order referrer that should be assigned during the order import. |
|**Marketplace account**                               |Select the marketplace account from the drop-down list. The selected referrer is added to the product URL so that sales can be analysed later. |
|**Language**                                          |Select the language from the drop-down list. |
|**Item name**                                         |Select **Name 1**, **Name 2**, or **Name 3**. These names are saved in the **Texts** tab of the item. Enter a number into the **Maximum number of characters (def. text)** field if desired. This specifies how many characters are exported for the item name. |
|**Preview text**                                      |This option does not affect this format. |
|**Description**                                       |Select the text that you want to transfer as description.<br/> Enter a number into the **Maximum number of characters (def. text)** field if desired. This specifies how many characters are exported for the description.<br/> Activate the option **Remove HTML tags** if you want HTML tags to be removed during the export.<br/> If you only want to allow specific HTML tags to be exported, then enter these tags into the field **Permitted HTML tags, separated by comma (def. text)**. Use commas to separate multiple tags. |
|**Target country**                                    |Select the target country from the drop-down list. |
|**Barcode**                                           |Select the ASIN, ISBN or an EAN from the drop-down list. The barcode has to be linked to the order referrer selected above. If the barcode is not linked to the order referrer, it will not be exported. |
|**Image**                                             |Select **First image**. |
|**Image position of the energy label**                |This option does not affect this format. |
|**Stock buffer**                                      |The stock buffer for variations with limitation to the net stock. |
|**Stock for variations without stock limitation**     |The stock for variations without stock limitation. |  
|**Stock for variations with no stock administration** |The stock for variations without stock administration. |
|**Live currency conversion**                          |Activate this option to convert the price into the currency of the selected country of delivery. The price has to be released for the corresponding currency. |
|**Retail price**                                      |Select gross price or net price from the drop-down list. |
|**Offer price**                                       |This option does not affect this format. |
|**RRP**                                               |Activate to transfer the RRP. |
|**Shipping costs**                                    |Activate this option if you want to use the shipping costs that are saved in a configuration. If this option is activated, then you are able to select the configuration and the payment method from the drop-down lists.<br/> Activate the option **Transfer flat rate shipping charge** if you want to use a fixed shipping charge. If this option is activated, a value has to be entered in the line underneath. |
|**VAT note**                                          |This option does not affect this format. |
|**Overwrite item availability**                       |This option does not affect this format. |

_Tab. 1: Settings for the data format **EcondaDE-Plugin**_

## 3 Available columns of the export file

|**Column name** |**Explanation** |
|:---                   |:--- |
|Id                     |The ID of the variation. |
|Name                   |According to the format setting **Item name**. |
|Description            |According to the format setting **Description**. |
|ProductURL             |The URL path of the item depending on the chosen client in the format settings. |
|ImageURL               |The image's URL according to the format setting **Image**. Variation images are prioritised over item images. |
|Price                  |The sales price of the variation. |
|MSRP                   |The variation's sales price of the price type RRP. |
|New                    |The value from **Condition for API** of the variation is translated. **[0] New** is exported as **Neu** [new]. Every other option is exported as **Gebraucht** [used].|
|Stock                  |The stock of the variation based on the limitation. The maximum value is 999. |
|EAN                    |According to the format setting **Barcode**. |
|Brand                  |The **name of the manufacturer** of the item. The **external name** within **Settings » Items » Manufacturer** is preferred if existing. |
|ProductCategory        |The category path of the default category for the defined client in the format settings. |
|Grundpreis             |The base price information in the format "price / unit" (example: 10,00 EUR / kilogram). |

## 4 License

This project is licensed under the GNU AFFERO GENERAL PUBLIC LICENSE.- find further information in the [LICENSE.md](https://github.com/plentymarkets/plugin-elastic-export-shopzilla-de/blob/master/LICENSE.md).
