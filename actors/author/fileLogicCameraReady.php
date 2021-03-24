<?php
// connect to the database
$conn = $con;

// $sql = "SELECT name,size,downloads,full_name,university,contact_details,other_links FROM fileuploadtable";
//$sql = "SELECT crc_id,name,size,downloads,title,abstract FROM camerareadycopypaper";

//$result = mysqli_query($conn, $sql);

//$files = mysqli_fetch_all($result, MYSQLI_ASSOC);
// Uploads files
if (isset($_POST['save'])) { // if save button on the form is clicked
    // name of the uploaded file
    $filename = $_FILES['myfile']['name'];

    // destination of the file on the server
    $destination = '../../uploads/cameraReadyUploads/' . $filename;

    // get the file extension
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    // the physical file on a temporary uploads directory on the server
    $file = $_FILES['myfile']['tmp_name'];
    $size = $_FILES['myfile']['size'];

//Added others
    // $full_name =$_POST['full_name'];
    // $university = $_POST['university'];
    // $contact_details = $_POST['contact_details'];
    // $other_links = $_POST['other_links'];	



    if (!in_array($extension, ['pdf'])) {
        echo '<script type="text/javascript"> alert("You file extension must be .pdf") </script>';
    } elseif ($_FILES['myfile']['size'] > 150000000) { // file shouldn't be larger than 1MB
        echo '<script type="text/javascript"> alert("file size larger than 150 MB.. ") </script>';

    } else {
        // move the uploaded (temporary) file to the specified destination
        if(move_uploaded_file($file, $destination)) {

            $rPaperId = $_SESSION['rPaperId'];
            $conferenceId = $_SESSION['conId'];
            $authorEmail = $_SESSION['au_email'];
            //I inserted values in a different special way
            $sql = "INSERT INTO camera_ready_research_paper VALUES (NULL,'$_POST[title]','$_POST[abstract]','$_POST[OtherAutherE]',
            '$filename', $size, $rPaperId, $conferenceId,'$authorEmail')";
           
            if (mysqli_query($conn, $sql)) {
                
                $query2 = mysqli_query($conn,"update researchpaper set isCameraReadyUpload=1 where idrp=$rPaperId");
                if($query2){
                    echo '<script type="text/javascript"> 
                        if (window.confirm("Research Paper Uploaded Successfully")) 
                        {
                        window.location.href="submittedRPaperList.php";
                        };
                    </script>';
                }
            }
        }
         else {
            echo '<script type="text/javascript"> alert("Failed to submit your file !!") </script>';
        }
    }
}
// Downloads files
// if (isset($_GET['file_id'])) {
//     $id = $_GET['file_id'];

//     // fetch file to download from database
//     $sql = "SELECT crc_id,name,size,downloads,title FROM camerareadycopypaper WHERE crc_id=$id";
//     $result = mysqli_query($conn, $sql);

//     $file = mysqli_fetch_assoc($result);
//     $filepath = '../../cameraReadyUploads/' . $file['name'];

//     if (file_exists($filepath)) {
//         header('Content-Description: File Transfer');
//         header('Content-Type: application/octet-stream');
//         header('Content-Disposition: attachment; filename=' . basename($filepath));
//         header('Expires: 0');
//         header('Cache-Control: must-revalidate');
//         header('Pragma: public');
//         header('Content-Length: ' . filesize('../../cameraReadyUploads/' . $file['name']));
//         readfile('../../cameraReadyUploads/' . $file['name']);

//         // Now update downloads count
//         $newCount = $file['downloads'] + 1;
//         $updateQuery = "UPDATE camerareadycopypaper SET downloads=$newCount WHERE crc_id=$id";
//         mysqli_query($conn, $updateQuery);
//         exit;
//     }

// }
// sql to delete a record



