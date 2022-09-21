const menu = document.location.href.split("=");

switch (menu[1]) {
  case "1":
    document.querySelector(".o").classList.add("active");
    document.querySelector(".t").classList.remove("active");
    document.querySelector(".b").classList.remove("active");
    document.querySelector(".h").classList.remove("active");
    break;
  case "2":
    document.querySelector(".t").classList.add("active");
    document.querySelector(".o").classList.remove("active");
    document.querySelector(".b").classList.remove("active");
    document.querySelector(".h").classList.remove("active");
    break;
  case "3":
    document.querySelector(".b").classList.add("active");
    document.querySelector(".o").classList.remove("active");
    document.querySelector(".t").classList.remove("active");
    document.querySelector(".h").classList.remove("active");
    break;
  case "4":
    document.querySelector(".h").classList.add("active");
    document.querySelector(".o").classList.remove("active");
    document.querySelector(".b").classList.remove("active");
    document.querySelector(".t").classList.remove("active");
    break;
}
