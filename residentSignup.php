<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="register.css">
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css"
      integrity="sha512-10/jx2EXwxxWqCLX/hHth/vu2KY3jCF70dCQB8TSgNjbCVAC/8vai53GfMDrO2Emgwccf2pJqxct9ehpzG+MTw=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link rel="stylesheet" href="toast.css">
    <script>
        
        function success(){
            const button = document.querySelector("button"),
          toast = document.querySelector(".toast")
          closeIcon = document.querySelector(".close"),
          progress = document.querySelector(".progress");
          document.getElementById("firstMessage").innerHTML = "Success"
          document.getElementById("secondMessage").innerHTML = "Account Created Successfully"
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

    <div class="containerStart active">
      <div class="forms">
        <!-- Registration Form -->
        <div class="form signup">
          <span class="title">Resident Registration</span>

          <form id="validationSignUp" action="residentSignupCheck.php" method="post">
          
            <?php if (isset($_GET['err'])) { ?>
     		  <?php echo "<script>toast();</script>" ?>
     	    <?php } ?>

             <?php if (isset($_GET['success'])) { ?>
     		  <?php echo "<script>success();</script>" ?>
     	    <?php } ?>

           

            <div class="input-field">
              <input
                type="text"
                placeholder="Enter your Full Name"
                required
                name="registerFullname"
                id="registerFullname"
              />
              <i class="fa-solid fa-user-check"></i>
            </div>

          

            <div class="input-field">
              <input
                type="text"
                placeholder="Enter your username"
                required
                name="registerUsername"
                pattern=".{8,}"
                title="Eight or more characters"
                id="registerUsername"
              />
              <i class="fa-solid fa-user"></i>
            </div>

            <div class="input-field">
              <input
                type="text"
                placeholder="Enter your email"
                required
                name="registerEmail"
                pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
                title="Invalid Email"
                id="registerEmail"
              />
              <i class="fa-solid fa-envelope"></i>
            </div>

            <div class="input-field">
              <input
                type="password"
                placeholder="Enter your password"
                required
                name="registerPass"
                pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters"
                id="registerPassword"
              />
              <i class="fa-solid fa-lock"></i>
            </div>

            <div class="input-field">
              <input
                type="password"
                placeholder="Confirm your password"
                required
                name="registerRePass"
                pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters"
                id="registerConfirmPassword"
              />
              <i class="fa-solid fa-lock"></i>
            </div>

            <div class="input-field button">
              <input type="submit" value="Signup Now" onclick="register()" />
            </div>
          </form>

          <div class="login-signup">
            <span class="text"
              >Already have an account?
              <a href="residentLogin.php" class="text login-link">Login now</a>
            </span>
          </div>
        </div>
      </div>
    </div>


</body>
</html>