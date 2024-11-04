<?php

class Planet {
    private int $id;
    private string $name;
    private $image;
    private $coord;

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

    public function add_planet($planet) {
        include("../include/connexion.php");

        // Préparation de la requête d'insertion ou de mise à jour
          $stmt = $cnx->prepare("INSERT INTO planet (
            Name, Image, Coord, X, Y, SubGridCoord, SubGridX, SubGridY, 
            SunName, Region, Sector, Suns, Moons, Position, Distance, 
            LengthDay, LengthYear, Diameter, Gravity) 
        VALUES (
            :name, :image, :coord, :x, :y, :subGridCoord, :subGridX, 
            :subGridY, :sunName, :region, :sector, :suns, :moons, 
            :position, :distance, :lengthDay, :lengthYear, :diameter, :gravity)
        ON DUPLICATE KEY UPDATE 
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
}

