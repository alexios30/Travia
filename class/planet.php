<?php

class Planet {
    private $id;
    private string $name;
    private $image;
    private $coord;

    /**
     * @param $id
     */

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
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
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed $image
     */
    public function setImage($image): void
    {
        $this->image = $image;
    }

    /**
     * @return mixed
     */
    public function getCoord()
    {
        return $this->coord;
    }

    /**
     * @param mixed $coord
     */
    public function setCoord($coord): void
    {
        $this->coord = $coord;
    }

    /**
     * @return mixed
     */
    public function getX()
    {
        return $this->x;
    }

    /**
     * @param mixed $x
     */
    public function setX($x): void
    {
        $this->x = $x;
    }

    /**
     * @return mixed
     */
    public function getY()
    {
        return $this->y;
    }

    /**
     * @param mixed $y
     */
    public function setY($y): void
    {
        $this->y = $y;
    }

    /**
     * @return mixed
     */
    public function getSubGridCoord()
    {
        return $this->subGridCoord;
    }

    /**
     * @param mixed $subGridCoord
     */
    public function setSubGridCoord($subGridCoord): void
    {
        $this->subGridCoord = $subGridCoord;
    }

    /**
     * @return mixed
     */
    public function getSubGridX()
    {
        return $this->subGridX;
    }

    /**
     * @param mixed $subGridX
     */
    public function setSubGridX($subGridX): void
    {
        $this->subGridX = $subGridX;
    }

    /**
     * @return mixed
     */
    public function getSubGridY()
    {
        return $this->subGridY;
    }

    /**
     * @param mixed $subGridY
     */
    public function setSubGridY($subGridY): void
    {
        $this->subGridY = $subGridY;
    }

    /**
     * @return mixed
     */
    public function getSunName()
    {
        return $this->sunName;
    }

    /**
     * @param mixed $sunName
     */
    public function setSunName($sunName): void
    {
        $this->sunName = $sunName;
    }

    /**
     * @return mixed
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * @param mixed $region
     */
    public function setRegion($region): void
    {
        $this->region = $region;
    }

    /**
     * @return mixed
     */
    public function getSector()
    {
        return $this->sector;
    }

    /**
     * @param mixed $sector
     */
    public function setSector($sector): void
    {
        $this->sector = $sector;
    }

    /**
     * @return mixed
     */
    public function getSuns()
    {
        return $this->suns;
    }

    /**
     * @param mixed $suns
     */
    public function setSuns($suns): void
    {
        $this->suns = $suns;
    }

    /**
     * @return mixed
     */
    public function getMoons()
    {
        return $this->moons;
    }

    /**
     * @param mixed $moons
     */
    public function setMoons($moons): void
    {
        $this->moons = $moons;
    }

    /**
     * @return mixed
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * @param mixed $position
     */
    public function setPosition($position): void
    {
        $this->position = $position;
    }

    /**
     * @return mixed
     */
    public function getDistance()
    {
        return $this->distance;
    }

    /**
     * @param mixed $distance
     */
    public function setDistance($distance): void
    {
        $this->distance = $distance;
    }

    /**
     * @return mixed
     */
    public function getLengthDay()
    {
        return $this->lengthDay;
    }

    /**
     * @param mixed $lengthDay
     */
    public function setLengthDay($lengthDay): void
    {
        $this->lengthDay = $lengthDay;
    }

    /**
     * @return mixed
     */
    public function getLengthYear()
    {
        return $this->lengthYear;
    }

    /**
     * @param mixed $lengthYear
     */
    public function setLengthYear($lengthYear): void
    {
        $this->lengthYear = $lengthYear;
    }

    /**
     * @return mixed
     */
    public function getDiameter()
    {
        return $this->diameter;
    }

    /**
     * @param mixed $diameter
     */
    public function setDiameter($diameter): void
    {
        $this->diameter = $diameter;
    }

    /**
     * @return mixed
     */
    public function getGravity()
    {
        return $this->gravity;
    }

    /**
     * @param mixed $gravity
     */
    public function setGravity($gravity): void
    {
        $this->gravity = $gravity;
    }
    private $x;
    private $y;
    private $subGridCoord;
    private $subGridX;
    private $subGridY;
    private $sunName;
    private $region;
    private $sector;
    private $suns;
    private $moons;
    private $position;
    private $distance;
    private $lengthDay;
    private $lengthYear;
    private $diameter;
    private $gravity;

    public function __construct($id = null) {
        $this->id = $id;
    }
    public function add_planet($planet) {
        include("../include/connexion.php");

        // Préparation de la requête d'insertion ou de mise à jour
          $stmt = $cnx->prepare("INSERT INTO planet (
            Id,Name, Image, Coord, X, Y, SubGridCoord, SubGridX, SubGridY, 
            SunName, Region, Sector, Suns, Moons, Position, Distance, 
            LengthDay, LengthYear, Diameter, Gravity) 
        VALUES (
            :Id,:name, :image, :coord, :x, :y, :subGridCoord, :subGridX, 
            :subGridY, :sunName, :region, :sector, :suns, :moons, 
            :position, :distance, :lengthDay, :lengthYear, :diameter, :gravity)
        ON DUPLICATE KEY UPDATE 
            Id = VALUES(Id),
            Image = VALUES(Image),
            Coord = VALUES(Coord),
            X = VALUES(X),
            Y = VALUES(Y),
            SubGridCoord = VALUES(SubGridCoord),
            SubGridX = VALUES(SubGridX),
            SubGridY = VALUES(SubGridY),
            SunName = VALUES(SunName),
            Region = VALUES(Region),
            Sector = VALUES(Sector),
            Suns = VALUES(Suns),
            Moons = VALUES(Moons),
            Position = VALUES(Position),
            Distance = VALUES(Distance),
            LengthDay = VALUES(LengthDay),
            LengthYear = VALUES(LengthYear),
            Diameter = VALUES(Diameter),
            Gravity = VALUES(Gravity)");

        // Boucle d'insertion des données JSON
            $stmt->execute([
                ':Id' => $planet['Id'],
                ':name' => $planet['Name'],
                ':image' => $planet['Image'] ?? null,
                ':coord' => $planet['Coord'] ?? null,
                ':x' => $planet['X'],
                ':y' => $planet['Y'],
                ':subGridCoord' => $planet['SubGridCoord'] ?? null,
                ':subGridX' => $planet['SubGridX'],
                ':subGridY' => $planet['SubGridY'],
                ':sunName' => $planet['SunName'] ?? null,
                ':region' => $planet['Region'],
                ':sector' => $planet['Sector'],
                ':suns' => $planet['Suns'] ,
                ':moons' => $planet['Moons'],
                ':position' => $planet['Position'],
                ':distance' => $planet['Distance'],
                ':lengthDay' => $planet['LengthDay'],
                ':lengthYear' => $planet['LengthYear'],
                ':diameter' => $planet['Diameter'],
                ':gravity' => $planet['Gravity']
            ]);
    }
    public function add_trip($planet) {
        include("../include/connexion.php");
        if (isset($planet['trips'])) {
            foreach ($planet['trips'] as $day => $trips) {
                foreach ($trips as $trip){
                    // Préparation de la requête d'insertion ou de mise à jour
                    $stmt = $cnx->prepare("INSERT INTO trip (depart_planet_id, destination_planet_id, ship_id, day_id, departure_time) VALUES( :depart_planet_id, :destination_planet_id, :ship_id, :day_id, :departure_time)
                    ON DUPLICATE KEY UPDATE 
                        depart_planet_id = VALUES(depart_planet_id),
                        destination_planet_id = VALUES(destination_planet_id),
                        ship_id = VALUES(ship_id);
                        day_id = VALUES(day_id),
                        departure_time = VALUES(departure_time);");

                    $stmt->execute([
                        ':depart_planet_id' => $planet['Id'],
                        ':destination_planet_id' => $trip['destination_planet_id'][0],
                        ':departure_time' => $trip['departure_time'][0],
                        ':ship_id' => $trip['ship_id'][0],
                        ':day_id' => $day
                    ]);
                }
            }
        }
    }
    public function create_url_planet($nom_fichier_image) {
        // Remplace les espaces
        $nom_fichier_image = str_replace(' ', '_', $nom_fichier_image);

        // Calcul du hash MD5 sur le nom de fichier modifié
        $md5_hash = md5($nom_fichier_image);

        //Creation de l'url
        $url = "https://static.wikia.nocookie.net/starwars/images/"
            . $md5_hash[0] . "/"
            . $md5_hash[0] . $md5_hash[1] . "/"
            . $nom_fichier_image;

        return $url;
    }


    public function print_planet($id){
        include("../include/connexion.php");

        // Requête préparée
        $query = "SELECT * FROM planet WHERE id = :id";

        // Créez une version de la requête avec la valeur de :id
        $query_with_value = str_replace(":id", $id, $query); // Remplace :id par la valeur réelle

        // Préparer et exécuter la requête
        $stmt = $cnx->prepare($query);
        $stmt->execute([":id" => $id]);

        // Ajouter la requête au log
        $this->add_log($query_with_value);

        // Récupérer les résultats
        $planet = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($planet) {
            echo "<h2>" . htmlspecialchars($planet['name']) . "</h2>";
            $image_url = $this->create_url_planet($planet['image']);
            echo "<img src='" . htmlspecialchars($image_url) . "' alt='Image de " . htmlspecialchars($planet['name']) . "'>";
            echo "<p><strong>Region:</strong> " . htmlspecialchars($planet['region']) . "</p>";
            echo "<p><strong>Sector:</strong> " . htmlspecialchars($planet['sector']) . "</p>";
        } else {
            echo "<p>Aucune planète trouvée avec cet ID.</p>";
        }
    }

    public function add_log($query){
        include("../include/connexion.php");

        // Récupérer la date actuelle
        $date = date('Y-m-d H:i:s');

        // Correction de la requête SQL en enlevant la parenthèse en trop
        $stmt = $cnx->prepare("INSERT INTO log (description, date) VALUES(:description, :date)");

        // Exécution de la requête avec les paramètres
        $stmt->execute(['description' => $query, 'date' => $date]);
    }

}

