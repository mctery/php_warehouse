// function insert_product(file){
//   var formData = new FormData(file);
//       formData.append('file', $('#img_file')[0].files[0]);
//       alert(file);
//   var result = $.ajax({
//     url: "insert_product.php",
//     type: "post",
//     data: formData,
//     data: $("#p_insert").serialize(),
//     success: function(text){
//       console.log(text);
//       /*if(text == "" || text === undefined){
//         $('#alert_d').fadeIn();
//         setTimeout(function(){
//           $('#alert_d').fadeOut();
//         },2000);
//       }
//       else{
//         $('#alert_s').fadeIn();
//         setTimeout(function(){
//           $('#alert_s').fadeOut();
//           window.location.href = "login/index.php";
//         },2000);
//       }*/
//     }
//     });
//   };
