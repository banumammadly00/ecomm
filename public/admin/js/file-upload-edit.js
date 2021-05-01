/*var ul=document.createElement('ul');
ul.className = "thumb-Images";
ul.id = "imgList";
let images = document.getElementById('existingImages').value;
let result =images.split(',');


for(var i =0 ; i < result.length; i++){
        var li=document.createElement('li');
        li.innerHTML=[
            '<div class="img-wrap" > <span class="close">&times;</span>' +
            '<div class="form-check" style="margin-top: -28px;" >' +
            '<label class="form-check-label"> ' +
            '<input class="form-check-input" type="checkbox" name="main_image" id="check" value="'+ result[i] + '"' + ( i==0 ? 'checked' : '"" ') + '>' +
            '<span class="form-check-sign" style="left: 44px; top: 45px;">' +
            '<span class="check" style="border-color: #ddd; border-radius: 15px; background: #dddddd78;"></span></span>' +
            '</label> </div>' +
              '<img class="thumb" src="http://127.0.0.1:8000/storage/images/'+ result[i] + '" data-id="' + i + '"' +
              '</div>'
          ];
        ul.appendChild(li);
        }
    document.getElementById('existing-images').appendChild(ul);*/

//     function result_count(){
//         let image_array= [];
// for (var i = 0; i < result.length; i++){
//  t= document.querySelectorAll("#check") ;
//  image_array.push( t[i]['defaultValue']);
//  console.log(image_array);
// }
//     }
//     window.setInterval(result_count, 1000);

// window.addEventListener('DOMNodeRemoved', function(){
//   // let image_array= [];
//   // for (var i = 0; i < result.length; i++){
//   //    t= document.querySelectorAll("#check") ;
//   //    image_array.push( t[i]['defaultValue']);
//   //   // console.log(image_array);
//   //   }
//   // console.log(image_array);
//   console.log('location changed! 2');


// }, true);

// var check_list = setInterval(function(){

//   let image_array= [];
//   for (var i = 0; i < result.length; i++){
//   t= document.querySelectorAll("#check") ;
//   image_array.push( t[i]['defaultValue']);
//   console.log(image_array);
//   if(result.length != image_array.length){  }
//   }
// },2000);

