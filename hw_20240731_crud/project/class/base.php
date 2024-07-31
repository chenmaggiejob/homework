<?php
class DB
{
    public $name;
    protected $table;
    protected $conn;

    protected $dsn = "mysql:host=localhost;charset=utf8;dbname=test0722";

    public function __construct($table)
    {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "test0722";

        $this->table = $table;
        $this->conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    }

    public function getAll()
    {
        $sql = "SELECT * FROM `$this->table`";
        $data = $this->conn->query($sql)->fetchAll(2);
        return $data;
    }

    public function getAllSetRank()
    {
        $sql = "SELECT * FROM `$this->table`";
        $data = $this->conn->query($sql)->fetchAll(2);
        $tmp = $data;
        foreach ($data as $key => $value) {
            if ($value['id'] >= 5) {
                $tmp[$key]['rank'] = 2;
            } else {
                $tmp[$key]['rank'] = 1;
            }
        }
        return $tmp;
    }

    //清洗資料
    public function rollbackFun()
    {
        $sql = "TRUNCATE TABLE `test0722`.`teachers`";
        $this->conn->query($sql);

        $sql = "INSERT INTO 
                    `teachers` (`id`, `name`, `mobile`) 
                VALUES 
                    (NULL, 'john', '0911-111-111'),
                    (NULL, 'amy', '0922-222-222'),
                    (NULL, 'bob', '0933-333-333');";
        $this->conn->exec($sql);
        header('Location: http://localhost/');
        exit();
    }

    //add
    public function store($data)
    {
        $sql = "INSERT INTO 
                    `teachers` (`id`, `name`, `mobile`) 
                VALUES 
                    (NULL, '{$data['name']}', '{$data['mobile']}'),";
        $this->conn->exec($sql);
    }
}
