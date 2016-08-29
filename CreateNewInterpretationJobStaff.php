<?php require_once("includes/session.php"); ?>
<?php require_once("includes/db.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php require_once("includes/validation_functions.php"); ?>
<?php confirm_logged_in(); ?>

<?php
if(isset($_POST['submit']))
{
$unassigned = 'Unassigned';
$translatorInterpreter_id = "0";

?>

<?php

// $query =  "INSERT INTO `InterpretationJobTable`(`Job_Title`, `First Name`,
//  `Last Name`, `Address`, `City`, `State`, `Zip Code`, `Gender`, `Lang`,
//   `Date_of_Interpretation`, `Time_of_interpretation`, `Length_of_interpretation`, `special instructions`,
//    `Grant_name`, `Job_status`)

   $query = "INSERT INTO `interpretation_job_table`(`first_name`, `last_name`,
      `email`, `address`, `city`, `state`, `zip_code`, `gender`, `date of submission`,
         `lang_to`,
        `date_of_interpretation`, `time_of_interpretation`, `length_of_interpretation`,
         `special_instructions`, `Grant_name`, `job_status`, `translator_interpreter_id`)



 VALUES ('".mysqli_real_escape_string($connection,trim($_POST['ClientsFirstName']))."', '".
            mysqli_real_escape_string($connection,trim($_POST['ClientsLastName']))."', '".
            mysqli_real_escape_string($connection,trim($_POST['Email']))."', '".
            mysqli_real_escape_string($connection,trim($_POST['Address']))."', '".
            mysqli_real_escape_string($connection,trim($_POST['City']))."', '".
            mysqli_real_escape_string($connection,trim($_POST['State']))."', '".
            mysqli_real_escape_string($connection,$_POST['zipcode'])."', '".
            mysqli_real_escape_string($connection,$_POST['Gender'])."', '".
            mysqli_real_escape_string($connection,$_POST['sub_date'])."', '".
            mysqli_real_escape_string($connection,$_POST['language'])."', '".
            mysqli_real_escape_string($connection,$_POST['dateOfInterpretation'])."', '".
            mysqli_real_escape_string($connection,$_POST['Time_of_interpretation'])."', '".
            mysqli_real_escape_string($connection,$_POST['Length_of_interpretation'])."', '".
            mysqli_real_escape_string($connection,$_POST['ft_message'])."', '".
            mysqli_real_escape_string($connection,$_POST['grant'])."', '".
            $unassigned ."', '".
            $translatorInterpreter_id ."')" ;




  $result = mysqli_query($connection, $query);


  if($result){
    //Success
    //redirect_to("somepage.php");
    //echo "successfully added";
    echo "
    <script type=\"text/javascript\">
    alert('Interpretation job successfully added.');
    window.location = \" interp_staffdashboard.php \";
  </script>
      ";



  }
  else{
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
  <title>IICONN - New Interpretation Job</title>
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
    <script>
        function changePage(url)
        {
            window.location = url;
        }
    </script>
    <script language="javascript" type="text/javascript">
        $(document).ready(function () {
            var now = new Date();

            var day = ("0" + now.getDate()).slice(-2);
            var month = ("0" + (now.getMonth() + 1)).slice(-2);

            var today = now.getFullYear() + "-" + (month) + "-" + (day);


            $('#datePicker').val(today);
            $("#datePicker").attr({
                "min": today
            });
            $("#datePicker").attr({
                "max": today
            });
        });
    </script>
    <script language="javascript" type="text/javascript">
        $(document).ready(function () {
            var now = new Date(+new Date + 12096e5);

            var day = ("0" + now.getDate()).slice(-2);
            var month = ("0" + (now.getMonth() + 1)).slice(-2);

            var todayPlusTwoWeeks = now.getFullYear() + "-" + (month) + "-" + (day);


            $('#dateOfInterpretation').val(todayPlusTwoWeeks);
        });
    </script>
    <script language="javascript" type="text/javascript">
        $(document).ready(function () {
            var now = new Date(+new Date);

            var day = ("0" + now.getDate()).slice(-2);
            var month = ("0" + (now.getMonth() + 1)).slice(-2);

            var today = now.getFullYear() + "-" + (month) + "-" + (day);

            $("#dateOfInterpretation").attr({
                "min": today
            });
        });

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

</head>
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
        <a class="navbar-brand" href="#featured"><?php echo "Welcome, ".$_SESSION['first_name']." ".$_SESSION['last_name'];?><span class="subhead"></span></a>
      </div><!-- navbar-header -->
      <div class="collapse navbar-collapse" id="collapse">
        <ul class="nav navbar-nav navbar-right">
       <li><a href="index.php">Home</a></li>
       <li class="active"><a href="staffdashboard.php">Manage Jobs</a></li>
        <li ><a href="Staffinfo.php">Manage Accounts</a></li>
                <li><a  href="FAQPagesStaff.php">FAQ</a>
        </ul>
      </div><!-- collapse navbar-collapse -->
    </div><!-- container -->
  </nav>
<!-------------------------------------------------------------------------------------- -->
<div id="wrapper">



        <!-- Sidebar -->
        <div id="sidebar-wrapper" style="width:250px;" >

            <ul class="sidebar-nav" >
                <li class="sidebar-brand" >


                    <a href="#">
                        Staff Dashboard
                    </a>
                </li>

                            <ul> <li>
                    <a href="staffdashboard.php">
                      <i class="fa fa-tachometer"></i>Dashboard
                    </a>
                </li>
                 <li><a href="CreateNewTranslationJobStaff.php">New Translation job</a></li>
                                <li><a href="CreateNewInterpretationJobStaff.php"> New Interpretation job</a></li>

                            </ul>

            </div>



        <!-- /#sidebar-wrapper -->
 <div id="page-content-wrapper" style="padding-left:130px;">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12 col-md-8">
                      <div class="panel panel-default" >
                     <div class="panel-heading"> <div class="centerDiv">

                <h3 class="panel-title-primary">Create New Interpretation Job</h3>


</div></div>
  <div class="panel-body">
    <p></p>
  </div>

                     <form method="post" action="CreateNewInterpretationJobStaff.php" accept-charset='UTF-8' >
  <div class="container-fluid">
    <div class="form-group">
                            <p> An <span class="required">*</span> indicates that the field is required.</p><br />
                            <div class="form-group">
                            <label for="ft_author">Client's First Name: <span class="required">*</span><br></label>
                            <input type="text"  class="form-control" placeholder="First Name" Name="ClientsFirstName" maxlength="50" pattern="[a-zA-Z\s]+" title="No Numbers" required>
                            </div>
              <div class="form-group">
                      <label for="ft_author">Client's Last Name: <span class="required">*</span><br></label>
                           <input type="text" class="form-control" placeholder="Last Name" Name="ClientsLastName" maxlength="50" pattern="[a-zA-Z\s]+" title="No Numbers" required>
                            </div>
                            <div class="form-group">
                            <label for="ft_author">Client's email address: <span class="required">*</span><br></label>
                            <input type="email" class="form-control" placeholder="Email address" Name="Email" maxlength="50" required>
                            </div>
              <div class="form-group">
              <label for="ft_author">Location address: <span class="required">*</span><br></label>
                            <input type="text" class="form-control" name="Address" placeholder="Street,Apt or Suite" maxlength="50" required>
                            </div>
              <div class="form-group">
              <label for="ft_author">City: <span class="required">*</span><br></label>
                            <input type="text" class="form-control" name="City" placeholder="City" maxlength="50" pattern="[a-zA-Z\s]+" title="No Numbers" required>
                            </div>
              <div class="form-group">
              <label for="ft_author">State: <span class="required">*</span><br></label>
                            <select required aria-required="true" id="State" name="State" class="form-control">
                                    <option value="">Select State</option>
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
                                <label for="ft_author">Zip Code: <span class="required">*</span><br></label>
                                <input type="text" class="form-control" name="zipcode" pattern="[0-9]{5}" title="Five digit zip code (numbers only)" placeholder="Five digit zip code" required />
                            </div>
              <div class="form-group">
                            <label for="ft_author">Gender: <span class="required">*</span></label>
                            <select required name="Gender" class="form-control">
                                    <option value="">Select Gender</option>
                                    <option value="Male"> Male</option>
                                    <option value="Female"> Female </option>
                                </select>
                            </div>
                            <div class="form-group">
                            <label for="Gender">Date of submission:</label>
                            <input type="date" class="form-control" name="sub_date" id="datePicker">
                            </div>

                            <div class="form-group">
                            <label for="Gender">Time of Interpretation: <span class="required">*</span></label>
                            <input type="time" class="form-control" name="Time_of_interpretation" value="12:00" step="900" required >
                            </div>

                            <div class="form-group">
                            <label for="Gender">Estimated length of Interpretation (minutes): <span class="required">*</span></label>
                            <input type="number" class="form-control" name="Length_of_interpretation" min="15" max="300" value="15" step="15" required>
                            </div>
                             <div class="form-group">
                                <label for="Gender">Date of Interpretation: <span class="required">*</span></label>
                                <input type="date"  class="form-control" name="dateOfInterpretation" id="dateOfInterpretation" required>
                            </div>
              <div class="form-group">
                            <label for="ft_author">Language: <span class="required">*</span><br></label>
                                <select required name="language" class="form-control">
                                  <option value="">Select Language</option>
                                  <option value="Spanish">Spanish</option>
                                  <option value="French">French</option>
                                  <option value="Portuguese">Portuguese</option>
                                  <option value="Albanian">Albanian</option>
                                  <option value="Arabic">Arabic</option>
                                  <option value="Bosnian">Bosnian</option>
                                  <option value="Cambodian">Cambodian</option>
                                  <option value="English">English</option>
                                  <option value="German">German</option>
                                  <option value="Greek">Greek</option>
                                  <option value="Haitian Creole">Haitian Creole</option>
                                  <option value="Italian">Italian</option>
                                  <option value="Kurdish">Kurdish</option>
                                  <option value="Lithuanian">Lithuanian</option>
                                  <option value="Polish">Polish</option>
                                  <option value="Russian">Russian</option>
                                  <option value="Swahili">Swahili</option>
                                  <option value="Thai">Thai</option>
                                  <option value="Tigrinya">Tigrinya</option>
                                  <option value="Turkish">Turkish</option>
                                  <option value="Vietnamese">Vietnamese</option>
                                </select>
                            </div>
              <div class="form-group">
                     <label for="ft_author">Special Instructions:</label>
                                    <textarea class="form-control" name="ft_message" id="textarea" placeholder="Special instructions" cols="25" rows="10" maxlength="300"></textarea>
                                   <div id="textarea_feedback"></div>
                                </div>

                        </div>
            <div class="form-group">
            <label for="ft_author">Name of grant to be charged: <br></label>
                        <select name="grant" class="form-control">
                                <option value="">Name of Grant</option>
                                <option value="SOT">SOT</option>
                            </select>
                        </div>

                      <button type="reset" class="btn btn-primary" onclick="window.location.href = 'CreateNewInterpretationJobStaff.php'">Reset</button>
                        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                        <button type="button" class="btn btn-primary" onclick="window.location.href = 'staffdashboard.php'">Cancel</button>
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
<hr style="height:3px;border:none;color:#333;background-color:#3083CE; width: 90%;" />
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
