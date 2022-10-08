<?php  
                    include "koneksi.php";
                    
                    
 $input = '3a';                   
                    
                    
                    
                    $dptresult00 = mysqli_query($koneksi, "SELECT * FROM tb_sp_result where loc_input = '$input'  ");
                    while($dptresult100 = mysqli_fetch_array($dptresult00)) {
                         echo   $getlocation00 = $dptresult100['loc_input'];
                    }
                if($getlocation00 == $input){
                        echo $dani = 'berhasil';
                }else{
                        echo $dani = 'gagal';
                }
   
   
   ?>