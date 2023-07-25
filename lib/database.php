    <?php

    

    class Database {

        private $conn;
        public function __construct() {
            include_once("../config.php");
            $this->conn = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

            if ($this->conn->connect_error) {
                die("Connection failed: " . $this->conn->connect_error);
            }
        }
        public function select($sql_prompt) {
            $result = mysqli_query($this->conn, $sql_prompt);

            if (!$result) {
                die("Query failed: " . mysqli_error($this->conn));
            }

            $data = array();
            while ($row = mysqli_fetch_assoc($result)) {
                $data[] = $row;
            }

            return $data;
        }

        public function query($sql_prompt) {
            $result = $this->conn->query($sql_prompt);
        
            if (!$result) {
                echo "An error occurred. Please try again later.";
            }
        
            return $result;
        }

        public function closeConnection() {
            mysqli_close($this->conn);
        }
    }

    ?>
