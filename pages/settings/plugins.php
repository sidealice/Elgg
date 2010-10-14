<?php
/**
 * Elgg user plugin settings.
 *
 * @package Elgg
 * @subpackage Core
 * @author Curverider Ltd
 * @link http://elgg.org/
 */

// Make sure only valid users can see this
gatekeeper();

// Make sure we don't open a security hole ...
if ((!page_owner_entity()) || (!page_owner_entity()->canEdit())) {
	set_page_owner(get_loggedin_userid());
}

$content = elgg_view_title(elgg_echo("usersettings:plugins"));
$content .= elgg_view("usersettings/plugins", array('installed_plugins' => get_installed_plugins()));

$body = elgg_view_layout('one_column_with_sidebar', $content);

page_draw(elgg_echo("usersettings:plugins"), $body);