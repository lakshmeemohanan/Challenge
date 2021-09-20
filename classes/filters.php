<?php
include_once("./age-filter.php");
include_once("./card-filter.php");
class Filters{
    private $filter_array = array();
    private int $index = 0;
    function __construct(){
        $this->filter_array[$this->index++] = new AgeFilter();
        $this->filter_array[$this->index++] = new CardFilter();
    }
    function addFilters($new_fitler){
        $filter_array[$this->index++] = $new_fitler;
    }

    function executeAllFilters($user_data) {
        foreach($this->filter_array as $filter){
            $user_data = $filter->applyFilter($user_data);
        }
        return $user_data;
    }
}
?>