
# User Guide für das ElasticExportEcondaDE Plugin

<div class="container-toc"></div>

## 1 Bei Econda.de registrieren

Econda bietet eine Controlling-Lösung zur umfassenden Analyse und Optimierung von Webshops.

## 2 Das Format EcondaDE-Plugin in plentymarkets einrichten

Um dieses Format nutzen zu können, benötigen Sie das Plugin Elastic Export.

Auf der Handbuchseite [Daten exportieren](https://www.plentymarkets.eu/handbuch/datenaustausch/daten-exportieren/#4) werden die einzelnen Formateinstellungen beschrieben.

In der folgenden Tabelle finden Sie spezifische Hinweise zu den Einstellungen, Formateinstellungen und empfohlenen Artikelfiltern für das Format **EcondaDE-Plugin**.
<table>
    <tr>
        <th>
            Einstellung
        </th>
        <th>
            Erläuterung
        </th>
    </tr>
    <tr>
        <td class="th" colspan="2">
            Einstellungen
        </td>
    </tr>
    <tr>
        <td>
            Format
        </td>
        <td>
            <b>EcondaDE-Plugin</b> wählen.
        </td>        
    </tr>
    <tr>
        <td>
            Bereitstellung
        </td>
        <td>
            <b>URL</b> wählen.
        </td>        
    </tr>
    <tr>
        <td>
            Dateiname
        </td>
        <td>
            Der Dateiname muss auf <b>.csv</b> oder <b>.txt</b> enden, damit Shopzilla.de die Datei erfolgreich importieren kann.
        </td>        
    </tr>
    <tr>
        <td class="th" colspan="2">
            Artikelfilter
        </td>
    </tr>
    <tr>
        <td>
            Aktiv
        </td>
        <td>
            <b>Aktiv</b> wählen.
        </td>        
    </tr>
    <tr>
        <td>
            Märkte
        </td>
        <td>
            Eine oder mehrere Auftragsherkünfte wählen. Die gewählten Auftragsherkünfte müssen an der Variante aktiviert sein, damit der Artikel exportiert wird.
        </td>        
    </tr>
    <tr>
        <td class="th" colspan="2">
            Formateinstellungen
        </td>
    </tr>
    <tr>
        <td>
            Auftragsherkunft
        </td>
        <td>
            Die Auftragsherkunft wählen, die beim Auftragsimport zugeordnet werden soll.
        </td>        
    </tr>
    <tr>
        <td>
            Vorschautext
        </td>
        <td>
            Diese Option ist für dieses Format nicht relevant.
        </td>        
    </tr>
    <tr>
        <td>
            Bild
        </td>
        <td>
            <b>Erstes Bild</b> wählen.
        </td>        
    </tr>
    <tr>
        <td>
            Angebotspreis
        </td>
        <td>
            Diese Option ist für dieses Format nicht relevant.
        </td>        
    </tr>
    <tr>
        <td>
            MwSt.-Hinweis
        </td>
        <td>
            Diese Option ist für dieses Format nicht relevant.
        </td>        
    </tr>
    <tr>
        <td>
            Artikelverfügbarkeit überschreiben
        </td>
        <td>
            Diese Option ist für dieses Format nicht relevant.
        </td>        
    </tr>
</table>


## 3 Übersicht der verfügbaren Spalten

<table>
    <tr>
        <th>
            Spaltenbezeichnung
        </th>
        <th>
            Erläuterung
        </th>
    </tr>
    <tr>
        <td>
            Id
        </td>
        <td>
            <b>Inhalt:</b> Die <b>ID</b> der Variante.
        </td>        
    </tr>
    <tr>
        <td>
            Name
        </td>
        <td>
            <b>Inhalt:</b> Entsprechend der Formateinstellung <b>Artikelname</b>.
        </td>        
    </tr>
    <tr>
        <td>
            Description
        </td>
        <td>
            <b>Inhalt:</b> Entsprechend der Formateinstellung <b>Beschreibung</b>.
        </td>        
    </tr>
    <tr>
		<td>
			ProductURL
		</td>
		<td>
			<b>Inhalt:</b> Der <b>URL-Pfad</b> des Artikels abhängig vom gewählten <b>Mandanten</b> in den Formateinstellungen.
		</td>        
	</tr>
    <tr>
        <td>
            ImageURL
        </td>
        <td>
            <b>Inhalt:</b> URL zu dem Bild gemäß der Formateinstellungen <b>Bild</b>. Variantenbilder werden vor Artikelbildern priorisiert.
        </td>        
    </tr>
    <tr>
		<td>
			Price
		</td>
		<td>
			<b>Inhalt:</b> Der <b>Verkaufspreis</b> der Variante.
		</td>        
	</tr>
    <tr>
		<td>
			MSRP
		</td>
		<td>
			<b>Inhalt:</b> Der <b>Verkaufspreis</b> vom Preis-Typ <b>UVP</b> der Variante.
		</td>        
	</tr>
    <tr>
        <td>
            New
        </td>
        <td>
            <b>Inhalt:</b> Der <b>Zustand API</b> der Variante. <b>[0]Neu</b> wird als <b>Neu</b> übertragen. Alle anderen Einstellungen werden als **Gebraucht** übertragen.
        </td>        
    </tr>
    <tr>
        <td>
            Stock
        </td>
        <td>
            <b>Inhalt:</b> Der <b>Bestand</b> anhand der eingestellten <b>Bestandsbeschränkung</b>. Der Maximalwert beträgt 999.
        </td>        
    </tr>
     <tr>
		<td>
			EAN
		</td>
		<td>
			<b>Inhalt:</b> Entsprechend der Formateinstellung <b>Barcode</b>.
		</td>        
	</tr>
    <tr>
        <td>
            Brand
        </td>
        <td>
            <b>Inhalt:</b> Der <b>Name des Herstellers</b> des Artikels. Der <b>Externe Name</b> unter <b>Einstellungen » Artikel » Hersteller</b> wird bevorzugt, wenn vorhanden.
        </td>        
    </tr>
    <tr>
		<td>
			ProductCategory
		</td>
		<td>
			<b>Inhalt:</b> Der <b>Kategoriepfad der Standard-Kategorie</b> für den in den Formateinstellungen definierten <b>Mandanten</b>.
		</td>        
	</tr>
    <tr>
        <td>
            Grundpreis
        </td>
        <td>
            <b>Inhalt:</b> Die <b>Grundpreisinformation</b> im Format "Preis / Einheit". (Beispiel: 10,00 EUR / Kilogramm)
        </td>        
    </tr>
</table>

## 4 Lizenz

Das gesamte Projekt unterliegt der GNU AFFERO GENERAL PUBLIC LICENSE – weitere Informationen finden Sie in der [LICENSE.md](https://github.com/plentymarkets/plugin-elastic-export-econda-de/blob/master/LICENSE.md).
