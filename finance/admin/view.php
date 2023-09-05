<?php include 'header.php'; ?>

  <h1><?php $heading = $_GET['heading']; echo  $heading ; ?></h1><br>
  <div class="card" style="max-width: 30rem;">
    <div class="card-header" style="color:white; background-color:dodgerblue;">
      <h5 class="card-title">Upload New Files</h5>
    </div>
    <div class="card-body">
      <form action="upload.php?directory=<?php echo $_GET['directory'];?>&heading=<?php echo $_GET['heading'];?>" method="POST" enctype="multipart/form-data">        
        <button type="button" class="btn btn-outline-primary"><input type="file" name="file" required></button><br><br>
        <input type="text" name="custom_name" placeholder="Enter File Name" required style="border: 2px solid black; padding: 5px;"><br><br>
        <button class="btn btn-primary" type="submit">Upload</button>
      </form>

    </div>
  </div><br><br>
  <table class="table table-bordered table-hover" style="border: 2px solid black">
    <thead style="background-color: blue;">
      <tr class="table-warning">
        <th style="border: 2px solid black">File Name</th>
        <th style="border: 2px solid black">Date of Upload</th>
        <th style="border: 2px solid black">Size</th>
        <th style="border: 2px solid black">Action</th>
      </tr>
    </thead>
    <?php
      // Function to format file size for better readability
      function formatSizeUnits($bytes)
      {
          if ($bytes >= 1073741824) {
              return number_format($bytes / 1073741824, 2) . ' GB';
          } elseif ($bytes >= 1048576) {
              return number_format($bytes / 1048576, 2) . ' MB';
          } elseif ($bytes >= 1024) {
              return number_format($bytes / 1024, 2) . ' KB';
          } elseif ($bytes > 1) {
              return $bytes . ' bytes';
          } elseif ($bytes == 1) {
              return $bytes . ' byte';
          } else {
              return '0 bytes';
          }
      }

      // Function to format date
      function formatDate($date)
      {
          return date("d-m-Y", $date);
      }
        $filesDirectory = $_GET['directory'];

        // Get all files in the directory
        $files = scandir($filesDirectory);
      
        // Remove "." and ".." from the list
        $files = array_diff($files, array('.', '..'));
      
        foreach ($files as $file)
        {
          $downloadLink = $filesDirectory . $file;
          if($file=='.DS_Store'){continue;}
          ?>
        <tr style="border: 2px solid black">
          <td class="table-success" style="border: 2px solid black">
            <?php echo $file;?>
          </td>
          <td class="table-success" style="border: 2px solid black"><?php echo formatDate(filemtime($downloadLink));?></td>
          <td class="table-success" style="border: 2px solid black"><?php echo formatSizeUnits(filesize($downloadLink));?></td>
          <td class="table-success" style="border: 2px solid black">
          <?php echo "<a href='$downloadLink' class='white_link' target='_new'><button type='button' class='btn btn-warning btn-sm' style='border: 2px solid black'>
            <img src='../media/eye.png' height='15px' width='15px'> | View</button></a>"; ?>
            <?php echo "<a href='$downloadLink' class='white_link' download><button type='button' class='btn btn-success btn-sm' style='border: 2px solid black'>
            <img src='../media/download.png' height='15px' width='15px'> | Download</button></a>"; ?>                    
            <a href="#" class="view" onclick="confirmDelete('<?php echo $downloadLink; ?>', '<?php echo $filesDirectory; ?>','<?php echo $heading; ?>')">
              <button type="button" class="btn btn-danger btn-sm" style="border: 2px solid black"><img src='../media/delete.png' height='15px' width='15px'> | Delete</button>
            </a>
          </td>
        </tr>
        <?php
        }
    ?>
  </table>

<?php include 'footer.php'; ?>

<script>
  function confirmDelete(fileToDelete, directory, heading) {
      if (confirm('Are you sure you want to delete this file?')) {
          window.location.href = `./delete.php?fileToDelete=${fileToDelete}&directory=${directory}&heading=${heading}`;
      }
  }
</script>