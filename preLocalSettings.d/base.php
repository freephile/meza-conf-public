<?php
$wgUseInstantCommons = true;

$wgFileExtensions = array(
'aac',
'bmp',
'csv',
'docx',
'gif',
'ico',
'jpg',
'jpeg',
'mm', //Freemind
'mpp',
'mp3',
'msg',
'odb',
'odf',
'odg',
'odm',
'odp',
'ods',
'odt',
'ogg',
'otg',
'oth',
'ots',
'ott',
'pdf',
'png',
'pptx',
'ps',
'svg',
'tiff',
'txt',
'xlsx',
'xml',
'xsd',
'xsl',
'xslt',
'zip'
);


// allow users to customize their experience
$wgAllowUserJs = true;
$wgAllowUserCss = true;

// Add a TOS to the footer @FIXME This still doesn't work
// NOTE: MediaWiki:Termsofservice MediaWiki:Termsofservicepage and “Terms Of Service” must all exist
// https://www.mediawiki.org/wiki/Manual:Hooks/SkinTemplateOutputPageBeforeExec
global $wgHooks;
$wgHooks['SkinTemplateOutputPageBeforeExec'][] = function ( $sk, &$templ ) {
  // define that msg MediaWiki:Termsofservice shall link to MediaWiki:Termsofservicepage Title
  $templ->set( 'termsofservice', $sk->footerLink( 'termsofservice', 'termsofservicepage' ) );
  $templ->data['footerlinks']['places'][] = 'termsofservice';
  return true;
};


//  For attaching licensing metadata to pages, and displaying an
//  appropriate copyright notice / icon. GNU Free Documentation
//  License and Creative Commons licenses are supported so far.
$wgEnableCreativeCommonsRdf = true;
$wgRightsPage = ""; # Set to the title of a wiki page that describes your license/copyright
// $wgRightsUrl = "http://creativecommons.org/licenses/by-nc-sa/3.0/";
/*
<a rel="license" href="http://creativecommons.org/licenses/by-sa/4.0/"><img alt="Creative Commons License" style="border-width:0" src="https://i.creativecommons.org/l/by-sa/4.0/80x15.png" /></a><br />This work by <a xmlns:cc="http://creativecommons.org/ns#" href="http://freephile.org" property="cc:attributionName" rel="cc:attributionURL">http://freephile.org</a> is licensed under a <a rel="license" href="http://creativecommons.org/licenses/by-sa/4.0/">Creative Commons Attribution-ShareAlike 4.0 International License</a>.
*/
$wgRightsUrl = "http://creativecommons.org/licenses/by-sa/4.0/";
$wgRightsText = "Creative Commons Attribution-ShareAlike 4.0 International License";
$wgRightsIcon = "https://i.creativecommons.org/l/by-sa/4.0/88x31.png";
// $wgRightsCode = "gfdl"; # Not yet used

// Development tip: Use this ONLY IN DEV to invalidate all caches any time LocalSettings changes
// $wgInvalidateCacheOnLocalSettingsChange = true;

// set our wikis to use antivirus scanning of all uploaded files.
// see the DefaultSettings file for the definition of scanners.
// must install and make the scanner available; e.g. sudo apt-get install clamav etc.
// by default, this is set to null, turning off all virus scanning.
$wgAntivirus = 'clamav';
// turn it off if you need to verify that it's installed
// $wgAntivirus = NULL;

// Reject uploads if AV_SCAN_FAILED (possibly because the scanner isn't configured correctly)
// $wgAntivirusRequired = false; // default is true so uploads must pass scanning

//override the setup for clamav because it's currently broken in head
$wgAntivirusSetup['clamav'] = array (
  'command' => "/usr/bin/clamscan --no-summary %f",

  'codemap' => array (
    "0" =>  AV_NO_VIRUS, # no virus
    "1" =>  AV_VIRUS_FOUND, # virus found
    "52" => AV_SCAN_ABORTED, # unsupported file format (probably imune)
    "*" =>  AV_SCAN_FAILED, # else scan failed
  ),

  'messagepattern' => '/.*?:(.*)/sim',
);


// Add in automatic promotion of users
// Make it so users with confirmed e-mail addresses are in the groups we want enabled by default.
$wgAutopromote = array(
  'confirmed' => APCOND_EMAILCONFIRMED
);

// variable takes precedence over config, but you can add a sitenotice on-wiki
// @see wiki/MediaWiki:Sitenotice
// $wgSiteNotice = '<span style="background-color:yellow;">We will be right back</span>';
