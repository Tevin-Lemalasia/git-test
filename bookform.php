<?php
 require_once 'includes/config.php';
 if (isset($_POST['submit'])){

  $name = $_POST['fname'];
  $email = $_POST['eaddress'];
  $address = $_POST['phone'];
  $roomtype = $_POST['rmtype1'];
  $checkindate = $_POST['checkindate'];
  $checkintime = $_POST['checkintime'];
  $checkoutdate = $_POST['checkoutdate'];
  $checkouttime = $_POST['checkouttime'];
  $occupancy = $_POST['zip'];
  $payment = $_POST['message'];
 
  try {
    //code...
    $sql = 'INSERT INTO bookings(name,email,address,roomtype,checkindate,checkintime,checkoutdate,checkouttime,occupancy,payment ) VALUES(?,?,?,?,?,?,?,?,?,?)';
    $sth = $DBH->prepare($sql);
    $sth->execute(array($name,$email,$address,$roomtype,$checkindate,$checkintime,$checkoutdate,$checkouttime,$occupancy,$payment ));
    $_SESSION['success'] = "message sent successfully.";
  } catch (PDOException $e) {
    //throw $th;
    echo $e->getMessage();
  }
 }
 
 ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <link rel="shortcut icon" href="images/logo.png">
    <link rel="stylesheet" type="text/css" href="css/bookingform.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <title>Book Form</title>
</head>

<body>
    <!-----header-->
    <div class="header">
        <img src="images/logo.png" style="max-width:100px" style="margin-top: 5px;" align="right">
        <h1>RainBow Resort</h1>
        <div class="links">
            <ul>
              <li> <a class="active" href="index.html" style="text-decoration: none;">Home</a> </li>
              <li> <a href="book.php" style="text-decoration: none;">Book Now</a> </li>
              <li> <a href="offers/offers.php"style="text-decoration: none;">Offers</a> </li>
              <li> <a href="contact.php" style="text-decoration: none;">contact us</a> </li>
              <li> <a href="about.html" style="text-decoration: none;">about us</a> </li>

            </ul>
        </div>
    </div>

<!---book form-->
<div class="testbox">
    <form action="bookform.php" method="POST">
      <div class="banner">
        <h1>Book your Reservation now!</h1>
      </div>
      <br/>
      <fieldset>
        <legend>Customer Details</legend>
        <div class="columns">
          <div class="item">
            <label for="fname">First Name<span>*</span></label>
            <input id="fname" type="text" name="fname" />
          </div>
          <div class="item">
            <label for="lname"> Last Name<span>*</span></label>
            <input id="lname" type="text" name="lname" />
          </div>
          <div class="item">
            <label for="address">Address<span>*</span></label>
            <input id="address" type="text"   name="address" />
          </div>
          <div class="item">
            <label for="zip">ID/Passport<span>*</span></label>
            <input id="zip" type="text"   name="zip" required/>
          </div>
          <div class="item">
            <label for="city">City<span>*</span></label>
            <input id="city" type="text"   name="city" />
          </div>
          <div class="item">
            <label for="state">State<span>*</span></label>
            <input id="state" type="text"   name="state" />
          </div>
          <div class="item">
            <label for="eaddress">Email Address<span>*</span></label>
            <input id="eaddress" type="text"   name="eaddress" />
          </div>
          <div class="item">
            <label for="phone">Phone<span>*</span></label>
            <input id="phone" type="tel"   name="phone" />
          </div>
      </fieldset>
      <br/>
      <fieldset>
      <legend>Dates</legend>
      <div class="columns">
      <div class="item">
      <label for="checkindate">Check-in Date <span>*</span></label>
      <input id="checkindate" type="date" name="checkindate" />
      <i class="fas fa-calendar-alt"></i>
      </div>
      <div class="item">
      <label for="checkoutdate">Check-out Date <span>*</span></label>
      <input id="checkoutdate" type="date" name="checkoutdate" />
      <i class="fas fa-calendar-alt"></i>
      </div>
      <div class="item">
      <p>Check-in Time </p>
      <select name="checkintime">
      <option value="" disabled selected>Select time</option>
      <option value="1" >Morning</option>
      <option value="2">Afternoon</option>
      <option value="3">Evening</option>
      </select>
      </div>
      <div class="item">
      <p>Check-out Time </p>
      <select name="checkouttime">
      <option  value="4" disabled selected>Select time</option>
      <option value="5" >Morning</option>
      <option value="6">Afternoon</option>
      <option value="7">Evening</option>
      </select>
      </div>    
      <div class="item">
      <p>How many adults are coming?</p>
      <select name="adults">
      <option value="8" disabled selected>Number of adults</option>
      <option value="9" >1</option>
      <option value="10">2</option>
      <option value="11">3</option>
      <option value="12">4</option>
      <option value="13">5</option>
      </select>
      </div>    
      <div class="item">
      <p>How many children are coming?</p>
      <select name="children">
      <option value="14" disabled selected>Number of children</option>
      <option value="15" >0</option>
      <option value="16">1</option>
      <option value="17">2</option>
      <option value="18">3</option>
      <option value="19">4</option>
      <option value="19">5</option>
      </select>
      </div>   
      <div class="item" style=width:100%>
      <label for="room">Number of rooms</label>
      <input id="room" type="number" name="room" />
      </div>
      <div class="item">
      <p>Room 1 type</p>
      <select name="rmtype1">
      <option value="None" selected></option>
      <option value="Standard">Standard</option>
      <option value="Deluxe">Deluxe</option>
      <option value="Suite">Suite</option>
      <option value="Villa">Villa</option>
      </select>
      </div>    
      <div class="item">
      <p>Room 2 type</p>
      <select name="rmtype2" >
      <option value="None"  selected></option>
      <option value="Standard">Standard</option>
      <option value="Deluxe">Deluxe</option>
      <option value="Suite">Suite</option>
      <option value="Villa">Villa</option>
      </select>
      </div>    
      </div>
      <div class="item">
      <label for="instruction">Enter Your Payment Method</label>
      <textarea name="message" id="instruction" rows="3"></textarea>
      </div>
      </fieldset>
      <div class="btn-block">
      <button type="submit" href="/" name="submit">Submit</button>
      </div>
    </form>
    </div>


    <!--footer--->
    <div class="footer">
        <div class="services">
            <h5>Services</h5>
            <p>We offer the best Supplies</p>
            <p>services world wide</p>
            <p><a href="admin/includes/login.html"style="text-decoration:none;"style="color:Black;">Admin</a></p>

        </div>
        <div class="About">
            <h5>About</h5>
            <p>Our customers Profile are diverse.Some Brands</p>
            <P>specialty products, we market today are among</P>
            <P>some of the quality products we imported for our</P>
            <p>deddicated Customers From Product sourcing</p>
            <p>to Product specialization ,Products purchasing $ Supply</p>
            <p>Services is Constantly Upgrading and acquiring new Skills to Ensure</p>
            <p>We can Serve Our customers Better.</p>
            <p>Our management Personel underwent a Series of Practicle Trainnings Which</p>
            <p> Include Travelling technical trainning and Obtained Several certification</p>

        </div>
        <div class="icons">
            <div class="inner-icons">
                <h5>Follow us on</h5>
                <ul type="none">
                    <li>
                        <a target="_blank" href="https://www.instagram.com/shelbye_company/" style="text-decoration: none;"><img src="images/instagram2.png" style="max-width:30px;"></a>
                    </li>
                    <li>
                        <a target="_blank" href="https://www.facebook.com/Shelbyeltd/"><img src="images/facebooklogo.png" style="max-width: 30px;"></a>
                    </li>
                    <li>
                        <a target="_blank" href="https://api.whatsapp.com/send?phone=254718144940&fbclid=IwAR3E1XUF1-S_W4dfZzCXZJCNkYci20cyki-9lV1bTbKmEl9ew9mpEkDbezc"><img src="images/whatsapp.png" style="max-width: 30px;"></a>
                    </li>
                </ul>

            </div>

        </div>
        <div class="contactus">
            <h5>Contact us</h5>
            <ul type="none">
                <li>
                    <a target="_blank" href="mailto:info@gmail.com"><img src="images/Gmail new Logo 2020.jpg" style="max-width: 30px;"></a>
                </li>
                <li>
                    <a target="_blank" href="tel:+254791386752"><img src="images/phone.jpg" style="max-width: 30px;"></a>
                </li>

            </ul>
            <img src="images/logo.png" style="max-width:100px">
        </div>
    </div>
    <div class="copyrights">
        <p>Copyright &copy; 2021 RainBow Resort. All Rights Reserved.</p>
    </div>
    </div>
</body>

</html>