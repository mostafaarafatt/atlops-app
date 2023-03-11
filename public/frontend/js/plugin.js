window.onscroll = function () {
  if (this.pageYOffset > 80) {
    document.querySelector(".navbar").classList.add("nav-d");
  } else {
    document.querySelector(".navbar").classList.remove("nav-d");
  }
};

///////////////////
$(".portfolio ul li").on("click", function () {
  $(this).addClass("active").siblings().removeClass("active");
  //   $(this).attr("data-filter");

  if ($(this).attr("data-filter") == "all") {
    $(".portfolio .box").show("5000");
  } else {
    $(".portfolio .box")
      .not("." + $(this).attr("data-filter"))
      .hide("5000");
    $(".portfolio .box")
      .filter("." + $(this).attr("data-filter"))
      .show("5000");
  }
});

//////////////

if (platform.name === "Safari") {
  $(".landing").css("background-attachment", "inherit");
  $(".footer").css("background-attachment", "inherit");
}

////
$(".loading .loader").fadeOut(3000, function () {
  $(this).parent().fadeOut(2000);
});
/////
// $(".color ul li").on("click", function () {
//   $(this).addClass("active").siblings().removeClass("active");
//   $(".active-theme").attr("href", $(this).attr("data-value"));
//   if ($(".active-theme").attr("href") == "css/light.css") {
//     $(".navbar-brand img").attr("src", "pix/logo2.png");
//   } else {
//     $(".navbar-brand img").attr("src", "pix/logo1.png");
//   }
// });
//////

let toggleBtn = document.querySelector(".color .toggle-settings");
toggleBtn.onclick = function () {
  //toggle for setting box
  document.querySelector(".color").classList.toggle("clicked");
};

//////////////////////
let b = document.querySelectorAll(".services a");
$(b).on("click", function () {
  console.log($(this).attr("data-filter"));
  const c = $(".portfolio ul li");
  console.log($(".portfolio ul li .two"));

  c.removeClass("active");
  $(this).attr("data-filter") === "shooting"
    ? $(".portfolio ul li.one").addClass("active")
    : $(this).attr("data-filter") === "outd"
    ? $(".portfolio ul li.four").addClass("active")
    : $(this).attr("data-filter") === "social"
    ? $(".portfolio ul li.three").addClass("active")
    : $(this).attr("data-filter") === "bran"
    ? $(".portfolio ul li.two").addClass("active")
    : "null";
  if ($(this).attr("data-filter") == "all") {
    $(".portfolio .box").show("5000");
  } else {
    $(".portfolio .box")
      .not("." + $(this).attr("data-filter"))
      .hide("5000");
    $(".portfolio .box")
      .filter("." + $(this).attr("data-filter"))
      .show("5000");
  }
});
