<?php include("header.php");?>
    
  
         <?php
         if(isset($_REQUEST['status']))
         {
             echo "<p>Account created sucessfully.Please activate your account</p>";
             
         }
         
         ?>
         
    <?php
         if(isset($_POST['reg']))
         {
             $name=$_POST['uname'];
             $email=$_POST['email'];
             $pwd=md5($_POST['pass']);
             $mobile=$_POST['mobile'];
             $gender=(isset($_POST['gender'])? $_POST['gender'] : "");
             $terms=(isset($_POST['terms'])?$_POST['terms'] : "");
             $address=$_POST['address'];
             $dob=$_POST['dob'];
             $city=$_POST['city'];
             $state=$_POST['state'];
             $ip=$_SERVER['REMOTE_ADDR'];
                
           
                 $con=mysqli_connect("localhost","root","","7am");
                 mysqli_query($con,"insert into register(username,email,mobile,gender,dob,city,state,address,password,terms,IP) values('$name','$email','$mobile','$gender','$dob','$city','$state','$address','$pwd','$terms','$ip')");
                 
                 if(mysqli_affected_rows($con)==1)
                 {
                     $id=mysqli_insert_id($con);
                     
                     /*Syntax-mail(to address,subject,message, mailheader(optional));
                 mail function-Using this message we can send an email.
                 example-: mail("anurag@gmail.com","Activation","Hello how are you?");
                 */
                     $to=$email;
                   $subject="Activation link";
                   $message="Hello ".$name."<br><br>Thanks for creating account details of your account are <br> <br> 
                   email: Your email password ".$_POST['pass']."<br><br> To get access with your website please click the below link to activate your account <br><br> <a target='_blank' href='http://localhost:100/7am/activate.php?aid".$id."'>Activate Now</a><br><br>Thanks<br>Health Humour";
                     
                     $mheader="Content-Type:text/html";
                     if(mail($to,$subject,$message,$mheader))
                     {
                         header("Location:register.php?status=true");
                         
                         
                     }
                     
                     else
                     {
                         echo "<p>Sorry! Unable to send the email. Contact admin";
                     }
                 
                 }
                     
                     /* Update - Using this statement we can update the record based on conditions.
                     
                     Syntax- Update <table-name> SET column='value1', column2='value2' where condition
                     
                     Example- Updaate register SET status ="Active" where  id=$id;
                     */
         }
         
         ?>
         <div class="banner">
         <fieldset>
                <legend align="center" font-size="25px">Registration Form</legend>
        <center>
             <form method="POST" action="" onsubmit="return validate()">
           <table class="table">
            <tr>
               <td>Username<b style="color:red">*</b></td>
               <td><input type="text" name="uname"  class="form-control" id="uname" onblur="checkTextBox(this)"></td>
               <span class="text-danger" name="uname_error"></span>
               </tr>
               
               <tr>
               <td>Email<b style="color:red">*</b></td>
               <td><input type="text" name="email"class="form-control" id="email" onblur="checkTextBox(this)"></td>
             <span class="text-danger" name="email_error"></span>
               </tr>
               
               <tr>
               <td>Password<b style="color:red">*</b></td>
                   <td><input type="password" name="pass" class="form-control"id="pass" onblur="checkTextBox(this)"></td>
                <span class="text-danger"name="pass_error"></span>
               </tr>
               
               <tr>
               <td>Confirm Password<b style="color:red">*</b></td>
                   <td><input type="password" name="cpass"class="form-control" id="cpass" onblur="checkTextBox(this)"></td>
                <span class="text-danger"name="cpass_error"></span>
               </tr>
               
               <tr>
               <td>Mobile<b style="color:red">*</b></td>
                   <td><input type="text" name="mobile"class="form-control" id="mobile" onblur="checkTextBox(this)"> </td>
               <span class="text-danger" name="mobile_error"></span>
               </tr>
              
               <tr>
               <td>Gender</td>
                   <td><input type="radio" name="gender" class="form-control"id="gender1" value="male">MALE &nbsp; <input type="radio" value="Female" name="gender" id="gender">FEMALE</td>
               </tr>
               <tr>
                   
                   <td>Date Of Birth</td>
                    <td><input type="text" name="dob" class="form-control" id="dob"></td>
               
               </tr>

               <tr>
                   <td>Address<b style="color:red">*</b></td>
                   <td><textarea id="address" name="address" class="form-control" onblur="checkTextBox(this)"></textarea></td>
                    <br><span name="address_error" ></span>
               </tr>
               
               <tr>
               <td>City</td>
               <td><input type="text"class="form-control" id="city" name="city"></td>
               
               </tr>
               
               <tr><td>State<b style="color:red">*</b></td>
                   <td>
               <select name="state"class="form-control" id="state">
               <option>--Select State--</option>
               <option>Andra Pradesh</option>
                   <option>Maharastra</option>
                   <option>Madhya Pradesh</option>
                   <option>UP</option>
                   <option>Rajasthan</option>
                   
               </select></td>
                            </tr> 
               
               <tr><td></td>
               <td><input type="checkbox"class="form-control" name="terms" id="terms">
               Accept the terms and conditions</td>
               </tr>
               
               <tr>
            <td><input type="submit" class="btn btn-primary" name="reg" value="Register" id="reg"></td></tr>
            </table>
         </form>
             </center>
    </fieldset>
    </div>
      <script type="text/javascript">
            function validate()
          
           {
               if(document.getElementById("uname").value=="")
                   {
                       document.getElementById("uname").focus();
                     document.getElementById("uname_error").innerHTML("This field is required");
                       return false;
                   }
               if(document.getElementById("email").value=="")
                   {
                      document.getElementById("email").focus();
                     document.getElementById("email_error").innerHTML("This field is required");
                       return false;
                   }
               else{
                   var email=document.getElementById("email").value;
                   var filter=/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z]{2,4})+$/;
                   if(!filter.test(email))
                       {
                           document.getElementById("email").focus();
                           document.getElementById("email_error").innerHTML="please enter valid email";
                           return false;
                           
                           
                       }
               }
              if(document.getElementById("pass").value=="")
                   {
                    document.getElementById("pass").focus();
                     document.getElementById("pass_error").innerHTML("This field is required");
                       return false;
                   }
             
               if(document.getElementById("cpass").value=="")
                   {
                    document.getElementById("cpass").focus();
                     document.getElementById("cpass_error").innerHTML("This field is required");
                       return false;
                   }
               
               if(document.getElementById("mobile").value=="")
                   {
                        document.getElementById("mobile").focus();
                     document.getElementById("mobile_error").innerHTML("This field is required");
                       return false;
                       
                       
                   }
               
               else{
                   
                   var mobile=document.getElementById("mobile").value;
                   if(mobile.length!=10)
                       {
                           document.getElementById("mobile").focus();
                           document.getElementById("mobile_error").innerHTML="Please enter mobile number of 10 digits only";
                           return false;
                        
                           
                       }
               else if(isNaN(mobile))
                   {
                        document.getElementById("mobile").focus();
                     document.getElementById("mobile_error").innerHTML("Valid Mobile field is required");
                       return false;
                       
                       
                   }
               }
               
               
               if(document.getElementById("address").value=="")
                   {
                     document.getElementById("address").focus();
                     document.getElementById("address_error").innerHTML("This field is required");
                       return false;
                   }
               
               if((document.getElementById("pass").value)!=(document.getElementById("cpass").value))
                   {
                       document.getElementById("pass_error").innerHTML("Password Dosen't match")
                       return false;
                        }
           }
           
           function checkTextBox(x)
           {
               if(x.value!=" ")
                   {
                       document.getElementById(x.id+"_error").innerHTML="";
                   }
           }
       </script>
<?php
include("footer.php");
?>