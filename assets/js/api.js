 $(document).ready(function(){
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '362177161165494',
      cookie     : true,
      xfbml      : true, 
      version    : 'v3.3'
    });
      
 
FB.getLoginStatus(function(response) {
    statusChangeCallback(response);
});
      
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "https://connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
  	function statusChangeCallback(response) {
  		// body...
  		if (response.status==='connected') {
  			console.log("authenticated and connected");
  			testAPI();
  		}else{
  			console.log("Not login");
  		}
  	}

function checkLoginState() {
  FB.getLoginStatus(function(response) {
    statusChangeCallback(response);
  });
}
function testAPI(argument) {
	// body...
	FB.api('me?fields=id,name,email',function(response) {
		// body...
		if (response &&  !response.error) {
    fb_id = response.id;
		name   = response.name;
		email = response.email;
/*    var obj = { name: name, age:fb_id, city: email };
    var myJSON = JSON.stringify(obj);*/
//    name=&email=&mobile=&password=&type=users
    var f = 's_id='+fb_id+'&name='+name+'&email='+email+'&type='+'users';
    console.log(f);
  $.ajax({
        url: 'http://localhost/Cheepu/pages/apiregister',
        type: "POST",
        data: f,
        dataType: 'json',
        success: function(data){
          console.log(data);
            $("#iframeloading").hide();
          if(data.status == true){
            alert("Account Created");

          }else
          alert(data.status);
        },
        error: function(){
          $("#iframeloading").hide();
          alert("Not Working");
        }  
     }); 

		}
	})
}
});