<?php 
require_once('lib/tpl.class.php');
require_once("CoursesClass.php"); // provides: getCoursesTable()
const TEMPLATE_PATH = "templates";

$t = new Template(TEMPLATE_PATH."/index_tpl.php");

$tableHead = ["code", "name", "points", "semester"];
// Generate form
 // only fill it if you use the form
// Assign values
$t -> assign("title", "Courses");

 // fill this if you use a form
$t -> assignTable("table", getCoursesTable(), $tableHead);

// Render content echo 
echo $t -> render();

?>

