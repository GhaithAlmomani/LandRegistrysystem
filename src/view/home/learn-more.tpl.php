<style>
    .learn-more .search-video {
        margin-bottom: 2rem;
        border-radius: .5rem;
        background-color: var(--white);
        padding: 1.5rem 2rem;
        display: flex;
        align-items: center;
        gap: 1.5rem;
    }

    .learn-more .search-video input {
        width: 100%;
        background: none;
        font-size: 1.8rem;
        color: var(--black);
    }

    .learn-more .search-video button {
        font-size: 2rem;
        color: var(--black);
        cursor: pointer;
        background: none;
    }

    .learn-more .search-video button:hover {
        color: var(--main-color);
    }

    .learn-more .box-container {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(30rem, 1fr));
        gap: 1.5rem;
        justify-content: center;
        align-items: flex-start;
    }

    .learn-more .box-container .box {
        background-color: var(--white);
        border-radius: .5rem;
        padding: 2rem;
    }

    .learn-more .box-container .box .video,
    .learn-more .box-container .box .tutor {
        display: flex;
        align-items: center;
        gap: 2rem;
        margin-bottom: 1.5rem;
    }

    .learn-more .box-container .box .video h3,
    .learn-more .box-container .box .tutor h3 {
        font-size: 2rem;
        color: var(--black);
        margin-bottom: .2rem;
    }

    .learn-more .box-container .box .video span,
    .learn-more .box-container .box .tutor span {
        font-size: 1.6rem;
        color: var(--light-color);
    }

    .learn-more .box-container .box p {
        padding: .5rem 0;
        font-size: 1.7rem;
        color: var(--light-color);
    }

    .learn-more .box-container .box p span {
        color: var(--main-color);
    }

    .learn-more .box-container .box a {
        display: inline-block;
        background-color: var(--main-color);
        border-radius: .5rem;
        padding: 1rem 1.5rem;
        font-size: 1.8rem;
        color: var(--white);
        text-align: center;
        margin-top: 1rem;
        text-transform: capitalize;
        cursor: pointer;
    }

    .learn-more .box-container .box a:hover {
        background-color: var(--black);
        color: var(--white);
    }


</style>

<section class="learn-more">

    <h1 class="heading">Video May help</h1>

    <form action="" method="post" class="search-video">
        <input type="text" name="search_box" placeholder="Search ..." required maxlength="100">
        <button type="submit" class="fas fa-search" name="search_tutor"></button>
    </form>

    <div class="box-container">


        <div class="box">
            <div class="video">
                <div>
                    <h3>How to apply for E-sell property</h3>
                    <span>Video</span>
                </div>
            </div>
            <p>total views : <span>1208</span></p>
            <a href="watch-video" class="inline-btn">Play video</a>
        </div>

        <div class="box">
            <div class="tutor">
                <div>
                    <h3>E-government Services</h3>
                    <span>Video</span>
                </div>
            </div>
            <p>total views : <span>1088</span></p>
            <a href="watch-video2" class="inline-btn">Play video</a>
        </div>





</section>
