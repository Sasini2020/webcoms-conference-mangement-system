<?php
// connect to the database
$conn = $con;

$sql = "SELECT * FROM researchpaper";

$result = mysqli_query($conn, $sql);

$files = mysqli_fetch_all($result, MYSQLI_ASSOC);
// Uploads files
if (isset($_POST['save'])) { // if save button on the form is clicked
    // name of the uploaded file
    $filename = $_FILES['myfile']['name'];

    // destination of the file on the server
    $destination = '../../uploads/' . $filename;

    // get the file extension
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    // the physical file on a temporary uploads directory on the server
    $file = $_FILES['myfile']['tmp_name'];
    $size = $_FILES['myfile']['size'];


    if (!in_array($extension, ['pdf'])) {
        echo '<script type="text/javascript"> alert("Your file extension must be .pdf") </script>';
    } elseif ($_FILES['myfile']['size'] > 150000000) { // file shouldn't be larger than 150MB
        // echo "File is large than 150MB !";
        echo '<script type="text/javascript"> alert("file size larger than 150 MB.. Try another file") </script>';

    } else {
        // move the uploaded (temporary) file to the specified destination
        if(move_uploaded_file($file, $destination)) {

            $title = $_POST['title'];
            $abstract = $_POST['abstract'];
            $trackId = $_POST['Ptrack'];
            $OtherAuthorE = $_POST['OtherAutherE'];
            $authorEmail = $_SESSION['au_email'];
            $c_id = $_SESSION['con_id'];

            //I inserted values in a different special way
            $sql = "INSERT INTO researchpaper(title,abstract,NameOfFile,size,Downloads,acceptancy,trackID,conferenceId,corautherdetails,isCameraReadyUpload,emailauthor) VALUES 
            ('$title','$abstract','$filename',$size,0,0,$trackId,$c_id,'$OtherAuthorE',0,'$authorEmail')";
           
            

            if (mysqli_query($conn, $sql)) {
                // echo "File uploaded successfully";
                echo '<script type="text/javascript"> 
                    if (window.confirm("Research Paper Uploaded Successfully")) 
                    {
                    window.location.href="author_home.php";
                    };
                </script>';

            }
           
        }
         else {
            echo '<script type="text/javascript"> alert("Failed to submit your paper !!") </script>';
        }
    }
}
// Downloads files
if (isset($_GET['file_id'])) {
    $id = $_GET['file_id'];

    // fetch file to download from database
    $sql = "SELECT * FROM researchpaper WHERE id=$id";
    $result = mysqli_query($conn, $sql);

    $file = mysqli_fetch_assoc($result);
    $filepath = '../../uploads/' . $file['name'];

    if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($filepath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize('../../uploads/' . $file['name']));
        readfile('../../uploads/' . $file['name']);

        exit;
    }

}



