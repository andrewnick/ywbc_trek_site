<?php 
 
  session_start();
  $_SESSION['user_id'] = 1;
  $_SESSION['currentPage'] = 'entry';
  $_SESSION['previousPage'] = 'home';

?>

<!DOCTYPE html>
<html lang="en">
<?php 

  require_once('includes/head.php');
  require_once('includes/database_function.php');
  $db =  getDbConnection(); 
?>

<body>
	<main>
		<?php 

      if(isset($_GET['pages'])){

          require_once('includes/'.$_GET['pages'].'.php');
      }
      else {
          require_once('includes/home.php');
      }


    ?>

	</main>


	  <script type="text/javascript" src="assets/js/jquery.js"></script> 
    <!-- // <script type="text/javascript" src="assets/js/jquery.fittext.js"></script>   -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBS0N0dpiNp-SYnIaH-8ojcyAws1SxYsTg"></script>
    <script type="text/javascript" src="assets/js/proj4.js"></script>
    <script type="text/javascript" src="assets/js/main.js"></script>
      
    <!-- add Modernizr -->
    <!-- // <script src="assets/js/vendor/modernizr-2.8.0.min.js"></script> -->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
      ga('create', 'UA-XXXXX-X', 'auto');
      ga('send', 'pageview');
    </script>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="bootstrap/assets/javascripts/bootstrap.js"></script>
</body>
</html>


<!-- Code with login/sign up/ creating session 

      var_dump($_SESSION);
      var_dump($_POST);
      if ($_SESSION['login'] == false) {
          require_once('includes/'.$_SESSION['currentPage'].'.php');
          // Check to see if user has submitted login or sign up information
          if (isset($_POST['username'])) {
              
            $username = $_POST['username'];
            $password = $_POST['password'];

            if (($username != "") && ($password != "")) {
                echo "username";
                // if the login button was pressed try to login
                if (isset($_POST['loginBtn'])) {
                    // check database for login
                    echo "<h1>Login!</h1>";
                    // if successful create a session
                   $_SESSION['currentPage'] = 'home';
                   $_SESSION['login'] = true;

                } else { // if the sign up button was pressed sign the user up.

                  // add user to the database

                  echo "<h1>Sign UP<h1>";
                  // start up a session  
                  $_SESSION['login'] = true;
                }

            } else {

                if ($username == "") {

                       echo '<h1>Please set a username</h1>';

                } 

                if ($password == "") {

                      echo '<h1>Please set a password</h1>';

                }
            }
          } 


      } else {  // User has logged in. Therefore a session is active

          // If back button has been pressed
          // require_once('includes/'.$_SESSION['previousPage'].'php');
          echo "login not set";
          require_once('includes/'.$_SESSION['currentPage'].'<div class=""></div>php');

      }

 -->