<?php
// connect to the database
$conn = $con;

// Downloads files
if (isset($_GET['dFile_id'])) {
    $id = $_GET['dFile_id'];

    // fetch file to download from database
    $sql = "SELECT * FROM researchpaper WHERE idrp=$id";
    $result = mysqli_query($conn, $sql);

    $file = mysqli_fetch_assoc($result);
    $filepath = '../../uploads/' . $file['NameOfFile'];

    if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($filepath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize('../../uploads/' . $file['NameOfFile']));
        readfile('../../uploads/' . $file['NameOfFile']);
        exit;
    }

}


