<?php 
class nilai{
    public $nama;
    public $kelas;
    public $matkul;
    public $nilai;
    public $status;
    public function status($nilai){
        if($nilai >= 60){
            return "lulus";
        }else{
            return "tidak lulus";
        }
    }
}
 $data = [
    'namaMahasiswa'=>["Aditya", "Shinta", "Ineu", "Agus"],
    'kelas'=>"SI 2",
    'matkul'=>"PBO",
    'nilai'=>["80", "73", "55", "80"],
 ];

 $nil = new nilai();
 $nil->nama = $data['namaMahasiswa'];
 $nil->kelas = $data['kelas'];
 $nil->matkul = $data['matkul'];
 $nil->nilai = $data['nilai'];

 for($x = 0;$x < count($data['namaMahasiswa']);
 $x++){
    echo "Nama: " .$nil->nama[$x]. "<br>";
    echo "Kelas: " .$nil->kelas. "<br>";
    echo "Matkul: " .$nil->matkul. "<br>";
    echo "Nilai: " .$nil->nilai[$x]. "<br>";
    echo "Status: ". 
$nil->status($nil->nilai[$x]). "<br><br>";
 }
 ?>

