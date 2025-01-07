<!doctype html>
<html lang="en" dir="ltr" data-bs-theme="auto">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= config('MVC.name') ?></title>
    <meta name="description" content="Description">
    <meta name="keywords" content="Keywords">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <link href="<?= url('style/stylesheet/bootstrap.min.css'); ?>" rel="stylesheet">

    <link href="<?= url('style/stylesheet/main.css'); ?>" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/web3/dist/web3.min.js"></script>
    <script src="<?= url('style/javascript/Abi.js'); ?>"></script>

</head>
<body>
<header class="header">

    <section class="flex">

        <a href="/" class="logo">Department of Land and Survey</a>

        <form action="search" method="post" class="search-form">
            <input type="text" name="search_box" required placeholder="Search ..." maxlength="100">
            <button type="submit" class="fas fa-search"></button>
        </form>

        <div class="icons">
            <div id="lang-btn" class="fa-solid fa-language"></div>

            <div id="menu-btn" class="fas fa-bars"></div>
            <div id="search-btn" class="fas fa-search"></div>
            <div id="user-btn" class="fas fa-user"></div>
            <div id="toggle-btn" class="fas fa-sun"></div>
        </div>

        <div class="profile">
            <img src="images/pic-1.jpg" class="image" alt="">
            <h3 class="name">Name</h3>
            <p class="role">Individual</p>
            <a href="profile" class="btn">View profile</a>
            <div class="flex-btn">
                <a href="login" class="option-btn">login</a>
                <a href="register" class="option-btn">register</a>
            </div>
            <div id="toggle-btn" class="fas fa-sun"></div
        </div>

    </section>

</header>

<?php if (empty($hiddenNavbar)) include_once 'navbar.tpl.php'; ?>
<div class="container">
    <div class="row">
        <div class="col">
            {{content}}
        </div>
    </div>
</div>
<?php include_once 'footer.tpl.php'; ?>
<script src="<?= url('style/javascript/bootstrap.bundle.min.js'); ?>"></script>
</body>

<script>

    let toggleBtn = document.getElementById('toggle-btn');
    let body = document.body;
    let darkMode = localStorage.getItem('dark-mode');

    const enableDarkMode = () =>{
        toggleBtn.classList.replace('fa-sun', 'fa-moon');
        body.classList.add('dark');
        localStorage.setItem('dark-mode', 'enabled');
    }

    const disableDarkMode = () =>{
        toggleBtn.classList.replace('fa-moon', 'fa-sun');
        body.classList.remove('dark');
        localStorage.setItem('dark-mode', 'disabled');
    }

    if(darkMode === 'enabled'){
        enableDarkMode();
    }

    toggleBtn.onclick = (e) =>{
        darkMode = localStorage.getItem('dark-mode');
        if(darkMode === 'disabled'){
            enableDarkMode();
        }else{
            disableDarkMode();
        }
    }

    let profile = document.querySelector('.header .flex .profile');

    document.querySelector('#user-btn').onclick = () =>{
        profile.classList.toggle('active');
        search.classList.remove('active');
    }

    let search = document.querySelector('.header .flex .search-form');

    document.querySelector('#search-btn').onclick = () =>{
        search.classList.toggle('active');
        profile.classList.remove('active');
    }

    let sideBar = document.querySelector('.side-bar');

    document.querySelector('#menu-btn').onclick = () =>{
        sideBar.classList.toggle('active');
        body.classList.toggle('active');
    }

    document.querySelector('#close-btn').onclick = () =>{
        sideBar.classList.remove('active');
        body.classList.remove('active');
    }

    window.onscroll = () =>{
        profile.classList.remove('active');
        search.classList.remove('active');

        if(window.innerWidth < 1200){
            sideBar.classList.remove('active');
            body.classList.remove('active');
        }
    }

</script>

</html>