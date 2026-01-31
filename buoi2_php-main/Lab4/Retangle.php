<?php
class hinhchunhat{
    public $chieudai;
    public $chieurong;

    public function __construct($chieudai, $chieurong){
        $this->chieudai = $chieudai;
        $this->chieurong = $chieurong;
    }

    public function tinhDienTich(){
        return $this->chieudai * $this->chieurong;
    }

    public function tinhChuVi(){
        return 2 * ($this->chieudai + $this->chieurong);
    }
}

$hinhchunhat = new hinhchunhat(10, 5);
echo "Diện tích hình chữ nhật: " . $hinhchunhat->tinhDienTich() . "\n";
echo "Chu vi hình chữ nhật: " . $hinhchunhat->tinhChuVi() . "\n";
?>