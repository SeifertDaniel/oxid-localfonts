[{*
  *   *********************************************************************************************
  *      Please retain this copyright header in all versions of the software.
  *      Bitte belassen Sie diesen Copyright-Header in allen Versionen der Software.
  *
  *      Copyright (C) Josef A. Puckl | eComStyle.de
  *      All rights reserved - Alle Rechte vorbehalten
  *
  *      This commercial product must be properly licensed before being used!
  *      Please contact info@ecomstyle.de for more information.
  *
  *      Dieses kommerzielle Produkt muss vor der Verwendung ordnungsgemäß lizenziert werden!
  *      Bitte kontaktieren Sie info@ecomstyle.de für weitere Informationen.
  *   *********************************************************************************************
  *}]

[{if !isset($oConfig)}]
    [{assign var="oConfig" value=$oViewConf->getConfig()}]
[{/if}]
[{if $oConfig->getConfigParam('ecslocalfontsaktivate')}]
    [{assign var="moduleurl" value=$oViewConf->getModuleUrl('ecs_localfonts')}]
    <style>
        @font-face{font-family:'Raleway';font-style:normal;font-weight:400;src:url('[{$moduleurl}]fonts/raleway-v28-latin-regular.eot');src:local(''),url('[{$moduleurl}]fonts/raleway-v28-latin-regular.eot?#iefix') format('embedded-opentype'),url('[{$moduleurl}]fonts/raleway-v28-latin-regular.woff2') format('woff2'),url('[{$moduleurl}]fonts/raleway-v28-latin-regular.woff') format('woff'),url('[{$moduleurl}]fonts/raleway-v28-latin-regular.ttf') format('truetype'),url('[{$moduleurl}]fonts/raleway-v28-latin-regular.svg#Raleway') format('svg')}
    </style>
[{/if}]