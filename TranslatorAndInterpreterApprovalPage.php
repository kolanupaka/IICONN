<?php require_once("includes/session.php"); ?>
<?php require_once("includes/db_connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php require_once("includes/validation_functions.php"); ?>


<?php
$TranslatorInterpreterId = $_GET['id'];
$query = "SELECT `first_name`, `last_name`, `email`, `gender`, `phone_number`, `address`, `city`,
 `state`, `zip_code`, `active`, `resume`, `confidentiality_form`,
  `certificate`, `other`  FROM `translator_interpreter_table` WHERE `translator_interpreter_id`
 = $TranslatorInterpreterId";
$result = mysqli_query($connection, $query);
$Row = (mysqli_fetch_assoc($result));
$firstName = $Row['first_name'];
$lastName = $Row['last_name'];
$emailAddress = $Row['email'];
$Gender = $Row['gender'];
$Phone = $Row['phone_number'];
$Address = $Row['address'];
$City = $Row['city'];
$State = $Row['state'];
$Zipcode = $Row['zip_code'];
$Resume = $Row['resume'];
$ConfidentialityForm = $Row['confidentiality_form'];
$Certificate = $Row['certificate'];
$Other = $Row['other'];

?>

<?php
 if(isset($_POST['submit']))
 {
   $Active = 'Active';
   $updateQuery = "UPDATE `translator_interpreter_table`
   SET `active` = '$Active'
   WHERE `translator_interpreter_id` = $TranslatorInterpreterId ";

   $result2 = mysqli_query($connection, $updateQuery);

   if ($result2) {
     echo " <script type=\"text/javascript\">
     alert('Translator / Interpreter has been approved.');
       window.location = \" Aprrove.php \";
     </script>";
   }
   else {
     die("Database query failed. " . mysqli_error($connection));
   }
 }

?>

<?php
// 5. Close database conenction
mysqli_close($connection);

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="css/styles.css">
  <title>IICONN - Translator/Interpreter Approval Page</title>
  </head>
  <script language="javascript" type="text/javascript">
      $(document).ready(function () {
          var text_max = document.getElementById('textarea').maxLength;
          $('#textarea_feedback').html(text_max + ' characters remaining');

          $('#textarea').keyup(function () {
              var text_length = $('#textarea').val().length;
              var text_remaining = text_max - text_length;

              $('#textarea_feedback').html(text_remaining + ' characters remaining');
          });
      });
  </script>
  <style type="text/css">
      #side-bar {
        width:100%;
        float: left;
        position:fixed;
        padding-left:20px;
        padding-right:20px;
      }
  </style>
  <script src="js/jquery-2.2.0.js" type="text/javascript"> </script>
      <script language="javascript" type="text/javascript">
          $(document).ready(function () {
              $(".toggle").click(function () {
                  if ($(this).next().is(":hidden")) {
                      $(this).next().slideDown("fast");
                  } else {
                      $(this).next().hide();
                  }
              });
          });
      </script>
      <script language="javascript" type="text/javascript">
          function changePage(url)
          {
              window.location = url;
          }
      </script>
      <script language="javascript" type="text/javascript">
          $(document).ready(function () {
              var text_max = document.getElementById('textarea').maxLength;
              $('#textarea_feedback').html(text_max + ' characters remaining');

              $('#textarea').keyup(function () {
                  var text_length = $('#textarea').val().length;
                  var text_remaining = text_max - text_length;

                  $('#textarea_feedback').html(text_remaining + ' characters remaining');
              });
          });
      </script>
       <script language="javascript" type="text/javascript">
          $(document).ready(function () {
              var now = new Date(+new Date + 864e5);

              var day = ("0" + now.getDate()).slice(-2);
              var month = ("0" + (now.getMonth() + 1)).slice(-2);

              var today = now.getFullYear() + "-" + (month) + "-" + (day);

              $("#dueDate").attr({
                  "min": today
              });
          });

      </script>

<style type="text/css">
    #side-bar {
      width:100%;
      float: left;
      position:fixed;
      padding-left:20px;
      padding-right:20px;
    }
</style>

<body>
     <header>
  <div class="bigimage">
    <div class="container">
      <div class="collapse navbar-collapse" id="collapse">
        <ul class="nav navbar-nav navbar-right">
        <li><a href="logout.php">Logout</a></li>
        </ul>
      </div><!-- collapse navbar-collapse -->
	</div>
</header>
  <nav class="navbar navbar-default" role="navigation">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#featured"> Welcome to Administrator<span class="subhead"></span></a>
      </div><!-- navbar-header -->
      <div class="collapse navbar-collapse" id="collapse">
        <ul class="nav navbar-nav navbar-right">
       <li><a href="index.php">Home</a></li>
      <li class="active"><a href="admindashboard.php">Manage Jobs</a></li>
        <li><a href="AdminInfo.php">Manage Accounts</a></li>
                <li><a href="FAQPages.php">FAQ</a>
        </ul>
      </div><!-- collapse navbar-collapse -->
    </div><!-- container -->
  </nav><div id="wrapper">



        <!-- Sidebar -->
        <div id="sidebar-wrapper" style="width:250px;" >

            <ul class="sidebar-nav" >
                <li class="sidebar-brand" >


                    <a href="#">
                        Admin Dashboard
                    </a>
                </li>
             <ul>
                                <li><a href="AdminInfo.php">Manage Your Account</a></li>
                                <li><a href="mo_acc.php"> Manage Other Accounts</a></li>
                                <li><a  href="AdminRegister.php">Create new Account</a></li>
                                <li><a href="Aprrove.php">Approve Translator/Interpreter</a></li>
                                <li><a href="ChangePassword.php">Change password</a></li>
                            </ul>

            </div>



        <!-- /#sidebar-wrapper -->
                  <div id="page-content-wrapper" style="padding-left:130px;">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12 col-md-8">
                      <div class="panel panel-default" >

                             <div class="panel-heading"> <div class="centerDiv">
                                      <h3 class="panel-title-primary">Approval page for <?php echo $firstName . '&nbsp;' . $lastName ?> (Translator/Interpreter)</h3>

       </div>

       </div>
         <div class="panel-body">
           <p>Please review the following information. Click approve if you want to give this Translator / Interpreter access to this system. Otherwise please click Back to Translator / Interpreter Approval Page. The user will be notified in two weeks time that they have not been accepted. </p>
         </div>

  <!-- Form -->
  <form method="post" action="#" >
  <div class="container-fluid">
    <div class="form-group">
      <label for="firstname">First Name</label>
      <input value="<?php echo $firstName ?>" type="text" class="form-control" name="firstname" placeholder="First Name" maxlength="50" required pattern="[a-zA-Z\s]+" title="No Numbers">
    </div>
    <div class="form-group">
      <label for="lastname">Last Name</label>
      <input value="<?php echo $lastName ?>" type="text" class="form-control" name="lastname" placeholder="Last Name" maxlength="50" required pattern="[a-zA-Z\s]+" title="No Numbers">
    </div>
    <div class="form-group">
      <label for="email">Email address</label>
      <input value="<?php echo $emailAddress ?>" type="email" class="form-control" name="email" placeholder="Email" required>
    </div>
    <div class="form-group">
        <label for="gender">Gender</label>
         <!-- <div class="radio-inline" >
          <label class="radio-inline"><input type="radio" name="gender" id="gender">Male</label>
          <label class="radio-inline"><input type="radio" name="gender" id="gender">Female</label>
         </div> -->
         <select class="form-control" name="gender" required>
            <option value="<?php echo $Gender ?>"><?php echo $Gender ?></option>
             <option value="">Select Gender</option>
             <option value="Male"> Male</option>
             <option value="Female"> Female </option>
         </select>
    </div>
    <div class="form-group">
      <label for="phone">Phone</label>
      <input value="<?php echo $Phone ?>" type="text" class="form-control" name="phone" placeholder="Telephone" pattern="\d{3}[\-]\d{3}[\-]\d{4}" title="Example: 203-655-1234 (dashes required)" required>
    </div>
    <div class="form-group">
      <label for="address">Address</label>
      <input value="<?php echo $Address ?>" type="text" class="form-control" name="address" placeholder="Address" required>
    </div>
    <div class="form-group">
      <label for="city">City</label>
      <input value="<?php echo $City ?>" type="text" class="form-control" name="city" placeholder="City" pattern="[a-zA-Z\s]+" title="No Numbers" required>
    </div>
    <div class="form-group">
      <label for="city">State</label>
      <select class="form-control" required name="state">
        <option value="<?php echo $State ?>"><?php echo $State ?></option>
        <option value="">Select state</option>
        <option value="AL">Alabama</option>
        <option value="AK">Alaska</option>
        <option value="AZ">Arizona</option>
        <option value="AR">Arkansas</option>
        <option value="CA">California</option>
        <option value="CO">Colorado</option>
        <option value="CT">Connecticut</option>
        <option value="DE">Delaware</option>
        <option value="DC">District of Columbia</option>
        <option value="FL">Florida</option>
        <option value="GA">Georgia</option>
        <option value="HI">Hawaii</option>
        <option value="ID">Idaho</option>
        <option value="IL">Illinois</option>
        <option value="IN">Indiana</option>
        <option value="IA">Iowa</option>
        <option value="KS">Kansas</option>
        <option value="KY">Kentucky</option>
        <option value="LA">Louisiana</option>
        <option value="ME">Maine</option>
        <option value="MD">Maryland</option>
        <option value="MA">Massachusetts</option>
        <option value="MI">Michigan</option>
        <option value="MN">Minnesota</option>
        <option value="MS">Mississippi</option>
        <option value="MO">Missouri</option>
        <option value="MT">Montana</option>
        <option value="NE">Nebraska</option>
        <option value="NV">Nevada</option>
        <option value="NH">New Hampshire</option>
        <option value="NJ">New Jersey</option>
        <option value="NM">New Mexico</option>
        <option value="NY">New York</option>
        <option value="NC">North Carolina</option>
        <option value="ND">North Dakota</option>
        <option value="OH">Ohio</option>
        <option value="OK">Oklahoma</option>
        <option value="OR">Oregon</option>
        <option value="PA">Pennsylvania</option>
        <option value="RI">Rhode Island</option>
        <option value="SC">South Carolina</option>
        <option value="SD">South Dakota</option>
        <option value="TN">Tennessee</option>
        <option value="TX">Texas</option>
        <option value="UT">Utah</option>
        <option value="VT">Vermont</option>
        <option value="VA">Virginia</option>
        <option value="WA">Washington</option>
        <option value="WV">West Virginia</option>
        <option value="WI">Wisconsin</option>
        <option value="WY">Wyoming</option>
      </select>
    </div>
    <div class="form-group">
      <label for="zipcode">Zip Code</label>
      <input value="<?php echo $Zipcode ?>" type="text" class="form-control" name="zipcode" placeholder="Zip Code" pattern="[0-9]{5}" title="Five digit zip code (numbers only)" required>
    </div>
     <div class="form-group">
     <label>Resume:</label>
     <a href="<?php echo $Resume ?>">Download</a>
    </div>
    <div class="form-group">
     <label>Confidentiality forms:</label>
     <a href="<?php echo $ConfidentialityForm ?>">Download</a>
    </div>
     <div class="form-group">
      <label>Certifications:</label>
      <a href="<?php echo $Certificate ?>">Download</a>
      </div>
      <div class="form-group">
       <label>Other:</label>
       <a href="<?php echo $Other ?>">Download</a>
       </div>

    <!-- <div class="checkbox">
      <label>
        <input type="checkbox"> Check me out
      </label>
    </div> -->
    <button type="button" class="btn btn-primary" onclick="window.location.href = 'Aprrove.php'">Back to Translator / Interpreter Approval Page</button>
   <button type="submit" class="btn btn-primary"  formaction="TranslatorAndInterpreterApprovalPage.php?id=<?php echo $TranslatorInterpreterId?>" name="submit">Approve</button>
                              </div></form>
       </div>
                   </div>
               </div>
           </div>
         </div>
       </div

</div>

<div class="container-fluid">

   <!------ panel panel-default --------->
</div><!------ container-fluid --------->



<!-- -------------------------------------------------------------------------------------- -->
<footer>
<hr style="height:3px;border:none;color:#333;background-color:#3083CE; width: 80%;" />
<div class="bigimage">
    <div class="container">
	</div>
</div>
<div class="container">
  	<div class="col-sm-8 col-sm-offset-2 text-center">
      <p>
        670 Clinton Avenue<br>
	    Bridgeport, CT 06605<br>
	    Phone: (203) 336-0141
      </p>
      <p>&copy; The International Institute of Connecticut, Inc.</p>
      <hr>
	</div><!--/col-->
</div><!--/container-->
</footer>


<script src="js/jquery-2.2.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/script.js"></script>
</body>
</html>
