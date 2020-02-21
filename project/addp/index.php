<?php 
    session_start();
    include 'config.php'; 
    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = MD5($_POST['password']);
        $sel = "SELECT * FROM users where username='$username' AND password='$password'";
        $sel = mysqli_query($conn,$sel);
        if(mysqli_num_rows($sel) == 1){
        	$row = mysqli_fetch_assoc($sel);
        	$_SESSION['user_id'] = $row['id'];
            header("location: home.php");
        }else{
            echo "მოხდა შეცდომა, შეამოწმეთ მომხმარებელი და პაროლი";
        }
    }
    // phpinfo();
?>
<!DOCTYPE html>
<html>
    <head>
        <script> 
          function isNumber(evt) {
              evt = (evt) ? evt : window.event;
              var charCode = (evt.which) ? evt.which : evt.keyCode;
              if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                  return false;
              }
              return true;
          }
        </script>
        <title>
            ავტორიზაცია
        </title>
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
        <link href="http://shoparea.ge/catalog/view/javascript/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen" />
        
        <script src="geo.js"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>
        <script src="https://code.jquery.com/jquery-2.1.4.js"></script>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <center>
                        <a target="_blank" href="http://vss.ge">
                            <img src="logo.png" width="280" height="80" title="მთავარი გვერდი" alt="მთავარი გვერდი" />
                        </a>
                        <h4>ვიქტორია სექიურითი - ავტორიზაცია</h4>
                    </center>  
                </div>
                <div class="col-sm-2">

                </div>
                <div class="col-sm-8">
                    <fieldset>
                        <legend>
                            ავტორიზაცია
                        </legend>
    
                        <form action="" method="POST">
                            <div class="input-group">
                                <span class="input-group-addon">მომხმარებელი</span>
                                <input type="text" name="username" class="form-control" placeholder=""/>
                            </div>
                            <br />
                            <div class="input-group">
                                <span class="input-group-addon">პაროლი</span>
                                <input type="password" name="password" class="form-control">
                            </div>
                            <br />
                            <input type="submit" name="submit" class="form-control" value="შესვლა">
                        </form>
                    </fieldset>
                </div>
                <div class="col-sm-2">

                </div>
            </div>
        </div>
    </body>
</html>