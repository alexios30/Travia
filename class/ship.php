<?php

class Ship {
    private $id;
    private $name;
    private $camp;
    private $speed_kmh;
    private $capacity;


    public function __construct($id, $name, $camp, $speed_kmh, $capacity) {
        $this->id = $id;
        $this->name = $name;
        $this->camp = $camp;
        $this->speed_kmh = $speed_kmh;
        $this->capacity = $capacity;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getCamp()
    {
        return $this->camp;
    }

    /**
     * @param mixed $camp
     */
    public function setCamp($camp)
    {
        $this->camp = $camp;
    }

    /**
     * @return mixed
     */
    public function getSpeedKmh()
    {
        return $this->speed_kmh;
    }

    /**
     * @param mixed $speed_kmh
     */
    public function setSpeedKmh($speed_kmh)
    {
        $this->speed_kmh = $speed_kmh;
    }

    /**
     * @return mixed
     */
    public function getCapacity()
    {
        return $this->capacity;
    }

    /**
     * @param mixed $capacity
     */
    public function setCapacity($capacity)
    {
        $this->capacity = $capacity;
    }

    /**
     * @param mixed $id
     */

    public function add_ships($json) {
        include("./include/connexion.php");

        try {
            $vaisseauxData = json_decode($json, true);
            $stmt = $cnx->prepare("INSERT INTO Ship (id, name, camp, speed_kmh, capacity) VALUES (:id, :name, :camp, :speed_kmh, :capacity)");

            foreach ($vaisseauxData as $vaisseau) {
                // Lier chaque paramètre à sa valeur avec un type explicite
                $stmt->bindParam(':id', $vaisseau['id'], PDO::PARAM_INT);
                $stmt->bindParam(':name', $vaisseau['name'], PDO::PARAM_STR);
                $stmt->bindParam(':camp', $vaisseau['camp'], PDO::PARAM_STR);
                $stmt->bindParam(':speed_kmh', $vaisseau['speed_kmh'], PDO::PARAM_STR);
                $stmt->bindParam(':capacity', $vaisseau['capacity'], PDO::PARAM_INT);

                // Exécuter la requête d'insertion
                $stmt->execute();
            }

            echo "Données insérées avec succès !";

        } catch (PDOException $e) {
            echo "Erreur de connexion : " . $e->getMessage();
        }
    }



}
?>