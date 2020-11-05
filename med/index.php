<?php
session_start();?>

  <head>
    <meta charset="utf-8" />
    <meta name="description" content="" />
    <title>Medicinal Nursery</title>
    <link rel="icon" type="image/x-icon" href="assets/icon/favicon.ico" />
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script
    src="https://use.fontawesome.com/releases/v5.13.0/js/all.js"
    crossorigin="anonymous"
  ></script>
    <!-- Some css goes here -->
    <style>
.navbar-dark .nav-item:hover .nav-link {
    color: white;
}

.navbar-dark .navbar-nav .nav-link {
    color: #96ff40;
}

header.masthead {
  padding-top: 10.5rem;
  padding-bottom: 6rem;
  text-align: center;
  color: #fff;
  background-image: url("assets/img/header-back.jpg");
  background-repeat: no-repeat;
  background-attachment: scroll;
  background-position: center center;
  background-size: cover;
}

header.masthead .masthead-subheading {
  font-size: 1.5rem;
  font-style: italic;
  line-height: 1.5rem;
  margin-bottom: 25px;
  font-family: "Droid Serif", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
}

header.masthead .masthead-heading {
  font-size: 3rem;
  font-weight: 700;
  line-height: 3.25rem;
  margin-bottom: 2rem;
  font-family: "Montserrat", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
}
a {
  color: #fed136;
  text-decoration: none;
  background-color: transparent;
}

a:hover {
  color: cyan;
  text-decoration: underline;
}
.timeline {
  position: relative;
  padding: 0;
  list-style: none;
}

.timeline:before {
  position: absolute;
  top: 0;
  bottom: 0;
  left: 40px;
  width: 2px;
  margin-left: -1.5px;
  content: "";
  background-color: #e9ecef;
}

.timeline>li {
  position: relative;
  min-height: 50px;
  margin-bottom: 50px;
}

.timeline>li:after, .timeline>li:before {
  display: table;
  content: " ";
}

.timeline>li:after {
  clear: both;
}

.timeline>li .timeline-panel {
  position: relative;
  float: right;
  width: 100%;
  padding: 0 20px 0 100px;
  text-align: left;
}

.timeline>li.timeline-inverted>.timeline-panel {
  float: right;
  padding: 0 20px 0 100px;
  text-align: left;
}
.timeline>li.timeline-inverted>.timeline-panel {
  float: right;
  padding: 0 20px 0 100px;
  text-align: left;
}

.timeline>li.timeline-inverted>.timeline-panel:before {
  right: auto;
  left: -15px;
  border-right-width: 15px;
  border-left-width: 0;
}

.timeline>li.timeline-inverted>.timeline-panel:after {
  right: auto;
  left: -14px;
  border-right-width: 14px;
  border-left-width: 0;
}


@media (min-width: 768px) {
  .timeline:before {
    left: 50%;
  }
  .timeline>li {
    min-height: 100px;
    margin-bottom: 100px;
  }
  .timeline>li .timeline-panel {
    float: left;
    width: 41%;
    padding: 0 20px 20px 30px;
    text-align: right;
  }
  .timeline>li .timeline-image {
    left: 50%;
    width: 100px;
    height: 100px;
    margin-left: -50px;
  }
  .timeline>li .timeline-image h4 {
    font-size: 13px;
    line-height: 18px;
    margin-top: 16px;
  }
  .timeline>li.timeline-inverted>.timeline-panel {
    float: right;
    padding: 0 30px 20px 20px;
    text-align: left;
  }
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #75D975;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}
.dropdown-content a:hover {background-color: #f1f1f1}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    text-align: left;
}


.dropdown:hover .dropdown-content {
    display: block;
    color: white;
    text-decoration: none;
}
    </style>
  </head>
    <body style="margin: 10px;" id="page-top">
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top" id="mainNav">
      <!-- Brand/logo -->
      <a class="navbar-brand js-scroll-trigger" href="#"
        ><img src="assets/icon/logo.png" height="30px" width="30px" alt="logo"/>
        MEDICINAL NURSERY</a>

      <!-- Links -->
      <button
          class="navbar-toggler navbar-toggler-right"
          type="button"
          data-toggle="collapse"
          data-target="#navbarResponsive"
          aria-controls="navbarResponsive"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
      Menu
      <i class="fas fa-bars ml-1"></i>
    </button>
    <div class="collapse navbar-collapse" style="color:blanchedalmond" id="navbarResponsive">
      <ul class="navbar-nav text-uppercase ml-auto">
      <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="ShowDetails.php">Explore</a>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="#explore">Know More</a>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="#about">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="#footer">Contact Us</a>
        </li>
        <li class="nav-item">
          <?php
         
          if($_SESSION)
          {?>
               <div class="dropdown nav-link" style="float:right">
    <a href="javascript:void(0)"><?php echo $_SESSION["a_name"];?></a>
    <div class="dropdown-content">
	  <a href="AdminHome.php">Home</a>
      
      <a href="logout.php">Log Out</a>
	  
    </div>
            <?php
          } else{
          ?>
          <a class="nav-link js-scroll-trigger" href="Login.php">Login</a>
          <?php
          }
          ?>
        </li>
      </ul>
    </div>
    </nav>
   <!-- Masthead-->
   <header class="masthead">
    <div class="container">
     
      <div class="masthead-heading text-uppercase">Welcome To Medicinal Plants Garden</div>
      <div class="masthead-subheading">
      
      <span style="color:#1eff00">Nature</span> itself is the best <span style="color:#1eff00">Physician</span>
       <br>
       &mdash; Hippocrates
    </div>
  </header>
   <!-- Explore section -->
  <section class="page-section"  style="margin-top:20px" id="explore">
    <div class="container">
      <div class="text-center">
        <h2 class="section-heading text-uppercase">KNOW MORE</h2>
        <h5 class="section-subheading text-muted">
          All plants produce chemical compounds which give them an evolutionary advantage, such as defending against herbivores or, in the example of salicylic acid, as a hormone in plant defenses.
        </h5>
      </div>
      <div class="row text-center">
        <div class="col-md-4">
          <h4 class="my-3">Alkaloids</h4>
          <p class="text-muted">
            Alkaloids are bitter-tasting chemicals, very widespread in nature, and often toxic, found in many medicinal plants.[52] There are several classes with different modes of action as drugs, both recreational and pharmaceutical. Medicines of different classes include atropine, scopolamine, and hyoscyamine (all from nightshade),[53] the traditional medicine berberine (from plants such as Berberis and Mahonia),[b] caffeine (Coffea), cocaine (Coca), ephedrine (Ephedra), morphine (opium poppy), nicotine (tobacco),[c] reserpine (Rauvolfia serpentina), quinidine and quinine (Cinchona), vincamine (Vinca minor), and vincristine (Catharanthus roseus).
          </p>
        </div>
        <div class="col-md-4">
          <h4 class="my-3">Glycosides</h4>
          <p class="text-muted">
            Anthraquinone glycosides are found in medicinal plants such as rhubarb, cascara, and Alexandrian senna.[58][59] Plant-based laxatives made from such plants include senna,[60] rhubarb[61] and Aloe.[51]
    The cardiac glycosides are powerful drugs from medicinal plants including foxglove and lily of the valley. They include digoxin and digitoxin which support the beating of the heart, and act as diuretics.
          </p>
        </div>
        <div class="col-md-4">
          <h4 class="my-3">Terpenes</h4>
          <p class="text-muted">
            Terpenes and terpenoids of many kinds are found in a variety of medicinal plants,[72] and in resinous plants such as the conifers. They are strongly aromatic and serve to repel herbivores. Their scent makes them useful in essential oils, whether for perfumes such as rose and lavender, or for aromatherapy.[51][73][74] Some have medicinal uses: for example, thymol is an antiseptic and was once used as a vermifuge (anti-worm medicine)
          </p>
        </div>
      </div>
    </div>
  </section>
  <!-- About-->
  <section class="page-section" id="about">
    <div class="container">
      <div class="text-center">
        <h2 class="section-heading text-uppercase">About Us</h2>
      </div>
      <ul class="timeline">
        <li>
          <div class="timeline-panel">
            <div class="timeline-heading">
              <h4>HISTORY</h4>
            </div>
            <div class="timeline-body">
              <p class="text-muted">
              The gardens were founded in 1787 by Colonel Robert Kyd, 
              an army officer of the British East India Company, primarily 
              for the purpose of identifying new plants of commercial value, 
              such as teak, and growing spices for trade.[4] Joseph Dalton Hooker 
              says of this Botanical Garden that "Amongst its greatest triumphs 
              may be considered the introduction of the tea-plant from China ... 
              the establishment of the tea-trade in the Himalaya and Assam is 
              almost entirely the work of the superintendents of the gardens 
              of Calcutta and Seharunpore (Saharanpur)."
              </p>
            </div>
          </div>
        </li>
        <li class="timeline-inverted">
          <div class="timeline-panel">
            <div class="timeline-heading">
              <h4>THE ATTRACTION</h4>
            </div>
            <div class="timeline-body">
              <p class="text-muted">
              The best-known landmark of the garden is The Great Banyan, an enormous banyan tree (Ficus benghalensis) that is reckoned to be the largest tree in the world, at more than 330 metres in circumference. It partially inspired the novel Hothouse by Brian Aldiss.[9] The gardens are also famous for their enormous collections of orchids, bamboos, palms, and plants of the screw pine genus (Pandanus).

Animals seen inside the Botanic Garden include the Jackal (Canis aureus), Indian mongoose and the Indian Fox (Vulpes bengalensis). A large number of various snakes are also found in the garden.
              </p>
            </div>
          </div>
        </li>
        </ul>
        </div></section>
  <!-- Footer-->
  <footer class="footer py-4 bg-dark" id="footer">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-4 text-lg-left" style="color: white;">
          Copyright © Medicinal Garden 2020
        </div>
        <div class="col-lg-4 my-3 text-lg-center">
          <address class="text-light">
           
            Mail Us:
            <a
              class="text-light"
              href="mailto:xyx@med.in
            "
              >xyx@med.in </a
            ><br />
            Call Us:
            <a class="text-light" href="tel:9876543210">9876543210</a>
          </address>
          <a class="btn btn-light btn-social mx-2" href="#!"
            ><i class="fab fa-whatsapp"></i
          ></a>
          <a class="btn btn-light btn-social mx-2" href="#!"
            ><i class="fab fa-facebook-f"></i
          ></a>
        </div>
        <div class="col-lg-4 text-lg-right">
          <a  href="#">Privacy Policy</a><br>
          <a  href="#">Terms & Conditions</a>
        </div>
      </div>
    </div>
  </footer>
  <!-- Bootstrap core JS-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
  <!-- Third party plugin JS-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>

  <!-- Core theme JS-->
  <script src="./js/scripts.js"></script>
  
  </body>

