<?php
require __DIR__ . '/vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/');
$dotenv->load();
// print_r($_ENV);
// die();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Hatch Patch Creations Christian Music</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/w3.css">
<link rel="stylesheet" href="css/w3-theme-teal.css">
<!-- Google Fonts for Purple Purse-->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Libre+Bodoni:wght@400..700&family=Purple+Purse&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
h1,h2,h3,h4,h5,h6 {
    font-family: "Purple Purse", serif;
    font-weight: 400;
    font-style: normal;
}
html,body {
    font-family: "Libre Bodoni", serif;
    font-weight: 400;
    font-style: normal;
}
.w3-sidebar {
  z-index: 3;
  width: 250px;
  top: 43px;
  bottom: 0;
  height: inherit;
}
</style>

    <script src="//code.jquery.com/jquery-3.7.1.min.js"></script>
    <link rel="stylesheet" href="//cdn.datatables.net/2.1.8/css/dataTables.dataTables.min.css">
    <script src="//cdn.datatables.net/2.1.8/js/dataTables.min.js"></script>
    <script>
      $(document).ready(function () {
        $('#example').DataTable({
          "pageLength": 10,
          "lengthChange": true

        });
      });
    </script>

</head>
<body>
  <!-- Navbar -->
<div class="w3-top">
  <div class="w3-bar w3-theme w3-top w3-left-align w3-large">
    <a class="w3-bar-item w3-button w3-right w3-hide-large w3-hover-white w3-large w3-theme-l1" href="javascript:void(0)" onclick="w3_open()"><i class="fa fa-bars"></i></a>
    <a href="index.html" class="w3-bar-item w3-button w3-theme-l1">Hatch Patch Creations</a>
    <!-- <a href="#" class="w3-bar-item w3-button w3-hide-small w3-hover-white">About</a>
    <a href="#" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Values</a>
    <a href="#" class="w3-bar-item w3-button w3-hide-small w3-hover-white">News</a>
    <a href="#" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Contact</a>
    <a href="#" class="w3-bar-item w3-button w3-hide-small w3-hide-medium w3-hover-white">Clients</a>
    <a href="#" class="w3-bar-item w3-button w3-hide-small w3-hide-medium w3-hover-white">Partners</a> -->
  </div>
</div>

<!-- Sidebar -->
<nav class="w3-sidebar w3-bar-block w3-collapse w3-large w3-theme-l5 w3-animate-left" id="mySidebar">
  <a href="javascript:void(0)" onclick="w3_close()" class="w3-right w3-xlarge w3-padding-large w3-hover-black w3-hide-large" title="Close Menu">
    <i class="fa fa-remove"></i>
  </a>
  <h4 class="w3-bar-item"><b>Menu</b></h4>
  <a class="w3-bar-item w3-button w3-hover-black" href="index.html">Home</a>
  <a class="w3-bar-item w3-button w3-hover-black" href="packets.html">Packets</a>
  <a class="w3-bar-item w3-button w3-hover-black" href="songs.html">Songs</a>
</nav>
<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- Main content: shift it to the right by 250 pixels when the sidebar is visible -->
<div class="w3-main" style="margin-left:250px">

  <div class="w3-row w3-padding-64">
    <!-- <div class="w3-col"><img src="images/logo.gif" alt="" srcset=""></div> -->
    
    <div class="w3-col w3-container">
<table id="example" class="display dataTable responsive w3-table" style="width: 100%">
      <thead>
        <tr>
          <th>Title(Click to Download)</th>
          <th>Voice</th>
        </tr>
      </thead>
      <tbody>
        <?php
$user = $_ENV['DBUSER'];
$server = $_ENV['SERVER'];
$password = $_ENV['PASSWORD'];
$dbname = $_ENV['DBNAME'];
$file_path = 'https://raw.githubusercontent.com/sher1/hatchpatch/ab8d06a30f66950ab1c081c41e5fac7674aa1cfd';
$pdo = new \PDO("mysql:host=$server;dbname=$dbname", $user, $password);
$result = $pdo->query("SELECT * FROM songs");
foreach ($result as $row) {
    echo ('<tr><td><a href="' . $file_path . strtolower($row['file']) . '" download>' . $row['title'] . '</a></td><td>' . $row['description'] . '</td></tr>');
}
?>
      </tbody>
</table>
</div>
  </div>

  <footer id="myFooter">
    <!-- <div class="w3-container w3-theme-l2 w3-padding-32">
      <h4>Footer</h4>
    </div> -->

    <div class="w3-container w3-theme-l1">
    <?php include_once("footer.php"); ?>    
  </footer>

<!-- END MAIN -->
</div>

<script>
// Get the Sidebar
var mySidebar = document.getElementById("mySidebar");

// Get the DIV with overlay effect
var overlayBg = document.getElementById("myOverlay");

// Toggle between showing and hiding the sidebar, and add overlay effect
function w3_open() {
  if (mySidebar.style.display === 'block') {
    mySidebar.style.display = 'none';
    overlayBg.style.display = "none";
  } else {
    mySidebar.style.display = 'block';
    overlayBg.style.display = "block";
  }
}

// Close the sidebar with the close button
function w3_close() {
  mySidebar.style.display = "none";
  overlayBg.style.display = "none";
}
</script>
<?php
$pdo = null;
$result = null;
?>
</body>
</html>


