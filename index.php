 <!DOCTYPE html>
 <html lang="en">

 <?php
  include('header2.php');
  ?>

 <body>


   <!-- Navbar
    ================================================== -->
   <div class="navbar navbar-inverse navbar-fixed-top">
     <div class="navbar-inner">
       <!-- <div class="container">
 
               <a href="#" data-toggle="modal" data-target="#about-modal" class="brand"> <font size="2"style="color: white;">ABOUT <strong>EJS</strong></font></a> 
 
        </div> -->
     </div>
   </div>


   <header class="jumbotron subhead" id="overview">
     <div class="container">
       <h1>Automatic Tabulation System</h1>
       <p class="lead">Ready to serve you...</p>
     </div>
   </header>




   <div class="container">




     <form method="POST" action="login.php">
       <br />
       <table cellpadding="10" cellspacing="0" border="0" align="center">
         <thead>
           
      <th align="left" style="
          background-color: #4976f5;
          font-family: 'Arial', sans-serif;
          color: white;
          text-align: left;
          padding: 10px;
          border-radius: 10px;
    ">
             <h4><!--<img src="ejs_logo.png" width="25" height="25" /> --> &nbsp;USER LOGIN</h4>
           </th>
         </thead>

         <tr style="background-color: #d7def2;">

           <td>


             <h5><i class="icon-user"></i> USERNAME:</h5>
             <input style="font-size: large;height: 35px !important;text-indent: 7px !important; padding: 10px;border-radius: 10px;" class="form-control btn-block" type="text" name="username" placeholder="Username" required="true" autofocus="true" />

             <h5><i class="icon-lock"></i> PASSWORD:</h5>
             <input style="font-size: large; height: 35px !important; text-indent: 7px !important; padding: 10px;border-radius: 10px;" class="form-control btn-block" type="password" name="password" placeholder="Password" required="true" autofocus="true" />
             <br /><br />

             <button style="width: 160px !important;" type="submit" class="btn btn-primary pull-right"><i class="icon-ok"></i> <strong>LOGIN</strong></button>
             <!-- <strong>Register <a href="create_account.php">here &raquo;</a></strong> &nbsp;&nbsp;&nbsp; -->
            <strong>Forgot Password?<a href="forgot_password.php">  Click here &raquo;</a></strong> &nbsp;&nbsp;&nbsp;
           </td>
         </tr>


       </table>



     </form>



   </div>




   <!-- Footer
    ================================================== 
    <footer class="footer">
      <div class="container">
      
        <font size="2" class="pull-left"><strong>Electronic Judging System &middot; 2016 &COPY; </strong></font> <br />
        
      </div>
    </footer>


    
    ================================================== -->
   <!-- Placed at the end of the document so the pages load faster -->

   <script src="assets/js/jquery.js"></script>
   <script src="assets/js/bootstrap-transition.js"></script>
   <script src="assets/js/bootstrap-alert.js"></script>
   <script src="assets/js/bootstrap-modal.js"></script>
   <script src="assets/js/bootstrap-dropdown.js"></script>
   <script src="assets/js/bootstrap-scrollspy.js"></script>
   <script src="assets/js/bootstrap-tab.js"></script>
   <script src="assets/js/bootstrap-tooltip.js"></script>
   <script src="assets/js/bootstrap-popover.js"></script>
   <script src="assets/js/bootstrap-button.js"></script>
   <script src="assets/js/bootstrap-collapse.js"></script>
   <script src="assets/js/bootstrap-carousel.js"></script>
   <script src="assets/js/bootstrap-typeahead.js"></script>
   <script src="assets/js/bootstrap-affix.js"></script>
   <script src="assets/js/holder/holder.js"></script>
   <script src="assets/js/google-code-prettify/prettify.js"></script>
   <script src="assets/js/application.js"></script>

 </body>

 </html>