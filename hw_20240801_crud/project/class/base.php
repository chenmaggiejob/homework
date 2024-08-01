<?php
class DB
{
    // public $name;
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
    //取單筆資料
    public function getbyID($id)
    {
        $sql = "SELECT * FROM `$this->table` WHERE `id` = $id";
        return $this->conn->query($sql)->fetch(2);
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

    //add
    public function store($data)
    {
        $sql = "INSERT INTO 
                `$this->table` (`id`, `name`, `mobile`) 
            VALUES 
                (NULL, '{$data['name']}', '{$data['mobile']}')";
        // echo $sql;
        $this->conn->exec($sql);
        header('Location: http://localhost/');
        exit();
    }

    public function update($data)
    {
        $id = $data['id'];
        $sql = "UPDATE `$this->table` SET `name` = '{$data['name']}', `mobile` = '{$data['mobile']}' WHERE `$this->table`.`id` = $id;";
        // echo $sql;
        $this->conn->exec($sql);
        header('Location:http://localhost');
    }

    public function del($id)
    {
        $sql = "DELETE FROM `$this->table` WHERE `$this->table`.`id` = $id";
        echo $sql;
        $this->conn->exec($sql);
        header('Location: http://localhost');
        exit();
    }

    //清洗資料
    public function rollbackFun()
    {
        $sql = "TRUNCATE TABLE `test0722`.`$this->table`";
        $this->conn->query($sql);

        $sql = "INSERT INTO 
                    `$this->table` (`id`, `name`, `mobile`) 
                VALUES 
                    (NULL, 'john', '0911-111-111'),
                    (NULL, 'amy', '0922-222-222'),
                    (NULL, 'bob', '0933-333-333');";
        $this->conn->exec($sql);
        header('Location: http://localhost/');
        exit();
    }
}

function dd($data)
{
    echo "<pre>";
    print_r($data);
    echo "</pre>";
}
