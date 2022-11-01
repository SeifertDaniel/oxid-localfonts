## eComStyle.de LocalFonts

## Shopversionen

OXID eShop 6.1 - 6.4 (nur GPL - Versionen!)

### Features

Bei Modulaktivierung werden folgende Aktionen durchgeführt:

-   Import der Google Font Raleway von fonts.googleapis.com entfernen.
-   Google Font Raleway lokal einbinden.
-   Google Font aus der Datei offline.html entfernen.

### Installation

```
composer config extra.enable-patching true

composer config --json extra.patches.oxid-esales/oxideshop-ce '{"remove fonts.googleapis.com link from offline page" : "https://raw.githubusercontent.com/SeifertDaniel/oxid-localfonts/patches/offlinepage.patch"}'

composer config --json extra.patches.oxid-esales/wave-theme '{"remove fonts.googleapis.com link from stylesheets" : "https://raw.githubusercontent.com/SeifertDaniel/oxid-localfonts/patches/wave-css.patch"}'

composer require ecs/localfonts
```

### License

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program. If not, see <http://www.gnu.org/licenses/>.
