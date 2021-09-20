<?php
include_once("./FileParser.php");
include_once("./user.php");
include_once("./credit-card.php");

class CSVParser implements FileParser{
    public function parseFile($file_path){

        $user_data = array();
        $row = 0;
        if (($handle = fopen("./challenge.csv", "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                
                    $user_obj = new User();
                    $creditcard_obj = new CreditCard();

                    $user_obj->setName($data[0]);
                    $user_obj->setAddress($data[1]);
                    $user_obj->setChecked($data[2]);
                    $user_obj->setDescription($data[3]);
                    $user_obj->setInterest($data[4]);
                    $user_obj->setDate_of_birth($data[5]);
                    $user_obj->setEmail($data[6]);
                    $user_obj->setAccount($data[7]);

                    $creditcard_obj->setType($data[8]);
                    $creditcard_obj->setNumber($data[9]);
                    $creditcard_obj->setName($data[10]);
                    $creditcard_obj->setExpirationDate($data[11]);

                    $user_obj->setCard($creditcard_obj);
                    $user_data[$row] = $user_obj;
                    $row++;
            }
            fclose($handle);
            return $user_data;
        }
    }
}
?>