$(document).ready(function(){
    $(".addcatBtn").on('click',function(event){
        event.preventDefault();
        var categoryName = $('.category-name').val();
        if(!categoryName || categoryName == ''){
            alert('Field is required');
        }

        $.ajax({
            url:'script/save-category.php',
            type:'POST',
            data:{category_name :categoryName},
            success:function(data){
                if(data == 'Category Added'){
                    alert("Category Successfully added");
                    $('.category-name').val('');
                }else{
                    alert("Category can't be added");
                }
            }
        })
    });
})