var matchBox = document.getElementById('ul_matchBox');

function autoComplete(){
  // console.log(matchBox);
  matchBox.innerHTML = "";
  val_arr.forEach(displayMatch);
}

function displayMatch(elem, index){
  var value = document.getElementById('txt_autoComplete').value;
  // if(elem.match(/value\w+/g)){
  var regex = new RegExp(value, "gi");
  var match = elem.match(regex);
  if(match != null && match.length == 1){
    var li = document.createElement("li");
    li.value = key_arr[index];
    li.className = 'list-group-item autoComplete-list';
    let textNode = document.createTextNode(val_arr[index]);
    li.addEventListener("click", function(){
      console.log("FUCK");
    })
    li.appendChild(textNode);
    matchBox.appendChild(li);
  }
}
