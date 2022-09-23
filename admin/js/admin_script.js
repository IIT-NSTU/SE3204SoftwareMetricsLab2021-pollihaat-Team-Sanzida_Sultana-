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

// ajax
// $(document).ready(function (e) {
//   $("#form").on("submit", function (e) {
//     e.preventDefault();
//     $.ajax({
//       url: "../includes/addCategory.inc.php",
//       type: "POST",
//       data: new FormData(this),
//       contentType: false,
//       cache: false,
//       processData: false,
//       beforeSend: function () {
//         //$("#preview").fadeOut();
//         $("#err").fadeOut();
//       },
//       success: function (data) {
//         if (data == "invalid") {
//           // invalid file format.
//           $("#err").html("Invalid File !").fadeIn();
//         } else {
//           // view uploaded file.
//           $("#preview").html(data).fadeIn();
//           $("#form")[0].reset();
//         }
//       },
//       error: function (e) {
//         $("#err").html(e).fadeIn();
//       },
//     });
//   });
// });
