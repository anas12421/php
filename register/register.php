<?php
session_start();
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Form Validation</title>
    <style>
      .pass_input{
        position: relative;
      }

      .pass_input i{
        height: 30px;
        width: 30px;
        background-color: red;
        text-align: center;
        line-height: 30px;
        color: white;
        position: absolute;
        top: 0%;
        right: 0;
        cursor: pointer;
      }
    </style>
  </head>


  <body>
    


  <div class="main_form mt-5">
    <div class="container">
      <div class="row">
        <div class="col-lg-9">
          <h2 class="mb-3">Register form</h2>
          <form action="register_post.php" method="POST">
          <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingName" placeholder="name" name="name" value="<?=(isset($_SESSION["old_name"])?$_SESSION["old_name"]:'')?>">
                <label for="floatingName">Name</label>
                <?php if(isset($_SESSION["name_error_message"])){ ?>
                  
                <div class="alert alert-warning mt-3"><?=$_SESSION["name_error_message"]?></div>

                <?php } ?>
               
              </div>



              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name="email" value="<?= (isset($_SESSION["old_email"])?$_SESSION["old_email"]:'') ?>">




                <label for="floatingInput">Email</label>
               <?php if(isset($_SESSION["email_error_message"])){ ?>
                  
                <div class="alert alert-warning mt-3"><?=$_SESSION        ["email_error_message"]?></div>
                  <?php } ?>
                </div>



              <div class="form-floating pass_input">
                <input type="password" class="form-control" id="input" placeholder="Password" name="password" value="<?= (isset($_SESSION["old_password"])?$_SESSION["old_password"]:'')?>">

                <label for="">Password</label>
                <?php if(isset($_SESSION["password_error_message"])){?>
                  
                <div class="alert alert-warning mt-3"><?=$_SESSION      ["password_error_message"]?>
                </div>
                <?php } ?>
                <i id="show_pass" class="fa fa-eye"></i>
              </div>


              <button type="submit" class="btn btn-primary mt-4">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  



    

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js" integrity="sha512-jGsMH83oKe9asCpkOVkBnUrDDTp8wl+adkB2D+//JtlxO4SrLoJdhbOysIFQJloQFD+C4Fl1rMsQZF76JjV0eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
      $("#show_pass").on('click', function(){
        let input = document.getElementById("input")
        if(input.type == "password"){
          input.type = "text" ;
        }else{
          input.type="password";
        }
      })
    </script>

  
  </body>
</html>

<?php
unset($_SESSION["name_error_message"]);
unset($_SESSION["old_name"]);
unset($_SESSION["email_error_message"]);
unset($_SESSION["old_email"]);
unset($_SESSION["password_error_message"]);
unset($_SESSION["old_password"]);



?>
