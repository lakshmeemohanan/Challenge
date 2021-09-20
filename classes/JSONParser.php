<?php
include_once("./FileParser.php");
include_once("./user.php");
include_once("./credit-card.php");


class JSONParser implements FileParser
{
    public function parseFile($file_path)
    {
        $people_json = file_get_contents($file_path);

        $user_data = array();

        $decoded_json = json_decode($people_json, true);
        for ($i = 0; $i < count($decoded_json); $i++) {

            $user_obj = new User();

            $creditcard_obj = new CreditCard();

            $user_obj->setName($decoded_json[$i]['name']);
            $user_obj->setAddress($decoded_json[$i]['address']);
            $user_obj->setChecked($decoded_json[$i]['checked']);
            $user_obj->setDescription($decoded_json[$i]['description']);
            $user_obj->setInterest($decoded_json[$i]['interest']);
            $user_obj->setDate_of_birth($decoded_json[$i]['date_of_birth']);
            $user_obj->setEmail($decoded_json[$i]['email']);
            $user_obj->setAccount($decoded_json[$i]['account']);

            $creditcard_obj->setType($decoded_json[$i]['credit_card']['type']);
            $creditcard_obj->setNumber($decoded_json[$i]['credit_card']['number']);
            $creditcard_obj->setName($decoded_json[$i]['credit_card']['name']);
            $creditcard_obj->setExpirationDate($decoded_json[$i]['credit_card']['expirationDate']);

            $user_obj->setCard($creditcard_obj);
            $user_data[$i] = $user_obj;
        }
        return $user_data;
    }
}
?>