<?php
include_once("./parser-selector.php");
include_once("./filters.php");
include_once("./DB-tasks.php");

$file_path = './challenge.json';

$parser_selector_obj = new ParserSelector();
$parser  = $parser_selector_obj->selectParser($file_path ); 

$user_data = $parser->parseFile($file_path);

$filter_obj = new Filters();
$filtered_data = $filter_obj->executeAllFilters($user_data);

$insert_obj = new DBTasks();
$insert_obj->insertToDB($filtered_data);
?>