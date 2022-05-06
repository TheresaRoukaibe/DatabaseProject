<?php 
session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- SEO Meta Tags -->
    <meta name="description" content="Aria is a business focused HTML landing page template built with Bootstrap to help you create lead generation websites for companies and their services.">
    <meta name="author" content="Inovatik">

    <!-- OG Meta Tags to improve the way the post looks when you share the page on LinkedIn, Facebook, Google+ -->
	<meta property="og:site_name" content="" /> <!-- website name -->
	<meta property="og:site" content="" /> <!-- website link -->
	<meta property="og:title" content=""/> <!-- title shown in the actual shared post -->
	<meta property="og:description" content="" /> <!-- description shown in the actual shared post -->
	<meta property="og:image" content="" /> <!-- image link, make sure it's jpg -->
	<meta property="og:url" content="" /> <!-- where do you want your post to link to -->
	<meta property="og:type" content="article" />

    <!-- Website Title -->
    <title>Discover Lebanon Your Way! </title>
    
    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:500,700&display=swap&subset=latin-ext" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,600&display=swap&subset=latin-ext" rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/fontawesome-all.css" rel="stylesheet">
    <link href="css/swiper.css" rel="stylesheet">
	<link href="css/magnific-popup.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	
	<!-- Favicon  -->
     <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
	
</head>
<body data-spy="scroll" data-target=".fixed-top">
    
    <!-- Preloader 
 <div class="spinner-wrapper">
        <div class="spinner">
            <div class="bounce1"></div>
            <div class="bounce2"></div>
            <div class="bounce3"></div>
        </div>
    </div>
 
    -->

    <!-- Navbar -->
    <nav class="navbar navbar-expand-md navbar-dark bg-danger navbar-custom fixed-top">
        <!-- Text Logo - Use this if you don't have a graphic logo -->
        <!-- <a class="navbar-brand logo-text page-scroll" href="index.html">Aria</a> -->

        <!-- Image Logo -->
        <a class="navbar-brand logo-image" href="browse.php"><img src="images/flag.png" width = '150' height = '150' alt="alternative"></a>
        
        <!-- Mobile Menu Toggle Button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-awesome fas fa-bars"></span>
            <span class="navbar-toggler-awesome fas fa-times"></span>
        </button>
        <!-- end of mobile menu toggle button -->

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="#header">HOME <span class="sr-only">(current)</span></a>
                </li>
             
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="#services">NEAR YOU</a>
                </li>
				 <li class="nav-item">
                    <a class="nav-link page-scroll" href="#addhobbies">ADD A HOBBY</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="#hobbies">MY HOBBY</a>
                </li>
				 <li class="nav-item">
                    <a class="nav-link page-scroll" href="#review">REVIEW</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="#projects">SEARCH</a>
                </li>
 

         
            </ul>
            
        </div>
    </nav> <!-- end of navbar -->
    <!-- end of navbar -->
	
	
<?php 

  
include("connection.php");
$email = $_SESSION['email'];
try { 
$query = $mysqli->prepare("Select tourist_attractions.* FROM tourist_attractions,users WHERE users.postal_code = tourist_attractions.postal_code_id AND users.email = '$email'");
$query->execute();
$array = $query->get_result();
  } catch (mysqli_sql_exception $e) { 
      var_dump($e);
      exit; 
   }

try { 
$id = $_SESSION['user_id'];
$query2 = $mysqli->prepare("Select tourist_attractions.* FROM tourist_attractions, attraction_involves, user_enjoys, users WHERE attraction_involves.inv_att_id = tourist_attractions.att_id AND user_enjoys.enjoys_hobby_id = attraction_involves.inv_hobby_id AND user_enjoys.enjoys_hobby_id = attraction_involves.inv_hobby_id AND attraction_involves.inv_hobby_id = user_enjoys.enjoys_hobby_id AND users.user_id = user_enjoys.enjoys_user_id AND users.email = '$email'");
$query2->execute();
$array2 = $query2->get_result();
  } catch (mysqli_sql_exception $e) { 
      var_dump($e);
      exit; 
   }
   try { 
$query3 = $mysqli->prepare("Select * FROM tourist_attractions");
$query3->execute();
$array3 = $query3->get_result();
  } catch (mysqli_sql_exception $e) { 
      var_dump($e);
      exit; 
   } 
   
   try{
 $query4 = $mysqli->prepare("Select tourist_attractions.* FROM tourist_attractions,users WHERE tourist_attractions.postal_code_id = users.postal_code AND users.email = '$email'");
$query4->execute();
$array4 = $query4->get_result();
  } catch (mysqli_sql_exception $e) { 
      var_dump($e);
      exit; 
   }
   
   try{
$query7 = $mysqli->prepare("Select postal_codes.* FROM tourist_attractions,users,postal_codes WHERE tourist_attractions.postal_code_id = users.postal_code AND postal_codes.code_id = users.postal_code AND users.email = '$email'");
$query7->execute();
$array7 = $query7->get_result();
  } catch (mysqli_sql_exception $e) { 
      var_dump($e);
      exit; 
   }
  
   
   
    try{
 $query5 = $mysqli->prepare("Select tourist_attraction_types.* FROM tourist_attractions,tourist_attraction_types,users,postal_codes WHERE tourist_attractions.postal_code_id = postal_codes.code_id AND  users.postal_code = tourist_attractions.postal_code_id AND users.email = '$email'");
$query5->execute();
$array5 = $query5->get_result();
  } catch (mysqli_sql_exception $e) { 
      var_dump($e);
      exit; 
   }
   
   try{
 $query6 = $mysqli->prepare("Select postal_codes.* FROM postal_codes, users WHERE postal_codes.code_id = users.postal_code AND users.email = '$email'");
$query6->execute();
$array6 = $query6->get_result();
  } catch (mysqli_sql_exception $e) { 
      var_dump($e);
      exit; 
   }
?>  
   
    <!-- Header -->
    <header id="header" class="header">
        <div class="header-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-container">
                            <h1>WELCOME BACK, <?php echo $_SESSION['name'] ?>  !</h1>
                            <a class="btn-solid-lg page-scroll" href="#services">PLACES NEAR ME</a>
                        </div>
                    </div> <!-- end of col -->
                </div> <!-- end of row -->
            </div> <!-- end of container -->
    </header> <!-- end of header -->
    <!-- end of header -->


 <div id="services" class="cards-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                   <div class="section-title">NEAR YOU</div>
                    <h2>Discover current available places<br> Near You !</h2>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
            <div class="row">
                <div class="col-lg-12">
                    <?php $place = $array6->fetch_assoc() ?> 
	<?php while($tourist_attractions = $array->fetch_assoc()){ ?>
	<?php if($tourist_attractions['attraction_type_id'] == '1') { ?>
                    <!-- Card -->
                    <div class="card">
                        <div class="card-image">
                            <img class="img-fluid" src="<?php echo $tourist_attractions['url'] ?>" alt="alternative">
                        </div>
                        <div class="card-body">
                            <h3 class="card-title"><?php echo $tourist_attractions['att_name'] ?></h3>
                            <p><?php echo $tourist_attractions['att_description'] ?></p>
                            <ul class="list-unstyled li-space-lg">
							 <li class="media">
                                    <i class="fas fa-square"></i>
                                    <div class="media-body"> CITY: <?php echo $place['code_city_name'] ?> </div>
                                </li>
                                <li class="media">
                                    <i class="fas fa-square"></i>
                                    <div class="media-body"> BEST ENJOYED WITH: <?php echo $tourist_attractions['att_capacity'] ?> people </div>
                                </li>
                                <li class="media">
                                    <i class="fas fa-square"></i>
                                    <div class="media-body">OPENS AT: <?php echo $tourist_attractions['att_budget_opening_hours'] ?></div>
									 <div class="media-body">CLOSES AT: <?php echo $tourist_attractions['att_budget_closing_hours'] ?></div>
                                </li>
								 <li class="media">
                                    <i class="fas fa-square"></i>
                                    <div class="media-body">TYPE: <?php echo "Restaurant" ?></div>
                                </li>
                            </ul>
                            <p class="price">BUDGET: <span><?php echo $tourist_attractions['att_budget'] ?></span></p>
                        </div>
                        <div class="button-container">
                            <a class="btn-solid-reg page-scroll" href="#callMe">DETAILS</a>
                        </div> <!-- end of button-container -->
                    </div>
                    <!-- end of card -->
					
	<?php } else if($tourist_attractions['attraction_type_id'] == '2') { ?>
	<div class="card">
                        <div class="card-image">
                            <img class="img-fluid" src="<?php echo $tourist_attractions['url'] ?>" alt="alternative">
                        </div>
                        <div class="card-body">
                            <h3 class="card-title"><?php echo $tourist_attractions['att_name'] ?></h3>
                            <p><?php echo $tourist_attractions['att_description'] ?></p>
                            <ul class="list-unstyled li-space-lg">
							 <li class="media">
                                    <i class="fas fa-square"></i>
                                    <div class="media-body"> CITY: <?php echo $place['code_city_name']  ?> </div>
                                </li>
                                <li class="media">
                                    <i class="fas fa-square"></i>
                                    <div class="media-body"> BEST ENJOYED WITH: <?php echo $tourist_attractions['att_capacity'] ?> people </div>
                                </li>
                                <li class="media">
                                    <i class="fas fa-square"></i>
                                    <div class="media-body">OPENS AT: <?php echo $tourist_attractions['att_budget_opening_hours'] ?></div>
									 <div class="media-body">CLOSES AT: <?php echo $tourist_attractions['att_budget_closing_hours'] ?></div>
                                </li>
								 <li class="media">
                                    <i class="fas fa-square"></i>
                                    <div class="media-body">TYPE: <?php echo "Night Life" ?></div>
                                </li>
                            </ul>
                            <p class="price">BUDGET: <span><?php echo $tourist_attractions['att_budget'] ?></span></p>
                        </div>
                        <div class="button-container">
                            <a class="btn-solid-reg page-scroll" href="#callMe">DETAILS</a>
                        </div> <!-- end of button-container -->
                    </div>
	<?php } else if($tourist_attractions['attraction_type_id'] == '3') { ?>
	<div class="card">
                        <div class="card-image">
                            <img class="img-fluid" src="<?php echo $tourist_attractions['url'] ?>" alt="alternative">
                        </div>
                        <div class="card-body">
                            <h3 class="card-title"><?php echo $tourist_attractions['att_name'] ?></h3>
                            <p><?php echo $tourist_attractions['att_description'] ?></p>
                            <ul class="list-unstyled li-space-lg">
							 <li class="media">
                                    <i class="fas fa-square"></i>
                                    <div class="media-body"> CITY: <?php echo $place['code_city_name']  ?> </div>
                                </li>
                                <li class="media">
                                    <i class="fas fa-square"></i>
                                    <div class="media-body"> BEST ENJOYED WITH: <?php echo $tourist_attractions['att_capacity'] ?> people </div>
                                </li>
                                <li class="media">
                                    <i class="fas fa-square"></i>
                                    <div class="media-body">OPENS AT: <?php echo $tourist_attractions['att_budget_opening_hours'] ?></div>
									 <div class="media-body">CLOSES AT: <?php echo $tourist_attractions['att_budget_closing_hours'] ?></div>
                                </li>
								 <li class="media">
                                    <i class="fas fa-square"></i>
                                    <div class="media-body">TYPE: <?php echo "Indoor Entertainment" ?></div>
                                </li>
                            </ul>
                            <p class="price">BUDGET: <span><?php echo $tourist_attractions['att_budget'] ?></span></p>
                        </div>
                        <div class="button-container">
                            <a class="btn-solid-reg page-scroll" href="#callMe">DETAILS</a>
                        </div> <!-- end of button-container -->
                    </div>
	<?php } else if($tourist_attractions['attraction_type_id'] == '4') { ?>
		<div class="card">
                        <div class="card-image">
                            <img class="img-fluid" src="<?php echo $tourist_attractions['url'] ?>" alt="alternative">
                        </div>
                        <div class="card-body">
                            <h3 class="card-title"><?php echo $tourist_attractions['att_name'] ?></h3>
                            <p><?php echo $tourist_attractions['att_description'] ?></p>
                            <ul class="list-unstyled li-space-lg">
							 <li class="media">
                                    <i class="fas fa-square"></i>
                                    <div class="media-body"> CITY: <?php echo $place['code_city_name']  ?> </div>
                                </li>
                                <li class="media">
                                    <i class="fas fa-square"></i>
                                    <div class="media-body"> BEST ENJOYED WITH: <?php echo $tourist_attractions['att_capacity'] ?> people </div>
                                </li>
                                <li class="media">
                                    <i class="fas fa-square"></i>
                                    <div class="media-body">OPENS AT: <?php echo $tourist_attractions['att_budget_opening_hours'] ?></div>
									 <div class="media-body">CLOSES AT: <?php echo $tourist_attractions['att_budget_closing_hours'] ?></div>
                                </li>
								 <li class="media">
                                    <i class="fas fa-square"></i>
                                    <div class="media-body">TYPE: <?php echo "Outdoor Entertainment" ?></div>
                                </li>
                            </ul>
                            <p class="price">BUDGET: <span><?php echo $tourist_attractions['att_budget'] ?></span></p>
                        </div>
                        <div class="button-container">
                            <a class="btn-solid-reg page-scroll" href="#callMe">DETAILS</a>
                        </div> <!-- end of button-container -->
                    </div>
	<?php } ?> 
	<?php } ?>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of cards-2 -->
    <!-- end of services -->
	

   
	  <!-- Call Me -->
    <div id="addhobbies" class="cards-2">
        <div class="container" >
            <div class="row">
                <div class="col-lg-6">
                    <div class="text-container">
                        <div class="section-title">ADD A HOBBY</div>
                        <h2 class="red">Add a hobby you love to do</h2>
                        <p class="green">You are just a few steps away from a personalized offer. Just fill in the form and send it to us and we'll update your recommendations for you.</p>
                       
                    </div>
                </div> <!-- end of col -->
				

                <div class="col-lg-6">
               
                    <!-- Call Me Form -->
                    <form  action="addHobbies.php" id="addHobbies" data-bs-toggle="validator" data-bs-focus="false">
					 <div class="form-group">
                            <input type="text" class="form-control-input" id="email" name="email" required>
                            <label class="label-control" for="email">Enter email</label>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control-input" id="hobby_name" name="hobby_name" required>
                            <label class="label-control" for="hobby_name">Interested in...</label>
                            <div class="help-block with-errors"></div>
                        </div>
                        
                       <div class="text-center"><button class="btn btn-danger btn-xl text-uppercase enabled" id="submit" name="submit" value="submit" type="submit">SUBMIT</button></div>
                    </form>
                    <!-- end of call me form -->
                    
                </div> <!-- end of col -->
				
            </div> <!-- end of row -->
		
        </div> <!-- end of container -->
    </div> <!-- end of form-1 -->
    <!-- end of call me -->
	
	

   <div id="hobbies" class="cards-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">BASED ON YOUR INTEREST </div>
                    <h2> Find places that match what you love to do !</h2>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
            <div class="row">
                <div class="col-lg-12">
                    
                    <!-- Card -->
					<?php $place = $array7->fetch_assoc() ?> 
					
	<?php while($tourist_attractions = $array2->fetch_assoc()){ ?>
                    <div class="card">
                        <div class="card-image">
                            <img class="img-fluid" src="<?php echo $tourist_attractions['url'] ?>" alt="alternative">
                        </div>
                        <div class="card-body">
                            <h3 class="card-title"><?php echo $tourist_attractions['att_name'] ?></h3>
                            <p><?php echo $tourist_attractions['att_description'] ?></p>
                            <ul class="list-unstyled li-space-lg">
							 <li class="media">
                                    <i class="fas fa-square"></i>
									<?php  
									$pdo = new PDO ("mysql:host=localhost;dbname=touristhelper.db","root", "");
									$sql2 = "SELECT postal_codes.* FROM postal_codes, tourist_attractions WHERE postal_codes.code_id = tourist_attractions.postal_code_id AND tourist_attractions.postal_code_id = ?"; 
$result2 = $pdo->prepare($sql2);
$result2->bindParam(1, $tourist_attractions['postal_code_id']);
$result2->execute();
$place2 = $result2->fetch(); ?>
                                    <div class="media-body"> CITY: <?php echo $place2['code_city_name'] ?> </div>
                                </li>
                                <li class="media">
                                    <i class="fas fa-square"></i>
                                    <div class="media-body"> BEST ENJOYED WITH: <?php echo $tourist_attractions['att_capacity'] ?> people </div>
                                </li>
                                <li class="media">
                                    <i class="fas fa-square"></i>
                                    <div class="media-body">OPENS AT: <?php echo $tourist_attractions['att_budget_opening_hours'] ?></div>
									 <div class="media-body">CLOSES AT: <?php echo $tourist_attractions['att_budget_closing_hours'] ?></div>
                                </li>
								 
                            </ul>
                            <p class="price">BUDGET: <span><?php echo $tourist_attractions['att_budget'] ?></span></p>
                        </div>
                        <div class="button-container">
                            <a class="btn-solid-reg page-scroll" href="#callMe">DETAILS</a>
                        </div> <!-- end of button-container -->
                    </div>
	<?php } ?>
                   

                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of cards-2 -->
    <!-- end of services -->
  
   <div id="review" class="cards-2">
        <div class="container" >
            <div class="row">
                <div class="col-lg-6">
                    <div class="text-container">
                        <div class="section-title">LEAVE A REVIEW</div>
                        <h2 class="red">Let people know what you think !</h2>
                      
                       
                    </div>
                </div> <!-- end of col -->
				

                <div class="col-lg-6">
               
                    <!-- Call Me Form -->
                    <form  action="leavereview.php" id="review" data-bs-toggle="validator" data-bs-focus="false">
					 <div class="form-group">
                            <input type="text" class="form-control-input" id="email" name="email" required>
                            <label class="label-control" for="email">Enter email</label>
                            <div class="help-block with-errors"></div>
                        </div>
						 <div class="form-group">
                            <input type="text" class="form-control-input" id="att_name" name="att_name" required>
                            <label class="label-control" for="att_name">Name of place </label>
                            <div class="help-block with-errors"></div>
                        </div>
						 <div class="form-group">
                            <input type="text" class="form-control-input" id="visit_time" name="visit_time" required>
                            <label class="label-control" for="visit_time">Please enter time of visit </label>
                            <div class="help-block with-errors"></div>
                        </div>
						 <div class="form-group">
                            <input type="text" class="form-control-input" id="visit_date" name="visit_date" required>
                            <label class="label-control" for="visit_date">Please enter date of visit </label>
                            <div class="help-block with-errors"></div>
                        </div>
                       <div class="form-group">
                            <input type="text" class="form-control-input" id="review" name="review" required>
                            <label class="label-control" for="review">What did you think of this place? </label>
                            <div class="help-block with-errors"></div>
                        </div>
                        
                       <div class="text-center"><button class="btn btn-danger btn-xl text-uppercase enabled" id="submit" name="submit" value="submit" type="submit">SUBMIT</button></div>
                    </form>
                    <!-- end of call me form -->
                    
                </div> <!-- end of col -->
				
            </div> <!-- end of row -->
		
        </div> <!-- end of container -->
    </div> <!-- end of form-1 -->
    <!-- end of call me -->
	
	
	<div id="projects" class="filter">
		<div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">SEARCH</div>
                    <h2>Browse through current businesses available</h2>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
            
                    <!-- Filter -->
                    <div class="button-group filters-button-group">
                        <a class="button is-checked" data-filter="*"><span>SHOW ALL</span></a>
                        <a class="button" data-filter=".rest"><span>RESTAURANT</span></a>
                        <a class="button" data-filter=".night"><span>NIGHT LIFE</span></a>
                        <a class="button" data-filter=".out"><span>OUTDOOR ENTERNAINMENT</span></a>
                        <a class="button" data-filter=".in"><span>INDOOR ENTERNAINMENT</span></a>
                    </div> <!-- end of button group -->
                   
                    <div class="grid">
                      <?php $x = 0 ?>
                        <?php while($tourist_attractions = $array3->fetch_assoc()){ ?>
					<?php if($tourist_attractions['attraction_type_id'] == '1') { ?>
						  <div class="element-item rest">
                            <a class="popup-with-move-anim" href="#<?php echo $x ?>"><div class="element-item-overlay"><span><?php echo $tourist_attractions['att_name']?></span></div><img src="<?php echo $tourist_attractions['url']?>" alt="alternative"></a>
                        </div>
						
						
						<!-- HON BALASH -->
						  <div id="<?php echo $x ?>" class="lightbox-basic zoom-anim-dialog mfp-hide">
        <div class="row">
            <button title="Close (Esc)" type="button" class="mfp-close x-button">×</button>
            <div class="col-lg-8">
                <img class="img-fluid" src="<?php echo $tourist_attractions['url'] ?>" alt="alternative">
            </div> <!-- end of col -->
            <div class="col-lg-4">
                <h3><?php echo $tourist_attractions['att_name'] ?></h3>
                <hr class="line-heading">
                 <p><?php echo $tourist_attractions['att_description'] ?></p>
               <li class="media">
                                    <i class="fas fa-square"></i>
                                    <div class="media-body">OPENS AT: <?php echo $tourist_attractions['att_budget_opening_hours'] ?></div>
									 <div class="media-body">CLOSES AT: <?php echo $tourist_attractions['att_budget_closing_hours'] ?></div>
                                </li>
								
                <div class="testimonial-container">
                     <p class="testimonial-author">BEST ENJOYED WITH: <?php echo $tourist_attractions['att_capacity'] ?> people </p>
                </div>
                <a class="btn-solid-reg">BUDGET: <span><?php echo $tourist_attractions['att_budget'] ?></a> <a class="btn-outline-reg mfp-close as-button" href="#projects">BACK</a> 
				<?php $x = $x +1  ?>
            </div> <!-- end of col -->
        </div> <!-- end of row -->
    </div> <!-- end of lightbox-basic -->
    <!-- end of lightbox -->
	 
					<?php } else if($tourist_attractions['attraction_type_id'] == '2') { ?>
						 <div class="element-item night">
                            <a class="popup-with-move-anim" href="#<?php echo $x ?>"><div class="element-item-overlay"><span><?php echo $tourist_attractions['att_name']?></span></div><img src="<?php echo $tourist_attractions['url']?>" alt="alternative"></a>
                        </div>
						
						
						<!-- HON BALASH -->
						  <div id="<?php echo $x ?>" class="lightbox-basic zoom-anim-dialog mfp-hide">
        <div class="row">
            <button title="Close (Esc)" type="button" class="mfp-close x-button">×</button>
            <div class="col-lg-8">
                <img class="img-fluid" src="<?php echo $tourist_attractions['url'] ?>" alt="alternative">
            </div> <!-- end of col -->
            <div class="col-lg-4">
                <h3><?php echo $tourist_attractions['att_name'] ?></h3>
                <hr class="line-heading">
                 <p><?php echo $tourist_attractions['att_description'] ?></p>
               <li class="media">
                                    <i class="fas fa-square"></i>
                                    <div class="media-body">OPENS AT: <?php echo $tourist_attractions['att_budget_opening_hours'] ?></div>
									 <div class="media-body">CLOSES AT: <?php echo $tourist_attractions['att_budget_closing_hours'] ?></div>
                                </li>
								
                <div class="testimonial-container">
                     <p class="testimonial-author">BEST ENJOYED WITH: <?php echo $tourist_attractions['att_capacity'] ?> people </p>
                </div>
                <a class="btn-solid-reg">BUDGET: <span><?php echo $tourist_attractions['att_budget'] ?></a> <a class="btn-outline-reg mfp-close as-button" href="#projects">BACK</a> 
				<?php $x = $x +1  ?>
            </div> <!-- end of col -->
        </div> <!-- end of row -->
    </div> <!-- end of lightbox-basic -->
    <!-- end of lightbox -->
					<?php } else if($tourist_attractions['attraction_type_id'] == '3') { ?>
						 <div class="element-item in">
                            <a class="popup-with-move-anim" href="#<?php echo $x ?>"><div class="element-item-overlay"><span><?php echo $tourist_attractions['att_name']?></span></div><img src="<?php echo $tourist_attractions['url']?>" alt="alternative"></a>
                        </div>
						
						
						<!-- HON BALASH -->
						  <div id="<?php echo $x ?>" class="lightbox-basic zoom-anim-dialog mfp-hide">
        <div class="row">
            <button title="Close (Esc)" type="button" class="mfp-close x-button">×</button>
            <div class="col-lg-8">
                <img class="img-fluid" src="<?php echo $tourist_attractions['url'] ?>" alt="alternative">
            </div> <!-- end of col -->
            <div class="col-lg-4">
                <h3><?php echo $tourist_attractions['att_name'] ?></h3>
                <hr class="line-heading">
                 <p><?php echo $tourist_attractions['att_description'] ?></p>
               <li class="media">
                                    <i class="fas fa-square"></i>
                                    <div class="media-body">OPENS AT: <?php echo $tourist_attractions['att_budget_opening_hours'] ?></div>
									 <div class="media-body">CLOSES AT: <?php echo $tourist_attractions['att_budget_closing_hours'] ?></div>
                                </li>
								
                <div class="testimonial-container">
                     <p class="testimonial-author">BEST ENJOYED WITH: <?php echo $tourist_attractions['att_capacity'] ?> people </p>
                </div>
                <a class="btn-solid-reg">BUDGET: <span><?php echo $tourist_attractions['att_budget'] ?></a> <a class="btn-outline-reg mfp-close as-button" href="#projects">BACK</a> 
				<?php $x = $x +1  ?>
            </div> <!-- end of col -->
        </div> <!-- end of row -->
    </div> <!-- end of lightbox-basic -->
    <!-- end of lightbox -->
					<?php } else if($tourist_attractions['attraction_type_id'] == '4') { ?>
						 <div class="element-item out">
                            <a class="popup-with-move-anim" href="#<?php echo $x ?>"><div class="element-item-overlay"><span><?php echo $tourist_attractions['att_name']?></span></div><img src="<?php echo $tourist_attractions['url']?>" alt="alternative"></a>
                        </div>
						
						
						<!-- HON BALASH -->
						  <div id="<?php echo $x ?>" class="lightbox-basic zoom-anim-dialog mfp-hide">
        <div class="row">
            <button title="Close (Esc)" type="button" class="mfp-close x-button">×</button>
            <div class="col-lg-8">
                <img class="img-fluid" src="<?php echo $tourist_attractions['url'] ?>" alt="alternative">
            </div> <!-- end of col -->
            <div class="col-lg-4">
                <h3><?php echo $tourist_attractions['att_name'] ?></h3>
                <hr class="line-heading">
                 <p><?php echo $tourist_attractions['att_description'] ?></p>
               <li class="media">
                                    <i class="fas fa-square"></i>
                                    <div class="media-body">OPENS AT: <?php echo $tourist_attractions['att_budget_opening_hours'] ?></div>
									 <div class="media-body">CLOSES AT: <?php echo $tourist_attractions['att_budget_closing_hours'] ?></div>
                                </li>
								
                <div class="testimonial-container">
                     <p class="testimonial-author">BEST ENJOYED WITH: <?php echo $tourist_attractions['att_capacity'] ?> people </p>
                </div>
                <a class="btn-solid-reg">BUDGET: <span><?php echo $tourist_attractions['att_budget'] ?></a> <a class="btn-outline-reg mfp-close as-button" href="#projects">BACK</a> 
				<?php $x = $x +1  ?>
            </div> <!-- end of col -->
        </div> <!-- end of row -->
    </div> <!-- end of lightbox-basic -->
    <!-- end of lightbox -->
						<?php } ?>
	 <!-- HON KHOLES -->
						<?php } ?>
                    </div> <!-- end of grid -->
                    <!-- end of filter -->
                    
                </div> <!-- end of col -->
            </div> <!-- end of row -->
		</div> <!-- end of container -->
    </div> <!-- end of filter -->
    <!-- end of projects -->
	

   



  

    <!-- Copyright -->
    <div class="cards-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p class="section-title">Copyright © 2020 <a href="https://inovatik.com">Template by Inovatik</a></p>
                </div> <!-- end of col -->
            </div> <!-- enf of row -->
        </div> <!-- end of container -->
    </div> <!-- end of copyright --> 
    <!-- end of copyright -->
    
    	
    <!-- Scripts -->
    <script src="js/jquery.min.js"></script> <!-- jQuery for Bootstrap's JavaScript plugins -->
    <script src="js/popper.min.js"></script> <!-- Popper tooltip library for Bootstrap -->
    <script src="js/bootstrap.min.js"></script> <!-- Bootstrap framework -->
    <script src="js/jquery.easing.min.js"></script> <!-- jQuery Easing for smooth scrolling between anchors -->
    <script src="js/swiper.min.js"></script> <!-- Swiper for image and text sliders -->
    <script src="js/jquery.magnific-popup.js"></script> <!-- Magnific Popup for lightboxes -->
    <script src="js/morphext.min.js"></script> <!-- Morphtext rotating text in the header -->
    <script src="js/isotope.pkgd.min.js"></script> <!-- Isotope for filter -->
    <script src="js/validator.min.js"></script> <!-- Validator.js - Bootstrap plugin that validates forms -->
    <script src="js/scripts.js"></script> <!-- Custom scripts -->
</body>
</html>