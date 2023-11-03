$('#validations').validate({
    rules:{
        category_name: {
            required: true,
        },
        category_description:{
            required:true,
        },
       
        category_image:{
            required:true,
        },
        
        
    },
    messages:{
        category_name: {
            required: 'Please Enter the Category name',
         
        },
        category_description:{
            required:'Please enter the category description',
        },
        category_image: {
            required:'Please enter the Image',
        },
       
        

    },
    
    
});

CKEDITOR.replace('comment', {
    enterMode: CKEDITOR.ENTER_BR,
    shiftEnterMode: CKEDITOR.ENTER_P,
    allowedContent: true,
    autoParagraph: false,
    ignoreEmptyParagraph: true 
});


var a = document.getElementById("bulk");

function readUrl(input) {
    if (input.files && input.files[0]) {
        var file = input.files[0];
        var fileType = file.type;

       
        if (fileType === 'image/jpeg' || fileType === 'image/png') {
            var reader = new FileReader();
            reader.readAsDataURL(file);
            reader.onload = (e) => {
                a.src = e.target.result;
            }
        } else {
        
            toastr.warning('Please select a JPEG or PNG file.');
            input.value = '';
        }
    }
}
