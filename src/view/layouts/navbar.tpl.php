<style>
    .side-bar .navbar {
        display: flex;
        flex-direction: column;
        gap: 1rem;
        align-items: flex-start;
        padding: 1rem;
    }

</style>


<div class="side-bar">

    <div id="close-btn">
        <i class="fas fa-times"></i>
    </div>

    <div class="profile">
        <img src="images/pic-1.jpg" class="image" alt="">
        <h3 class="name">Name</h3>
        <p class="role">individual</p>
        <a href="profile" class="btn">view profile</a>
    </div>

    <nav class="navbar">
        <a href="home"><i class="fas fa-home"></i><span>Home</span></a>
        <a href="about"><i class="fas fa-question"></i><span>About</span></a>
        <a href="learn-more"><i class="fas fa-chalkboard-user"></i><span>Learn More</span></a>
        <?php
        $x =1;
        if($x==1){
        ?>

        <a href="contact"><i class="fas fa-headset"></i><span>Contact us</span></a>
    <?php }?>
    </nav>

</div>