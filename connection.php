<?php
    class connection {
        private $server_name = "website";
        private $database = "id16449405_nghiquan";
        private $user_name = "root";
        private $password = "";
        private $conn;

        function open() {
            $this->conn = mysqli_connect($this->server_name, $this->user_name, $this->password, $this->database);
            mysqli_set_charset($this->conn, 'UTF8');
            return $this->conn;
        }
        function check() {
            if (!$this->open()) {
                die("Connection failed: " . mysqli_connect_error());
            }
        }
        function close() {
            return mysqli_close($this->open());
        }
    }
