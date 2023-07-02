<?php 
class HeaderComponent {
    private $title;

    public function __construct($title) {
        $this->title = $title;
    }

    public function render() {
        $title = $this->title;
        if(!isset($_SESSION)){ session_start(); }
        include 'element.php';
    }
}
