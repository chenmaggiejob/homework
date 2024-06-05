<?php
function dd($data)
{
    echo "<pre>";
    print_r($data);
    echo "<//pre>";
}

class Fruit
{
    // Properties
    public $name;
    public $color;

    // Methods
    public function intro(){
        $nowName = $this->name ;
        $nowColor = $this->color;
        $introText = "Hello I'm $nowName - color $nowColor";
        echo "$introText <br>";
        // return $introText;
    }

    public function sell($data){
        $nowName = $this->name ;
        $nowColor = $this->color;
        $result = "$nowName - $nowColor -$data";
        echo "$result <br>";
        // return $introText;
    }
}


$apple = new Fruit();
$apple->name = 'apple';
$apple->color = 'red';
dd($apple);
$apple->intro();
$apple->sell(100);


$banana = new Fruit();
$banana->name = 'banana';
$banana->color = 'yellow';
dd($banana);
$banana->intro();
$banana->sell(500);
