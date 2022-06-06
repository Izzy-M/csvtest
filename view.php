<?php
ini_set('auto_detect_line_endings',TRUE);
if(isset($_GET['viewfile'])){
    $filename=$_GET['viewfile'];
    $filedata=fopen($filename,'r');
    
    $ln=0;
    $data='';
    echo "<div class='container card'>";
    $ln=0;
    while($row=fgetcsv($filedata,300,';','"',`\s`)){
       $ln++; 
   if($ln>1) {
    $row = preg_replace('/(\\\",)/','\\ ",',$row);
    $row = preg_replace('/(\\\"("?),)/',' ',$row); 
     echo "<h1>" . $row[7]. " - Darlehen " . $row[4] . "</h1>";
     echo "<p>" . (($row[1] == 'm') ? "Sehr geehrter Herr " : "Sehr geehrte Frau ") . $row[2] . ", </p><p>As a loan administrator, we would like to send you an interest plan for the installment due on " . $row[5] . " for the " . (($row[3] == '1') ? "loan " : "loans ") . " " . $row[4] . ", for the " . (($row[6] == 'm') ? "Darlehensnehmer der " : "Darlehensnehmerin die ") . " " . $row[7] . "</p><p>Mit freundlichen Gr��en,<br>Bing Bang</p><p></p><hr><p></p>";
    }
    echo "</div>";$ln++;
}
fclose($filedata);
}
//Row;Gender of POC;Name of POC;# Loans;Loans numbers;Maturity;Gender of Borrower;Name of Borrower		
// 1;m;John;1;123;07/06/2017;f;Dilan		
// 2;f;Paula;1;245;06/05/2020;f;Sara		
// 3;m;Peter;2;458	 459;03/05/2019;m;Smoking genius	
// 4;f;Diana;3;789	856	 452;12/12/2018;f;Eva
// 5;m;Thi Nguyen Truong;4;896	 578;03/05/2019;m;Capitalist	

?>