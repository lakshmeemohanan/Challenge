<?php
include_once("./CSVParser.php");
include_once("./JSONParser.php");
include_once("./XMLParser.php");
include_once("./FileParser.php");

class ParserSelector{
   public function selectParser($file_path):FileParser{
    $path_parts = pathinfo($file_path);
    $file_extension  = strtolower($path_parts['extension']);
        switch($file_extension){
            case "csv":
                return new CSVParser();
                break;
            case "json":
                return new JSONParser();
                break;
            case "xml":
                return new XMLParser();
                break;
        }
   } 
}
?>