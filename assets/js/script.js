$(document).ready(function () {
  $(".wish-icon i").click(function () {
    $(this).toggleClass("fa-heart fa-heart-o");
  });
});
let navbar = document.querySelector(".header .flex .navbar");
let userBox = document.querySelector(".header .flex .account-box");

document.querySelector("#menu-btn").onclick = () => {
  navbar.classList.toggle("active");
  userBox.classList.remove("active");
};

document.querySelector("#user-btn").onclick = () => {
  userBox.classList.toggle("active");
  navbar.classList.remove("active");
};

window.onscroll = () => {
  navbar.classList.remove("active");
  userBox.classList.remove("active");
};

function validatePhone() {
  const phone_input = document.getElementById("phone").value;
  valid_number = phone_input.match("(?:\\+88|88)?(01[3-9]\\d{8})");

  if (valid_number) {
    return true;
  } else {
    alert("ফোন নম্বরটি সঠিক নয়");
    return false;
  }
}
