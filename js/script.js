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
                if(data == 'Category Deleted'){
                    loadCategories();
                    alert('Category Deleted');
                }else{
                    alert("Category cannot deleted");
                }
            }
        });
    });

    // show update-category-modal-box
    $(document).on('click','.fa-edit',function(){
        $('.update-category-box').css("display","flex");
        var update_id = $(this).data('updatecatid');
        $.ajax({
            url:'script/modal-box.php',
            type:'POST',
            data:{updateID:update_id},
            success:function(data){
                $('.update-category-box').html(data);
            }
        })
    });
    
    // hide update-category-modal-box
    $('.update-category-box').on('click',function(){
        if($(event.target).is(this)){
            $(this).css("display","none");
        }
    });

    // update category button handler 
    $(document).on('click','.updatecatBtn', function(event){
        event.preventDefault();
        var update_category_value = $('.update-category-value').val();
        var update_category_id = $('.update-category-id').val();
        $.ajax({
            url:'script/save-update-category.php',
            type:'POST',
            data:{
                updatecategoryvalue: update_category_value,
                updatecategoryid: update_category_id
            },
            success:function(data){
                loadCategories();
                $('.update-category-box').css("display","none");

            }
        });
    });

    // handle pagination 
    $(document).on('click','.page-link',function(event){
        event.preventDefault();
        var pageNo = $(this).data('page');
        $.ajax({
            url:'script/show-category.php',
            type:'POST',
            data:{page_no:pageNo},
            success:function(data){
                $('.category-output').html(data);
            }
        })
    })
});