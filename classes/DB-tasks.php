<?php
class DBTasks{
    public function insertToDB($user_data){
        $servername = "localhost";
        $database = "challenge";
        $username = "user";
        $password = "password";

        $conn = null;
        try {
            $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
        $sql = "SELECT count(id) FROM users";
        $result = $conn->prepare($sql);
        $result->execute();
        $value = $result->fetch();
        $user_data = array_slice($user_data, $value[0]);
          
        foreach($user_data as $data){
            try{
                $conn->beginTransaction();

                $user_sql = "INSERT INTO users(name,address,checked,description,interest,date_of_birth,email,account) 
                VALUES ('" . $this->modifyStringForInsert($data->getName()). "','" .  $this->modifyStringForInsert($data->getAddress()) . "','" . $data->getChecked() . "','" .  $this->modifyStringForInsert($data->getDescription()) . "','" . $data->getInterest(). "','" . $data->getDate_of_birth() . "','" . $data->getEmail() . "','" . $data->getAccount() ."')";
                $user_result = $conn->prepare($user_sql);
                $user_result->execute();
                $user_id = $conn->lastInsertId();

                /*if($user_id == 20){
                    throw new Exception("Loop exited");
                }*/

                $credit_card_sql = "INSERT INTO user_card_details(user_id ,card_type,name,number,expiration_date) 
                VALUES ('" . $user_id. "','" . $data->getCard()->getType() . "','" .  $this->modifyStringForInsert($data->getCard()->getName()) . "','" . $data->getCard()->getNUmber() . "','" . $data->getCard()->getExpirationDate(). "')";
                $card_result = $conn->prepare($credit_card_sql);
                $card_result->execute();

                $conn->commit();
                $user_result=null;
                $card_result=null;

            } catch (\Throwable $e) {
                $this->conn->rollback();
                throw $e; 
            }
        }
        $conn=null;
    }
    public function modifyStringForInsert($stringData) {
        return str_replace("'", "\'",$stringData);
    }
}