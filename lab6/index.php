<?php 
require_once('lib/tpl.class.php');
require_once("CoursesClass.php"); // provides: getCoursesTable()
const TEMPLATE_PATH = "templates";

$t = new Template(TEMPLATE_PATH."/index_tpl.php");

$tableHead = ["code", "name", "points", "semester"];
// Generate form
$form = '<div class ="proba">
<form action="index.php" method="POST">
<div class ="code">
<legend>Course Code(first 3 digits or I00):</legend>
<input id="code" type="text" name="code" placeholder="I00 or ICA/ICD/etc." maxlength="3" required="">
</div>
<div class="season">
<legend>Semester</legend>
<input type="checkbox" id="spring" name="spring">
<label for="spring">Spring</label><br>
<input type="checkbox" id="autumn" name="autumn">
<label for="autumn">Autumn</label><br>
</div>
<div class="boton">
<input class="boton" type="submit" name ="submit" id="search" value="Search">
</div>
</form>
<form action="index.php" method="POST">
<div class="boton2">
<input class="boton" type="submit" id="reset" name="reset" value="Reset">
</div>
</form>'; // only fill it if you use the form
// Assign values
$t -> assign("title", "Courses");

$t -> assign("form", $form); // fill this if you use a form
$t -> assignTable("table", getCoursesTable(), $tableHead);

// Render content echo 
echo $t -> render();

?>

