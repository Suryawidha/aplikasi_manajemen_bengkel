<?php
$connection = mysqli_connect("localhost", "root", "", "project213");

if (!$connection) {
	die('Could not connect: ' . mysql_error());
}
