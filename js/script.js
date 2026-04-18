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
    $(document).on('click','#delete-category',function(){
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
    $(document).on('click','#update-category',function(){
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
        });
    });

       // show user data from database
    function loadUsers(){
        $.ajax({
            url:'script/show-user.php',
            success:function(data){
                $('.userOuput').html(data);
            }
        })
    }
    loadUsers();


    // signup page
    $('.signup').on('click',function(event){
        event.preventDefault();
        
        var firstname = $('.firstname').val();
        var lastname = $('.lastname').val();
        var password = $('.password').val();
        var email = $('.email').val();

        if(!firstname || firstname == ''){
            alert("Name is required");
            return;
        }
        if(!lastname || lastname == ''){
            alert("Lastname is required");
            return;
        }
        if(!password || password == ''){
            alert("Password is required");
            return;
        }
        if(!email || email == ''){
            alert("Email is required");
            return;
        }

        $.ajax({
            url:'script/user.php',
            type:'POST',
            data:{
                first_name:firstname,
                last_name:lastname,
                user_name: firstname + lastname,
                password:password,
                Email:email
            },
            success:function(data){
                if(data == "Name already exists"){
                    alert("Name already exists");
                }else if (data == "Lastname already exists"){
                    alert("Lastname already exists");
                }else if(data == "Email already exists"){
                    alert("Email already exists");
                }else if(data == "Failed to inserted data"){
                    alert("Failed to inserted data");
                }else if(data == "Data successfully inserted"){
                    loadUsers();
                    alert("Data successfully inserted");
                    $('.firstname').val('');
                    $('.lastname').val('');
                    $('.password').val('');
                    $('.email').val('');
                    window.location.href = "http://localhost/Blog_Website_Project/admin/dashboard/dashboard.php";
               }
            }
        });
    });

    // delete user
    $(document).on('click',"#delete-user",function(){
        var deleteId = $(this).data('userid');
        $.ajax({
            url:'script/delete-user.php',
            type:'POST',
            data:{delete_id:deleteId},
            success:function(data){
                if(data == "User successfully deleted"){
                    loadUsers();
                    alert("User Successfully Deleted");
                }else{
                    alert("User cannot Deleted");
                }
            }
        })
    });

    // show edit-user-modal-box
    $(document).on("click","#edit-user",function(){
        $(".edit-user-form").css("display","flex");
        var editId = $(this).data('editid');
        $.ajax({
            url:'script/edit-user.php',
            type:'POST',
            data:{edit_id:editId},
            success:function(data){
                $('.edit-user-form').html(data);
            }
        })
    });

    // hide edit-user-modal-box
    $(".edit-user-form").on("click",function(){
        if($(event.target).is(this)){
            $(".edit-user-form").css("display","none");
        }
    });

    // save-update-user data
    $(document).on('click',".user-update",function(event){
        event.preventDefault();
        var form = $(this).closest('form')[0]; // get the form element
        var formData = new FormData(form); 
        $.ajax({
            url:'script/save-edit-user.php',
            type:'POST',
            data:formData,
            contentType:false,
            processData:false,
            success:function(data){
                $(".edit-user-form").css("display","none");
                loadUsers();
            },
            error:function(){
                alert("Error");
            }
        })
    })

});