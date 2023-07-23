
<div class="carousel-wrapper">
<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="d-block w-100 carousel image" src="{{asset('carousal/Carousal1.jpg')}}" alt="Iphone 14 Pro Max" height="800px" width="100%">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100 carousel image" src="{{asset('carousal/carousal2.webp')}}"  alt="Samsung S23 Ultra" height="800px" width="100%">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100 carousel image" src="{{asset('carousal/carousal 3.jpg')}}" alt="Oneplus Nord CE3" height="800px" width="100%">
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
</div>
<style>
.carousel-wrapper {
    /* margin-top: 80px; */
    height: auto; /* Set the desired height for the carousel container */
    overflow: hidden; /* Ensure that any overflowing content is hidden */
  }

  .carousel-image {
    width: 100%;
    height: 400px;
    object-fit: cover; /* This will ensure the image fills the container while maintaining aspect ratio */
    object-position: center;

  }
</style>
