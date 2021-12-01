<?php

class cars{

    // properties
    public $connection;
    public $table = 'cars';
    public $secondtable = 'cars_location';

    // register method properties
    public $model;
    public $year;
    public $plate_no;
    public $speed;
    public $max_load;
    public $fuel_type;

    // create method properties
    public $cars_id;
    public $lat;
    public $lng;
    public $time_date;

    // getlocation properties
    public $lim;

    // class construct
    public function __construct($db) {

        $this->connection = $db;
    }

    // register method
    public function register() {

        $sql = "INSERT INTO "
                    . $this->table .
                "  SET
                    car_model = :car_model,
                    car_year = :car_year,
                    plate_number = :plate_number,
                    current_speed = :current_speed,
                    max_load = :max_load,
                    fuel_type = :fuel_type";
        
        $stmt = $this->connection->prepare($sql);
        
        $this->model = htmlspecialchars(strip_tags($this->model));
        $this->year = htmlspecialchars(strip_tags($this->year));
        $this->plate_no = htmlspecialchars(strip_tags($this->plate_no));
        $this->speed = htmlspecialchars(strip_tags($this->speed));
        $this->max_load = htmlspecialchars(strip_tags($this->max_load));
        $this->fuel_type = htmlspecialchars(strip_tags($this->fuel_type));

        $stmt->bindParam(':car_model', $this->model);
        $stmt->bindParam(':car_year', $this->year);
        $stmt->bindParam(':plate_number', $this->plate_no);
        $stmt->bindParam(':current_speed', $this->speed);
        $stmt->bindParam(':max_load', $this->max_load);
        $stmt->bindParam(':fuel_type', $this->fuel_type);

        if($stmt->execute()) {

            return true;
        } else {

            return false;
        }

    }

    // create method
    public function create() {

            $sql = "INSERT INTO "
                    . $this->secondtable .
                " SET
                    cars_id = :cars_id,
                    latitude = :latitude,
                    longitude = :longitude,
                    time_date = :time_date";
        
        $stmt = $this->connection->prepare($sql);
        
        $this->cars_id = htmlspecialchars(strip_tags($this->cars_id));
        $this->lat = htmlspecialchars(strip_tags($this->lat));
        $this->lng = htmlspecialchars(strip_tags($this->lng));
        $this->time_date = htmlspecialchars(strip_tags($this->time_date));

        $stmt->bindParam(':cars_id', $this->cars_id);
        $stmt->bindParam(':latitude', $this->lat);
        $stmt->bindParam(':longitude', $this->lng);
        $stmt->bindParam(':time_date', $this->time_date);

        if ($stmt->execute()) {

            return true;
        } else {

            return false;
        }
    }

    // getlocation properties
    public function getLocation() {

        $sql = "SELECT latitude, longitude FROM "
                    . $this->secondtable .
                " WHERE cars_id = ? LIMIT 5";

        $stmt = $this->connection->prepare($sql);

        $stmt->bindParam(1, $this->cars_id);
        
        $stmt->execute();

        $data = $stmt->fetch();

        return $data;

    }
}

?>
