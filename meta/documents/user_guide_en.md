
# ElasticExportEcondaDE plugin user guide

<div class="container-toc"></div>

## 1 Registering with Econda.de

Econda offers a controlling solution for analysing and improving online stores comprehensively.

## 2 Setting up the data format EcondaDE-Plugin in plentymarkets

The plugin Elastic Export is required to use this format.

Refer to the [Exporting data formats for price search engines](https://knowledge.plentymarkets.com/en/basics/data-exchange/exporting-data#30) page of the manual for further details about the individual format settings.

The following table lists details for settings, format settings and recommended item filters for the format **EcondaDE-Plugin**.
<table>
    <tr>
        <th>
            Settings
        </th>
        <th>
            Explanation
        </th>
    </tr>
    <tr>
        <td class="th" colspan="2">
            Settings
        </td>
    </tr>
    <tr>
        <td>
            Format
        </td>
        <td>
            Choose <b>EcondaDE-Plugin</b>.
        </td>        
    </tr>
    <tr>
        <td>
            Provisioning
        </td>
        <td>
            Choose <b>URL</b>.
        </td>        
    </tr>
    <tr>
        <td>
            File name
        </td>
        <td>
            The file name must have the ending <b>.csv</b> or <b>.txt</b> for Shopzilla.de to be able to import the file successfully.
        </td>        
    </tr>
    <tr>
        <td class="th" colspan="2">
            Item filter
        </td>
    </tr>
    <tr>
        <td>
            Active
        </td>
        <td>
            Choose <b>active</b>.
        </td>        
    </tr>
    <tr>
        <td>
            Markets
        </td>
        <td>
            Choose one or multiple order referrer. The chosen order referrer has to be active at the variation for the item to be exported.
        </td>        
    </tr>
    <tr>
        <td class="th" colspan="2">
            Format settings
        </td>
    </tr>
    <tr>
        <td>
            Order referrer
        </td>
        <td>
            Choose the order referrer that should be assigned during the order import.
        </td>        
    </tr>
    <tr>
        <td>
            Preview text
        </td>
        <td>
            This option does not affect this format.
        </td>        
    </tr>
    <tr>
        <td>
            Image
        </td>
        <td>
            Choose <b>First image</b>.
        </td>        
    </tr>
    <tr>
    	<td>
    		Stockbuffer
    	</td>
    	<td>
    		The stock buffer for variations with the limitation to the netto stock.
    	</td>        
    </tr>
    <tr>
    	<td>
    		Stock for Variations without stock limitation
    	</td>
    	<td>
    		The stock for variations without stock limitation.
    	</td>        
    </tr>
    <tr>
    	<td>
    		The stock for variations with not stock administration
    	</td>
    	<td>
    		The stock for variations without stock administration.
    	</td>        
    </tr>
    <tr>
        <td>
            Offer price
        </td>
        <td>
            This option is not relevant for this format.
        </td>        
    </tr>
    <tr>
        <td>
            VAT note
        </td>
        <td>
            This option is not relevant for this format.
        </td>        
    </tr>
    <tr>
        <td>
            Override item availabilty
        </td>
        <td>
            This option is not relevant for this format.
        </td>        
    </tr>
</table>


## 3 Overview of available columns

<table>
    <tr>
        <th>
            Column name
        </th>
        <th>
            Explanation
        </th>
    </tr>
    <tr>
        <td>
            Id
        </td>
        <td>
            The <b>ID</b> of the variation.
        </td>        
    </tr>
    <tr>
        <td>
            Name
        </td>
        <td>
            <b>Content:</b> According to the format setting <b>item name</b>.
        </td>        
    </tr>
    <tr>
        <td>
            Description
        </td>
        <td>
            <b>Content:</b> According to the format setting <b>Description</b>.
        </td>        
    </tr>
     <tr>
		<td>
			ProductURL
		</td>
		<td>
			<b>Content:</b> The <b>URL path</b> of the item depending on the chosen <b>client</b> in the format settings.
		</td>        
	</tr>
	<tr>
		<td>
			ImageURL
		</td>
		<td>
			<b>Content:</b> URL of the image according to the format setting <b>image</b>. Variation images are prioritizied over item images.
		</td>        
	</tr>
	<tr>
		<td>
			Price
		</td>
		<td>
			<b>Content:</b> The <b>sales price</b> of the variation.
		</td>        
	</tr>
	<tr>
		<td>
			MSRP
		</td>
		<td>
			<b>Content:</b> <b>Content:</b> The <b>sales price</b> of the price type <b>RRP</b> of the variation.
		</td>        
	</tr>
	<tr>
		<td>
			New
		</td>
		<td>
			<b>Content:</b> The value from <b>Condition for API</b> of the variation will be translated. <b>[0]New</b> will be exported as <b>Neu</b>. Every other option will be exported as **Gebraucht**.
		</td>        
	</tr>
	<tr>
		<td>
			Stock
		</td>
		<td>
			<b>Content:</b> The <b>Stock</b> of the variation based on the <b>Limitation</b>. The maximum value is 999.
		</td>        
	</tr>
	 <tr>
		<td>
			EAN
		</td>
		<td>
			<b>Content:</b> According to the format setting <b>Barcode</b>.
		</td>        
	</tr>
	<tr>
		<td>
			Brand
		</td>
		<td>
			<b>Content:</b> The <b>name of the manufacturer</b> of the item. The <b>external name</b> within <b>Settings » Items » Manufacturer</b> will be preferred if existing.
		</td>        
	</tr>
	<tr>
		<td>
			ProductCategory
		</td>
		<td>
			<b>Content:</b> The <b>category path of the default cateogory</b> for the defined client in the format settings.
		</td>        
	</tr>
	<tr>
		<td>
			Grundpreis
		</td>
		<td>
			<b>Content:</b> The <b>base price information</b> in the format "price / unit". (Example: 10,00 EUR / kilogram)
		</td>        
	</tr>
</table>

## 4 License

This project is licensed under the GNU AFFERO GENERAL PUBLIC LICENSE.- find further information in the [LICENSE.md](https://github.com/plentymarkets/plugin-elastic-export-shopzilla-de/blob/master/LICENSE.md).
