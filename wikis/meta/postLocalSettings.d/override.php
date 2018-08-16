<?php
$wgMemoryLimit = 500000000; //Default is 50M. This is 500M
$wgMetaNamespace = 'meta';

// allow direct upload from the web via additional field on the Upload form
// for API
$wgAllowCopyUploads = true;
// for Special:Upload too
$wgCopyUploadsFromSpecialUpload = true;
$wgGroupPermissions['sysadmin']['upload_by_url'] = true;
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

$wgUseInstantCommons = true;

// from http://www.mediawiki.org/wiki/User:Dantman/Analytics_integration
$wgGoogleAnalyticsAccount = "UA-39339059-7";

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
