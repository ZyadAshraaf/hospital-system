<?php 
include './shared/header.php';
include './shared/nav.php';
?>



    <!--carousel-->
    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="./img/carousel1.jpg" class="d-block w-100" alt="...">
                <div class="bgDark w-100"></div>
                <div class="carousel-caption ">
                </div>
            </div>
            <div class="carousel-item">
                <img src="./img/carousel2.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption ">
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-target="#carouselExampleCaptions" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-target="#carouselExampleCaptions" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </button>
    </div>

<?php 
include './shared/footer.php';
?>



   