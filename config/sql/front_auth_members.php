<?php 
/* SVN FILE: $Id$ */
/* FrontAuthMembers schema generated on: 2012-08-17 17:08:42 : 1345218702*/
class FrontAuthMembersSchema extends CakeSchema {
	var $name = 'FrontAuthMembers';

	var $file = 'front_auth_members.php';

	var $connection = 'plugin';

	function before($event = array()) {
		return true;
	}

	function after($event = array()) {
	}

	var $front_auth_members = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'user' => array('type' => 'string', 'null' => true, 'default' => NULL),
		'url' => array('type' => 'string', 'null' => true, 'default' => NULL),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
	);
}
?>