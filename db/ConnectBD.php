<?
class DataBase{
    private $conn;//я не шарю че он за тип данных

    public function __construct($host, $user, $password, $database)
    {
        $this->conn = mysqli_connect($host, $user, $password, $database);
        if (!$this->conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
    }

    public function query($sql)//и это тоже, ой да ну их, и без этого норм как то
    {
        return mysqli_query($this->conn, $sql);
    }

    public function close()
    {
        mysqli_close($this->conn);
    }
}