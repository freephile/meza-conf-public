<?php
$wgGroupPermissions['*']['viewlinktolatest'] = false;
$wgGroupPermissions['sysop']['viewlinktolatest'] = true;
$egApprovedRevsAutomaticApprovals = true; // defaults to false in core meza


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
// may need to adjust 
// Perl Compatible Regular Expressions backtrack memory limit
ini_set( 'pcre.backtrack_limit', '2M' );
$wgSpamRegex = "/".                        # The "/" is the opening wrapper
                "s-e-x|zoofilia|sexyongpin|grusskarte|geburtstagskarten|animalsex|".
                "sex-with|dogsex|adultchat|adultlive|camsex|sexcam|livesex|sexchat|".
                "chatsex|onlinesex|adultporn|adultvideo|adultweb.|hardcoresex|hardcoreporn|".
                "teenporn|xxxporn|lesbiansex|livegirl|livenude|livesex|livevideo|camgirl|".
                "spycam|voyeursex|casino-online|online-casino|kontaktlinsen|cheapest-phone|".
                "laser-eye|eye-laser|fuelcellmarket|lasikclinic|cragrats|parishilton|".
                "paris-hilton|paris-tape|2large|fuel-dispenser|fueling-dispenser|huojia|".
                "jinxinghj|telematicsone|telematiksone|a-mortgage|diamondabrasives|".
                "reuterbrook|sex-plugin|sex-zone|lazy-stars|eblja|liuhecai|".
                "buy-viagra|-cialis|-levitra|boy-and-girl-kissing|". # These match spammy words
                "dirare\.com|".           # This matches dirare.com a spammer's domain name
                "overflow\s*:\s*auto|".   # This matches against overflow:auto (regardless of whitespace on either side of the colon)
                "height\s*:\s*[0-4]px|".  # This matches against height:0px (most CSS hidden spam) (regardless of whitespace on either side of the colon)
                "==<center>\[|".          # This matches some recent spam related to starsearchtool.com and friends
                "\<\s*a\s*href|".         # This blocks all href links entirely, forcing wiki syntax
                "display\s*:\s*none".     # This matches against display:none (regardless of whitespace on either side of the colon)
                "/i";                     # The "/" ends the regular expression and the "i" switch which follows makes the test case-insensitive
                                          # The "\s" matches whitespace
                                          # The "*" is a repeater (zero or more times)
                                          # The "\s*" means to look for 0 or more amount of whitespace

