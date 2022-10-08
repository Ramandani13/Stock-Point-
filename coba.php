<?php
include "koneksi.php";

// $input1 = "1a";
// $input2 = "1b";
$tbinput = $koneksi->query("SELECT * FROM tb_sp_result WHERE loc_input = '1a'");
while($dataloc1 = $tbinput->fetch_array(MYSQLI_ASSOC)) {
    $newarray[]= array("order_no"=>$dataloc1['order_no'],"lot"=>$dataloc1['lot'],"loc_input"=>$dataloc1['loc_input'],"casemark"=>$dataloc1['casemark']);
    
} 

$color= array()
// error_reporting(0);

// if($newarray != [ ]){
//     // $newarray[] = ['Defined'];
//     if(in_array_sp($input1, $newarray)){
//         echo "ADA DAN SAMA";
//     }
//     else{
//         echo "ADA TAPI TIDAK SAMA";
//     }

// }
// elseif($newarray == [ ]){
//     echo "TIDAK ADA";
// }
// $input = "BD8K11007014P";
// $tbinput = $koneksi->query("SELECT * FROM tb_sp_result");
// while($dataloc1 = $tbinput->fetch_array(MYSQLI_ASSOC)) {
//     $newarray[]= array("order_no"=>$dataloc1['order_no'],"lot"=>$dataloc1['lot'],"loc_input"=>$dataloc1['loc_input'],"casemark"=>$dataloc1['casemark']);
    
// } 
// if(in_array_sp($input, $newarray)){
//     echo "Macth Found";
// }
// else{
//     echo "Macth Not Found";
// }


// $input = 1;  
// $newarray = array(array("Rakyan", "Basket",),array("Dani","Sepakbola",));
// if(in_array_sp($input, $newarray)){
//     echo "Found";
// }
// else{
//     echo "Not Found";
// }
// ?>







