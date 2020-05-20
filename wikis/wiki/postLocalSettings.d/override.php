<?php
$wgMemoryLimit = 500000000; //Default is 50M. This is 500M
$wgMetaNamespace = 'Freephile_Wiki';
$wgRawHtml=true;


// from http://www.mediawiki.org/wiki/User:Dantman/Analytics_integration
$wgGoogleAnalyticsAccount = "UA-39339059-3";

$wgHooks['SkinAfterBottomScripts'][] = 'lfGAScript';
function lfGAScript( $sk, &$text='' ) {
  global $wgGoogleAnalyticsAccount;
  if ( $sk->getUser()->isAllowed('noanalytics') || !lfIsTitleSafe( $sk->getTitle() ) ) {
    $text .= "<!-- Google Analytics code omitted -->\n";
    return true;
  }
  $text .= <<<GASCRIPT
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', '$wgGoogleAnalyticsAccount', 'auto');
  ga('send', 'pageview');
</script>
GASCRIPT;
  return true;
}
/**
 * Add some paranoia.  Don't put 3rd party scripts (GA tracker) on password pages
 */
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




// SVG thumbnailing requires more memory
// Maximum amount of virtual memory available to shell processes in KB.
// 102400 KB = 100 MB, 307200 KB = 300 MB, etc.
$wgMaxShellMemory = 307200; //300MB WORKS

// allow direct upload from the web via additional field on the Upload form
// for API
$wgAllowCopyUploads = true;
// for Special:Upload too
$wgCopyUploadsFromSpecialUpload = true;
$wgGroupPermissions['sysop']['upload_by_url'] = true;
$wgGroupPermissions['autoconfirmed']['upload_by_url'] = true;

// Avoid some false positives of JavaScript in svg file
// before setting this to true, *test* your server for a proper mime-type response
// when serving svg files. @see https://www.w3.org/services/svg-server/
// or curl -I https://example.com/file.svg
$wgAllowTitlesInSVG = true;

// allow search engines to actually follow external links. SEO optimization
$wgNoFollowLinks = false;

// https://www.mediawiki.org/wiki/Manual:%24wgLocalInterwikis
$wgLocalInterwikis[] = strtolower($wgSitename);

// Maps is installed in Core via Composer
// $GLOBALS['egMapsDefaultService'] = 'leaflet';
$GLOBALS['egMapsDefaultService'] = 'googlemaps3';
/* fix google maps little man in responsive skin
 * Add to MediaWiki:Common.css
.gm-style img {
    max-width: none;
}
*/
// each site needs their own key
$GLOBALS['egMapsGMaps3ApiKey'] = 'AIzaSyBN28fehThC6zeKZPtmdw5LRYIUyRirKEk';

$wgUseInstantCommons = true;



/**
 * Permissions
 */
// sysops rule
$wgGroupPermissions['sysop']['*'] = true;
// anonymous read
$wgGroupPermissions['*']['read'] = true;

$wgGroupPermissions['*']['edit'] = false;
$wgGroupPermissions['*']['createpage'] = false;
$wgGroupPermissions['*']['createtalk'] = false;
$wgGroupPermissions['*']['createaccount'] = false; // Only SysOp (Admin) can create accounts 

/*
// If read were false; must at least whitelist these pages:
$wgWhitelistRead =  array (
    "Main Page",
    "Special:Userlogin",
    "Wikipedia:Help",
    "Special:Userlogin&type=signup",
    "Special:RequestAccount"
);
*/

// Prevent registered, non-confirmed users from editing
$wgGroupPermissions['user' ]['move']            = false;
$wgGroupPermissions['user' ]['edit']            = false;
$wgGroupPermissions['user' ]['createpage']      = false;
$wgGroupPermissions['user' ]['createtalk']      = false;
$wgGroupPermissions['user' ]['upload']          = false;
$wgGroupPermissions['user' ]['reupload']        = false;
$wgGroupPermissions['user' ]['reupload-shared'] = false;
$wgGroupPermissions['user' ]['minoredit']       = false;
$wgGroupPermissions['user' ]['purge']           = false;

// Allow confirmed users to edit
$wgGroupPermissions['confirmed' ]['move']            = true; // Only add this line if you want all users to be able to move
$wgGroupPermissions['confirmed' ]['edit']            = true;
$wgGroupPermissions['confirmed' ]['createpage']      = true;
$wgGroupPermissions['confirmed' ]['createtalk']      = true;
$wgGroupPermissions['confirmed' ]['upload']          = true;
$wgGroupPermissions['confirmed' ]['reupload']        = true;
$wgGroupPermissions['confirmed' ]['reupload-shared'] = true;
$wgGroupPermissions['confirmed' ]['minoredit']       = true;
$wgGroupPermissions['confirmed' ]['purge']           = true;
$wgGroupPermissions['confirmed' ]['read']           = true;

