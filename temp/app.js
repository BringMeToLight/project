function hasC(element, cls) {
  return (' '+element.className+' ').indexOf(' '+cls+ ' ')>-1;
}

function toggle(id, c) {
  var e = document.getElementById(id);
  if (hasC(e, c)) e.classList.remove(c);
  else  e.classList.add(c);
}

function changeCl(id, c){
  document.getElementById(id).className = c;
}