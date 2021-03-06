<?php require_once("includes/session.php"); ?>
<?php require_once("includes/db.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php require_once("includes/validation_functions.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="css/styles.css">
  <title>IICONN - New Staff Registration</title>
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
            $(".toggle").click(function () {
                if ($(this).next().is(":hidden")) {
                    $(this).next().slideDown("fast");
                } else {
                    $(this).next().hide();
                }
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
      <li ><a href="view_translationjob.php">View Current Job Openings</a></li>
        <li ><a href="trans_interp_info.php">Manage Accounts</a></li>

        <li class="active"><a href="FAQpages2.php">FAQ</a>
        </ul>
      </div><!-- collapse navbar-collapse -->
    </div><!-- container -->
  </nav>
<!-------------------------------------------------------------------------------------- -->
<div id="wrapper">




 <div id="page-content-wrapper" style="padding-left:130px;">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12 col-md-8">
                      <div class="panel panel-default" >
                     <div class="panel-heading">
          <div class="margins">

                <span class="toggle">
                    <h3><a href="#" style="cursor:pointer;"> Translator/Interpreter FAQ</a></h3> 

                </span>

                 <div class="hiddenDiv">
                    <ul>
                        <li>Q: What is <span>Select Job? </span> </li>
                        <li>A: This option is used to select a job that you will have to complete. Jobs are created by staff members.</li>
                        <br />
                        <li>Q: What is <span>Download?</span></li>
                        <li>A: This option is used to download a document.</li>
                        <br />
                        <li>Q: What is <span>Manage Account?</span></li>
                        <li>A: This option is used to manage your account.</li>
                        <br />
                        <li>Q: What is <span>Upload?</span></li>
                        <li>A: This option is used to upload a document by choosing a file from the local system directory. </li>
                        <br />
                        <li>Q: What is <img src="images/FAQ Images/Search Jobs.png" /></li>
                        <li>A: This search option is used to search for a job. </li>
                        <br />
                        <li>Q: What is <span>View current job openings?</span></li>
                        <li>A: This is used to view all of the jobs that have not yet been assigned. This is how you will choose your work. </li>
                        <br />
                        <li>Q: What is <span>Manage your work?</span></li>
                        <li>A: This is to view all of the jobs that you have accepted. </li>
                    </ul>

                </div>
                <br />


                </div>
            </div>



    </div>
</div>
</div>
                </div>
                </div>
                </div>
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
</script>
<script src="layout/scripts/jquery.min.js"></script>
    <script src="layout/scripts/jquery.backtotop.js"></script>
    <script src="layout/scripts/jquery.mobilemenu.js"></script>
</body>
</html>
