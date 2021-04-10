var input = document.querySelectorAll('input');

for(var i=0; i<input.length; i++) {
  input[i].addEventListener('blur', checkValue);
}

function checkValue(e) {
  var elem = e.target;
  
  if(elem.value != "") {
    elem.classList.add('input-filled');
  } else {
    elem.classList.remove('input-filled');
  }
}