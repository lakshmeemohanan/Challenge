<?php
include_once("./filter-data.php");
class CardFilter implements FilterData{
    function applyFilter($user_data){
        $filtered_list = array();
        $j = 0;
        for($i=0; $i<count($user_data); $i++){
            $cardDetails = $user_data[$i]->getCard();
            $card_number = $cardDetails->getNumber();
            $card_array  = array_map('intval', str_split($card_number));

            for($k = 0; $k<count($card_array)-3 ;$k++){
                if(($card_array[$k] == $card_array[$k+1]) && ($card_array[$k] == $card_array[$k+2])){
                    $filtered_list[$j] = $user_data[$i];
                    $j++;
                }
            }
        }
        return $filtered_list;
    }
}
?>