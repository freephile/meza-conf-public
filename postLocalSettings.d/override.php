<?php
$wgGroupPermissions['*']['viewlinktolatest'] = false;
$wgGroupPermissions['sysop']['viewlinktolatest'] = true;
$egApprovedRevsAutomaticApprovals = true; // defaults to false in core meza
// show forms to create pages
$wgPageFormsLinkAllRedLinksToForms = true;

// allow sideloading
$wgGroupPermissions['user']['upload_by_url'] = true;

// add the ability to have subpages in the regular namespace
$wgNamespacesWithSubpages = array(
    NS_MAIN           => true,
    NS_TALK           => true, // Default
    NS_USER           => true, // Default
    NS_USER_TALK      => true, // Default
    NS_PROJECT        => true,
    NS_PROJECT_TALK   => true, // Default
    NS_FILE           => true,
    NS_FILE_TALK      => true, // Default
    NS_MEDIAWIKI      => false,
    NS_MEDIAWIKI_TALK => true, // Default
    NS_TEMPLATE       => true,
    NS_TEMPLATE_TALK  => true, // Default
    NS_HELP           => true,
    NS_HELP_TALK      => true, // Default
    NS_CATEGORY       => true,
    NS_CATEGORY_TALK  => true, // Default
);

// These are actually the defaults for MW 1.27+ so should be in effect
// Make sure the same is setup in php.ini
$wgCookieExpiration = 30 * 86400;
$wgExtendedLoginCookieExpiration = 365 * 86400;
$wgObjectCacheSessionExpiry = 60 * 60 * 24 * 30; // 30-day session

ini_set( 'pcre.backtrack_limit', '2M' );
$wgSpamRegex = "";

// add feature to automatically use 'logo' file
// Use this wiki's logo if it has Logo.png or Logo.jpg uploaded
$logoPNG = "c/c9/Logo.png";
$logoJPG = "d/d4/Logo.jpg";
if( file_exists( "$wgUploadDirectory/$logoPNG" ) ) $wgLogo = "$wgUploadPath/$logoPNG";
elseif( file_exists( "$wgUploadDirectory/$logoJPG" ) ) $wgLogo = "$wgUploadPath/$logoJPG";

////////////////////////// Powered By feature ///////////////////////////////// 
// remove default icons 
unset ($wgFooterIcons['poweredby']); 
// set QB powered by 
$wgFooterIcons['poweredby']['qb'] = [ 
        "src" => "https://wiki.freephile.org/wiki/img_auth.php/3/3a/Powered.by.qb.png", 
    // you may also use a direct path to the source, e.g. "http://example.com/my/custom/path/to/MyCustomLogo.png" 
        "url" => "https://qualitybox.us/", 
        "alt" => "Powered by QualityBox", 
/*      // For HiDPI support, you can specify paths to larger versions of the icon. 
        "srcset" => 
                "/path/to/1.5x_version.png 1.5x, " . 
                "/path/to/2x_version.png 2x", 
 */     // If you have a non-default sized icon you can specify the size yourself. 
        "height" => "28", 
        "width" => "88", 
];
