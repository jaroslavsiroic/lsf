<?php
  if(!$_SESSION['user']->isLoggedIn() ){ header('Location: ./'); } 
?>

<div id="wrapper">
    <section id="primary">
        <h3>General Information</h3>
        <p>I'm not currently looking for new design work, but I am availabe for speaking gigs and similar engagements. If you have any questions, please dont't hesitate to contact me!</p>
        <p>Please only use phone contact for urgent inquiries. Otherwise, Facebook, email are the best way to reach me.</p>
    </section>
       <section id="secondary">
            <h3>Contact Details</h3>
            <ul class="contact-info">
           <li class="phone"><a href="tel:555-6425">+37060000000</a></li>
           <li class="mail"><a href="mailto:JDMdevelopments@example.com">JDMdevelopments@example.com</a></li>
            <li class="facebook"><a href="http://facebook.com/JDMdevelopments">@JDMdevelopments</a></li>
            </ul>
       </section>