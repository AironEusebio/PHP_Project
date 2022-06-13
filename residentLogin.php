


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css"
      integrity="sha512-10/jx2EXwxxWqCLX/hHth/vu2KY3jCF70dCQB8TSgNjbCVAC/8vai53GfMDrO2Emgwccf2pJqxct9ehpzG+MTw=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="toast.css">


    <script>
        

function toast(){
      
  const button = document.querySelector("button"),
  toast = document.querySelector(".toast")
  closeIcon = document.querySelector(".close"),
  progress = document.querySelector(".progress");
  document.getElementById("firstMessage").innerHTML = "Failed"
  document.getElementById("secondMessage").innerHTML = "Wrong Password or Email"
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

    <div class="containerStart">
      <div class="forms">
        <div class="form login">
          <span class="title">Resident Login</span>

          <form id="validationLogin" action="residentLoginCheck.php" method="post">
          <?php if (isset($_GET['err'])) { ?>
     		  <?php echo "<script>toast();</script>" ?>
     	    <?php } ?>
            <div class="input-field">
              <input
                id="validationUsername"
                type="text"
                placeholder="Enter your username"
                name="userLogin"
              />
              <i class="fa-solid fa-envelope"></i>
            </div>
            <div class="input-field">
              <input
                id="validationPassword"
                type="password"
                name="passLogin"
                placeholder="Enter your password"
              />
              <i class="fa-solid fa-lock"></i>
            </div>

            <div class="checkbox-text">
              <a href="#" class="text">Forgot password?</a>
            </div>

            <div class="input-field button">
              <input type="submit" value="Login Now" onclick="login()" />
            </div>
          </form>

          <div class="login-signup">
            <span class="text"
              >Don't have an account?
              <a href="residentSignup.php" class="text signup-link">Signup now</a>
            </span>
          </div>
        </div>
      </div>
    </div>

    
</body>

</html>