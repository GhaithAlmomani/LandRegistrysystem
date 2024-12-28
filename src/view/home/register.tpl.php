<section class="form-container">

<form action="" method="post" enctype="multipart/form-data">
    <h3>Register now</h3>
    <p>Full name <span>*</span></p>
    <input type="text" name="name" placeholder="Enter your full name" required maxlength="50" class="box">
    <p>Email address<span>*</span></p>
    <input type="email" name="email" placeholder="Enter your email address" required maxlength="50" class="box">
    <p>Password <span>*</span></p>
    <input type="password" name="pass" placeholder="Enter your password" required minlength="8" maxlength="20" class="box">
    <p>Confirm password <span>*</span></p>
    <input type="password" name="c_pass" placeholder="Confirm your password" required minlength="8" maxlength="20" class="box">

    <p>Phone number <span>*</span></p>
    <input type="tel" name="phonenumber" placeholder="Enter your phone number" required maxlength="20" class="box">
    <p>National ID<span>*</span></p>
    <input type="number" name="ID" placeholder="Enter your ID number" required maxlength="20" class="box">

    <!--<p>select profile <span>*</span></p>
    <input type="file" accept="image/*" required class="box">-->
    <input type="submit" value="Register new user" name="submit" class="btn">
</form>

</section>
