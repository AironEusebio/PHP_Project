<?php

    session_start(); 

    if(isset($_SESSION['residentID']) && isset($_SESSION['residentUsername'])){
    
        
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resident | Home</title>
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="toast.css">
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css"
      integrity="sha512-10/jx2EXwxxWqCLX/hHth/vu2KY3jCF70dCQB8TSgNjbCVAC/8vai53GfMDrO2Emgwccf2pJqxct9ehpzG+MTw=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <script>
        
        function success(){
            const button = document.querySelector("button"),
          toast = document.querySelector(".toast")
          closeIcon = document.querySelector(".close"),
          progress = document.querySelector(".progress");
          document.getElementById("firstMessage").innerHTML = "Success"
          document.getElementById("secondMessage").innerHTML = "Data successfully saved"
          document.getElementById("iconToast").style.backgroundColor = "blue"; 
          document.getElementById("iconToast").className = "fa-solid fa-circle-check check";
        
          let timer1, timer2;
        
          toast.style.display = "block";
          toast.classList.add("active");
          progress.classList.add("active");
        
          timer1 = setTimeout(() => {
              toast.classList.remove("active");
              //   document.getElementById("registerUsername").value = '';
              // document.getElementById("registerCode").value = '';
              // document.getElementById("registerEmail").value = '';
              // document.getElementById("registerPassword").value = '';
        
          }, 5000); //1s = 1000 milliseconds
        
          timer2 = setTimeout(() => {
              progress.classList.remove("active");
          }, 5300);
        
          closeIcon.addEventListener("click", () => {
          toast.classList.remove("active");
          
          setTimeout(() => {
              progress.classList.remove("active");
          }, 300);
        
          clearTimeout(timer1);
          clearTimeout(timer2);
          });
        }

        function toast(){
              
          const button = document.querySelector("button"),
          toast = document.querySelector(".toast")
          closeIcon = document.querySelector(".close"),
          progress = document.querySelector(".progress");
          document.getElementById("firstMessage").innerHTML = "Failed"
          document.getElementById("secondMessage").innerHTML = "Passwords doesn't match"
          document.getElementById("iconToast").style.backgroundColor = "red"; 
          document.getElementById("iconToast").className = "fa-solid fa-xmark check";
        
          let timer1, timer2;
        
          toast.style.display = "block";
          toast.classList.add("active");
          progress.classList.add("active");
        
          timer1 = setTimeout(() => {
              toast.classList.remove("active");
              //   document.getElementById("registerUsername").value = '';
              // document.getElementById("registerCode").value = '';
              // document.getElementById("registerEmail").value = '';
              // document.getElementById("registerPassword").value = '';
        
          }, 5000); //1s = 1000 milliseconds
        
          timer2 = setTimeout(() => {
              progress.classList.remove("active");
          }, 5300);
        
          closeIcon.addEventListener("click", () => {
          toast.classList.remove("active");
          
          setTimeout(() => {
              progress.classList.remove("active");
          }, 300);
        
          clearTimeout(timer1);
          clearTimeout(timer2);
          });
        }
        
        
        function passwordsDontMatch(){
          const button = document.querySelector("button"),
          toast = document.querySelector(".toast")
          closeIcon = document.querySelector(".close"),
          progress = document.querySelector(".progress");
          document.getElementById("firstMessage").innerHTML = "Failed"
          document.getElementById("secondMessage").innerHTML = "Passwords doesn't match!"
          document.getElementById("iconToast").style.backgroundColor = "red"; 
          document.getElementById("iconToast").className = "fa-solid fa-xmark check";
        
          let timer1, timer2;
        
          toast.style.display = "block";
          toast.classList.add("active");
          progress.classList.add("active");
        
          timer1 = setTimeout(() => {
              toast.classList.remove("active");
              //   document.getElementById("registerUsername").value = '';
              // document.getElementById("registerCode").value = '';
              // document.getElementById("registerEmail").value = '';
              // document.getElementById("registerPassword").value = '';
        
          }, 5000); //1s = 1000 milliseconds
        
          timer2 = setTimeout(() => {
              progress.classList.remove("active");
          }, 5300);
        
          closeIcon.addEventListener("click", () => {
          toast.classList.remove("active");
          
          setTimeout(() => {
              progress.classList.remove("active");
          }, 300);
        
          clearTimeout(timer1);
          clearTimeout(timer2);
          });
        }
        
        
        
            </script>

</head>
<body>


<div class="modal fade" id="clearanceModal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Barangay Clearance</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Do you want to Download a copy of the Barangay Clearance?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary downloadBtn">Yes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
      </div>
    </div>
  </div>
</div>


<div class="toast">
      <div class="toast-content">
        <i id="iconToast" class="fas fa-solid fa-check check"></i>

        <div class="message">
          <span class="text text-1" id="firstMessage">Success</span>
          <span class="text text-2" id="secondMessage"
            >Your changes has been saved</span
          >
        </div>
      </div>
      <i class="fa-solid fa-xmark close"></i>

      <div id="toastBox" class="progress"></div>
    </div>


 


    <nav>
        <div class="logo-name">
            <div class="logo-image">
            <img src="image/twice.png" alt="">
            </div>

            <span class="logo_name"> 
                        <?php
                            
                            include 'config.php';
                            $var = $_SESSION['residentID'];
                            $selectQuery = "SELECT * FROM residents WHERE residentID = '$var'";
                            $query = mysqli_query($conn,$selectQuery);
                            $nums = mysqli_num_rows($query);

                            while($res = mysqli_fetch_array($query)){ ?>
                                <?php echo $res['residentUsername'] ?>

                         <?php   
                            }
                        ?></span>
        </div>

        <div class="menu-items">
            <ul class="nav-links">
            <li><a href="#">
                <i class="fa-solid fa-house"></i>
                    <span class="link-name">Dashboard</span>
                </a></li>
                <li><a href="#">
                <i class="fa-solid fa-address-book"></i>
                    <span class="link-name">Barangay Officials</span>
                </a></li>
                <li><a href="#" id="showClearance">
                <i class="fa-solid fa-scroll"></i>
                    <span class="link-name">Clearance</span>
                </a></li>
                <li><a href="https://www.facebook.com/aironeusebio/" target="_blank">
                <i class="fa-brands fa-facebook"></i>
                    <span class="link-name">Facebook</span>
                </a></li>
                <li><a href="#">
                <i class="fa-brands fa-twitter"></i>
                    <span class="link-name">Twitter</span>
                </a></li>
                <li><a href="#">
                <i class="fa-brands fa-instagram"></i>
                    <span class="link-name">Instagram</span>
                </a></li>
                
            </ul>
            
            
            <ul class="logout-mode">
                <li><a href="residentLogout.php">
                <i class="fa-solid fa-arrow-right-to-bracket" ></i>
                    <span class="link-name">Logout</span>
                </a></li>

                <li class="mode">
                    <a href="#">
                    <i class="fa-solid fa-moon"></i>    
                    <span class="link-name">Dark Mode</span>
                </a>

                <div class="mode-toggle">
                  <span class="switch"></span>
                </div>
            </li>
            </ul>
        </div>
    </nav>

    <section class="dashboard">
        <div class="top">
            <i class="fa-solid fa-bars sidebar-toggle"></i>
            <div class="search-box">
            <i class="fa-solid fa-magnifying-glass"></i>
                <input type="text" placeholder="Search here...">
            </div>
            
            <img src="image/iu.png" alt="">
        </div>

        <div class="dash-content">
            <div class="overview">
                <div class="title">
                <i class="fa-solid fa-gauge-high"></i>
                    <span class="text">Telapatio Barangay System</span>
                </div>

                <div class="boxes">

                <div class="box box3">
                        <span class="text">Barangay Officials</span>
                        <span class="number">
                           11
                        </span>
                    </div>
                    <div class="box box2">
                        <span class="text">Total Residents</span>
                        
                         <span class="number">
                           
                         <?php
                            
                            include 'config.php';
                            $selectQuery = "SELECT * FROM residents";
                            
                            $query = mysqli_query($conn,$selectQuery);
                        
                            if($query){
                                $rowCount = mysqli_num_rows($query);
                                
                                echo $rowCount;
                                
                            }
                            ?>
                           </span>
                        
                    </div>
                    <div class="box box1">
                        <span class="text">Total Admin</span>
                        <span class="number">
                           
                           <?php
                              
                              include 'config.php';
                              $selectQuery = "SELECT * FROM user";
                              
                              $query = mysqli_query($conn,$selectQuery);
                          
                              if($query){
                                  $rowCount = mysqli_num_rows($query);
                                  
                                  echo $rowCount;
                                  
                              }
                              ?>
                             </span>
                    </div>
                    
                </div>
            </div>

            <div class="activity">
                <div class="title">
                <i class="fa-solid fa-user"></i>
                    <span class="text">Resident's Table</span>
                </div>

                    <!-- Button trigger modal -->

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Update my Information</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form id="modalSignUp" action="updateResidentInfo.php" method="post">

                        <?php if (isset($_GET['err'])) { ?>
     		            <?php echo "<script>toast();</script>" ?>
     	                <?php } ?>

                        <?php if (isset($_GET['success'])) { ?>
     		            <?php echo "<script>success();</script>" ?>
     	                <?php } ?>

                            <div class="modal-body">
                            
                            <?php
                            $var = $_SESSION['residentID'];
                            include 'config.php';
                            $selectQuery = "SELECT * FROM residents WHERE residentID = '$var'";
                            $query = mysqli_query($conn,$selectQuery);
                            $nums = mysqli_num_rows($query);

                            while($res = mysqli_fetch_array($query)){ ?>

                                <div class="form-group">
                                <label for="exampleID1" id="exampleID1">ID</label>
                                <input type="" readonly class="form-control" name="registerID" value=<?php echo $res['residentID'] ?> id="exampleInputID1" placeholder="">   
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Full Name</label>
                                <input type="" class="form-control" name="registerFullname" value=<?php echo $res['residentName'] ?> id="exampleInputFullName1" placeholder="Enter Full Name">   
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Username</label>
                                <input type="" class="form-control" name="registerUsername" value=<?php echo $res['residentUsername'] ?> id="exampleInputUsername1" placeholder="Enter Username">   
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" class="form-control" name="registerEmail" value=<?php echo $res['residentEmail'] ?> id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">   
                            </div>

                            <!-- <div class="form-group">
                                <label for="exampleInputPassword1" id="label1">Password</label>
                                <input type="password" class="form-control" name="registerPass" id="exampleInputPassword1" placeholder="Password">
                            </div>
                        
                            <div class="form-group">
                                <label for="exampleInputPassword2" id="label2">Re-enter Password</label>
                                <input type="password" class="form-control" name="registerRePass" id="exampleInputPassword2" placeholder="Re-enter Password">
                            </div> -->

                         <?php   
                            }
                        ?>
                            

                            </div>
                        
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" id="btnCaption" name="insertData" class="btn btn-primary">Update Information</button>
                            </div>
                        </div>
                        </form>
                    </div>
                    </div>
                <div class="activity-data">
                <div class="sideBySide">
                    <button type="button" class="btn btnAdd" id="showModalResident" data-toggle="modal" data-target="#exampleModal">
                    <i class="fa-solid fa-file-pen"></i> Edit my Information
                    </button>
                    <div class="top1">
                        <div class="search-box">
                            <i class="fa-solid fa-magnifying-glass"></i>
                            <input type="text" id="myInput" placeholder="Search Residents">
                        </div>
            
                    </div>
                    </div>
                    <table class="table table-hover table-striped" id= "myTable">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">User ID</th>
                                <th scope="col">Full Name</th>
                                <th scope="col">Username</th>
                                <th scope="col">Email</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            <?php
                            
                                include 'config.php';
                                $selectQuery = "SELECT * FROM residents";
                                $query = mysqli_query($conn,$selectQuery);
                                $nums = mysqli_num_rows($query);

                                while($res = mysqli_fetch_array($query)){ ?>
                                    <tr>
                                    <td><?php echo $res['residentID'] ?></td>
                                    <td><?php echo $res['residentName'] ?></td>
                                    <td><?php echo $res['residentUsername'] ?></td>
                                    <td><?php echo $res['residentEmail'] ?></td>
                                    </tr>

                             <?php   
                                }
                            ?>
                            
                        </tbody>
                    </table>
                   
                    
                    
                
                </div>
            </div>
        </div>
    </section>


    <script>
        const body = document.querySelector("body"),
      modeToggle = body.querySelector(".mode-toggle");
      sidebar = body.querySelector("nav");
      sidebarToggle = body.querySelector(".sidebar-toggle");

let getMode = localStorage.getItem("mode");
if(getMode && getMode ==="dark"){
    body.classList.toggle("dark");
}

let getStatus = localStorage.getItem("status");
if(getStatus && getStatus ==="close"){
    sidebar.classList.toggle("close");
}

modeToggle.addEventListener("click", () =>{
    body.classList.toggle("dark");
    if(body.classList.contains("dark")){
        localStorage.setItem("mode", "dark");
    }else{
        localStorage.setItem("mode", "light");
    }
});

sidebarToggle.addEventListener("click", () => {
    sidebar.classList.toggle("close");
    if(sidebar.classList.contains("close")){
        localStorage.setItem("status", "close");
    }else{
        localStorage.setItem("status", "open");
    }
})

    </script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
 
<script>

$(document).ready(function (){


    $("#showClearance").on('click', function(){
        $("#clearanceModal").modal("show");
    });

    $(".downloadBtn").on('click', function(){
        window.location.href = 'Sample Barangay Clearance.docx';
    });

    $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });

    $(".editBtn").on('click', function(){
        
        $("#exampleModal").modal("show");
        $("#exampleModalLabel").text("Edit Data");

        $("#exampleInputPassword1").hide();
        $("#exampleInputPassword2").hide();
        $('#label1').hide();
        $('#label2').hide();
        $('#exampleInputID1').show();
        $('#exampleID1').show();
        $('#btnCaption').text("Save Changes");

        $tr = $(this).closest('tr');
        var data = $tr.children("td").map(function(){
            return $(this).text();

        }).get();

        console.log(data);

        $('#exampleInputID1').val(data[0]);
        $("#exampleInputFullName1").val(data[1]);
        $("#exampleInputUsername1").val(data[2]);
        $("#exampleInputEmail1").val(data[3]);

        $('#modalSignUp').attr('action', 'update.php');
        
        
    });

    $(".deleteBtn").on('click', function(){
        
        $("#exampleModal").modal("show");
        $("#exampleModalLabel").text("Delete Data");

        $("#exampleInputPassword1").hide();
        $("#exampleInputPassword2").hide();
        $('#label1').hide();
        $('#label2').hide();
        $('#exampleInputID1').show();
        $('#exampleID1').show();
        $('#btnCaption').text("Delete Data");
        $('#exampleInputFullName1').attr('readonly', true);
        $('#exampleInputUsername1').attr('readonly', true);
        $('#exampleInputEmail1').attr('readonly', true);


        $tr = $(this).closest('tr');
        var data = $tr.children("td").map(function(){
            return $(this).text();

        }).get();

        console.log(data);

        $('#modalSignUp').attr('action', 'delete.php');
        
        
    });


    $('#showModal').click(function() {
    //Code to be executed when close is clicked
    $('#exampleModalLabel').html('Add Data');
    $("#exampleInputPassword1").show();
    $("#exampleInputPassword2").show();
    $('#label1').show();
    $('#label2').show();
    $('#exampleInputID1').hide();
    $('#exampleID1').hide();
    $('#modalSignUp').attr('action', 'addUserAdmin.php');
    $('#btnCaption').text("Save Changes");
    $('#exampleInputID1').val(null);
    $("#exampleInputFullName1").val(null);
    $("#exampleInputUsername1").val(null);
    $("#exampleInputEmail1").val(null);
    });
});


</script>
</body>
</html>

<?php
}else{
    header('Location: index.php');
    exit();
}

?>