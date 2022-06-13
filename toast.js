const container = document.querySelector(".containerStart"),
pwShowHide = document.querySelectorAll(".showHidePw"),
pwFields = document.querySelectorAll(".password"),
signUp1 = document.querySelector(".signup-link"),
login1 = document.querySelector(".login-link");

// js code to appear signup and login form
signUp1.addEventListener("click", ( )=>{
  container.classList.add("active");
  document.title = "Registration | Oasis";
});
login1.addEventListener("click", ( )=>{
  container.classList.remove("active");
  document.title = "Login | Oasis";
});

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