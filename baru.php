<?php  
session_start();
if (!isset($_SESSION['username']))
header("location: login.php")
?> 

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
	<meta name="author" content="AdminKit">
	<meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

	<link rel="shortcut icon" href="icon.png" />

	<title>Input-Exim</title>
    <meta http-equiv="refresh" content="" />
	<link href="css/app.css" rel="stylesheet">
</head>

<?php  
  
// $url = $_SERVER['REQUEST_URI'];  
  
// header("Refresh: 30; ");  
  
?> 
<body>



		<div class="main">
			<nav class="navbar navbar-expand navbar-light navbar-bg" style="padding:10px;">
         
				<a class="sidebar-toggle d-flex">
          <i class=" align-self-center" ></i>
          <span class="align-middle"><img src="icon.png"  width="30" height="30"></span>
          <h1 style="font-family: sans-serif;color:white;position:relative;top:0px;right:-5px;font-size:24px;"><b> PACKING</b></h1>
 		  <h1 style="font-family: inherit;color:white;position:relative;top:4px;right:-1060px;font-size:19px;" id="jam"><b></b></h1> 
           
        </a>


				<div class="navbar-collapse collapse">
					<ul class="navbar-nav navbar-align">

                    <?php

setlocale(LC_TIME, 'id_ID.utf8');

$hariIni = new DateTime();

# lokalisasi tidak berpengaruh
echo $hariIni->format('l F Y') . '<br>';

?>	
						
				</div>
			</nav>
    <main>
   
       

 
    <form id="in-bar" method="GET" action="" class="fill-barcode">
			<p style="margin-left: 2%;">
            <center><h1>SCAN HERE</h1></center>
				<center><input style="position:relative;background-color:transparent;border-radius:5px;width:300px;height:35px;" type="text" name="input_stock" placeholder=" Input Case" autofocus ></center>
                <div id="toggle" onclick="showHide();"></div>
			</p>
			<td><input type="submit" name="kirim1" value="OK" hidden=""></td>

            <?php
            include 'koneksi.php';
           

                    ?>
           

    <?php
        include "koneksi.php";
        $set_jam = '60'; 
			$set_menit = '04'; ///untuk setting selisih 4 menit 
			$waktu_indonesia = time() + (60 * 60 * 7) ;
			$waktu_yamaha = time() + (60 * 60 * -1) + (60 * 120) ;
			$tanggal_yamaha_def = gmdate('Y-m-d', $waktu_yamaha);
			$jam_ori = gmdate('H:i:s', $waktu_indonesia);
			$jam_oriw = gmdate('H:i', $waktu_indonesia);
			$tanggal_oriw = gmdate('Y-m-d', $waktu_indonesia);
			$nama_tahun = gmdate('Y', $waktu_indonesia);
			$hari=gmdate('D', $waktu_indonesia);
			$nama_bulan = gmdate('M-Y', $waktu_indonesia);
			$nama_tgl = gmdate('d-m-y', $waktu_indonesia);
			$nama_hari=gmdate('D', $waktu_indonesia);
			$tanggal_home=gmdate(', d/m/Y  H:i:s', $waktu_indonesia);
			$bulan_nama2 = gmdate('m', $waktu_indonesia);
			 $jam_ori1 = gmdate('H:i', $waktu_indonesia);
			 $nows = strtotime(date('Y-m-d'));
			 $tanggal_kemarin = date('Y-m-d',strtotime('-1 day',$nows));
    ?>
    
    <?php
    include "koneksifas.php";
    include "koneksi.php";
    $ceklocactasli = '-';
    $getusername = $_SESSION['username'];
    if(isset($_GET['kirim1'])){
        $input = $_GET['input_stock'];
        $order_no  = substr($input,0,6); 
        $lot  = substr($input,6,3);
        $case_no  = substr($input,9,3); 

        

        





        if (strlen($input) == 13)  {
            $cekjumlah_data = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM tb_sp_progress "));
            echo $cekjumlah_data;
            if($cekjumlah_data == '0'){
                $ambilmodel = mysqli_query($koneksifas, "SELECT * FROM tb_fas");
                while($ambilmodelfas = mysqli_fetch_array($ambilmodel)){ 
                    $cekmodelfas= $ambilmodelfas['ckd_set_no'];
                } 
                mysqli_query($koneksi, "INSERT INTO tb_sp_progress (tgl,order_no,model,lot,casemark,case_no,jam,pengguna) VALUES ('$tanggal_oriw','$order_no','$cekmodelfas','$lot','$input','$case_no','$jam_ori','$getusername')");
            }
            else{

                    $ceklot = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM tb_sp_progress WHERE  order_no = '$order_no' and lot = '$lot'  "));
                    if( $ceklot == ''){
                        echo '<script>alert("No!")</script>';
                        echo '<META HTTP-EQUIV="Refresh" Content="0; URL=inde.php ">'; 
                    }else{
                        $ambilmodel = mysqli_query($koneksifas, "SELECT * FROM tb_fas");
                                while($ambilmodelfas = mysqli_fetch_array($ambilmodel)){ 
                                    $cekmodelfas= $ambilmodelfas['ckd_set_no'];
                                } 
                                mysqli_query($koneksi, "INSERT INTO tb_sp_progress (tgl,order_no,model,lot,casemark,case_no,jam,pengguna) VALUES ('$tanggal_oriw','$order_no','$cekmodelfas','$lot','$input','$case_no','$jam_ori','$getusername')");
                    }
               
           
                }
        
    
            
        }
            
        elseif (strlen($input) >= 2 && strlen($input) < 4 )  {
                mysqli_query($koneksi, "UPDATE tb_sp_progress SET loc_input='$input'");
        }
}
    
                
    ?>

        </form>
        <center><button class="imga" style="position:relative;height:150px;width:270px;border-radius:10px;color:white;"><a href="#" ><h2 style="color:white;">STOCK LOCATION</h2><br><h1 style="color:white;font-size:45px;margin-top:-25px;"><?php echo $ceklocactasli; ?></h1></a></button></center>

</body>
</html>

<!-- =========================tampilan pertama=============================== -->


<style type="text/css">
#gradient3 {
    background-image: linear-gradient(to bottom right, #483D8B, #000000);
    
 
}
#tampil_modal{
    padding-top:10em;
    background-color:rgba(0,0,0,0.8);
    position:fixed;
    top:0;
    bottom:0;
    left:0;
    right:0;
    z-index:10;
    display:block;
}
#modal{
    padding:15px;
    font-size:20px;
    text-align:center;
    background:#ff1493;
    color:#fff;
    width:480px;
    border-radius:15px;
    margin:0 auto;
    margin-bottom:20px;
    padding-bottom:50px;
    z-index:9;   
}
#modal_atas{
    width:100%;
    background:#ff00ff;
    text-align:left;
    padding :15px;
    margin-left:-15px;
    font-size:15px;
    margin-top:-15px;
    border-top-left-radius:15px;
    border-top-right-radius:15px;
    color:yellow;
}

.scroll{
display:block;
border: 1px solid white;
padding:10px;
margin-top:5px;

width:100%;
height:280px;
overflow:auto;
}
.scroll1{
display:block;
border: 1px solid white;
padding:10px;
margin-top:5px;

width:100%;
height:250px;
overflow:auto;
}
.imga{
    background-image: url(bg-va-exim.gif);
    background-position:center;
    background-size:cover;

}

</style>

<div class="scroll">
<button style="background-color:red;position:fix;left:1500px;height:30px;width:120px;border-radius:0px;color:white;"><a href="logout.php" ><h4 style="color:white;">LOGOUT</h4><br></a></button>
<table class="table table-hover my-0">

<thead>
                        <tr>
                        <th class="d-none d-md-table-cell" style="color:white;vertical-align:middle;border-collapse: separate !important;" id="gradient3"><center>NO </center></th>
                        <th class="d-none d-md-table-cell" style="color:white;vertical-align:middle;border-collapse: separate !important;" id="gradient3"><center>ORDER NO</center></th>
                            <th class="d-none d-md-table-cell" style="color:white;vertical-align:middle;border-collapse: separate !important;" id="gradient3"><center>MODEL</center></th>
                            <th class="d-none d-md-table-cell" style="color:white;vertical-align:middle;border-collapse: separate !important;" id="gradient3"><center>LOT</center></th>
                            <th class="d-none d-md-table-cell" style="color:white;vertical-align:middle;border-collapse: separate !important;" id="gradient3"><center>CASE</center></th>
                            <th class="d-none d-md-table-cell" style="color:white;vertical-align:middle;border-collapse: separate !important;" id="gradient3"><center>LOCATION</center></th>
                            <th class="d-none d-md-table-cell" style="color:white;vertical-align:middle;border-collapse: separate !important;" id="gradient3"><center>AKSI</center></th>
                        </tr>
                    </thead>
                    <?php  
                    include "koneksi.php";
                    $no=1;
                    $result15 = mysqli_query($koneksi, "SELECT * FROM tb_sp_progress WHERE pengguna = '$getusername'");
while($user_data15 = mysqli_fetch_array($result15)) {         
echo "<tr>";
echo "<td style=background-color:#dee2e6;><b><center>".$no++ ."</center></b></td>";
echo "<td style=background-color:#dee2e6;><b><center>".$user_data15['order_no']."</center></b></td>";
echo "<td style=background-color:#dee2e6;><b><center>".$user_data15['model']."</center></b></td>";
echo "<td style=background-color:#dee2e6;><b><center>".$user_data15['lot']."</center></b></td>";
echo "<td style=background-color:#dee2e6;><b><center>".$user_data15['case_no']."</center></b></td>";
echo "<td style=background-color:#dee2e6;><b><center>".$user_data15['loc_input']."</center></b></td>";


echo "<td style=background-color:#dee2e6;> <a href='delete_progres.php?id=$user_data15[id]'>Delete</a></td></tr>";        


}
?>
</table>

</div>

<!-- =========================tampilan kedua=============================== -->


<div class="scroll1">
<table class="table table-hover my-0">

<thead>
                        <tr>
                        <th class="d-none d-md-table-cell" style="color:white;vertical-align:middle;border-collapse: separate !important;" id="gradient3"><center>NO </center></th>
                        <th class="d-none d-md-table-cell" style="color:white;vertical-align:middle;border-collapse: separate !important;" id="gradient3"><center>START  </center></th>
                            <th class="d-none d-md-table-cell" style="color:white;vertical-align:middle;border-collapse: separate !important;" id="gradient3"><center>END</center></th>
                            <th class="d-none d-md-table-cell" style="color:white;vertical-align:middle;border-collapse: separate !important;" id="gradient3"><center>ORDER NO</center></th>
                            <th class="d-none d-md-table-cell" style="color:white;vertical-align:middle;border-collapse: separate !important;" id="gradient3"><center>MODEL</center></th>
                            <th class="d-none d-md-table-cell" style="color:white;vertical-align:middle;border-collapse: separate !important;" id="gradient3"><center>LOT</center></th>
                            <th class="d-none d-md-table-cell" style="color:white;vertical-align:middle;border-collapse: separate !important;" id="gradient3"><center>LOCATION</center></th>
                            <th class="d-none d-md-table-cell" style="color:white;vertical-align:middle;border-collapse: separate !important;" id="gradient3"><center>TOTAL CASE</center></th>
                            <th class="d-none d-md-table-cell" style="color:white;vertical-align:middle;border-collapse: separate !important;" id="gradient3"><center>ACT</center></th>
                            <th class="d-none d-md-table-cell" style="color:white;vertical-align:middle;border-collapse: separate !important;" id="gradient3"><center>PROGRES</center></th>

        
                        </tr>
                    </thead>
                    <?php  
                    include "koneksi.php";
                    $no=1;
                    $result16 = mysqli_query($koneksi, "SELECT * FROM tb_sp_result");
while($user_data16 = mysqli_fetch_array($result16)) {         
echo "<tr>";
echo "<td style=background-color:#dee2e6;><b><center>".$no++ ."</center></b></td>";
echo "<td style=background-color:#dee2e6;><b><center>".$user_data16['start']."</center></b></td>";
echo "<td style=background-color:#dee2e6;><b><center>".$user_data16['end']."</center></b></td>";
echo "<td style=background-color:#dee2e6;><b><center>".$user_data16['order_no']."</center></b></td>";
echo "<td style=background-color:#dee2e6;><b><center>".$user_data16['model']."</center></b></td>";
echo "<td style=background-color:#dee2e6;><b><center>".$user_data16['lot']."</center></b></td>";
echo "<td style=background-color:#dee2e6;><b><center>".$user_data16['loc_input']."</center></b></td>";
echo "<td style=background-color:#dee2e6;><b><center>".$user_data16['total_plan']."</center></b></td>";
echo "<td style=background-color:#dee2e6;><b><center>".$user_data16['act']."</center></b></td>";
echo "<td style=background-color:#dee2e6;><b><center>".$user_data16['progres']."</center></b></td>";




}
?>
</table>

</div>


















	        </main>        
			<footer class="footer">
				<div class="container-fluid">
					<div class="row text-muted">
						<div class="col-6 text-left">
							<p class="mb-0">
								<a href="pages-profile.php" class="text-muted">&copy; <strong ><b>2022 YIMM-WJF.</b></strong></a>	
							</p>
						</div>
                        <div>
                            <marquee class="info" direction="center" scrollamount="10"><b>PATUHI PROTOKOL KESEHATAN COVID-19 DENGAN MELAKUKAN 3M DAN HINDARI 3K</b></marquee>
                        </div>						
					</div>
				</div>
			</footer>
		</div>
	</div>




<script src="js/app.js"></script>
	
<script type="text/javascript">
 window.onload = function() { jam(); }

function jam() {
 var e = document.getElementById('jam'),
 d = new Date(), h, m, s;
 h = d.getHours();
 m = set(d.getMinutes());
 s = set(d.getSeconds());

 e.innerHTML = h +':'+ m +':'+ s;

 setTimeout('jam()', 1000);
}

function set(e) {
 e = e < 10 ? '0'+ e : e;
 return e;
}
$(document).on('keypress', 'input,select', function (e) {
    if (e.which == 13) {
        e.preventDefault();
        var $next = $('[tabIndex=' + (+this.tabIndex + 1) + ']');
        console.log($next.length);
        if (!$next.length) {
       $next = $('[tabIndex=1]');        }
        $next.focus() .click();
    }
});

    </script>

</body>

</html>