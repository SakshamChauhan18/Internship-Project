<?php include 'header.php'; ?>

  <h1><?php 
    $heading = $_GET['heading'];
    echo  $heading ;
  ?></h1><br>
  <table class="table table-bordered table-hover" style="border: 2px solid black">
    <thead>
      <tr class="table-warning" style="border: 2px solid black">
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
              <img src='./media/eye.png' height='15px' width='15px'> | View</button></a>"; ?>   
              <?php echo "<a href='$downloadLink' class='white_link' download><button type='button' class='btn btn-success btn-sm' style='border: 2px solid black'>
              <img src='./media/download.png' height='15px' width='15px'> | Download</button></a>"; ?>                   
            </td>
          </tr>
          <?php
        }
    ?>
  </table>

<?php include 'footer.php'; ?>