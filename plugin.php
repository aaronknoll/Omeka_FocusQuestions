<?php

add_plugin_hook('install', 'install');
add_plugin_hook('uninstall', 'uninstall');

    function install()
    {
        $db = get_db();
        $sql = "
        CREATE TABLE `{$db->prefix}focus_questions` (
        	`focus_q_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
     		`focus_q` text collate utf8_unicode_ci,
        	PRIMARY KEY (`focus_q_id`)
        ) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;";
		$db->query($sql);
	 	$sql = "
        CREATE TABLE `{$db->prefix}focus_questions_items` (
        	`associative_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
        	`focus_q_id` int(10) unsigned NOT NULL,
        	`item_id` int(10) unsigned NOT NULL,
        	PRIMARY KEY (`associative_id`)
        ) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;";
        $db->query($sql);
    }
    
    function uninstall()
    {
        $db = get_db();
        $sql = "DROP TABLE IF EXISTS `{$db->prefix}focus_questions`;";
		$db->query($sql);
	    $sql = "DROP TABLE IF EXISTS `{$db->prefix}focus_questions_items`;";
        $db->query($sql);
    }
    
?>