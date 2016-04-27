<?php

namespace exoHotels\DAO;

use exoHotels\Domain\Comment;

class CommentDAO extends DAO
{
  /**
     * @var \exoHotels\DAO\HotelDAO
     */
    private $hotelDAO;

    public function setHotelDAO(HotelDAO $hotelDAO) {
        $this->hotelDAO = $hotelDAO;
    }

    /**
     * Return a list of all comments for an hotel, sorted by class.
     *
     * @param integer $hotelId The hotel id.
     *
     * @return array A list of all comments for the hotel.
     */
    public function findAllByHotel($hotelId) {
        // The associated hotel is retrieved only once
        $hotel = $this->hotelDAO->find($hotelId);

        // hot_id is not selected by the SQL query
        // The hotel won't be retrieved during domain objet construction
        $sql = "SELECT com_id, com_content, com_author FROM t_comments WHERE hot_id=? ORDER BY com_id";
        $result = $this->getDb()->fetchAll($sql, array($hotelId));

        // Convert query result to an array of domain objects
        $comments = array();
        foreach ($result as $row) {
            $comId = $row['com_id'];
            $comment = $this->buildDomainObject($row);
            // The associated hotel is defined for the constructed comment
            $comment->setHotel($hotel);
            $comments[$comId] = $comment;
        }
        return $comments;
    }

    /**
     * Creates an Comment object based on a DB row.
     *
     * @param array $row The DB row containing Comment data.
     * @return \exoHotels\Domain\Comment
     */
    protected function buildDomainObject($row) {
        $comment = new Comment();
        $comment->setId($row['com_id']);
        $comment->setContent($row['com_content']);
        $comment->setAuthor($row['com_author']);

        if (array_key_exists('hot_id', $row)) {
            // Find and set the associated hotel
            $hotelId = $row['hot_id'];
            $hotel = $this->hotelDAO->find($hotelId);
            $comment->setHotel($hotel);
        }

        return $comment;
    }
}
