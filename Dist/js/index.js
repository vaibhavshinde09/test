$(document).ready(function(){
      fetchUser(); //This function will load all data on web page when page load
      function fetchUser() // This function will fetch data from table and display under <div id="result">
      {
       var action = "Load";
       $.ajax({
        url : "action.php", //Request send to "action.php page"
        method:"POST", //Using of Post method for send data
        data:{action:action}, //action variable data has been send to server
        success:function(data){
              console.log(data);
         $('#resultset').html(data); //It will display data under div tag with id result
        }
       });
      }
     
    $('#usercheck').hide();
   $('#emailcheck').hide();
   $('#mobilecheck').hide();
   $('#gendercheck').hide();
   
   var user_err = true;
   var email_err = true;
   var mobile_err = true;
   var gender_err = true;
   
       $('#user_name').keyup(function(){
       username_check();
       });
   
       function username_check(){
                var user_val = $('#user_name').val();
   
                      if(user_val.length == ''){
                           $('#usercheck').show();
                           $('#usercheck').html("**Please Fill the username");
                           $('#usercheck').focus();
                           $('#usercheck').css("color","red");
                           user_err = false;
                           return false;
                     }
                     else{
                           $('#usercheck').hide();
                           }
   
                           if((user_val.length < 3 ) || (user_val.length > 10 ) ){
                           $('#usercheck').show();
                           $('#usercheck').html("**Username length must be between 3 and 10");
                           $('#usercheck').focus();
                           $('#usercheck').css("color","red");
                           user_err = false;
                           return false;
                     }else{
                          $('#usercheck').hide();
                         }
               }
      $('#user_email').keyup(function(){
        email_check();
       });
   
       function email_check(){
   
                       var email_val = $('#user_email').val();
   
                       if(email_val.length == ''){
                       $('#emailcheck').show();
                       $('#emailcheck').html("**Please Fill the email");
                       $('#emailcheck').focus();
                       $('#emailcheck').css("color","red");
                       email_err = false;
                       return false;
                       }else{
                       $('#emailcheck').hide();
                       }
                       if(email_val.indexOf('@') <= 0 ){
   
                       $('#emailcheck').show();
                       $('#emailcheck').html("**email must be proper format");
                       $('#emailcheck').focus();
                       $('#emailcheck').css("color","red");
                       email_err = false;
                       return false;
                       }
                       else if((email_val.charAt(email_val.length-4)!='.') && (email_val.charAt(email_val.length-3)!='.'))
                       {
                           $('#emailcheck').show();
                           $('#emailcheck').html("**email must be proper format");
                           $('#emailcheck').focus();
                           $('#emailcheck').css("color","red");
                           email_err = false;
                           return false;
                       }else{
                       $('#emailcheck').hide();
                       }
             }
            $('#phone_no').keyup(function(){
            mobile_check();
            });
            function mobile_check(){
                var mobile_val = $('#phone_no').val();
   
                      if(mobile_val.length == ''){
                           $('#mobilecheck').show();
                           $('#mobilecheck').html("**Please Fill the Mobile");
                           $('#mobilecheck').focus();
                           $('#mobilecheck').css("color","red");
                           mobile_err = false;
                           return false;
                     }
                     else{
                           $('#mobilecheck').hide();
                           }
                      if(isNaN(mobile_val)){
                           $('#mobilecheck').show();
                           $('#mobilecheck').html("**Plz Enter Only Number");
                           $('#mobilecheck').focus();
                           $('#mobilecheck').css("color","red");
                           mobile_err = false;
                           return false;
                     }
                           
                     else if((mobile_val.charAt(0)!=9) &&(mobile_val.charAt(0)!=8) && (mobile_val.charAt(0)!=7)){
                         
                           $('#mobilecheck').show();
                            $('#mobilecheck').html("**Mobile Number Should be start 7,8 and 9");
                           $('#mobilecheck').focus();
                           $('#mobilecheck').css("color","red");
                           mobile_err = false;
                           return false;
                         
                     }
                      else if((mobile_val.length!=10 )){
                           $('#mobilecheck').show();
                           $('#mobilecheck').html("**Mobile Number Must Be 10 Digit");
                           $('#mobilecheck').focus();
                           $('#mobilecheck').css("color","red");
                           mobile_err = false;
                           return false;
                     }				  
                         else{
                          $('#mobilecheck').hide();
                         }
               }
   $('#gender').change(function(){
       gender_check();
       });
   
       function gender_check(){
           
               // var gen_val = $('#gender').val();
                var gender=$('#gender').val();
             if ($("#gender:checked").length == 0){
   
                           $('#gendercheck').show();
                           $('#gendercheck').html("**Plz select The Gender");
                           $('#gendercheck').focus();
                           $('#gendercheck').css("color","red");
                           gender_err = false;
                           return false;
                     }
       
                     else{
                           $('#gendercheck').hide();
                           }
                           
               }
   
         $('#save').click(function(e){ 
           e.preventDefault();
   
                user_err = true;
   
               email_err= true;
               mobile_err= true;
               gender_err= true;
   
               username_check();
               email_check();
               mobile_check();
               gender_check();
   
               if((user_err == true ) && (email_err == true ) && (mobile_err == true) && (gender_err == true) ){
                 $.ajax({  
                        url:"action.php",  
                        method:"POST",  
                       data:$("#form-data").serialize()+"&action=save",
                        success:function(data){
                          debugger;
                          console.log(data);
                          $("#result").html(data);
                        //  alert(data);
                          $("#form-data") [0].reset(); 
                          fetchUser(); //This function will load all data on web page when page load
      
                         }     				
                                    
                   });
               return true;
               }else{
               return false;
               }
   
   
                                  
         });
         });