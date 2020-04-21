<?php
$wgGroupPermissions['*']['viewlinktolatest'] = false;
$wgGroupPermissions['sysop']['viewlinktolatest'] = true;
$egApprovedRevsAutomaticApprovals = true; // defaults to false in core meza


// allow sideloading
$wgAllowCopyUploads = true;
$wgCopyUploadsFromSpecialUpload = true;
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


// eliminate spam https://www.mediawiki.org/wiki/Manual:$wgSpamRegex
// Perl Compatible Regular Expressions backtrack memory limit
ini_set( 'pcre.backtrack_limit', '2M' );
$wgSpamRegex = "";

// add feature to automatically use 'logo' file
// Use this wiki's logo if it has Logo.png or Logo.jpg uploaded
$logoPNG = "c/c9/Logo.png";
$logoJPG = "d/d4/Logo.jpg";
if( file_exists( "$wgUploadDirectory/$logoPNG" ) ) $wgLogo = "$wgUploadPath/$logoPNG";
elseif( file_exists( "$wgUploadDirectory/$logoJPG" ) ) $wgLogo = "$wgUploadPath/$logoJPG";

