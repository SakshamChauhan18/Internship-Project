<?php
    $uploadDirectory = $_GET['directory'];
    $heading = $_GET['heading'];

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file'])) {
        $file = $_FILES['file'];
        $targetFile = $uploadDirectory . basename($file['name']);

        // Get the custom name entered by the user
        $customName = $_POST['custom_name'];

        // Generate the new target file path with the custom name
        $extension = pathinfo($targetFile, PATHINFO_EXTENSION);
        $targetFileWithCustomName = $uploadDirectory . $customName . '.' . $extension;

        if (move_uploaded_file($file['tmp_name'], $targetFileWithCustomName)) {
            echo "File uploaded successfully.";
        } else {
            echo "Failed to upload file.";
        }
    }
?>

<script type="text/javascript">
    alert("File Uploaded Successfully...");
    window.location.href = "./view.php?directory=<?php echo $uploadDirectory;?>&heading=<?php echo $heading;?>";
</script>
