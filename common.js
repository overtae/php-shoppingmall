function Add_Site() {
  window.external.AddFavorite("https://gamejigix.induk.ac.kr/~shop41", "인덕닷컴");
}

// function img_change(mode) {
//   var reg = /(menu.+)_(on|off)/;
//   var find = event.srcElement.src.match(reg)[0];
//   var name = event.srcElement.src.match(reg)[1];

//   event.srcElement.src = event.srcElement.src.replace(find, name + "_" + mode);
// }

function Search() {
  if (!form1.findtext.value) {
    alert("검색할 단어를 입력해주세요");
    return;
  }
  form1.submit();
}

var menu = document.getElementsByTagName("a");

function activeMenu(event) {
  for (var i = 0; i < menu.length; i++) {
    menu[i].classList.remove("active");
  }
  event.target.classList.add("active");
}
