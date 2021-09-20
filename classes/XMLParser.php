<?php
include_once("./FileParser.php");
include_once("./user.php");
include_once("./credit-card.php");

class XMLParser implements FileParser{
    public function parseFile($file_path){
        $user_data = array();
        $xml = simplexml_load_file("./challenge.xml") or die("Error: Cannot create object");
        $i=0;
        foreach ($xml->children() as $row) {

            $user_obj = new User();
            $creditcard_obj = new CreditCard();

            $user_obj->setName($row->name);
            $user_obj->setAddress($row->address);
            $user_obj->setChecked($row->checked);
            $user_obj->setDescription($row->description);
            $user_obj->setInterest($row->interest);
            $user_obj->setDate_of_birth($row->date_of_birth);
            $user_obj->setEmail($row->addressemail);
            $user_obj->setAccount((int)$row->account);

            $creditcard_obj->setType($row->credit_card->type);
            $creditcard_obj->setNumber((int)$row->credit_card->number);
            $creditcard_obj->setName($row->credit_card->name);
            $creditcard_obj->setExpirationDate($row->credit_card->expirationDate);

            $user_obj->setCard($creditcard_obj);
            $user_data[$i] = $user_obj;
            $i++;
        }
        return $user_data;
    }
}
?>