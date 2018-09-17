$(document).ready(function(){

  // $('#txt_autoComplete').keydown(function(){
  //   var value = $(this).val();
  //   // Loop for in the array
  //   val_arr.foreach(function(e, i){
  //     if(e.match(/value\w+/g)){
  //       console.log(i);
  //     }
  //   });
  // })


});

function autoComplete(){
  console.log('clear');
  val_arr.forEach(displayMatch);
}

function displayMatch(elem, index){

  var value = document.getElementById('txt_autoComplete').value;
  // if(elem.match(/value\w+/g)){
  var regex = new RegExp(value, "g");
  var match = elem.match(regex);
  if(match != null && match.length == 1){
    console.log(elem);
  }

}
