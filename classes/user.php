<?php

class User {
    private string $name;
    private string $address;
    private string $checked;
    private string $description;
    private string $interest;
    private string $date_of_birth;
    private string $email;
    private int $account;
    private CreditCard $card;

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of address
     */ 
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set the value of address
     *
     * @return  self
     */ 
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get the value of checked
     */ 
    public function getChecked()
    {
        return $this->checked;
    }

    /**
     * Set the value of checked
     *
     * @return  self
     */ 
    public function setChecked($checked)
    {
        if($checked == "true"){
            $this->checked = '1';
        }else{
            $this->checked = '0';
        }
        return $this;
    }

    /**
     * Get the value of description
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */ 
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of interest
     */ 
    public function getInterest()
    {
        return $this->interest;
    }

    /**
     * Set the value of interest
     *
     * @return  self
     */ 
    public function setInterest($interest)
    {
        if($interest != null){
            $this->interest = $interest;
        }else{
            $this->interest = '';
        }
        return $this;
    }

    /**
     * Get the value of date_of_birth
     */ 
    public function getDate_of_birth()
    {
        return $this->date_of_birth;
    }

    /**
     * Set the value of date_of_birth
     *
     * @return  self
     */ 
    public function setDate_of_birth($date_of_birth)
    {
        if($date_of_birth != null){
            $this->date_of_birth = $date_of_birth;
        }else{
            $this->date_of_birth = '';
        }

        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of account
     */ 
    public function getAccount()
    {
        return $this->account;
    }

    /**
     * Set the value of account
     *
     * @return  self
     */ 
    public function setAccount($account)
    {
        $this->account = $account;

        return $this;
    }

    /**
     * Get the value of card
     */ 
    public function getCard()
    {
        return $this->card;
    }

    /**
     * Set the value of card
     *
     * @return  self
     */ 
    public function setCard($card)
    {
        $this->card = $card;

        return $this;
    }
}

?>