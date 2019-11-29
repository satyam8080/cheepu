var base_url = "http://localhost/Cheepu/";
$(document).ready(function(){
/* update profile */
  $('#EditProfile').on("click",function() {
    // body...
    $("#profileName").removeAttr("disabled");
    $("#profileUserName").removeAttr("disabled");
    $("#profileEmail").removeAttr("disabled");
    $("#profilePhone").removeAttr("disabled");
    $("#EditProfile").css('display','none'); 
    $("#UpdateProfile").css('display','block'); 
  });

  $('#UpdateProfile').on("click",function() {
    // body...
    $("#profileName").attr("disabled",true);
    $("#profileUserName").attr("disabled",true);
    $("#profileEmail").attr("disabled",true);
    $("#profilePhone").attr("disabled",true);
    $("#EditProfile").css('display','block'); 
    $("#UpdateProfile").css('display','none'); 
  });

  /checkout option/
 /*product description show more*/
 $(".show-more button").on("click", function() {
    var $this = $(this); 
    var $content = $this.parent().prev("div.content");
    var linkText = $this.text().toUpperCase();    
    
    if(linkText === "SHOW MORE"){
        linkText = "Show less";
        $content.switchClass("hideContent", "showContent", 400);
    } else {
        linkText = "Show more";
        $content.switchClass("showContent", "hideContent", 400);
    };

    $this.text(linkText);
});
 
 /*end of product description*/


function ayu() {
  // body...
    console.log("ayu was called");
      $.ajax({
        url: base_url+'pages/products_in_cart',
        type: "POST",
        data: "12", 
        dataType: 'json',
        success: function(data){
          if(data.status){
       //      alert(data.status);
                  var i = $('#products_in_cart').text();
       //           alert(i);
                  $('#products_in_cart').text(data.status);
             }else
             console.log("false");
        },
        error: function(){
          alert("ayu not working");          
         }  
     });
}

  jQuery('.removefromcart').click(function(){
     ayu();

      jQuery('#rfc' + $(this).attr('pid'));
      var product = '#rfc' + $(this).attr('pid');
      var cart_id = $(this).attr('pid');
       
      var r = confirm("Are u sure? want to remove it?");
      if (r == true) {
      $(product).hide();
      console.log("You pressed OK!") ;
    $.ajax({
        url: base_url+'cart/removeFromCart/'+cart_id,    
        type: "POST",
        data: "12", 
        dataType: 'json',
        success: function(data){
          if(data.status){
        //     alert(data.status);
             location.reload();
             }
        },
        error: function(){
          alert("not wokring");          
         }  
     });
     //end of ajax    
  } else { // end of iff
    console.log("You pressed Cancel!") ;
  }
 
  });
//adding to product to cart 
    jQuery('.addtocart').click(function(){
      jQuery('#atc' + $(this).attr('pid'));
      jQuery('#atcc' + $(this).attr('pid')); 
      var atc = $(this).attr('pid');
      var atcc ='#atcc'+ $(this).attr('pid'); 
      var quty =$(atcc).val();
     // alert(quty);
//adding data to db
      var product = $(this).attr('pid') + "-" + quty;
     // alert(product);
     //showing floating message


     ayu();
    $.ajax({
        url: base_url+'pages/add_to_cart/'+product,    
        type: "POST",
        data: "12", 
        dataType: 'json',
        success: function(data){
          if(data.status=='001'){
$("<div>Product Already Added</div>").floatingMessage({
                    position : "bottom-left",
                    padding : 20,
                    time:2000,
                    show : "fold",
                    hide : "explode",
                    stuffEaseTime : 500,
                    stuffEasing : "swing",
                    moveEaseTime : 200,
                    moveEasing   : "easeInExpo",
                    position : "bottom-left",
                    className : "ui-state-error"
                }
                );            
             }
             else{
              ayu();
$("<div>Product Added to cart</div>").floatingMessage({
                    position : "bottom-left",
                    padding : 20,
                    time:2000,
                    show : "fold",
                    hide : "explode",
                    stuffEaseTime : 500,
                    stuffEasing : "swing",
                    moveEaseTime : 200,
                    moveEasing   : "easeInExpo"
                }
                );
             }
        },
        error: function(){
          alert("Sign in please");          
         }  
     });


    });
       //product info jquery
    $(document).ready(function(){
            //-- Click on QUANTITY
            $(".btn-minus").on("click",function(){
                var now = $(".section > div > input").val();
                if ($.isNumeric(now)){
                    if (parseInt(now) -1 > 0){ now--;}
                    $(".section > div > input").val(now);
                }else{
                    $(".section > div > input"+$(this).attr('pid')).val("1");
                }
            })            
            $(".btn-plus").on("click",function(){
                var now = $(".section > div > input").val();
                if ($.isNumeric(now)){
                    $(".section > div > input").val(parseInt(now)+1);
                }else{
                    $(".section > div > input").val("1");
                }
            })                        
        })
//----------------------------------------------------------------------------------------------------------------------------------------------/
  //function to add data to product info table
  function add_product_to_shop($q) {
    // body...
    $.ajax({
        url: base_url+'seller/add_product_to_shop  ',    
        type: "POST",
        data: $('#addpro'+$q).serialize(), 
        dataType: 'json',
        success: function(data){
          console.log($('#addpro'+$q).serialize());
          if(data.status){
             alert(data.status);
          }
        },
        error: function(){
          alert("not wokring");
         }  
     });        
  }
  function remove_from_shop(q) {
    // body...
    $.ajax({
        url: base_url+'seller/remove_product_from_shop/'+q,    
        type: "POST",
        data: q, 
        dataType: 'json',
        success: function(data){
            console.log("suc");
          if(data.status){
             alert(data.status);
          }
        },
        error: function(){
          alert("not wokring");
         }  
     });
  }

  
// dissapper the buttons
  jQuery('.addp').click(function() {
    
    jQuery('#add' + $(this).attr('pid')).hide();
    jQuery('#matter' + $(this).attr('pid')).hide();
    jQuery('#edit' + $(this).attr('pid')).show();
    add_product_to_shop($(this).attr('pid'));
  })
  jQuery('.editp').click(function() {
    jQuery('#add' + $(this).attr('pid')).show();
    jQuery('#matter' + $(this).attr('pid')).show();
    jQuery('#edit' + $(this).attr('pid')).hide();
  })
  jQuery('.reject').click(function() {
    jQuery('#di' + $(this).attr('id')).hide();
    var q =$(this).attr('id');
    remove_from_shop(q);
  })

/*//code to get the location
    $('#name').on('blur',function(){
        getLocation();
      function getLocation() {
         if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
          } else { 
            x.innerHTML = "Geolocation is not supported by this browser.";
              }
        }

        function showPosition(position) {
              document.getElementById("lat").value = position.coords.latitude ;
              document.getElementById("lon").value = position.coords.longitude;
            }
    } );*/ 


//Sign In Code
    $('#signin').on('click',function(){
      mobile = $('#lmobile').val();
      password = $('#lpassword').val();
    if(mobile == '')
    {
    alert('Please enter your mobile');
    $('#lmobile').focus(); //The focus function will move the cursor to "fullname" field
    }else 
    if(password == '')
    {
    alert('Please enter your password');
    $('#lpassword').focus(); //The focus function will move the cursor to "fullname" field
    }else{
        $("#iframeloading").show(); 
        $.ajax({
        url: base_url+'pages/login',    
        type: "POST",
        data: $('#signinform').serialize(),
        dataType: 'json',
        success: function(data){
          //console.log(data);
          if(data.status){
             $("#iframeloading").hide();
            if(data.status){

              if(data.status=="users"){
                var pathname = window.location.pathname;
                console.log(pathname);
               window.location = pathname;
               // alert(data.status);
              }
               else if (data.status=="103") {
                alert("Wrong Credential");
               }
              }
              else{
                $("#iframeloading").hide();
                alert("Wrong Password"); 
              }
          }
        },
        error: function(){
         $("#iframeloading").hide();
          alert("not working");
        }  
     });  
    }


  });  

  // Sign up code
  $('#signup').on('click',function(){
     $("#iframeloading").show();
      name = $('#name').val();
      email = $('#email').val();
      mobile = $('#mobile').val();
      password = $('#password').val();


      var number_regx = /^[6-9][0-9]{9}$/;
      var email_regx = /^([a-z 0-9\.-]+)@([a-z0-9-]+).([a-z]{2,8})(.[a-z]{2,8})?$/;
    
    if(name == '')
    {
    alert('Please enter your Full Name');
    $('#name').focus(); //The focus function will move the cursor to "fullname" field
    }else 
    if(mobile == '')
    {
    alert('Please enter your mobile');
    $('#mobile').focus(); //The focus function will move the cursor to "fullname" field
    }else if (number_regx.test(mobile)) {
       //alert('Mobile Number Accept');
    $('#mobile').focus();

    } else {
      alert("Please Enter Valid Mobile Number");
    }
    if(email == '')
    {
    alert('Please enter your email');
    $('#email').focus(); //The focus function will move the cursor to "fullname" field
    } else if (email_regx.test(email)) {
       //alert('Email  Accept');
    $('#email').focus();

    } else {
      alert("Please Enter Valid Email");
    }

    if(password == '')
    {
    alert('Please enter your password');
    $('#name').focus(); //The focus function will move the cursor to "fullname" field
    }else{
    $.ajax({
        url: base_url+'pages/register',
        type: "POST",
        data: $('#signupform').serialize(),
        dataType: 'json',
        success: function(data){
          //console.log(data);
            $("#iframeloading").hide();
          if(data.status == true){
            alert("Account Created");
      //      location.reload();
          }else
          alert("Account not Created");
        },
        error: function(){
          $("#iframeloading").hide();
          alert("Not Working");
        }  
     });      
    } 



  });
   $('#order_add').on('click',function(){
     $("#iframeloading").show();  
   $.ajax({
        url: base_url+'Cart/order_address',
        type: "POST",
        data: $('#order_form').serialize(),
        dataType: 'json',
        success: function(data){
          //console.log(data);
            $("#iframeloading").hide();
          if(data.status==true){
            alert("address saved"); 
      //      location.reload();
          }else
          alert("Address not Saved");
        },
        error: function(){
          $("#iframeloading").hide();
          alert("Not Working");
        }  
     });      
  });
  $('#order_confirm').on('click',function(){
    alert("hyyy");
  }); 

});