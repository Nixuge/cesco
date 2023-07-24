    <?php

    include_once("db_connect.php");

    class Database {

        private $conn;
        public function __construct() {
            global $conn;
            $this->conn = $conn;
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

        public function query($sql_prompt){
            return(!!$this->conn->query($sql_prompt));
        }

        public function closeConnection() {
            mysqli_close($this->conn);
        }
    }

    ?>
