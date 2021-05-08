document.addEventListener("DOMContentLoaded", init, false);
var preview = document.getElementById('Filelist');

//To save an array of attachments
var AttachmentArray = [];

//counter for attachment array
var arrCounter = 0;

//to make sure the error message for number of files will be shown only one time.
var filesCounterAlertStatus = false;

//un ordered list to keep attachments thumbnails
var ul = document.createElement("ul");
ul.className = "thumb-Images";
ul.id = "imgList";

function init() {

  //add javascript handlers for the file upload event
  document
    .querySelector("#files")
    .addEventListener("change", handleFileSelect, false);

}

//the handler for file upload event
function handleFileSelect(e) {
  //to make sure the user select file/files
  if (!e.target.files) return;

  //To obtaine a File reference
  var files = e.target.files;

  for (var i = 0, f; (f = files[i]); i++) {
    //instantiate a FileReader object to read its contents into memory
    var fileReader = new FileReader();

    // Closure to capture the file information and apply validation.
    fileReader.onload = (function(readerEvt) {
      return function(e) {
        //Apply the validation rules for attachments upload
        ApplyFileValidationRules(readerEvt);

        //Render attachments thumbnails.
        RenderThumbnail(e, readerEvt);

        //Fill the array of attachment
        FillAttachmentArray(e, readerEvt);
      };
    })(f);

    fileReader.readAsDataURL(f);
  }
  document
    .getElementById("files")
    .addEventListener("change", handleFileSelect, false);
}

jQuery(function($) {
  $("div").on("click", ".img-wrap .close", function() {
    var id = $(this)
      .closest(".img-wrap")
      .find("img")
      .data("id");

    var elementPos = AttachmentArray.map(function(x) {
      return x.FileName;
    }).indexOf(id);
    if (elementPos !== -1) {
      AttachmentArray.splice(elementPos, 1);
    }

    $(this)
      .parent()
      .find("img")
      .not()
      .remove();

    $(this)
      .parent()
      .find("div")
      .not()
      .remove();

    $(this)
      .parent()
      .parent()
      .find("div")
      .not()
      .remove();

    var lis = document.querySelectorAll("#imgList li");
    for (var i = 0; (li = lis[i]); i++) {
      if (li.innerText == "") {
        li.parentNode.removeChild(li);
      }
    }
  });

  //______________________Input checkbox___________________________
   $("div").on("click", 'input[type="checkbox"]', function() {
   $('input[type="checkbox"]').not(this).prop("checked", false);

 });
 });

//Apply the validation rules for attachments upload
function ApplyFileValidationRules(readerEvt) {
  //To check file type according to upload conditions
  if (CheckFileType(readerEvt.type) == false) {
    alert(
      "The file (" +
        readerEvt.name +
        ") does not match the upload conditions, You can only upload jpg/png/svg/jpeg files"
    );
    e.preventDefault();
    return;
  }

  //To check file Size according to upload conditions
//     if (CheckFileSize(readerEvt.size) == false) {
//         alert(
//         "The file (" +
//             readerEvt.name +
//             ") does not match the upload conditions, The maximum file size for uploads should not exceed 300 KB"
//         );
//         e.preventDefault();
//         return;
//   }

  //To check files count according to upload conditions
  if (CheckFilesCount(AttachmentArray) == false) {
    if (!filesCounterAlertStatus) {
      filesCounterAlertStatus = true;
      alert(
        "You have added more than 10 files. According to upload conditions you can upload 10 files maximum"
      );
    }
    e.preventDefault();
    return;
  }
}

//To check file type according to upload conditions
function CheckFileType(fileType) {
  if (fileType == "image/jpeg") {
    return true;
  } else if (fileType == "image/png") {
    return true;
  } else if (fileType == "image/svg") {
    return true;
  } else if (fileType == "image/jpg") {
    return true;
  } else {
    return false;
  }
  return true;
}

//To check file Size according to upload conditions
// function CheckFileSize(fileSize) {
//   if (fileSize < 300000) {
//     return true;
//   } else {
//     return false;
//   }
//   return true;
// }

//To check files count according to upload conditions
function CheckFilesCount(AttachmentArray) {
  //Since AttachmentArray.length return the next available index in the array,
  var len = 0;
  for (var i = 0; i < AttachmentArray.length; i++) {
    if (AttachmentArray[i] !== undefined) {
      len++;
    }
  }


    //  if(len=0 || len>0) preview.classList.remove('output-background--hidden');
    //   To check the length does not exceed 10 files maximum
    //   if (len > 9) {
    //     return false;
    //   } else {
    //     return true;
    //   }

}

//Render attachments thumbnails.
function RenderThumbnail(e, readerEvt) {
  var li = document.createElement("li");
  ul.appendChild(li);
  li.innerHTML = [
    '<div class="img-wrap"> <span class="close">&times;</span>' +
    '<div class="form-check" style="margin-top: -28px;" >' +
    '<label class="form-check-label"> ' +
    '<input class="form-check-input" type="checkbox" name="main_image" id="check" value="'+ readerEvt.name + '" >' +
    '<span class="form-check-sign" style="left: 44px; top: 45px;">' +
    '<span class="check" style="border-color: #ddd; border-radius: 15px; background: #dddddd78;"></span></span>' +
    '</label></div>' +
      '<img class="thumb" src="',
    e.target.result,
    '" title="',
    escape(readerEvt.name),
    '" data-id="',
    readerEvt.name,
    '"/>' + '</div>'
  ].join("");


  document.getElementById("Filelist").insertBefore(ul, null);
  document.getElementById('check').checked=true;
};


//Fill the array of attachment
function FillAttachmentArray(e, readerEvt) {
  AttachmentArray[arrCounter] = {
    AttachmentType: 1,
    ObjectType: 1,
    FileName: readerEvt.name,
    FileDescription: "Attachment",
    NoteText: "",
    MimeType: readerEvt.type,
    Content: e.target.result.split("base64,")[1],
    FileSizeInBytes: readerEvt.size
  };
  arrCounter = arrCounter + 1;
}


//_____________________________For Editing Images_______________________________
jQuery(function($) {

    var all_images = [];
    $('input[name="main_image"]').each(function() {
        all_images.push(this.value);
      });

    $("div").on("click",".img-wrap #close_image", function() {

    var updated_images = [];
     var images = $('input[name="main_image"]').each(function() {
        updated_images.push(this.value);
      });

     var deleted_images = [];
     deleted_images = all_images.filter(images => !updated_images.includes(images));


     $('input[name=deleted_images]').val( deleted_images, AttachmentArray);

     //__________________Main image___________________
     var check = false;
     for(var i in images){ images[i].checked == true ? check = true  : '' ; }
     check == false ? images[0].checked = true : '';
    });

   });
