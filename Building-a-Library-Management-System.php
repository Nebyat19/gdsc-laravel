<?php 
class LibraryItem {
    private $title;
    private $author;
    private $available;

    public function __construct($title, $author) {
        $this->title = $title;
        $this->author = $author;
        $this->available = true;
    }

    public function getTitle() {
        return $this->title;
    }

    public function setTitle($title) {
        $this->title = $title;
    }

    public function getAuthor() {
        return $this->author;
    }

    public function setAuthor($author) {
        $this->author = $author;
    }

    public function isAvailable() {
        return $this->available;
    }

    public function checkOut() {
        if ($this->available) {
            $this->available = false;
            echo "Item '{$this->title}' checked out successfully.";
        } else {
            echo "Item '{$this->title}' is not available for checkout.";
        }
    }

    public function checkIn() {
        if (!$this->available) {
            $this->available = true;
            echo "Item '{$this->title}' checked in successfully.";
        } else {
            echo "Item '{$this->title}' is already available.";
        }
    }
}

class Book extends LibraryItem {
    private $isbn;

    public function __construct($title, $author, $isbn) {
        parent::__construct($title, $author);
        $this->isbn = $isbn;
    }

    public function getISBN() {
        return $this->isbn;
    }

    public function setISBN($isbn) {
        $this->isbn = $isbn;
    }
}

class DVD extends LibraryItem {
    private $duration;

    public function __construct($title, $author, $duration) {
        parent::__construct($title, $author);
        $this->duration = $duration;
    }

    public function getDuration() {
        return $this->duration;
    }

    public function setDuration($duration) {
        $this->duration = $duration;
    }
}

// Create instances of Book and DVD
$book = new Book("The Great Gatsby", "F. Scott Fitzgerald", "978-3-16-148410-0");
$dvd = new DVD("Inception", "Christopher Nolan", "2 hours 28 minutes");

// Test check-out and check-in functionality
$book->checkOut(); // Item 'The Great Gatsby' checked out successfully.
$book->checkOut(); // Item 'The Great Gatsby' is not available for checkout.

$dvd->checkOut(); // Item 'Inception' checked out successfully.
$dvd->checkIn(); // Item 'Inception' checked in successfully.
$dvd->checkIn(); // Item 'Inception' is already available.
