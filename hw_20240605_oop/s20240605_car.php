<?php
function dd($data)
{
    echo "<pre>";
    print_r($data);
    echo "<//pre>";
}

//車子品牌
class Car 
{
    // Properties 屬性
    public $name;  //車子的品牌
    public $color; //車子的顏色

    // Methods 方法
    public function intro(){
        $nowName = $this->name ; //將這裡的車子名品 給nowName
        $nowColor = $this->color; //將這裡的顏色 給nowName
        $introText = "Hello I'm $nowName - color $nowColor"; 
        echo "$introText <br>"; 
        // return $introText;
    }

    //設定價格 
    public function sell($data){
        $nowName = $this->name ;
        $nowColor = $this->color;
        $result = "$nowName - $nowColor -$data";
        echo "$result <br>";
        // return $introText;
    }
}


$bmw = new Car(); //創建 bmw 車輛品牌物件
$bmw->name = 'BMW'; //  設定車名為 BMW
$bmw->color = 'Black'; // 設定車色為 黑色
dd($bmw); //輸出 bmw 的物件資訊
$bmw->intro(); // 呼叫 intro 這個function的方法，顯示 bmw 的資訊
$bmw->sell(100); // 呼叫 sell 這個function的方法，顯示 bmw 的賣價


$benz = new Car(); //創建 benz 車輪品牌物件
$benz->name = 'Benz'; //設定車名為 Benz
$benz->color = 'white'; // 設定車色為 白色
dd($benz); // 輸出 benz 的物件資訊
$benz->intro(); //呼叫 intro 這個function的方法，顯示 benz的資訊
$benz->sell(500); // 呼叫 sell 這個function的方法，顯示benz的賣價
