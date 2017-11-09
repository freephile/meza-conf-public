<?php

/**
 * This file is this wiki's basic setup location. It determines wiki-specific
 * settings. This file is used by the main LocalSettings.php file which is
 * common to all wikis. It is located at:
 *
 *     /opt/htdocs/mediawiki/LocalSettings.php
 *
 * This file is included near the beginning of that file, and thus can only be
 * used for initial setup and cannot override any settings therein.
 **/

/**
 * Name of your wiki. This will also be used to generate $wgMetaNamespace. See
 *  - https://www.mediawiki.org/wiki/Manual:$wgSitename
 *  - https://www.mediawiki.org/wiki/Manual:$wgMetaNamespace
 **/
$wgMetaNamespace = 'QualityBox_Demo';
$wgSitename = 'Demo Wiki';
/**
 * meza uses an authentication system with a few default types. See LocalSettings.php
 **/
// $mezaAuthType = 'viewer-read';

/**
 * Enables several debugging options.
 **/
$mezaDebug = false;

/**
 * Determines if this wiki has email enabled. In order for email to work the global
 * email function must also be enabled in TBD. When both are enabled they set
 * $wgEnableEmail to true, and enable email. See:
 *  - https://www.mediawiki.org/wiki/Manual:$wgEnableEmail
 **/
$mezaEnableWikiEmail = True;
