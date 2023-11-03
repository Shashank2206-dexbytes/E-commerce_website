var a=document.getElementById("bulk");
function readUrl(input)
{
        if(input.files){
            var reader=new FileReader();
            reader.readAsDataURL(input.files[0]);
            reader.onload=(e)=>{
                a.src=e.target.result;
            }
        }
}



CKEDITOR.replace('comment', {
    enterMode: CKEDITOR.ENTER_BR,
    shiftEnterMode: CKEDITOR.ENTER_P,
    allowedContent: true,
    autoParagraph: false,
    ignoreEmptyParagraph: true  
});