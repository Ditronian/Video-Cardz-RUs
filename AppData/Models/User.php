<?php
    class User
    {
        public $firstName;
        public $lastName;
        public $email;
        public $password;
        public $userID;
        public $confirmationCode;


        public function __construct($firstName, $lastName, $email, $password, $confirmationCode, $userID = null)
        {
            $this->firstName = $firstName;
            $this->lastName = $lastName;
            $this->email = $email;
            $this->password = $password;
            $this->confirmationCode = $confirmationCode;
            $this->userID = $userID;
        }

        public function getFirstName()
        {
                return $this->firstName;
        }

        public function setFirstName($firstName)
        {
                $this->firstName = $firstName;

                return $this;
        }

        public function getLastName()
        {
                return $this->lastName;
        }


        public function setLastName($lastName)
        {
                $this->lastName = $lastName;

                return $this;
        }

        public function getEmail()
        {
                return $this->email;
        }

        public function setEmail($email)
        {
                $this->email = $email;

                return $this;
        }

        public function getPassword()
        {
                return $this->password;
        }

        public function setPassword($password)
        {
                $this->password = $password;

                return $this;
        }
    }
?>