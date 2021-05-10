<?php
    class Item
    {
        public $id;
        public $name;
        public $price;
        public $description;
        public $imageLocation;
        public $manufacturer;
        public $userRating;

        public function __construct($id, $name, $price, $description, $imageLocation, $manufacturer, $userRating)
        {
            $this->id = $id;
            $this->name = $name;
            $this->price = $price;
            $this->description = $description;
            $this->imageLocation = $imageLocation;
            $this->manufacturer = $manufacturer;
            $this->userRating = $userRating;
        }


        public function getImageLocation()
        {
                return $this->imageLocation;
        }

        public function setImageLocation($imageLocation)
        {
                $this->imageLocation = $imageLocation;

                return $this;
        }

        public function getDescription()
        {
                return $this->description;
        }


        public function setDescription($description)
        {
                $this->description = $description;

                return $this;
        }

        public function getPrice()
        {
                return $this->price;
        }

        public function setPrice($price)
        {
                $this->price = $price;

                return $this;
        }

        public function getName()
        {
                return $this->name;
        }

        public function setName($name)
        {
                $this->name = $name;

                return $this;
        }

        public function getUblic()
        {
                return $this->ublic;
        }

        public function setUblic($ublic)
        {
                $this->ublic = $ublic;

                return $this;
        }
    }
?>