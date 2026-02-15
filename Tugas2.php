<?php
// ============================================
// KALKULATOR SUHU UNTUK PEMULA TOTAL
// HANYA PAKAI YANG PALING BASIC
// ============================================

// ============================================
// 1. TEMPAT NYIMPEN DATA (VARIABEL)
// ============================================

$angka_saya = "";      // buat nyimpen angka suhu
$dari_saya = "celsius";    // buat nyimpen unit asal
$ke_saya = "fahrenheit";   // buat nyimpen unit tujuan
$hasil_saya = "";      // buat nyimpen hasil hitung
$pesan_saya = "";      // buat nyimpen pesan buat user

// ============================================
// 2. CEK APAKAH USER UDAH KIRIM DATA
// ============================================

// Kalau user tekan tombol "hitung"
if (isset($_POST['tombol_hitung'])) {
    
    // Ambil data yang dikirim user
    $angka_saya = $_POST['angka_user'];
    $dari_saya = $_POST['dari_user'];
    $ke_saya = $_POST['ke_user'];
    
    // CEK 1: Apakah angka_saya kosong?
    if ($angka_saya == "") {
        $pesan_saya = "ERROR: Angkanya diisi dulu ya!";
    }
    // CEK 2: Apakah angka_saya bukan angka?
    else if (!is_numeric($angka_saya)) {
        $pesan_saya = "ERROR: Harus angka, jangan huruf!";
    }
    // KALAU SEMUA OK, LANJUT HITUNG
    else {
        // ============================================
        // 3. RUMUS-RUMUS KONVERSI (PAKAI IF DOANG)
        // ============================================
        
        // ========== CELSIUS KE ==========
        // Celsius ke Fahrenheit
        if ($dari_saya == "celsius" && $ke_saya == "fahrenheit") {
            $hasil_saya = ($angka_saya * 9/5) + 32;
            $pesan_saya = "Hasil: $angka_saya °C = " . round($hasil_saya, 2) . " °F";
        }
        // Celsius ke Kelvin
        else if ($dari_saya == "celsius" && $ke_saya == "kelvin") {
            $hasil_saya = $angka_saya + 273.15;
            $pesan_saya = "Hasil: $angka_saya °C = " . round($hasil_saya, 2) . " K";
        }
        // Celsius ke Reamur
        else if ($dari_saya == "celsius" && $ke_saya == "reamur") {
            $hasil_saya = $angka_saya * 4/5;
            $pesan_saya = "Hasil: $angka_saya °C = " . round($hasil_saya, 2) . " °Ré";
        }
        
        // ========== FAHRENHEIT KE ==========
        // Fahrenheit ke Celsius
        else if ($dari_saya == "fahrenheit" && $ke_saya == "celsius") {
            $hasil_saya = ($angka_saya - 32) * 5/9;
            $pesan_saya = "Hasil: $angka_saya °F = " . round($hasil_saya, 2) . " °C";
        }
        // Fahrenheit ke Kelvin
        else if ($dari_saya == "fahrenheit" && $ke_saya == "kelvin") {
            $hasil_saya = ($angka_saya - 32) * 5/9 + 273.15;
            $pesan_saya = "Hasil: $angka_saya °F = " . round($hasil_saya, 2) . " K";
        }
        // Fahrenheit ke Reamur
        else if ($dari_saya == "fahrenheit" && $ke_saya == "reamur") {
            $hasil_saya = ($angka_saya - 32) * 4/9;
            $pesan_saya = "Hasil: $angka_saya °F = " . round($hasil_saya, 2) . " °Ré";
        }
        
        // ========== KELVIN KE ==========
        // Kelvin ke Celsius
        else if ($dari_saya == "kelvin" && $ke_saya == "celsius") {
            $hasil_saya = $angka_saya - 273.15;
            $pesan_saya = "Hasil: $angka_saya K = " . round($hasil_saya, 2) . " °C";
        }
        // Kelvin ke Fahrenheit
        else if ($dari_saya == "kelvin" && $ke_saya == "fahrenheit") {
            $hasil_saya = ($angka_saya - 273.15) * 9/5 + 32;
            $pesan_saya = "Hasil: $angka_saya K = " . round($hasil_saya, 2) . " °F";
        }
        // Kelvin ke Reamur
        else if ($dari_saya == "kelvin" && $ke_saya == "reamur") {
            $hasil_saya = ($angka_saya - 273.15) * 4/5;
            $pesan_saya = "Hasil: $angka_saya K = " . round($hasil_saya, 2) . " °Ré";
        }
        
        // ========== REAMUR KE ==========
        // Reamur ke Celsius
        else if ($dari_saya == "reamur" && $ke_saya == "celsius") {
            $hasil_saya = $angka_saya * 5/4;
            $pesan_saya = "Hasil: $angka_saya °Ré = " . round($hasil_saya, 2) . " °C";
        }
        // Reamur ke Fahrenheit
        else if ($dari_saya == "reamur" && $ke_saya == "fahrenheit") {
            $hasil_saya = ($angka_saya * 9/4) + 32;
            $pesan_saya = "Hasil: $angka_saya °Ré = " . round($hasil_saya, 2) . " °F";
        }
        // Reamur ke Kelvin
        else if ($dari_saya == "reamur" && $ke_saya == "kelvin") {
            $hasil_saya = ($angka_saya * 5/4) + 273.15;
            $pesan_saya = "Hasil: $angka_saya °Ré = " . round($hasil_saya, 2) . " K";
        }
        
        // ========== UNIT SAMA ==========
        else if ($dari_saya == $ke_saya) {
            $hasil_saya = $angka_saya;
            $pesan_saya = "Hasil: $angka_saya °$dari_saya = $angka_saya °$ke_saya (sama aja)";
        }
    }
}

// Kalau user tekan tombol "reset"
if (isset($_POST['tombol_reset'])) {
    $angka_saya = "";
    $dari_saya = "celsius";
    $ke_saya = "fahrenheit";
    $hasil_saya = "";
    $pesan_saya = "";
}
?>

<!-- ============================================
     4. BAGIAN HTML (TAMPILAN)
     ============================================ -->

<!DOCTYPE html>
<html>
<head>
    <title>Kalkulator Suhu Pemula</title>
    <style>
        /* CSS dikit biar nggak jelek banget */
        body {
            font-family: Arial;
            background: #f0f0f0;
            padding: 20px;
        }
        .kotak {
            background: white;
            width: 400px;
            margin: auto;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px gray;
        }
        h1 {
            color: #333;
            text-align: center;
            font-size: 22px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input, select {
            width: 100%;
            padding: 8px;
            border: 2px solid #ccc;
            border-radius: 5px;
        }
        button {
            background: #4CAF50;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            width: 100%;
            margin-bottom: 5px;
            cursor: pointer;
        }
        button.reset {
            background: #f44336;
        }
        .hasil {
            margin-top: 20px;
            padding: 15px;
            background: #e3f2fd;
            border-left: 5px solid #2196F3;
        }
        .error {
            background: #ffebee;
            border-left-color: #f44336;
        }
        .info {
            background: #e8f5e8;
            padding: 10px;
            margin-top: 20px;
            font-size: 13px;
            border-radius: 5px;
        }
    </style>
</head>
<body>

<div class="kotak">
    <h1>🌡️ KALKULATOR SUHU</h1>
    <p style="text-align:center">Untuk yang baru belajar PHP</p>
    
    <!-- FORM INPUT -->
    <form method="post">
        <div class="form-group">
            <label>Masukkan Angka:</label>
            <input type="number" step="any" name="angka_user" 
                   value="<?php echo $angka_saya; ?>">
            <small>Contoh: 100 atau 36.5</small>
        </div>
        
        <div class="form-group">
            <label>Dari:</label>
            <select name="dari_user">
                <option value="celsius" <?php if($dari_saya=="celsius") echo "selected"; ?>>Celsius (°C)</option>
                <option value="fahrenheit" <?php if($dari_saya=="fahrenheit") echo "selected"; ?>>Fahrenheit (°F)</option>
                <option value="kelvin" <?php if($dari_saya=="kelvin") echo "selected"; ?>>Kelvin (K)</option>
                <option value="reamur" <?php if($dari_saya=="reamur") echo "selected"; ?>>Reamur (°Ré)</option>
            </select>
        </div>
        
        <div class="form-group">
            <label>Ke:</label>
            <select name="ke_user">
                <option value="celsius" <?php if($ke_saya=="celsius") echo "selected"; ?>>Celsius (°C)</option>
                <option value="fahrenheit" <?php if($ke_saya=="fahrenheit") echo "selected"; ?>>Fahrenheit (°F)</option>
                <option value="kelvin" <?php if($ke_saya=="kelvin") echo "selected"; ?>>Kelvin (K)</option>
                <option value="reamur" <?php if($ke_saya=="reamur") echo "selected"; ?>>Reamur (°Ré)</option>
            </select>
        </div>
        
        <button type="submit" name="tombol_hitung">HITUNG</button>
        <button type="submit" name="tombol_reset" class="reset">RESET</button>
    </form>
    
    <!-- TEMPAT HASIL -->
    <?php if ($pesan_saya != ""): ?>
        <div class="hasil <?php if (substr($pesan_saya,0,5)=="ERROR") echo "error"; ?>">
            <strong><?php echo $pesan_saya; ?></strong>
        </div>
    <?php endif; ?>
    
    <!-- INFO SEDERHANA -->
    <div class="info">
        <strong>📌 CARA PAKAI:</strong>
        <ol style="margin-top:5px; margin-bottom:5px;">
            <li>Isi angka (pakai titik koma koma, contoh: 36.5)</li>
            <li>Pilih dari unit apa</li>
            <li>Pilih ke unit apa</li>
            <li>Klik HITUNG</li>
        </ol>
    </div>
    
    <!-- CONTOH-CONTOH -->
    <div class="info">
        <strong>📝 CONTOH:</strong><br>
        100°C ke °F = 212°F<br>
        212°F ke °C = 100°C<br>
        0°C ke K = 273.15K<br>
        80°Ré ke °C = 100°C
    </div>
    
    <!-- STATUS VARIABEL (BUAT BELAJAR) -->
    <div class="info">
        <strong>🔍 STATUS VARIABEL:</strong><br>
        $angka_saya = <?php echo $angka_saya ? $angka_saya : '(kosong)'; ?><br>
        $dari_saya = <?php echo $dari_saya; ?><br>
        $ke_saya = <?php echo $ke_saya; ?><br>
        $hasil_saya = <?php echo $hasil_saya ? $hasil_saya : '(kosong)'; ?><br>
        $pesan_saya = <?php echo $pesan_saya ? $pesan_saya : '(kosong)'; ?>
    </div>
</div>

</body>
</html>