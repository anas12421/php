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
        height: 60px;
        width: 60px;
        /* background-color: red; */
        text-align: center;
        line-height: 60px;
        color: goldenrod;
        position: absolute;
        top: 0%;
        right: 0;
        font-size: 25px;
        cursor: pointer;
        border-radius: 50%;
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



              <div class="form-floating pass_input mb-3">
                <input type="password" class="form-control" id="input" placeholder="Password" name="password" value="<?= (isset($_SESSION["old_password"])?$_SESSION["old_password"]:'')?>">

                <label for="">Password</label>
                <?php if(isset($_SESSION["password_error_message"])){?>
                  
                <div class="alert alert-warning mt-3"><?=$_SESSION      ["password_error_message"]?>
                </div>
                <?php } ?>
                <i id="show_pass" class="fa fa-eye"></i>
              </div>











                <h4>Select your gender</h4>
                
                <?php 
                $gender = "";
                if(isset($_SESSION["old_gender"])){
                 $gender = $_SESSION["old_gender"];
                }
                ?>
                <div class="form-check mt-3">
                  <input class="form-check-input" type="radio" name="gender" id="flexRadioDefault1" value="male" <?=($gender == 'male' ? 'checked':'')?> >
                  <label class="form-check-label" for="flexRadioDefault1">
                    Male
                  </label>
                </div>
                
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="gender" id="flexRadioDefault2" value="female" <?=($gender == 'female' ? 'checked':'')?> >
                  <label class="form-check-label" for="flexRadioDefault2">
                    Female
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="gender" id="flexRadioDefault3" value="others" <?=($gender == 'others' ? 'checked':'')?> >
                  <label class="form-check-label" for="flexRadioDefault3">
                    Others
                  </label>
                </div>

                      <?php if(isset($_SESSION["gender_error_message"])){ ?>
                        <div class="alert alert-warning mt-3 ">
                          <?= $_SESSION["gender_error_message"]?>
                        </div>
                      <?php }?>



                <?php 
                  $country = "";
                  if(isset($_SESSION["old_country"])){
                  $country = $_SESSION["old_country"];
                  }
                ?>
                      <div class="select_input mt-3">
                      <select class="form-select" aria-label="Default select example" name="country">
                        <option value="<?= (isset($_SESSION["old_country"]) ? $_SESSION["old_country"]:'') ?>" selected>Select Your Country</option>
                        <option value="Bangladesh" <?= ($country == "Bangladesh" ? 'selected':'')?>>Bangladesh</option>
                        <option value="Saudi Arabia" <?= ($country == "Saudi Arabia" ? 'selected':'')?>>Saudi Arabia</option>
                        <option value="America" <?= ($country == "America" ? 'selected':'')?>>America</option>
                      </select>
                      <?php if(isset($_SESSION["country_error_message"])){ ?>
                        <div class="alert alert-warning mt-3 ">
                          <?= $_SESSION["country_error_message"]?>
                        </div>
                      <?php }?>
                      </div>




                      <h4 class="mt-4">Select Your Hobby</h4>
                      <?php
                      $check_box = "";
                      if(isset($_SESSION["old_check"])){
                        $check_box = $_SESSION["old_check"];
                      }
                      
                      ?>
                        <div class="checkbox_input d-flex">
                        <div class="form-check me-3">
                          <input class="form-check-input" type="checkbox" value="Playing" id="flexCheckDefault" name="check" <?= ($check_box == "Playing" ? 'checked':'')?>>
                          <label class="form-check-label" for="flexCheckDefault">
                           Playing
                          </label>
                        </div>
                        <div class="form-check me-3">
                          <input class="form-check-input" type="checkbox" value="Drawing" id="flexCheckDefault2" name="check" <?= ($check_box == "Drawing" ? 'checked':'')?>>
                          <label class="form-check-label" for="flexCheckDefault2">
                            Drawing
                          </label>
                        </div>
                        <div class="form-check me-3">
                          <input class="form-check-input" type="checkbox" value="Gardening" id="flexCheckDefault3" name="check" <?= ($check_box == "Gardening" ? 'checked':'')?>>
                          <label class="form-check-label" for="flexCheckDefault3">
                            Gardening
                          </label>
                        </div>
                        <div class="form-check me-3">
                          <input class="form-check-input" type="checkbox" value="Traveling" id="flexCheckDefault4" name="check" <?= ($check_box == "Travelling" ? 'checked':'')?>>
                          <label class="form-check-label" for="flexCheckDefault4">
                            Travelling
                          </label>
                        </div>
                        <div class="form-check me-3">
                          <input class="form-check-input" type="checkbox" value="Singing" id="flexCheckDefault5" name="check" <?= ($check_box == "Singing" ? 'checked':'')?>>
                          <label class="form-check-label" for="flexCheckDefault5">
                           Singing
                          </label>
                        </div>

                        </div>
                        <?php if(isset($_SESSION["check_error_message"])){?>
                          <div class="alert alert-warning mt-3"><?=$_SESSION["check_error_message"]?></div>
                        <?php } ?>














              <button type="submit" class="btn btn-primary mt-4 w-100 d-block">Submit</button>
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
unset($_SESSION["gender_error_message"]);
unset($_SESSION["old_gender"]);
unset($_SESSION["country_error_message"]);
unset($_SESSION["old_country"]);
unset($_SESSION["check_error_message"]);
unset($_SESSION["old_check"]);



?>
