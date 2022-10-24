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

$sMetadataVersion = '2.0';
$aModule = [
    'id'            => 'ecs_localfonts',
    'title'         => '<strong style="color:#04B431;">e</strong><strong>ComStyle.de</strong>:  <i>LocalFonts</i>',
    'description'   => 'Google Fonts lokal einbinden',
    'thumbnail'     => 'ecs.png',
    'version'       => '1.0.2',
    'author'        => '<strong style="font-size: 17px;color:#04B431;">e</strong><strong style="font-size: 16px;">ComStyle.de</strong>',
    'email'         => 'info@ecomstyle.de',
    'url'           => 'https://ecomstyle.de',
    'extend'        => [
    ],
    'blocks' => [
        ['template' => 'layout/base.tpl', 'block' => 'base_fonts', 'file' => '/views/blocks/base_fonts.tpl'],
    ],
    'settings' => [
        ['group' => 'ecs_main', 'name' => 'ecslocalfontsaktivate', 'type' => 'bool', 'value' => false],
    ],
    'events' => [
        'onActivate'    => '\Ecs\LocalFonts\Core\Events::onActivate',
        'onDeactivate'  => '\Ecs\LocalFonts\Core\Events::onDeactivate',
    ],
];
