<?php 
  // session_start();
  // include_once "php/config.php";
  session_start();

	include("connection.php");
	include("functions.php");
  $user_data = check_login($con);
?>
<?php include_once "header.php"; ?>
<body>
  <div class="wrapper">
    <section class="users">
      <header>
        <div class="content">
          <?php 
            $sql = mysqli_query($con, "SELECT * FROM user WHERE unique_id = {$_SESSION['unique_id']}");
            $sql1 = mysqli_query($con, "SELECT * FROM user WHERE u_id = {$user_data['u_id']}");
            if(mysqli_num_rows($sql) > 0){
              $row = mysqli_fetch_assoc($sql);
              $row1 = mysqli_fetch_assoc($sql1);
            }
          ?>
          <img src="images/<?php echo $row1['']; ?>" alt="">
          <div class="details">
            <span><?php echo $row['fname'] ?></span>
          </div>
        </div>
        <a href="php/logout.php?logout_id=<?php echo $row['unique_id']; ?>" class="logout">Logout</a>
      </header>
      <div class="search">
        <span class="text">Select an user to start chat</span>
        <input type="text" placeholder="Enter name to search...">
        <button><i class="fas fa-search"></i></button>
      </div>
      <div class="users-list">
  
      </div>
    </section>
  </div>

  <script src="javascript/users.js"></script>

</body>
</html>
