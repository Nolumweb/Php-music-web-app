// $(document).ready(function(){

//     // alert("redy")
//     $('textarea#body').summernote({
//         height: '300px'
//     });
   

//   // targetting the checkbox so that when i click on it, it will check all other boxes.
//   $('#selectAllBoxes').click(function(e){
//       if(this.checked){
//           $('.checkBoxes').each(function(){
//               this.checked = true;
//           })
//       }else{
//           this.checked = false;
//       }
//   });

 
  // CODES FOR LOADER
  // var div_box = "<div id='load-screen'><div id='loading'></div></div>";

  // $('body').prepend(div_box);
  // $("#load-screen").delay(700).fadeOut(600, function(){
  //     $(this).remove;
  // })


  // MY AJAX 
 
  // function loadUsersOnline() {
  //     $.get("functions.php?onlineusers=result", function(data){
          
  //         $(".usersonline").text(data);
  //     });
  
  // }
  // setInterval(function(){
  
  //     loadUsersOnline();
  
  // },500);



 
// })

$(document).ready(function() {
    // alert("yoyoy")
    $('#summernote').summernote();
  });