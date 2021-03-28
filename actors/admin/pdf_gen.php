<?php
  session_start();
  require '../../dbconfig/config.php';
  if($_SESSION['login_s'] != '1'){
    header('location:../../login.php');
  }

  require '../../FPDF/fpdf.php';

  if(isset($_POST['generateCRL'])){

    $sql = "SELECT c.id as c_id, COUNT(r.idrp) as Num 
            FROM researchpaper as r, conferences as c
            WHERE (r.conferenceId = c.id) and (c.Accepted = '1')
            GROUP by conferenceId
            ORDER by Num DESC";
    
    $result = mysqli_query($con,$sql);

      $pdf = NEW FPDF();
      $pdf -> Addpage();
      $pdf->SetFont('Arial','B',16);
      $pdf->Cell(60,10,'Conference ID',1,0,'C');
      $pdf->Cell(120,10,'Number of research paper submission',1,1,'C');

      while($row = mysqli_fetch_assoc($result)){
        $pdf->Cell(60,10,$row['c_id'],1,0,'C');
        $pdf->Cell(120,10,$row['Num'],1,1,'C');
      }

      $pdf->Output();
  }

?>