<?php 
include 'Layout/header.php';
include 'Operations/Connection.php';

?>



<div>
  <div class="contact-form-wrapper d-flex justify-content-center">
    <form action="Operations/Contactus.php" method="post" class="contact-form">
      <h5 class="title">Contact us</h5>
      <p class="description">Feel free to contact us if you need any assistance, any help or another question.
      </p>
      <div>
        <input type="text" class="form-control rounded border-white mb-3 form-input" name="name" placeholder="Name" required>
      </div>
      <div>
        <input type="email" class="form-control rounded border-white mb-3 form-input" name="email" placeholder="Email" required>
      </div>
      <div>
        <textarea id="message" class="form-control rounded border-white mb-3 form-text-area" name="message" rows="5" cols="30" placeholder="Message" required></textarea>
      </div>
      <div class="submit-button-wrapper">
        <input type="submit" name="sendmsg" value="Send">
      </div>
    </form>
  </div>
</div>

<div class="alert alert-primary" role="alert" id="mesgreceived" style="position:absolute; bottom:0px; margin-left: 20px; display: none;">
  Your Message has been Received! Thank you for Messaging Us
</div>
<?php
  $ID = $_GET['sended'];
  if ($ID) {
    echo "<script>
  document.getElementById('mesgreceived').style.display = 'block';

  const myTimeout = setTimeout(myGreeting, 5000);

  function myGreeting() {
    document.getElementById('mesgreceived').style.display = 'none';
    window.location.href='Contact.php';

  }
    </script>";
    }

?>