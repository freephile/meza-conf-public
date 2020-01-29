<?php
$wgGroupPermissions['*']['viewlinktolatest'] = false;
$wgGroupPermissions['sysop']['viewlinktolatest'] = true;
$egApprovedRevsAutomaticApprovals = true; // defaults to false in core meza
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
    NS_IMAGE          => true,
    NS_IMAGE_TALK     => true, // Default
    NS_MEDIAWIKI      => false,
    NS_MEDIAWIKI_TALK => true, // Default
    NS_TEMPLATE       => true,
    NS_TEMPLATE_TALK  => true, // Default
    NS_HELP           => true,
    NS_HELP_TALK      => true, // Default
    NS_CATEGORY       => true,
    NS_CATEGORY_TALK  => true, // Default
);


// add feature to automatically use 'logo' file
// Use this wiki's logo if it has Logo.png or Logo.jpg uploaded
$logoPNG = "c/c9/Logo.png";
$logoJPG = "d/d4/Logo.jpg";
if( file_exists( "$wgUploadDirectory/$logoPNG" ) ) $wgLogo = "$wgUploadPath/$logoPNG";
elseif( file_exists( "$wgUploadDirectory/$logoJPG" ) ) $wgLogo = "$wgUploadPath/$logoJPG";


# antivirus
$wgAntivirusSetup = array(
    'clamav' => array (
        'command' => "/usr/bin/clamscan --no-summary %f",
        'codemap' => array (
            "2"   =>  AV_NO_VIRUS,     #no virus
            "1"   =>  AV_VIRUS_FOUND,  #virus found
            "52"  =>  AV_SCAN_ABORTED, #unsupported file format (probably immune)
            "*"   =>  AV_SCAN_FAILED,  #else scan failed
        ),
        'messagepattern' => '/.*?:(.*)/sim',
    ),
    'clamavD' => array (
        'command' => "/usr/bin/clamdscan --no-summary --fdpass %f",
        'codemap' => array (
            "2"   =>  AV_NO_VIRUS,     #no virus
            "1"   =>  AV_VIRUS_FOUND,  #virus found
            "52"  =>  AV_SCAN_ABORTED, #unsupported file format (probably immune)
            "*"   =>  AV_SCAN_FAILED,  #else scan failed
        ),
        'messagepattern' => '/.*?:(.*)/sim',
    ),
);
$wgAntivirus = "clamavD";
$wgAntivirusRequired = "false";

// Add CC logo in footer
$wgRightsUrl = 'https://creativecommons.org/licenses/by-sa/4.0/';
$wgRightsText = "Creative Commons Attribution Share Alike";
$wgRightsIcon = "/w/resources/assets/licenses/cc-by-sa.png";



//////////////////Begin Google Analytics //////////////////////////////////////

$wgGoogleAnalyticsAccount = "UA-39339059-9";

$wgHooks['SkinAfterBottomScripts'][] = 'lfGAScript';
function lfGAScript( $sk, &$text='' ) {
    global $wgGoogleAnalyticsAccount;
    if ( $sk->getUser()->isAllowed('noanalytics') || !lfIsTitleSafe( $sk->getTitle() ) ) {
        $text .= "<!-- Google Analytics code omitted -->\n";
        return true;
    }
    $text .= <<<GASCRIPT
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=$wgGoogleAnalyticsAccount"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', '$wgGoogleAnalyticsAccount');
</script>
GASCRIPT;
    return true;
}
 //  Add some paranoia.  Don't put 3rd party scripts (GA tracker) on password pages
function lfIsTitleSafe( $title ) {
    if ( $title->isSpecial('Userlogin')
      || $title->isSpecial('Userlogout')
      || $title->isSpecial('Preferences')
      || $title->isSpecial('Resetpass') ) {
        return false;
    }
    return true;
}

// Permissions that control whether or not to output Google Analytics code
$wgGroupPermissions['*']['noanalytics'] = false;
$wgGroupPermissions['bot']['noanalytics'] = true;
$wgGroupPermissions['sysop']['noanalytics'] = true;
$wgGroupPermissions['bureaucrat']['noanalytics'] = true;

//////////////////// End Google Analytics //////////////////////////////////////

