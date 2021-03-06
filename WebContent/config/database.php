<?php /*
	Copyright 2017 Cédric Levieux

	This file is part of Discord-One-Page.

    Discord-One-Page is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    Discord-One-Page is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with Discord-One-Page.  If not, see <http://www.gnu.org/licenses/>.
*/
@include_once("config/config.php");
@include_once("config/salt.php");

function openConnection() {
	global $config;

	$dns = 'mysql:host='.$config["database"]["host"].';dbname=' . $config["database"]["database"];

	if (isset($config["database"]["port"])) {
		$dns .= ";port=" . $config["database"]["port"];
	}

	$user = $config["database"]["login"];
	$password = $config["database"]["password"];
	$pdo = new PDO($dns, $user, $password );

	return $pdo;
}

function showQuery($query, $args) {
	foreach($args as $key => $value) {
		$query = str_replace(":$key", "'$value'", $query);
	}

	return $query . "\n";
}

?>