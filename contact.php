<?php
          // This PHP Contact Form is offered &quot;as is&quot; without warranty of any kind, either expressed or implied.
          // Andrew Raynor at www.css3templates.co.uk shall not be liable for any loss or damage arising from, or in any way
          // connected with, your use of, or inability to use, the website templates (even where Andrew Raynor has been advised
          // of the possibility of such loss or damage). This includes, without limitation, any damage for loss of profits,
          // loss of information, or any other monetary loss.

          // Set-up these 3 parameters
          // 1. Enter the email address you would like the enquiry sent to
          // 2. Enter the subject of the email you will receive, when someone contacts you
          // 3. Enter the text that you would like the user to see once they submit the contact form
		  
          $to = 'oo.aremu@ui.edu.ng';
          $subject = 'Enquiry from the website';
          $contact_submitted = 'Your message has been sent.';

          // Do not amend anything below here, unless you know PHP
          function email_is_valid($email) {
            return preg_match('/^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$/i',$email);
          }
          if (!email_is_valid($to)) {
            echo '<p style="color: red;">You must set-up a valid (to) email address before this contact page will work.</p>';
          }
          if (isset($_POST['contact_submitted'])) {
            $return = "\r";
            isset($_POST['your_email'])?$youremail = trim(htmlspecialchars($_POST['your_email'])):$youremail ="";
            isset($_POST['your_name'])?$yourname = stripslashes(strip_tags($_POST['your_name'])):$yourname ="";
		  
            
        $yourmessage = stripslashes(strip_tags($_POST['your_message']));
		 $answer = trim(htmlspecialchars($_POST['answer']));
		   $user_answer = trim(htmlspecialchars($_POST['user_answer']));
	 
  if (filter_var($youremail, FILTER_VALIDATE_EMAIL) && $yourname != "" && $yourmessage != "" && substr(md5($user_answer),5,10) === $answer)
   {
	   		
            $contact_name = "Name: ".$yourname;
            $message_text = "Message: ".$yourmessage;
          
           
            $message = $contact_name . $return . $message_text;
            $headers = "From: ".$youremail;
              mail($to,$subject,$message,$headers);
              $yourname = '';
              $youremail = '';
              $yourmessage = '';
              echo '<p style="color: blue;">'.$contact_submitted.'</p>';
            }
            else echo '<p style="color: red;">Please enter your name, a valid email address, your message and the answer to the simple maths question before sending your message.</p>';
		  }
          $number_1 = rand(1, 9);
          $number_2 = rand(1, 9);
          $answer = substr(md5($number_1+$number_2),5,10)
		  
        ?>
<!DOCTYPE HTML>
<html>

<head>
  <title>MIS</title>
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
  <link rel="stylesheet" type="text/css" href="css/style.css" />
  <!-- modernizr enables HTML5 elements and feature detects -->
  <script type="text/javascript" src="js/modernizr-1.5.min.js"></script>
</head>

<body>
  <div id="main">
    <header>
      <div id="logo">
        <div id="logo_text">
          <!-- class="logo_colour", allows you to change the colour of the text -->
          <h1><a href="index.html">MIS<span class="logo_colour">_University Of Ibadan</span></a></h1>
          <h2>The Place To Be Anytime.</h2>
        </div>
      </div>
      <nav>
        <ul class="sf-menu" id="nav">
          <li><a href="index.html">Home</a></li>
          <li><a href="examples.html">About Us</a></li>
          <li><a href="page.html">Our Portfolio</a></li>
          <li><a href="another_page.html">Careers</a></li>
          <li><a href="#">Our Services</a>
            <ul>
              <li><a href="#">Rep Card Form</a></li>
              <li><a href="#">Feedback Form</a>
                <ul>
                  <li><a href="#">Sub Drop Down One</a></li>
                  <li><a href="#">Sub Drop Down Two</a></li>
                  <li><a href="#">Sub Drop Down Three</a></li>
                  <li><a href="#">Sub Drop Down Four</a></li>
                  <li><a href="#">Sub Drop Down Five</a></li>
                </ul>
              </li>
              <li><a href="#">Staff Form</a></li>
              <li><a href="#">Student Form</a></li>
              <li><a href="#">Matric no Issues</a></li>
            </ul>
          </li>
          <li class="selected"><a href="contact.php">Contact Us</a></li>
            
          
        </ul>
      </nav>
    </header>
    <div id="site_content">
      <div class="gallery">
        <ul class="images">
          <li class="show"><img width="950" height="300" src="images/1.jpg" alt="simplistic 1" /></li>
          <li><img width="950" height="300" src="images/2.jpg" alt="simplistic 2" /></li>
        </ul>
      </div>
      <div id="sidebar_container">
        <div class="sidebar">
          <h3>Latest News</h3>
          <h4>New Website Launched</h4>
          <h5>June 1st, 2014</h5>
          <p>2014 sees the design of our new website. Take a look around and let us know what you think.<br /><a href="#">Read more</a></p>
        </div>
        <div class="sidebar">
          <h3>Useful Links</h3>
          <ul>
            <li><a href="#">First Link</a></li>
            <li><a href="#">Another Link</a></li>
            <li><a href="#">And Another</a></li>
            <li><a href="#">One More</a></li>
            <li><a href="#">Last One</a></li>
          </ul>
        </div>
      </div>
      <div class="content">
        <h1>Contact Us</h1>
        <p>Issue Complains, using this contact form.</p>
        
        <form id="contact" action="contact.php" method="post" "enctype="multipart/form-data">
          <div class="form_settings">
            <p><span>Name</span><input class="contact" type="text" name="your_name" value="<?php 
			if (isset($yourname))
			{
				echo $yourname;
			}
			 ?>" /></p>
            <p><span>Email Address</span><input class="contact" type="text" name="your_email" value="<?php
			if (isset($youremail))
			{
				echo $youremail;
			}
			 ?>" /></p>
            <p><span>Message</span><textarea class="contact textarea" rows="5" cols="50" name="your_message" value="<?php 
			
			if (isset($yourmessage))
			{
				echo $yourmessage;
			}
			 ?>"></textarea></p>
            <p style="line-height: 1.7em;">To help prevent spam, please enter the answer to this question:</p>
            <p><span><?php echo $number_1; ?> + <?php echo $number_2; ?> = ?</span><input type="text" name="user_answer" /><input type="hidden" name="answer" value="<?php echo $answer; ?>" /></p>
            <p style="padding-top: 15px"><span>&nbsp;</span><input class="submit" type="submit" name="contact_submitted" value="send" /></p>
          </div>
        </form>
      </div>
    </div>
    <footer>
      <div id ="follow_us">
                   <ul>
                       <li><a href=""><img src="logo/like.png"/> us on facebook</a></li>
                       <li><a href=""><img src="logo/plus-one.png"/> us on google </a></li>
                       <li><a href=""><img src="logo/twitter_icn.png"/> tweet us on twitter</a></li>

       </ul>

 </div>


                <div id ="copy_right">
 						<ul>
                       <li>Copyright &copy; MIS Unit | <a href="http://www.ui.edu.ng">design from ui.edu.ng</a></li>
                       <li>&copy; copyright 2014</li>

       </ul>
             

     </div>
    </footer>
  </div>
  <p>&nbsp;</p>
  <!-- javascript at the bottom for fast page loading -->
  <script type="text/javascript" src="js/jquery.js"></script>
  <script type="text/javascript" src="js/jquery.easing-sooper.js"></script>
  <script type="text/javascript" src="js/jquery.sooperfish.js"></script>
  <script type="text/javascript" src="js/image_fade.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $('ul.sf-menu').sooperfish();
    });
  </script>
</body>
</html>
