$('#validations').validate({
    rules:{
        product_name: {
            required: true,
        },
        // category:{
        //     required:true,
        // },
        // sub_category:{
        //     required:true,
        // },
        product_price:{
            required:true,
        },
        discount:{
            required:true,
            prices:true,
        },
        product_quantity:{
            required:true,
        },
        sku_no:{
            required:true,
        },
        Image:{
            required:true,
        }
       
   
    },
    messages:{
        product_name: {
            required: 'Please Enter the Product name',
         
        },
        // category:{
        //     required:'Please Enter the Category name',
        // },
        // sub_category:{
        //     required:'Please Enter the sub category name',
        // },
        product_price:{
            required:'Please Enter the price',
        },
        discount:{
            required:'Please Enter the valid discount',
            prices:'Discount price cannot be greater than the product price.',
        },
        product_quantity:{
            required:'Please enter the qunatity',
        },
        sku_no:{
            required:'Please enter the sku number',
        },
        Image:{
            required:'please enter the images',
        }


    },
    
    
});



;

$(document).ready(function() {
    $.validator.addMethod("prices", function(value, element) {
        var productPrice = parseFloat($('#productPrice').val());
        var discountPrice = parseFloat(value);

        return discountPrice >= 0 && discountPrice <= productPrice;
    }, "Invalid discount price");

    $('#validations').validate({
        rules: {
            discount: {
                required:true,
                prices: true // Use the 'prices' validation method
            }
        },
        messages: {
            discount: {
                required:"Enter the Valid discount",
                prices: "Discount should be between 0 and product price.",
            }
        },
        submitHandler: function(form) {
            // Handle form submission here
            // The form will only be submitted if it passes validation
        }
    });
});


document.querySelectorAll('.view-btn').forEach(button => {
    button.addEventListener('click', event => {
        const categoryId = button.getAttribute('data-category-id');
        const categoryName = button.getAttribute('data-category-name');
        const categoryDescription = button.getAttribute('data-category-description');
        const categoryImagePath = button.getAttribute('data-category-path');
        const categoryParent = button.getAttribute('data-category-parent');

        const categoryIdPlaceholder = document.getElementById('category-id-placeholder');
        categoryIdPlaceholder.textContent = categoryId;
        categoryIdPlaceholder.style.display = 'inline';

        document.getElementById('categoryname').textContent = categoryName;
        document.getElementById('category-description').textContent = categoryDescription;
        document.getElementById('category-image').src = categoryImagePath;
        document.getElementById('category-parent').textContent = categoryParent;
    });
});

CKEDITOR.replace('comment', {
    enterMode: CKEDITOR.ENTER_BR,  // Use <br> for line breaks instead of <p>
    shiftEnterMode: CKEDITOR.ENTER_P,  // Use <p> for new paragraphs on Shift+Enter
    allowedContent: true,  // Allow any content even if it's not valid HTML
    autoParagraph: false  // Disable automatic <p> tag insertion
});

   var images=[];
        function image_select(){
            var image=document.getElementById('image').files;
            for(i=0;i<image.length;i++)
            {
                images.push({
                    "name":image[i].name,
                    "url":URL.createObjectURL(image[i]),
                    "file":image[i],

                })
            }
            // document.getElementById('form').reset();
            document.getElementById('container').innerHTML=image_show();
        }

        function image_show(){
            var image=" ";
            images.forEach((i)=>{
                image+=`<div class="multipleimage"><div class="justify-content-start">
                <div class="image_container d-flex justify-content-center position-relative">
                <img src="`+i.url+`" alt="Images">
                <span class="position-absolute" onclick="delete_image(`+ images.indexOf(i)+`)">&times;</span>
                </div></div>`;
            })
            return image;
        }
        function delete_image(e){
            images.splice(e,1);
            document.getElementById('container').innerHTML=image_show();
        }




     
    
  $(document).ready(function () {
    $('.slider').slick({
      autoplay: false,
      centerMode: true, // Center the active slide
      centerPadding: 50,
      slidesToShow: 1, // Display one slide at a time
      arrows: true, // Show navigation arrows
      prevArrow: '<button type="button" class="slick-prev">Previous</button>',
      nextArrow: '<button type="button" class="slick-next">Next</button>',
    });
  });

