<?php
session_start(); 
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>J.W.Couriers &middot; Support</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
    <link href="css/le-style.css" rel="stylesheet">

  </head>

  <body>


<div class="span11 offset1">
  <?php
  include("header_nav.php"); ?>
  <div class="content"> <br>
    <h2> Frequently asked questions </h2>
    <div class="accordion sup" id="accordion2">
    <div class="accordion-group">
      <div class="accordion-heading">
        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseThree">
        I have forgotten my password, what should I do?
        </a>
      </div>
      <div id="collapseThree" class="accordion-body collapse">
        <div class="accordion-inner">
          Please click on the 'forgotten your password'. Enter your e-mail address in the space provided and click 'send password reset e-mail'. You will then be issued with instructions on how to change your password.
        </div>
      </div>
    </div>
    <div class="accordion-group">
      <div class="accordion-heading">
        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseFour">
        I haven't received the reset password email, what should I do?
        </a>
      </div>
    <div id="collapseFour" class="accordion-body collapse">
      <div class="accordion-inner">
        Please check that your email spam filters have not moved the email into a spam, junk or deleted folder. To avoid this happening in future, add this email to your email contacts or 'safe' list. Please also ensure that the email address you enter is the one you use for the website.
      </div>
    </div>
  </div>
    <div class="accordion-group">
      <div class="accordion-heading">
        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseFive">
        I can't log in to my account, what should I do?
    </a>
      </div> 
    <div id="collapseFive" class="accordion-body collapse">
      <div class="accordion-inner">
        Please ensure that you have entered the correct e-mail address and password without any spelling mistakes.If you have forgotten your password, please click on the 'forgotten your password' link in the top right hand corner of the page.Alternatively, you could be experiencing an issue related to your browser settings. Please also try deleting your temporary internet files and cookies.
      </div>
    </div>
  </div>
    <div class="accordion-group">
      <div class="accordion-heading">
        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseSix">
        How can I register for  my account?
        </a>
      </div>
      <div id="collapseSix" class="accordion-body collapse">
        <div class="accordion-inner">
          You can register by clicking the link in the top right hand corner of each page. Alternatively, you will be given the option to register part way through the order process.
        </div>
      </div>
    </div>
    <div class="accordion-group">
      <div class="accordion-heading">
        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseSeven">
        How do I log in to my account?
        </a>
      </div>
      <div id="collapseSeven" class="accordion-body collapse">
        <div class="accordion-inner">
          At the top of every page of our website, on the right hand side, you'll see two boxes the first one has the word Username in it. Click into this box and insert your username (your email address is your register user name). Then click into the next box and enter your password.
          Once you've done that, click the sign in button.
        </div>
      </div>
    </div>
    <div class="accordion-group">
      <div class="accordion-heading">
        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseEight">
        Where is my parcel?
        </a>
      </div>
      <div id="collapseEight" class="accordion-body collapse">
        <div class="accordion-inner">
        If you have been provided with a 16 digit tracking number, you can check the progress of your order by using the track a parcel link in the top right hand corner of the page.

        If you have any further queries regarding your parcel, please contact the sender.
        </div>
      </div>
    </div>
    <div class="accordion-group">
      <div class="accordion-heading">
        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseNine">
        My parcel was damaged when delivered, what should I do?
        </a>
      </div>
      <div id="collapseNine" class="accordion-body collapse">
        <div class="accordion-inner">
        Please contact our team of advisors who be able to assist with your claim. Where possible please provide your tracking number, the recipient postcode, any relevant dates and images
        </div>
      </div>
    </div>
  <div class="accordion-group">
    <div class="accordion-heading">
      <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTen">
      Does your compensation cover loss, damage or both?
      </a>
    </div>
    <div id="collapseTen" class="accordion-body collapse">
      <div class="accordion-inner">
      We offer compensation for both loss and damage. However, there are a few items that are excluded from compensation.
      </div>
    </div>
  </div>
  <div class="accordion-group">
    <div class="accordion-heading">
      <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseEleven">
      My collection/delivery address does not appear on the list when I order, what should I do?
      </a>
    </div>
    <div id="collapseEleven" class="accordion-body collapse">
      <div class="accordion-inner">
        Our network covers the vast majority of the UK, however there are some addresses we have trouble getting to such as very remote areas. If the post code you use brings up nearby addresses, you do have the option to select one of those and edit the first line only.
        Our information is updated daily, so please confirm with the recipient that the address is valid before doing so.
      </div>
    </div>
  </div>
    <div class="accordion-group">
      <div class="accordion-heading">
        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwelve">
        I have moved house, can I change my address?
        </a>
      </div>
    <div id="collapseTweve" class="accordion-body collapse">
      <div class="accordion-inner">
      You can change your default collection address along with any other personal details by logging in to your  account and clicking on the your account settings link.
      </div>
    </div>
  </div>

</div>
</div><!-- /.container -->
<!-- FOOTER --><?php include("footer.php"); ?>

</div>

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
  </body>
</html>
