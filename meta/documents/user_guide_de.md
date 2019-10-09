
# User Guide für das ElasticExportEcondaDE Plugin

<div class="container-toc"></div>

## 1 Bei Econda.de registrieren

econda bietet eine Controlling-Lösung zur umfassenden Analyse und Optimierung von Webshops.

## 2 Das Format EcondaDE-Plugin in plentymarkets einrichten

Mit der Installation dieses Plugins erhältst du das Exportformat **EcondaDE-Plugin**, mit dem du Daten über den elastischen Export zu econda überträgst. Um dieses Format für den elastischen Export nutzen zu können, installiere zunächst das Plugin **Elastic Export** aus dem plentyMarketplace, wenn noch nicht geschehen. 

Sobald beide Plugins in deinem System installiert sind, kann das Exportformat **EcondaDE-Plugin** erstellt werden. Weitere Informationen findest du auf der Handbuchseite [Elastischer Export](https://knowledge.plentymarkets.com/daten/daten-exportieren/elastischer-export).

Neues Exportformat erstellen:

1. Öffne das Menü **Daten » Elastischer Export**.
2. Klicke auf **Neuer Export**.
3. Nimm die Einstellungen vor. Beachte dazu die Erläuterungen in Tabelle 1.
4. **Speichere** die Einstellungen.<br/>
→ Eine ID für das Exportformat **EcondaDE-Plugin** wird vergeben und das Exportformat erscheint in der Übersicht **Exporte**.

In der folgenden Tabelle findest du Hinweise zu den einzelnen Formateinstellungen und empfohlenen Artikelfiltern für das Format **EcondaDE-Plugin**.

|**Einstellung**                                     |**Erläuterung** |
|:---                                                |:--- |
|**Einstellungen**                                   | |
|**Name**                                            |Name eingeben. Unter diesem Name erscheint das Exportformat in der Übersicht im Tab **Exporte**. |
|**Typ**                                             |Typ der Daten aus der Dropdown-Liste wählen, die exportiert werden sollen. |
|**Format**                                          |**EcondaDE-Plugin** wählen. |
|**Limit**                                           |Zahl eingeben. Wenn mehr als 9999 Datensätze übertragen werden sollen, wird die Ausgabedatei für 24 Stunden nicht noch einmal neu generiert, um Ressourcen zu sparen. Wenn mehr als 9999 Datensätze benötigt werden, muss die Option **Cache-Datei generieren** aktiv sein. |
|**Cache-Datei generieren**                          |Häkchen setzen, wenn mehr als 9999 Datensätze übertragen werden sollen. Um eine optimale Performance des elastischen Exports zu gewährleisten, darf diese Option bei maximal 20 Exportformaten aktiv sein. |
|**Bereitstellung**                                  |**URL** wählen. Mit dieser Option kann ein Token für die Authentifizierung generiert werden, damit ein externer Zugriff möglich ist. |
|**Token, URL**                                      |Wenn unter **Bereitstellung** die Option **URL** gewählt wurde, auf **Token generieren** klicken. Der Token wird dann automatisch eingetragen. Die URL wird automatisch eingetragen, wenn unter **Token** der Token generiert wurde. |
|**Dateiname**                                       |Der Dateiname muss auf .csv oder .txt enden, damit econda die Datei erfolgreich importieren kann. |
|**Artikelfilter**                                   | |
|**Artikelfilter hinzufügen**                        |Wählen, welche Artikel beim Export übertragen werden sollen. Dazu Artikelfilter aus der Dropdown-Liste wählen und auf **Hinzufügen** klicken. Standardmäßig sind keine Filter voreingestellt. Es ist möglich, alle Artikelfilter aus der Dropdown-Liste nacheinander hinzuzufügen.<br/> **Varianten** = Wählen, welche Varianten übertragen werden sollen. **Alle übertragen** = Alle Varianten werden übertragen. **Nur Hauptvarianten übertragen** = Nur Hauptvarianten werden übertragen. **Keine Hauptvarianten übertragen** = Nur die Varianten eines Artikels werden übertragen. Hauptvarianten werden nicht übertragen. _Tipp:_ Verwenden, wenn due Hauptvarianten nur virtuell und keine verkaufbaren Produkte sind. **Nur Einzelvarianten übertragen** = Nur die Hauptvarianten von Artikeln werden übertragen, die nur eine Hauptvariante und keine Varianten haben.<br/> **Märkte** = Eine oder mehrere Auftragsherkünfte wählen. Die gewählten Auftragsherkünfte müssen an der Variante aktiviert sein, damit der Artikel exportiert wird.<br/> **Währung** = Währung wählen.<br/> **Kategorie** = Aktivieren, damit der Artikel mit Kategorieverknüpfung übertragen wird. Es werden nur Artikel, die dieser Kategorie angehören, übertragen.<br/> **Bild** = Aktivieren, damit der Artikel mit Bild übertragen wird. Es werden nur Artikel mit Bildern übertragen.<br/> **Mandant** = Mandant wählen.<br/> **Bestand** = Wählen, welche Bestände exportiert werden sollen.<br/> **Markierung 1-2** = Markierung wählen.<br/> **Hersteller** = Einen, mehrere oder **ALLE** Hersteller wählen.<br/> **Aktiv** = **Aktiv** wählen. Nur aktive Varianten werden übertragen. |
|**Formateinstellungen**                             | |
|**Produkt-URL**                                     |Wählen, ob die URL des Artikels oder der Variante übertragen wird. Varianten-URLs können nur in Kombination mit dem Ceres Webshop übertragen werden. |
|**Mandant**                                         |Mandanten wählen. Diese Einstellung wird für den URL-Aufbau verwendet. |
|**URL-Parameter**                                   |Suffix für die Produkt-URL eingeben, wenn ein Suffix für den Export erforderlich ist. Die Produkt-URL wird dann um die eingegebene Zeichenkette erweitert, wenn weiter oben die Option **übertragen** für die Produkt-URL aktiviert wurde. |
|**Auftragsherkunft**                                |Die Auftragsherkunft wählen, die beim Auftragsimport zugeordnet werden soll. Die Produkt-URL wird um die gewählte Auftragsherkunft erweitert, damit die Verkäufe später analysiert werden können. |
|**Marktplatzkonto**                                 |Marktplatzkonto aus der Dropdown-Liste wählen. |
|**Sprache**                                         |Sprache aus der Dropdown-Liste wählen. |
|**Artikelname**                                     |**Name 1**, **Name 2** oder **Name 3** wählen. Die Namen sind im Tab **Texte** eines Artikels gespeichert. Im Feld **Maximale Zeichenlänge (def. Text)** optional eine Zahl eingeben, wenn die Schnittstelle eine Begrenzung der Länge des Artikelnamen beim Export vorgibt. |
|**Vorschautext**                                    |Diese Option ist für dieses Format nicht relevant. |
|**Beschreibung**                                    |Wählen, welcher Text als Beschreibungstext übertragen werden soll.<br/> Im Feld **Maximale Zeichenlänge (def. Text)** optional eine Zahl eingeben, wenn eine Begrenzung der Länge der Beschreibung beim Export vorgegeben ist.<br/> Option **HTML-Tags entfernen** aktivieren, damit die HTML-Tags beim Export entfernt werden.<br/> Im Feld **Erlaubte HTML-Tags, kommagetrennt (def. Text)** optional die HTML-Tags eingeben, die beim Export erlaubt sind. Wenn mehrere Tags eingegeben werden, mit Komma trennen. |
|**Zielland**                                        |Zielland aus der Dropdown-Liste wählen. |
|**Barcode**                                         |ASIN, ISBN oder eine EAN aus der Dropdown-Liste wählen. Der gewählte Barcode muss mit der oben gewählten Auftragsherkunft verknüpft sein. Anderfalls wird der Barcode nicht exportiert. |
|**Bild**                                            |**Erstes Bild** wählen. |
|**Bildposition des Energieetiketts**                |Diese Option ist für dieses Format nicht relevant. |
|**Bestandspuffer**                                  |Der Bestandspuffer für Varianten mit Beschränkung auf den Netto-Warenbestand. |
|**Bestand für Varianten ohne Bestandsbeschränkung** |Der Bestand für Varianten ohne Bestandsbeschränkung. |  
|**Bestand für Varianten ohne Bestandsführung**      |Der Bestand für Varianten ohne Bestandsführung. |
|**Währung live umrechnen**                          |Aktivieren, damit der Preis je nach eingestelltem Lieferland in die Währung des Lieferlandes umgerechnet wird. Der Preis muss für die entsprechende Währung freigegeben sein. |
|**Verkaufspreis**                                   |Brutto- oder Nettopreis aus der Dropdown-Liste wählen. |
|**Angebotspreis**                                   |Diese Option ist für dieses Format nicht relevant. |
|**UVP**                                             |Aktivieren, um den UVP zu übertragen. |
|**Versandkosten**                                   |Aktivieren, damit die Versandkosten aus der Konfiguration übernommen werden. Wenn die Option aktiviert ist, stehen in den beiden Dropdown-Listen Optionen für die Konfiguration und die Zahlungsart zur Verfügung.<br/> Option **Pauschale Versandkosten übertragen** aktivieren, damit die pauschalen Versandkosten übertragen werden. Wenn diese Option aktiviert ist, muss im Feld darunter ein Betrag eingegeben werden. |
|**MwSt.-Hinweis**                                   |Diese Option ist für dieses Format nicht relevant. |
|**Artikelverfügbarkeit überschreiben**              |Diese Option ist für dieses Format nicht relevant. |

_Tab. 1: Einstellungen für das Datenformat **EcondaDE-Plugin**_

## 3 Verfügbare Spalten der Exportdatei

|**Spaltenbezeichnung** |**Erläuterung** |
|:---                   |:--- |
|Id                     |Die ID der Variante. |
|Name                   |Entsprechend der Formateinstellung **Artikelname**. |
|Description            |Entsprechend der Formateinstellung **Beschreibung**. |
|ProductURL             |Der URL-Pfad des Artikels abhängig vom gewählten Mandanten in den Formateinstellungen. |
|ImageURL               |URL zu dem Bild gemäß der Formateinstellung **Bild**. Variantenbilder werden vor Artikelbildern priorisiert. |
|Price                  |Der Verkaufspreis der Variante. |
|MSRP                   |Der Verkaufspreis der Variante vom Preistyp UVP. |
|New                    |Der Zustand API der Variante. **[0] Neu** wird als **Neu** übertragen. Alle anderen Einstellungen werden als **Gebraucht** übertragen. |
|Stock                  |Der Bestand anhand der eingestellten Bestandsbeschränkung. Der Maximalwert beträgt 999. |
|EAN                    |Entsprechend der Formateinstellung **Barcode**. |
|Brand                  |Der Name des Herstellers des Artikels. Der **Externe Name** unter **Einrichtung » Artikel » Hersteller** wird bevorzugt, wenn vorhanden. |
|ProductCategory        |Der Kategoriepfad der Standard-Kategorie für den in den Formateinstellungen definierten Mandanten. |
|Grundpreis             |Die Grundpreisinformation im Format "Preis/Einheit" (Beispiel: 10,00 EUR / Kilogramm). |

## 4 Lizenz

Das gesamte Projekt unterliegt der GNU AFFERO GENERAL PUBLIC LICENSE – weitere Informationen findest du in der [LICENSE.md](https://github.com/plentymarkets/plugin-elastic-export-econda-de/blob/master/LICENSE.md).
