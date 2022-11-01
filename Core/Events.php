<?php
/*
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
 */

namespace Ecs\LocalFonts\Core;

use OxidEsales\Eshop\Core\Registry;
use OxidEsales\Eshop\Core\DatabaseProvider;

class Events
{
    protected static function _moduleID()
    {
        return 'ecs_localfonts';
    }

    protected static function editOffline()
    {
        $oConfig = Registry::getConfig();
        $filepath = $oConfig->getConfigParam('sShopDir') . 'offline.html';
        $search = '<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400" rel="stylesheet" type="text/css">';
        $replace = '';

        try {
            $offlinetext = file_get_contents($filepath);
            $offlinetext = str_replace($search, $replace, $offlinetext);
            if (file_exists($filepath) && file_put_contents($filepath, $offlinetext)) {
                echo $filepath . ' edited.<br>';
            }
        } catch (\Exception $oException) {
        }
    }

    protected static function editCss()
    {
        $oConfig = Registry::getConfig();
        $moduleurl = $oConfig->getShopUrl() . 'modules/ecs/LocalFonts/';
        $srcdir = $oConfig->getResourcePath();
        $cssfile = $srcdir . 'css/styles.min.css';
        $localfonts = "@font-face{font-family:'Raleway';font-style:normal;font-weight:400;src:url('modules/ecs/LocalFonts/fonts/raleway-v28-latin-regular.eot');src:local(''),url('modules/ecs/LocalFonts/fonts/raleway-v28-latin-regular.eot?#iefix') format('embedded-opentype'),url('modules/ecs/LocalFonts/fonts/raleway-v28-latin-regular.woff2') format('woff2'),url('modules/ecs/LocalFonts/fonts/raleway-v28-latin-regular.woff') format('woff'),url('modules/ecs/LocalFonts/fonts/raleway-v28-latin-regular.ttf') format('truetype'),url('modules/ecs/LocalFonts/fonts/raleway-v28-latin-regular.svg#Raleway') format('svg')}";
        $search = [
            '@import url(https://fonts.googleapis.com/css?family=Raleway:200,400,600,700);', 
            "@import url('https://fonts.googleapis.com/css?family=Raleway:200,400,600,700');", 
            '@import url("https://fonts.googleapis.com/css?family=Raleway:200,400,600,700");', 
            $localfonts
        ];
        $replace = $localfonts;

        try {
            $styletext = file_get_contents($cssfile);
            $styletext = str_replace($search, $replace, $styletext);
            if (file_exists($cssfile) && file_put_contents($cssfile, $styletext)) {
                echo $cssfile . ' edited.<br>';
            }
        } catch (\Exception $oException) {
        }
    }

    public static function dropSql()
    {
        $aSql[] = 'DELETE FROM oxtplblocks WHERE OXMODULE= ' . \OxidEsales\Eshop\Core\DatabaseProvider::getDb()->quote(self::_moduleID()) . ';';
        foreach ($aSql as $sSql) {
            try {
                DatabaseProvider::getDb()->execute($sSql);
            } catch (\Exception $oException) {
            }
        }
        return true;
    }

    public static function clearTmp($sClearFolderPath = '')
    {
        $sFolderPath = self::_getFolderToClear($sClearFolderPath);
        $hDirHandler = opendir($sFolderPath);
        if (!empty($hDirHandler)) {
            while (false !== ($sFileName = readdir($hDirHandler))) {
                $sFilePath = $sFolderPath . DIRECTORY_SEPARATOR . $sFileName;
                self::_clear($sFileName, $sFilePath);
            }
            closedir($hDirHandler);
        }
        return true;
    }

    protected static function _getFolderToClear($sClearFolderPath = '')
    {
        $sTempFolderPath = (string) Registry::getConfig()->getConfigParam('sCompileDir');
        if (!empty($sClearFolderPath) and (strpos($sClearFolderPath, $sTempFolderPath) !== false)) {
            $sFolderPath = $sClearFolderPath;
        } else {
            $sFolderPath = $sTempFolderPath;
        }
        return $sFolderPath;
    }

    protected static function _clear($sFileName, $sFilePath)
    {
        if (!in_array($sFileName, ['.', '..', '.gitkeep', '.htaccess'])) {
            if (is_file($sFilePath)) {
                @unlink($sFilePath);
            } else {
                self::clearTmp($sFilePath);
            }
        }
    }

    public static function onActivate()
    {
        self::editcss();
        self::editOffline();
        self::clearTmp();
    }

    public static function onDeactivate()
    {
        self::dropSql();
        self::clearTmp();
    }
}
