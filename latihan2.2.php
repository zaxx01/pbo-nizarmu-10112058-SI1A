<?php

class belanja { //ini adalah class belanja
    public string  $namaPembeli = "Gorgon Pembasmi Suki";
    public string $namaBarang = "kenalpot hytam legam icikiwir";
    public int $hargaBarang = 5000 ; //ini variable harga barang dengan tipe data integer
    public int $jumlahBarang = 3; //ini variable jumlah barang 
    public float $TotalBayar; //ini variable total bayar dari belanjaan
    public float $Diskon = 0.2; //ini variable diskon belanja


    public float $pajak = 0.02; //ini variable pajak 

    public function __construct ($namaPembeli){ //Method
        $this->namaPembeli = $namaPembeli;
    }

    public function hitungTotal(): float //local variable(letaknya ada dalam method)
    
    {
        $subtotal = $this->hargaBarang * $this->jumlahBarang; //operator aritmatika

        return $subtotal;
    } 
    public function hitungDiskon(): float //local variable(letaknya ada dalam method)
    
    {
        $subtotal = $this->Diskon * $this->hitungTotal(); //

        return $subtotal;
    } 
    public function tampilRincian ($namaPembeli): void{  //method
        echo "Nama pembeli : " . $this->namaPembeli . "<br>";
        echo "Nama Barang : " . $this->namaBarang . "<br>";
        echo "Harga Barang : " . $this->hargaBarang . "<br>";
        echo "Jumlah Barang : " . $this->jumlahBarang . "<br>";
        echo "Total Bayar : " . $this->hitungTotal() . "<br>";
       echo "Diskon : " . ($this->hitungTotal() - $this->hitungDiskon());

    

    }
    
}

$belanja1 = new belanja(namaPembeli: "Gorgon"); //Objek
$belanja1->tampilRincian(namaPembeli: $belanja1->namaPembeli);

?>