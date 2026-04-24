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

    function posts_category(){
        $.ajax({
            url:'script/load-post-category.php',
            success:function(data){
                $('.category-box').html(data);
            }
        });
    }
    posts_category();

    
    // handle header profile-img
    function profile_img(){
        $.ajax({
            url:"script/profile-img.php",
            success:function(data){
                $(".profile-img").html(data);
            }
        });
    }
    profile_img();

    // load recent users
    function loadRecentUsers(){
        $.ajax({
            url:"script/recent-user.php",
            success:function(data){
                $(".recent-users").html(data);
            }
        });
    };
    loadRecentUsers();

      // handle total users | admins
    function users_admins(){
        $.ajax({
            url:'script/user-count.php',
            success:function(data){
                $('.user-cards').html(data);
            }
        });
    };
    users_admins();

    // show uploaded-post on post.php file
    function show_posts(){
        $.ajax({
            url:'script/show-post.php',
            success:function(data){
                $('.posts').html(data);
            }
        });
    }
    show_posts();

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
                loadRecentUsers();
                users_admins();
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
                    loadRecentUsers();
                    users_admins();
                    alert("Account successfully created");
                    $('.firstname').val('');
                    $('.lastname').val('');
                    $('.password').val('');
                    $('.email').val('');
                    window.location.href = "http://localhost/Blog_Website_Project/admin/dashboard/login.php";
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
                    alert("User Successfully Deleted");
                    loadUsers();
                    profile_img();
                    loadRecentUsers();
                    users_admins();
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
                profile_img();
                users_admins();
                loadRecentUsers();
            },
            error:function(){
                alert("Error");
            }
        })
    });

    // show logout button 
    $(".user").on('click',function(){
        $(".logout").toggleClass("showlogbutton");
    });

    // handle login
    $(".login-button").on('click',function(event){
        event.preventDefault();
        var login_email = $(".login-email").val();
        var login_password = $(".login-password").val();

      
        if(!login_email || login_email == ''){
            alert("Email is required");
            return;
        }
        if(!login_password || login_password == ''){
            alert("Password is required");
            return;
        }
        $.ajax({
            url:'script/save-login.php',
            type:'POST',
            data:{
                email:login_email,
                password:login_password
            },
            success:function(data){
                if(data == "Login Successful"){
                    alert("Successful");
                    window.location.href = "http://localhost/Blog_Website_Project/admin/dashboard/dashboard.php";
                    profile_img();
                    loadRecentUsers();
                    users_admins();
                }else if(data == "Incorrect email"){
                    alert("Incorrect email");
                }else if(data == "Incorrect password"){
                    alert("Incorrect password");
                }else if (data == "Can't Login"){
                    alert("Can't Login");
                }
            }
        });
    });
    
    // handle logout
    $(".logout-button").on('click',function(){
       $.ajax({
           url:"script/logout.php",
           success:function(){
                profile_img();
                users_admins();
               window.location.href = "http://localhost/Blog_Website_Project/admin/dashboard/index.php";
            }
       });
    });

    // handle user pagination
    $(document).on('click','.user-pagination',function(event){
        event.preventDefault();
        var user_page_no = $(this).data('userpage');
        $.ajax({
            url:"script/show-user.php",
            type:'POST',
            data:{pageNo:user_page_no},
            success:function(data){
                $('.userOuput').html(data);
            }
        });
    });

    // handle upload post
    $('.post-upload-button').on('click',function(event){
        event.preventDefault();
        var title = $('.post-title').val();
        var description = $(".post-description").val();
        var category = $('.post-category').val();
        var image = $('.post-img').val();

        if(!title){
            alert("Title is required");
            return;
        }

        if(!description){
            alert("Description is required");
            return;
        }

        if(!category){
            alert("Category is required");
            return;
        }

        if(!image){
            alert("Image is required");
            return;
        }

        $('.category').each(function(){
            if($(this).is(":checked")){
                value = $(this).val();
            };
        });
        var form = $(this).closest('form')[0];
        var formdata = new FormData(form);

        $.ajax({
            url:'script/upload-post.php',
            type:'POST',
            data: formdata,
            contentType:false,
            processData:false,
            success:function(data){
                if(data === 'Post successfully uploaded'){
                    alert('Post successfully uploaded');
                    window.location.href = "http://localhost/Blog_Website_Project/admin/dashboard/post.php";
                }else{
                    alert("Post cannot be uploaded");
                }
            }
        });
    });

    // handle post-page pagination
    $(document).on('click','.post-pagination', function(event){
        event.preventDefault();
        var post_page_number = $(this).data("postpage");

        $.ajax({
            url:'script/show-post.php',
            type:'POST',
            data:{page_no:post_page_number},
            success:function(data){
                $('.posts').html(data);
            }
        })
    })

    // delete post
    $(document).on("click",".delete-post",function(){
        var delete_post_id = $(this).data("deletepostid");
        $.ajax({
            url:"script/delete-post.php",
            type:'POST',
            data:{post_delete_id:delete_post_id},
            success:function(data){
                $('.posts').html(data);
                show_posts();
            }
        });
    });

    // show edit-post-modal-box
    $(document).on('click',".edit-post",function(){
        var editId = $(this).data('editpostid')
        $(".edit-post-modal-box").css('display','block');
        $.ajax({
            url:'script/edit-post-modal-box.php',
            type:'POST',
            data:{edit_id:editId},
            success:function(data){
                $('.edit-post-modal-box').html(data);
            }
        })
    });

    // hide edit-post-modal-box
    $(document).on('click',".hide-edit-post-box",function(){
        $(".edit-post-modal-box").css('display','none');
    });

    $(document).on('click',".edit-post-button",function(event){
        event.preventDefault();
        var form = $(this).closest('form')[0];
        var formdata = new FormData(form);
        $.ajax({
            url:'script/save-edit-post.php',
            type:'POST',
            data:formdata,
            contentType:false,
            processData:false,
            success:function(data){
                if(data == "Post updated"){
                    alert("Post updated");
                    $(".edit-post-modal-box").css('display','none');
                    show_posts();
                }else{
                    alert("Post cannot updated");
                }
            }
        });
    });

    // handle website setting 
    $(".save-changes").on('click',function(event){
        event.preventDefault();
        if(!$("#website_title").val()){
            alert("Website name is required");
            return;
        }
        if(!$("#sub_description").val()){
            alert("Subscription description is required");
            return;
        }
        if(!$("#f_description").val()){
            alert("Footer description is required");
            return;
        }
        var form = $(this).closest('form')[0];
        var formData = new FormData(form);

        $.ajax({
            url:'script/settings.php',
            type:'POST',
            data: formData,
            contentType:false,
            processData:false,
            success:function(data){
                alert("Changes saved successfully");
            }
        });
    });

});