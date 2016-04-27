<?php

namespace exoHotels\DAO;

use exoHotels\Domain\Hotel;

class HotelDAO extends DAO
{
    /**
     * Return a list of all hotels, sorted by class (better class first).
     *
     * @return array A list of all hotels.
     */
    public function findAll() {
        $sql = "SELECT * FROM t_hotels ORDER BY hot_class DESC";
        $result = $this->getDb()->fetchAll($sql);

        // Convert query result to an array of domain objects
        $hotels = array();
        foreach ($result as $row) {
            $hotelId = $row['hot_id'];
            $hotels[$hotelId] = $this->buildDomainObject($row);
        }

        return $hotels;
    }

    /**
     * Returns an hotel matching the supplied id.
     *
     * @param integer $id
     *
     * @return \exoHotels\Domain\Hotel|throws an exception if no matching hotel is found
     */
    public function find($id) {
        $sql = "SELECT * FROM t_hotels WHERE hot_id=?";
        $row = $this->getDb()->fetchAssoc($sql, array($id));

        if ($row)
            return $this->buildDomainObject($row);
        else
            throw new \Exception("Nous ne trouvons pas d'hotel pour cet id " . $id);
    }

    /**
     * Creates an Hotel object based on a DB row.
     *
     * @param array $row The DB row containing Hotel data.
     * @return \exoHotels\Domain\Hotel
     */
    protected function buildDomainObject(array $row) {
        $hotel = new Hotel();
        $hotel->setId($row['hot_id']);
        $hotel->setName($row['hot_name']);
        $hotel->setAddress($row['hot_address']);
        $hotel->setClass($row['hot_class']);

        return $hotel;
    }
}
