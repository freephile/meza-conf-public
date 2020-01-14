<?php
$wgSitename = "Wayne County (OH) Wiki";
$wgMetaNamespace = "WCPL";

$wgExtraNamespaces[100] = 'Portal';
$wgExtraNamespaces[101] = 'Portal_talk';
$wgExtraNamespaces[108] = 'Book';
$wgExtraNamespaces[109] = 'Book_talk';
$wgExtraNamespaces[446] = 'Education_Program';
$wgExtraNamespaces[447] = 'Education_Program_talk';
$wgExtraNamespaces[710] = 'TimedText';
$wgExtraNamespaces[711] = 'TimedText_talk';
$wgExtraNamespaces[828] = 'Module';
$wgExtraNamespaces[829] = 'Module_talk';

$wgNamespacesWithSubpages[100] = true;
$wgNamespacesWithSubpages[NS_MAIN] = true;

$wgEmailAuthentication = true;

$wgUseInstantCommons = true;

// Enable by default for everybody
$wgDefaultUserOptions['visualeditor-enable'] = 1;

////////////////////////// Powered By feature ///////////////////////////////// 
// remove default icons 
unset ($wgFooterIcons['poweredby']); 
// set QB powered by 
$wgFooterIcons['poweredby']['qb'] = [ 
        "src" => "https://wiki.freephile.org/w/img_auth.php/3/3a/Powered.by.qb.png", 
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
