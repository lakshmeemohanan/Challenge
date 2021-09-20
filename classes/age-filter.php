<?php
include_once("./filter-data.php");
class AgeFilter implements FilterData{
    function applyFilter($user_data){
        $filtered_list = array();
        $j = 0;
        for($i=0; $i<count($user_data); $i++){
            $dob = str_replace("/", "-", $user_data[$i]->getDate_of_birth());
            $from = new DateTime($dob);

            $to   = new DateTime('today');
            $age = $from->diff($to)->y;

            if($age == '' || ($age >= '18' && $age <= '65')){
                $filtered_list[$j] = $user_data[$i];
                $j++;
            }
        }
        return $filtered_list;
    }
}
?>