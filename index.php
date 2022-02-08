<?php
    error_reporting(0);
    session_start();
    include("config/koneksi.php");

    global $koneksi;


    $laundry = $_GET['laundry'];

    if($laundry == 'peralatan'){

        $sql = mysqli_query($koneksi, "SELECT * FROM master_pengadaan WHERE TipePengada !='Perlengkapan'");

    while($row = mysqli_fetch_array($sql)){
        $hasil [] = array(
            'Kode' => $row ['Kode'],
            'TipePengada' => $row ['TipePengada'],
            "Nama" => $row ['Nama'],
            "Quantity" => $row ['Quantity'],
            "Harga" => $row ['Harga'],
            "Deskripsi" => $row ['Deskripsi'],
            "AkunDebet" => $row ['AkunDebet'],
            "Debet" => $row ['Debet'],
            "AkunKredit" => $row ['AkunKredit'],
            "Kredit" => $row ['Kredit'],
        );

    }
    
    echo json_encode($hasil);

    }elseif($laundry == 'perlengkapan'){

        $sql = mysqli_query($koneksi, "SELECT * FROM master_pengadaan WHERE TipePengada = 'Perlengkapan'");

    while($row = mysqli_fetch_array($sql)){
        $hasil [] = array(
            'Kode' => $row ['Kode'],
            'TipePengada' => $row ['TipePengada'],
            "Nama" => $row ['Nama'],
            "Quantity" => $row ['Quantity'],
            "Harga" => $row ['Harga'],
            "Deskripsi" => $row ['Deskripsi'],
            "AkunDebet" => $row ['AkunDebet'],
            "Debet" => $row ['Debet'],
            "AkunKredit" => $row ['AkunKredit'],
            "Kredit" => $row ['Kredit'],
        );

    }
    
    echo json_encode($hasil);
}elseif($laundry == 'masterperalatan'){

    $sql = mysqli_query($koneksi, "SELECT * FROM master_peralatan");

while($row = mysqli_fetch_array($sql)){
    $hasil [] = array(
        "KodePeralatan" => $row ['KodePeralatan'],
        "NamaPeralatan" => $row ['NamaPeralatan'],
        "DescPeralatan" => $row ['DescPeralatan'],
        "LokasiPeralatan" => $row ['LokasiPeralatan'],
        "GrupPeralatan" => $row ['GrupPeralatan'],
    );

}

echo json_encode($hasil);
}elseif($laundry == 'masterperlengkapan'){

    $sql = mysqli_query($koneksi, "SELECT * FROM master_perlengkapan");

while($row = mysqli_fetch_array($sql)){
    $hasil [] = array(
        "KodePerlengkapan" => $row ['KodePerlengkapan'],
        "NamaPerlengkapan" => $row ['NamaPerlengkapan'],
        "DescPerlengkapan" => $row ['DescPerlengkapan']
    );

}

echo json_encode($hasil);
}elseif($laundry == 'insertperalatan'){
    $kode_peralatan = $_POST ["kode_peralatan"];
    $tipe_pengadaan_peralatan = $_POST ["tipe_pengadaan_peralatan"];
    $nama_peralatan = $_POST ["nama_peralatan"];
    $qty_peralatan = $_POST ["qty_peralatan"];
    $harga_peralatan = $_POST ["harga_peralatan"];
    $deskripsi_peralatan = $_POST ["deskripsi_peralatan"];
    $nama_debet_peralatan = $_POST ["nama_debet_peralatan"];
    $nominal_debet_peralatan = $_POST ["nominal_debet_peralatan"];
    $nama_kredit_peralatan = $_POST ["nama_kredit_peralatan"];
    $nominal_kredit_peralatan = $_POST ["nominal_kredit_peralatan"];

    $insert = mysqli_query($koneksi, "INSERT INTO master_pengadaan (Kode,TipePengada,Nama,Quantity,Harga,Deskripsi,AkunDebet,Debet,AkunKredit,Kredit) VALUES ('$kode_peralatan', '$tipe_pengadaan_peralatan', '$nama_peralatan', '$qty_peralatan', '$harga_peralatan', '$deskripsi_peralatan', '$nama_debet_peralatan', '$nominal_debet_peralatan', '$nama_kredit_peralatan', '$nominal_kredit_peralatan')");
    if($insert){
        echo "insert_data_berhasil";
    }else{
        echo "insert_data_gagal";
    }
    

}elseif($laundry =='hapusperalatan'){
    $kode_peralatan = $_POST["kode_peralatan"];
    echo $kode_akun;

    $hapus = mysqli_query($koneksi, "DELETE FROM master_pengadaan WHERE Kode = '$kode_peralatan'");
    if($hapus){
        echo "Hapus_berhasil";
    }else{
        echo "Hapus_gagal";
    }

}elseif($laundry =='updateperalatan'){
    $kode_peralatan = $_POST['kode_peralatan'];
    $get_update_desc_peralatan = $_POST['get_update_desc_peralatan'];

    $update = mysqli_query($koneksi, "UPDATE master_pengadaan SET Deskripsi = '$get_update_desc_peralatan' WHERE Kode = '$kode_peralatan'");
    if($update){
        echo "update_berhasil";
    }else{
        echo "update_gagal";
    }
}elseif($laundry == 'insertperlengkapan'){
    $kode_perlengkapan = $_POST ["kode_perlengkapan"];
    $tipe_pengadaan_perlengkapan = $_POST ["tipe_pengadaan_perlengkapan"];
    $nama_perlengkapan = $_POST ["nama_perlengkapan"];
    $qty_perlengkapan = $_POST ["qty_perlengkapan"];
    $harga_perlengkapan = $_POST ["harga_perlengkapan"];
    $deskripsi_perlengkapan = $_POST ["deskripsi_perlengkapan"];
    $nama_debet_perlengkapan = $_POST ["nama_debet_perlengkapan"];
    $nominal_debet_perlengkapan = $_POST ["nominal_debet_perlengkapan"];
    $nama_kredit_perlengkapan = $_POST ["nama_kredit_perlengkapan"];
    $nominal_kredit_perlengkapan = $_POST ["nominal_kredit_perlengkapan"];

    $insert = mysqli_query($koneksi, "INSERT INTO master_pengadaan (Kode,TipePengada,Nama,Quantity,Harga,Deskripsi,AkunDebet,Debet,AkunKredit,Kredit) VALUES ('$kode_perlengkapan', '$tipe_pengadaan_perlengkapan', '$nama_perlengkapan', '$qty_perlengkapan', '$harga_perlengkapan', '$deskripsi_perlengkapan', '$nama_debet_perlengkapan', '$nominal_debet_perlengkapan', '$nama_kredit_perlengkapan', '$nominal_kredit_perlengkapan')");
    if($insert){
        echo "insert_data_berhasil";
    }else{
        echo "insert_data_gagal";
    }
}elseif($laundry =='hapusperlengkapan'){
    $kode_perlengkapan = $_POST["kode_perlengkapan"];
    echo $kode_akun;

    $hapus = mysqli_query($koneksi, "DELETE FROM master_pengadaan WHERE Kode = '$kode_perlengkapan'");
    if($hapus){
        echo "Hapus_berhasil";
    }else{
        echo "Hapus_gagal";
    }

}elseif($laundry =='updateperlengkapan'){
    $kode_perlengkapan = $_POST['kode_perlengkapan'];
    echo $get_update_desc_perlengkapan = $_POST['get_update_desc_perlengkapan'];

    $update = mysqli_query($koneksi, "UPDATE master_pengadaan SET Deskripsi = '$get_update_desc_perlengkapan' WHERE Kode = '$kode_perlengkapan'");
    if($update){
        echo "update_berhasil";
    }else{
        echo "update_gagal";
    }
    
}elseif($laundry == 'insertmasterperalatan'){
    $kode_mstring = $_POST ["kode_mstring"];
    $nama_mstring = $_POST ["nama_mstring"];
    $desc_mstring = $_POST ["desc_mstring"];
    $lokasi_mstring = $_POST ["lokasi_mstring"];
    $group_mstring = $_POST ["group_mstring"];


    $insert = mysqli_query($koneksi, "INSERT INTO master_peralatan (KodePeralatan,NamaPeralatan,DescPeralatan,LokasiPeralatan,GrupPeralatan) VALUES ('$kode_mstring', '$nama_mstring', '$desc_mstring', '$lokasi_mstring', '$group_mstring')");
    if($insert){
        echo "insert_data_berhasil";
    }else{
        echo "insert_data_gagal";
    }
}elseif($laundry =='hapusmasterperalatan'){
    $kode_master_peralatan = $_POST["kode_master_peralatan"];
    echo $kode_akun;

    $hapus = mysqli_query($koneksi, "DELETE FROM master_peralatan WHERE KodePeralatan = '$kode_master_peralatan'");
    if($hapus){
        echo "Hapus_berhasil";
    }else{
        echo "Hapus_gagal";
    }

}elseif($laundry =='updatemasterperalatan'){
    $update_masterkodeperalatan = $_POST['update_masterkodeperalatan'];
    $desc_master_peralatan = $_POST['desc_master_peralatan'];

    $update = mysqli_query($koneksi, "UPDATE master_peralatan SET DescPeralatan = '$desc_master_peralatan' WHERE KodePeralatan = '$update_masterkodeperalatan'");
    if($update){
        echo "update_berhasil";
    }else{
        echo "update_gagal";
    }
    
}elseif($laundry == 'insertmasterperlengkapan'){
    $kode_mstringP = $_POST ["kode_mstringP"];
    $nama_mstringP = $_POST ["nama_mstringP"];
    $desc_mstringP = $_POST ["desc_mstringP"];



    $insert = mysqli_query($koneksi, "INSERT INTO master_perlengkapan (KodePerlengkapan,NamaPerlengkapan,DescPerlengkapan) VALUES ('$kode_mstringP', '$nama_mstringP', '$desc_mstringP')");
    if($insert){
        echo "insert_data_berhasil";
    }else{
        echo "insert_data_gagal";
    }
}elseif($laundry =='hapusmasterperlengkapan'){
    $kode_master_perlengkapan = $_POST["kode_master_perlengkapan"];
    echo $kode_akun;

    $hapus = mysqli_query($koneksi, "DELETE FROM master_perlengkapan WHERE KodePerlengkapan = '$kode_master_perlengkapan'");
    if($hapus){
        echo "Hapus_berhasil";
    }else{
        echo "Hapus_gagal";
    }

}elseif($laundry =='updatemasterperlengkapan'){
    $update_masterkodeperlengkapan = $_POST['update_masterkodeperlengkapan'];
    $desc_master_perlengkapan = $_POST['desc_master_perlengkapan'];

    $update = mysqli_query($koneksi, "UPDATE master_perlengkapan SET DescPerlengkapan = '$desc_master_perlengkapan' WHERE KodePerlengkapan = '$update_masterkodeperlengkapan'");
    if($update){
        echo "update_berhasil";
    }else{
        echo "update_gagal";
    }
    
}elseif($laundry == 'jurnalumum'){

    $sql = mysqli_query($koneksi, "SELECT * FROM master_pengadaan");

while($row = mysqli_fetch_array($sql)){
    $hasil [] = array(
        "Kode_JU" => $row ['Kode'],
        "Harga_JU" => $row ['Harga'],
        "Deskripsi_JU" => $row ['Deskripsi'],
        "AkunDebet_JU" => $row ['AkunDebet'],
        "Debet_JU" => $row ['Debet'],
        "AkunKredit_JU" => $row ['AkunKredit'],
        "Kredit_JU" => $row ['Kredit'],
    );

}

echo json_encode($hasil);

//---------------------------------------------------------------------------------------------------------------------------
}elseif($laundry == 'nskas'){
    $sql = mysqli_query ($koneksi, "SELECT nomor_akun, nama_akun FROM master_akun WHERE nama_akun = 'Kas'");
    $sql1 = mysqli_query ($koneksi, "SELECT  SUM(Debet), Kode, AkunDebet FROM master_pengadaan WHERE AkunDebet = 'Kas'");
    $sql2 = mysqli_query ($koneksi, "SELECT  SUM(Kredit), Kode, AkunKredit FROM master_pengadaan WHERE AkunKredit = 'Kas'");
    while ($row1 = mysqli_fetch_array($sql1) and $row = mysqli_fetch_array($sql) and $row2 = mysqli_fetch_array($sql2)){

        $hasil [] = array (
            "nstotaldebitkas" => $row1 ['SUM(Debet)'],
            "nstotalkreditkas" => $row2 ['SUM(Kredit)'],
            "nsnomorakunkas" => $row ['nomor_akun'],
            "nsakundebitkas" => $row ['nama_akun'],
        );
    }echo json_encode($hasil);


}elseif($laundry == 'nshutang'){
    $sql = mysqli_query ($koneksi, "SELECT nomor_akun, nama_akun FROM master_akun WHERE nama_akun = 'Hutang'");
    $sql1 = mysqli_query ($koneksi, "SELECT SUM(Debet), Kode, AkunDebet FROM master_pengadaan WHERE AkunDebet = 'Hutang'");
    $sql2 = mysqli_query ($koneksi, "SELECT SUM(Kredit), Kode, AkunKredit FROM master_pengadaan WHERE AkunKredit = 'Hutang'");
    while ($row1 = mysqli_fetch_array($sql1) and $row = mysqli_fetch_array($sql) and $row2 = mysqli_fetch_array($sql2) ){

        $hasil [] = array (
            "nstotaldebithutang" => $row1 ['SUM(Debet)'],
            "nstotalkredithutang" => $row2 ['SUM(Kredit)'],
            "nsnomorakunhutang" => $row ['nomor_akun'],
            "nsakundebithutang" => $row ['nama_akun'],
        );
    }echo json_encode($hasil);


}elseif($laundry == 'nsmodal'){
    $sql = mysqli_query ($koneksi, "SELECT nomor_akun, nama_akun FROM master_akun WHERE nama_akun = 'Modal'");
    $sql1 = mysqli_query ($koneksi, "SELECT SUM(Kredit), Kode, AkunKredit FROM master_pengadaan WHERE AkunKredit = 'Modal'");
    $sql2 = mysqli_query ($koneksi, "SELECT SUM(Debet), Kode, AkunDebet FROM master_pengadaan WHERE AkunDebet = 'Modal'");
    while ($row1 = mysqli_fetch_array($sql1) and $row = mysqli_fetch_array($sql) and $row2 = mysqli_fetch_array($sql2)){

        $hasil [] = array (
            "nstotaldebitmodal" => $row2 ['SUM(Debet)'],
            "nstotalkreditmodal" => $row1 ['SUM(Kredit)'],
            "nsnomorakunmodal" => $row ['nomor_akun'],
            "nsakunkreditmodal" => $row ['nama_akun'],
        );
    }echo json_encode($hasil);


}elseif($laundry == 'nsperalatan'){
    $sql = mysqli_query ($koneksi, "SELECT nomor_akun, nama_akun FROM master_akun WHERE nama_akun = 'Peralatan'");
    $sql1 = mysqli_query ($koneksi, "SELECT SUM(Kredit), Kode, AkunKredit FROM master_pengadaan WHERE AkunKredit = 'Peralatan'");
    $sql2 = mysqli_query ($koneksi, "SELECT SUM(Debet), Kode, AkunDebet FROM master_pengadaan WHERE AkunDebet = 'Peralatan'");
    while ($row1 = mysqli_fetch_array($sql1) and $row = mysqli_fetch_array($sql) and $row2 = mysqli_fetch_array($sql2)){

        $hasil [] = array (
            "nstotaldebitperalatan" => $row2 ['SUM(Debet)'],
            "nstotalkreditperalatan" => $row1 ['SUM(Kredit)'],
            "nsnomorakunperalatan" => $row ['nomor_akun'],
            "nsakunkreditperalatan" => $row ['nama_akun'],
        );
    }echo json_encode($hasil);


}elseif($laundry == 'nsperlengkapan'){
    $sql = mysqli_query ($koneksi, "SELECT nomor_akun, nama_akun FROM master_akun WHERE nama_akun = 'Perlengkapan'");
    $sql1 = mysqli_query ($koneksi, "SELECT SUM(Kredit), Kode, AkunKredit FROM master_pengadaan WHERE AkunKredit = 'Perlengkapan'");
    $sql2 = mysqli_query ($koneksi, "SELECT SUM(Debet), Kode, AkunDebet FROM master_pengadaan WHERE AkunDebet = 'Perlengkapan'");
    while ($row1 = mysqli_fetch_array($sql1) and $row = mysqli_fetch_array($sql) and $row2 = mysqli_fetch_array($sql2)){

        $hasil [] = array (
            "nstotaldebitperlengkapan" => $row2 ['SUM(Debet)'],
            "nstotalkreditperlengkapan" => $row1 ['SUM(Kredit)'],
            "nsnomorakunperlengkapan" => $row ['nomor_akun'],
            "nsakunkreditperlengkapan" => $row ['nama_akun'],
        );
    }echo json_encode($hasil);


}elseif($laundry == 'nstotal'){
    $sql = mysqli_query ($koneksi, "SELECT SUM(Debet), SUM(Kredit) FROM master_pengadaan");
    while ($row = mysqli_fetch_array($sql)){

        $hasil [] = array (
            "nstotaldebittotal" => $row ['SUM(Debet)'],
            "nstotalkredittotal" => $row ['SUM(Kredit)']
        );
    }echo json_encode($hasil);


//------------------------------------------------------------------------------------------------------------------------------------

}elseif($laundry == 'bbdebitkas'){
    //$sql = mysqli_query ($koneksi, "SELECT * FROM master_akun WHERE nama_akun = 'Kas'");
    $sql1 = mysqli_query ($koneksi, "SELECT  Kode, Deskripsi, Debet FROM master_pengadaan WHERE AkunDebet  = 'Kas'");
    //$sql2 = mysqli_query ($koneksi, "SELECT Kode, Deskripsi, Kredit FROM master_pengadaan WHERE AkunKredit = 'Kas'");
    while ($row1 = mysqli_fetch_array($sql1) ){

        $hasil [] = array (
            "kodebbdebitkas" => $row1 ['Kode'],
            "descbbdebitkas" => $row1 ['Deskripsi'],
            "nominaldebitkas" => $row1 ['Debet'],
        );
    }echo json_encode($hasil);

}elseif($laundry == 'bbkreditkas'){
    //$sql = mysqli_query ($koneksi, "SELECT * FROM master_akun WHERE nama_akun = 'Kas'");
    //$sql1 = mysqli_query ($koneksi, "SELECT  Kode, Deskripsi, Debet FROM master_pengadaan WHERE AkunDebet  = 'Kas'");
    $sql2 = mysqli_query ($koneksi, "SELECT Kode, Deskripsi, Kredit FROM master_pengadaan WHERE AkunKredit = 'Kas'");
    while ($row2 = mysqli_fetch_array($sql2) ){

        $hasil [] = array (
            "kodebbkreditkas" => $row2 ['Kode'],
            "descbbkreditkas" => $row2 ['Deskripsi'],
            "nominalkreditkas" => $row2 ['Kredit'],

        );
    }echo json_encode($hasil);

}elseif($laundry == 'bbdebithutang'){
    //$sql = mysqli_query ($koneksi, "SELECT nomor_akun, nama_akun FROM master_akun WHERE nama_akun = 'Hutang'");
    $sql1 = mysqli_query ($koneksi, "SELECT Kode, Deskripsi, Debet FROM master_pengadaan WHERE AkunDebet = 'Hutang'");
    //$sql2 = mysqli_query ($koneksi, "SELECT Kode, Deskripsi, Kredit FROM master_pengadaan WHERE AkunKredit = 'Hutang'");
    while ($row1 = mysqli_fetch_array($sql1)){

        $hasil [] = array (
            "kodebbdebithutang" => $row1 ['Kode'],
            "descbbdebithutang" => $row1 ['Deskripsi'],
            "nominadebithutang" => $row1 ['Debet'],

        );
    }echo json_encode($hasil);

}elseif($laundry == 'bbkredithutang'){
    //$sql = mysqli_query ($koneksi, "SELECT nomor_akun, nama_akun FROM master_akun WHERE nama_akun = 'Hutang'");
    //$sql1 = mysqli_query ($koneksi, "SELECT Kode, Deskripsi, Debet FROM master_pengadaan WHERE AkunDebet = 'Hutang'");
    $sql2 = mysqli_query ($koneksi, "SELECT Kode, Deskripsi, Kredit FROM master_pengadaan WHERE AkunKredit = 'Hutang'");
    while ($row2 = mysqli_fetch_array($sql2)){

        $hasil [] = array (
            "kodebbkredithutang" => $row2 ['Kode'],
            "descbbkredithutang" => $row2 ['Deskripsi'],
            "nominakredithutang" => $row ['Debet'],

        );
    }echo json_encode($hasil);


}elseif($laundry == 'bbkreditmodal'){
    //$sql = mysqli_query ($koneksi, "SELECT nomor_akun, nama_akun FROM master_akun WHERE nama_akun = 'Modal'");
    $sql1 = mysqli_query ($koneksi, "SELECT Kode, Deskripsi, Kredit FROM master_pengadaan WHERE AkunKredit = 'Modal'");
    //$sql2 = mysqli_query ($koneksi, "SELECT SUM(Debet), Kode, AkunDebet FROM master_pengadaan WHERE AkunDebet = 'Modal'");
    while ($row1 = mysqli_fetch_array($sql1)){

        $hasil [] = array (
            "kodebbkreditmodal" => $row1 ['Kode'],
            "descbbkreditmodal" => $row1 ['Deskripsi'],
            "nominalkreditmodal" => $row1 ['Kredit'],

        );
    }echo json_encode($hasil);

}elseif($laundry == 'bbdebitmodal'){
    //$sql = mysqli_query ($koneksi, "SELECT nomor_akun, nama_akun FROM master_akun WHERE nama_akun = 'Modal'");
    $sql1 = mysqli_query ($koneksi, "SELECT Kode, Deskripsi, Debet FROM master_pengadaan WHERE AkunDebet = 'Modal'");
    //$sql2 = mysqli_query ($koneksi, "SELECT SUM(Debet), Kode, AkunDebet FROM master_pengadaan WHERE AkunDebet = 'Modal'");
    while ($row1 = mysqli_fetch_array($sql1)){

        $hasil [] = array (
            "kodebbdebitmodal" => $row1 ['Kode'],
            "descbbdebitmodal" => $row1 ['Deskripsi'],
            "nominaldebitmodal" => $row1 ['Debet'],

        );
    }echo json_encode($hasil);



}elseif($laundry == 'bbkreditperalatan'){
    //$sql = mysqli_query ($koneksi, "SELECT nomor_akun, nama_akun FROM master_akun WHERE nama_akun = 'Peralatan'");
    $sql1 = mysqli_query ($koneksi, "SELECT Kode, Deskripsi, Kredit FROM master_pengadaan WHERE AkunKredit = 'Peralatan'");
    while ($row1 = mysqli_fetch_array($sql1)){

        $hasil [] = array (
            

            "kodebbkreditperalatan" => $row1 ['Kode'],
            "descbbkreditperalatan" => $row1 ['Deskripsi'],
            "nominalkreditperalatan" => $row1 ['Kredit'],
        );
    }echo json_encode($hasil);


}elseif($laundry == 'bbdebitperalatan'){
    //$sql = mysqli_query ($koneksi, "SELECT nomor_akun, nama_akun FROM master_akun WHERE nama_akun = 'Peralatan'");
    $sql2 = mysqli_query ($koneksi, "SELECT Kode, Deskripsi, Debet FROM master_pengadaan WHERE AkunDebet = 'Peralatan'");
    while ($row2 = mysqli_fetch_array($sql2)){

        $hasil [] = array (
            "kodebbdebitperalatan" => $row2 ['Kode'],
            "descbbdebitperalatan" => $row2 ['Deskripsi'],
            "nominaldebitperalatan" => $row2 ['Debet'],

        );
    }echo json_encode($hasil);


}elseif($laundry == 'bbkreditperlengkapan'){
    //$sql = mysqli_query ($koneksi, "SELECT nomor_akun, nama_akun FROM master_akun WHERE nama_akun = 'Peralatan'");
    $sql1 = mysqli_query ($koneksi, "SELECT Kode, Deskripsi, Kredit FROM master_pengadaan WHERE AkunKredit = 'Peralatan'");
    while ($row1 = mysqli_fetch_array($sql1)){

        $hasil [] = array (
            

            "kodebbkreditperlengkapan" => $row1 ['Kode'],
            "descbbkreditperalengkapan" => $row1 ['Deskripsi'],
            "nominalkreditperlengkapan" => $row1 ['Kredit'],
        );
    }echo json_encode($hasil);


}elseif($laundry == 'bbdebitperlengkapan'){
    //$sql = mysqli_query ($koneksi, "SELECT nomor_akun, nama_akun FROM master_akun WHERE nama_akun = 'Peralatan'");
    $sql2 = mysqli_query ($koneksi, "SELECT Kode, Deskripsi, Debet FROM master_pengadaan WHERE AkunDebet = 'Peralatan'");
    while ($row2 = mysqli_fetch_array($sql2)){

        $hasil [] = array (
            "kodebbdebitperlengkapan" => $row2 ['Kode'],
            "descbbdebitperlengkapan" => $row2 ['Deskripsi'],
            "nominaldebitperlengkapan" => $row2 ['Debet'],

        );
    }echo json_encode($hasil);

//------------------------------------------------------------------------------------------------------------------------------

}elseif($laundry == 'bbtotaldebitkas'){
    $sql = mysqli_query ($koneksi, "SELECT SUM(Debet) FROM master_pengadaan WHERE AkunDebet='Kas'");
    while ($row = mysqli_fetch_array($sql)){

        $hasil [] = array (
            "bbtotaldebitkas" => $row ['SUM(Debet)'],
            //"bbtotalkreditkas" => $row ['SUM(Kredit)']
        );
    }echo json_encode($hasil);

}elseif($laundry == 'bbtotalkreditkas'){
    $sql = mysqli_query ($koneksi, "SELECT SUM(Kredit) FROM master_pengadaan WHERE AkunKredit='Kas'");
    while ($row = mysqli_fetch_array($sql)){

        $hasil [] = array (
            //"bbtotaldebitkas" => $row ['SUM(Debet)'],
            "bbtotalkreditkas" => $row ['SUM(Kredit)']
        );
    }echo json_encode($hasil);

}elseif($laundry == 'bbtotaldebithutang'){
    $sql = mysqli_query ($koneksi, "SELECT SUM(Debet) FROM master_pengadaan WHERE AkunDebet='Hutang'");
    while ($row = mysqli_fetch_array($sql)){

        $hasil [] = array (
            "bbtotaldebithutang" => $row ['SUM(Debet)'],
            //"bbtotalkreditkas" => $row ['SUM(Kredit)']
        );
    }echo json_encode($hasil);

}elseif($laundry == 'bbtotalkredithutang'){
    $sql = mysqli_query ($koneksi, "SELECT SUM(Kredit) FROM master_pengadaan WHERE AkunKredit='Modal'");
    while ($row = mysqli_fetch_array($sql)){

        $hasil [] = array (
            "bbtotaldebithutang" => $row ['SUM(Debet)'],
            //"bbtotalkreditkas" => $row ['SUM(Kredit)']
        );
    }echo json_encode($hasil);

}elseif($laundry == 'bbtotaldebitmodal'){
    $sql = mysqli_query ($koneksi, "SELECT SUM(Debet) FROM master_pengadaan WHERE AkunDebet='Modal'");
    while ($row = mysqli_fetch_array($sql)){

        $hasil [] = array (
            "bbtotaldebitmodal" => $row ['SUM(Debet)'],
            //"bbtotalkreditkas" => $row ['SUM(Kredit)']
        );
    }echo json_encode($hasil);

}elseif($laundry == 'bbtotalkreditmodal'){
    $sql = mysqli_query ($koneksi, "SELECT SUM(Kredit) FROM master_pengadaan WHERE AkunKredit='Modal'");
    while ($row = mysqli_fetch_array($sql)){

        $hasil [] = array (
            "bbtotalkreditmodal" => $row ['SUM(Kredit)'],
            //"bbtotalkreditkas" => $row ['SUM(Kredit)']
        );
    }echo json_encode($hasil);
}

