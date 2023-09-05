<?php
    $uploadDirectory = $_GET['directory'];
    $fileToDelete = $_GET['fileToDelete'];
    $heading = $_GET['heading'];
    if (!unlink($fileToDelete)) {
        echo ("$fileToDelete cannot be deleted due to an error");
    }
    else {
        echo ("File has deleted successfuly !");
    }
?>

<script type="text/javascript">
    alert("File Deleted Successfully ...");
    window.location.href = "./view.php?directory=<?php echo $uploadDirectory;?>&heading=<?php echo $heading;?>";
</script>