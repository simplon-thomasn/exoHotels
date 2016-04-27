<?php

namespace exoHotels\Domain;

class Comment
{
    /**
     * Comment id.
     *
     * @var integer
     */
    private $id;

    /**
     * Comment author.
     *
     * @var string
     */
    private $author;

    /**
     * Comment content.
     *
     * @var integer
     */
    private $content;

    /**
     * Associated hotel.
     *
     * @var \exoHotels\Domain\Hotel
     */
    private $hotel;

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getAuthor() {
        return $this->author;
    }

    public function setAuthor($author) {
        $this->author = $author;
    }

    public function getContent() {
        return $this->content;
    }

    public function setContent($content) {
        $this->content = $content;
    }

    public function getHotel() {
        return $this->hotel;
    }

    public function setHotel(Hotel $hotel) {
        $this->hotel = $hotel;
    }
}
