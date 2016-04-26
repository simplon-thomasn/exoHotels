<?php

namespace exoHotels\DAO;

use Doctrine\DBAL\Connection;
use exoHotels\Domain\Hotel;

class HotelDAO
{
    /**
     * Database connection
     *
     * @var \Doctrine\DBAL\Connection
     */
    private $db;

    /**
     * Constructor
     *
     * @param \Doctrine\DBAL\Connection The database connection object
     */
    public function __construct(Connection $db) {
        $this->db = $db;
    }

    /**
     * Return a list of all hotels, sorted by class (most class first).
     *
     * @return array A list of all hotels.
     */
    public function findAll() {
        $sql = "SELECT * FROM t_hotels ORDER BY hot_class DESC";
        $result = $this->db->fetchAll($sql);

        // Convert query result to an array of domain objects
        $hotels = array();
        foreach ($result as $row) {
            $hotelId = $row['hot_id'];
            $hotels[$hotelId] = $this->buildHotel($row);
        }

        return $hotels;
    }

    /**
     * Creates an Hotel object based on a DB row.
     *
     * @param array $row The DB row containing Hotel data.
     * @return \exoHotels\Domain\Hotel
     */
    private function buildHotel(array $row) {
        $hotel = new Hotel();
        $hotel->setId($row['hot_id']);
        $hotel->setName($row['hot_name']);
        $hotel->setAddress($row['hot_address']);
        $hotel->setClass($row['hot_class']);
        
        return $hotel;
    }
}
