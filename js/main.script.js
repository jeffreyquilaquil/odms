$(document).ready(function(){

  // Add selected list into displaySelected div
  $(document).on('click','.autoComplete-list',function(){
    let val = $(this).val();
    let text = $(this).text();
    let span = '<span class="selected" name="selected[]" value="'+val+'">'+text+' <i class="fa fa-window-close returnToList" style="color:red;cursor:pointer"></i> </span>';
    $('.displaySelected').append(span);

    // Clear matchbox and autoComplete input box
    matchBox.innerHTML = "";
    $('#txt_autoComplete').val('');

    // Remove list from
    let index = $(this).data('index');
    val_arr.splice(index, 1);
  });

  $(document).on('click','.returnToList', function(){
    let parent = $(this).parent();
    val_arr.push( parent.text());
    key_arr.push( parent.val());
    parent.remove();
  });

});

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
    li.setAttribute('data-index',index);
    let textNode = document.createTextNode(val_arr[index]);
    li.appendChild(textNode);
    matchBox.appendChild(li);
  }
}
