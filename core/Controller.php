<?php
class Controller
{
    // Fungsi untuk me-load view dan mengirim data ke view
    public function view($view, $data = [])
    {
        extract($data);
        require "views/$view.php";
    }
}
?>