<template>
<section class="hero-section">
  <div class="container">
    <div class="row">
      <div class="col-md-6 text-md-left py-4 rounded">
        <div class="hero-text">OptiShift</div>
        <div class="hero-content">
            The best way to optimize and track your packages.
        </div>
        <button class="btn btn-primary my-3">Contact Us <i class="fa fa-arrow-right ms-1"></i></button>
      </div>
    </div>
  </div>
</section>

<section class="services-section">
  <div class="container">
    <h2 class="text-center m-4">Our Services</h2> <!-- Title for the section -->
    <div class="row">
      <!-- Client Service -->
      <div class="col-lg-4">
        <div class="card service-card">
          <div class="card-body">
            <h5 class="card-title"><strong>Client</strong></h5>
            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec aliquet libero non aliquam malesuada.</p>
            <a href="about.html" class="btn btn-primary">Learn More</a> <!-- Button for the client -->
          </div>
        </div>
      </div>
      <!-- Deliveryman Service -->
      <div class="col-lg-4">
        <div class="card service-card">
          <div class="card-body">
            <h5 class="card-title"><strong>Deliveryman</strong></h5>
            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec aliquet libero non aliquam malesuada.</p>
            <a href="about.html" class="btn btn-primary">Learn More</a> <!-- Button for the deliveryman -->
          </div>
        </div>
      </div>
      <!-- Seller Service -->
      <div class="col-lg-4">
        <div class="card service-card">
          <div class="card-body">
            <h5 class="card-title"><strong>Seller</strong></h5>
            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec aliquet libero non aliquam malesuada.</p>
            <a href="about.html" class="btn btn-primary">Learn More</a> <!-- Button for the seller -->
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</template>

<script>
export default {
    name: 'Home',
};
</script>

<style scoped>
    /* Custom CSS for the hero section */
    .hero-section {
      background-image: url('./hero_image.png'); /* Replace 'background-image.jpg' with your image */
      background-size: cover;
      height: 600px;
      background-position: center;
      color: #000;
      padding: 200px 0; /* Adjust padding as needed */
      text-align: center;
    }

    /* Styling for the text */
    .hero-text {
      font-size: 36px;
      font-weight: bold;
    }

    /* Styling for the text content */
    .hero-content {
      font-size: 24px;
      margin-top: 20px;
    }
    /* Custom CSS for the services section */
    .services-section {
      padding: 50px 0; /* Adjust padding as needed */
      background-color: #f8f9fa;
    }

    /* Styling for service cards */
    .service-card {
      border: none;
      border-radius: 10px;
      padding: 30px;
      text-align: center;
      background-color: #fff;
    }
  </style>