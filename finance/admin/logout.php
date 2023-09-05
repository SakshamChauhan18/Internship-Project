<?php   
    session_start();
    unset($_SESSION['username']);
    
?>

<script type="text/javascript">
alert("Logged Out Successfully ...");
window.location.href = "../index.php";
</script>