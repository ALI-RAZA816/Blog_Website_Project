$(document).ready(function(){

    // load categories from Database
    function loadCategories(){
        $.ajax({
            url:'script/show-category.php',
            success:function(data){
                $('.category-output').html(data);
            }
        });
    }
    loadCategories();

    // add category
    $(".addcatBtn").on('click',function(event){
        event.preventDefault();
        var categoryName = $('.category-name').val();
        if(!categoryName || categoryName == ''){
            alert('Field is required');
            return;
        }
        $.ajax({
            url:'script/save-category.php',
            type:'POST',
            data:{category_name :categoryName},
            success:function(data){
                if(data == 'Category Added'){
                    loadCategories();
                    alert("Category Successfully added");
                    $('.category-name').val('');
                }else{
                    alert("Category can't be added");
                }
            }
        })
    });

    // delete category
    $(document).on('click','.fa-trash',function(){
        var catId = $(this).data('catid');
        $.ajax({
            url:'script/delete-category.php',
            type:'POST',
            data:{cat_id :catId},
            success:function(data){
                if(data== 'Category Deleted'){
                    loadCategories();
                    alert('Category Deleted');
                }else{
                    alert("Category cannot deleted");
                }
            }
        })
    })
});