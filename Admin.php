

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title> Discover Lebanon Your Way! </title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
	
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-light fixed-top" id="mainNav">
            <div class="container">
			 <a class="navbar-brand" href="#page-top"><img src="assets/img/flag.jpg" width = '100' height = '100' alt="..." /></a>
                <a class="navbar-light" href="#page-top"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars ms-1"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                        <li class="navbar navbar-dark bg-success"><a class="nav-link" href="#services">Add A Place</a></li>
						<div class="btn-group">
  <button type="button" class="btn btn-success dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    EDIT PLACE
  </button>
  <div class="dropdown-menu">
    <a class="dropdown-item" href="#editName">EDIT NAME</a>
    <a class="dropdown-item" href="#editCap">EDIT CAPACITY</a>
    <a class="dropdown-item" href="#editBud">EDIT BUDGET</a>
	 <a class="dropdown-item" href="#editTime">EDIT HOURS</a>
	  <a class="dropdown-item" href="#editDesc">EDIT DESCRIPTION</a>
	   <a class="dropdown-item" href="#editCity">EDIT CITY</a>
	    <a class="dropdown-item" href="#editType">EDIT TYPE</a>
    <div class="dropdown-divider"></div>
   
  </div>
</div>
                        <li class="navbar navbar-dark bg-success"><a class="nav-link" href="#team">Delete Place</a></li>
						 <li class="navbar navbar-dark bg-success"><a class="nav-link" href="#linkHobby">Link a hobby</a></li>
                        <li class="navbar navbar-dark bg-success"><a class="nav-link" href="#contact">Log out </a></li>
			
                    </ul>
				
                </div>
            </div>
        </nav>
		<?php session_start() ?> 
        <!-- Masthead-->
        <header class="masthead">
            <div class="container">
                <div class="masthead-subheading"><h1> WELCOME ADMIN, </h1> <?php echo $_SESSION['name'] ?></div>
                <a class="btn btn-danger btn-xl text-uppercase" href="#services">ADD MY BUSINESS</a>
            </div>
        </header>
		

        <!-- Services-->
        <section class="page-section" id="services">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Let's  Add Your Business !</h2>
                </div>
                <!-- * * * * * * * * * * * * * * *-->
                <!-- * * SB Forms Contact Form * *-->
                <!-- * * * * * * * * * * * * * * *-->
                <!-- This form is pre-integrated with SB Forms.-->
                <!-- To make this form functional, sign up at-->
                <!-- https://startbootstrap.com/solution/contact-forms-->
                <!-- to get an API token!-->
                <form id="contactForm" data-sb-form-api-token="API_TOKEN" action="addPlace.php">
		
                    <div class="row align-items-stretch mb-5">
	
                        <div class="col-md-6">
                            <div class="form-group">
                                <!-- Attraction Name input-->
                                <input class="form-control" id="att_name" name = "att_name" type="text" placeholder="Attraction Name *" data-sb-validations="required"/>
                                <div class="invalid-feedback" data-sb-feedback="att_name:required">A name is required.</div>
                            </div>
							  <div class="form-group mb-md-0">
                                <!-- Capacity of place input-->
                                <input class="form-control" id="att_capacity" name="att_capacity" type="number" placeholder="Place enjoyable with how many people *" data-sb-validations="required" />
                                <div class="invalid-feedback" data-sb-feedback="att_capacity:required">Field is required.</div>
                            </div>
							<div class="form-group mb-md-0">
                                <!-- Budget input-->
                                <input class="form-control" id="att_budget" name="att_budget" type="number" placeholder="Budget for 1 person *" data-sb-validations="required" />
                                <div class="invalid-feedback" data-sb-feedback="att_budget:required">Budget is required.</div>
                            </div>
						
                            <div class="form-group">
                                <!-- Opening hours input-->
                               <input class="form-control" id="att_budget_opening_hours" name = "att_budget_opening_hours" type="text" placeholder="Attraction opening hour *" data-sb-validations="required"/>
                                <div class="invalid-feedback" data-sb-feedback="att_budget_opening_hours:required">A time is required.</div>
                            </div>
							
						
                            <div class="form-group mb-md-0">
                                <!-- Closing hours input-->
                             <input class="form-control" id="att_budget_closing_hours" name = "att_budget_closing_hours" type="text" placeholder="Attraction closing hour *" data-sb-validations="required"/>
                                <div class="invalid-feedback" data-sb-feedback="att_budget_closing_hours:required">A time is required.</div>
                            </div>
							   <div class="form-group mb-md-0">
                                <!-- image url input-->
                             <input class="form-control" id="url" name = "url" type="text" placeholder="Picture url *" />
                               
                            </div>
							
							<div 
							<!-- attraction type input-->
							 <label class="form-group mb-md-0"> Select Attraction Type: </label>
                                <label for="Restaurant" class="radio-inline"><input type="radio" name="attraction_type" value= "Restaurant" id="Restaurant">Restaurant</label>
								 <label for="Night Life" class="radio-inline"><input type="radio" name="attraction_type" value="Night Life" id="Night Life">Night Life</label>
                           <label for="Outdoor Entertainment" class="radio-inline"><input type="radio" name="attraction_type" value= "Outdoor Entertainment" id="Outdoor Entertainment">Outdoor Entertainment</label>
								 <label for="Indoor Entertainment" class="radio-inline"><input type="radio" name="attraction_type" value="Indoor Entertainment" id="Indoor Entertainement">Indoor Entertainment</label>
                        </div>
						</div>
                        <div class="col-md-6">
                            <div class="form-group form-group-textarea mb-md-0">
		
                                <!-- Description input-->
                                <textarea class="form-control" id="att_description" name="att_description" placeholder="Enter Description*" data-sb-validations="required"></textarea>
                                <div class="invalid-feedback" data-sb-feedback="att_description:required">Please enter description for a better user experience.</div>
                            </div>
							<div class="form-group form-group-textarea mb-md-0">
		
                                <!-- City input-->
                                <textarea class="form-control" id="att_loc_id" name="att_loc_id" placeholder="Specify city *" data-sb-validations="required"></textarea>
                                <div class="invalid-feedback" data-sb-feedback="att_loc_id:required">Please enter city for a customized experience.</div>
                            </div>
                        </div>
				
<div class="col-md-6">
					
                     </div>
					
                    <!-- Submit success message-->
                    <!---->
                    <!-- This is what your users will see when the form-->
                    <!-- has successfully submitted-->
                   <!-- <div class="d-none" id="submitSuccessMessage">
                        <div class="text-center text-white mb-3">
                            <div class="fw-bolder">Form submission successful!</div>
                            To activate this form, sign up at
                            <br />
                            <a href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
                        </div>
                    </div> -->
                    <!-- Submit error message-->
                    <!---->
                    <!-- This is what your users will see when there is-->
                    <!-- an error submitting the form-->
                    <div class="d-none" id="submitErrorMessage"><div class="text-center text-danger mb-3">Error sending message!</div></div>
                    <!-- Submit Button-->
                    <div class="text-center"><button class="btn btn-danger btn-xl text-uppercase enabled" id="submitButton" name="submit" value="submit" type="submit">ADD PLACE</button></div>
                </form>
            </div>
        </section>
     
        <!-- About-->
        <section class="page-section" id="editName">
            <section class="page-section" id="editname">
            <div class="container">
			
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">EDIT NAME OF BUSINESS HERE</h2>
                </div>
                <form id="contactForm" data-sb-form-api-token="API_TOKEN" action="editName.php">
	
	 <div class="form-group">
                                <!-- Name input-->
								<input class="form-control" id="old_att_name" name = "old_att_name" type="text" placeholder="Enter old name *" data-sb-validations="required"/>
                                <input class="form-control" id="att_name" name = "att_name" type="text" placeholder="Enter new name *" data-sb-validations="required"/>
                                <div class="invalid-feedback" data-sb-feedback="att_name:required">A name is required.</div>
                            </div>
                    <!-- Submit Button-->
                    <div class="text-center"><button class="btn btn-danger btn-xl text-uppercase enabled" id="submitButton" name="submit" value="submit" type="submit">UPDATE</button></div>
                </form>
            </div>
        </section>
        </section>
 
   
            <section class="page-section" id="editCap">
            <div class="container">
			
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">EDIT CAPACITY OF BUSINESS HERE</h2>
                </div>
                <form id="contactForm" data-sb-form-api-token="API_TOKEN" action="editCap.php">
	
	 <div class="form-group">
                                <!-- Name input-->
								<input class="form-control" id="att_name" name = "att_name" type="text" placeholder="Enter name of business you wish to update *" data-sb-validations="required"/>
                                <input class="form-control" id="att_capacity" name="att_capacity" type="number" placeholder="Enter new capacity *" data-sb-validations="required" />
                                <div class="invalid-feedback" data-sb-feedback="att_capacity:required">Field is required.</div>
                            </div>
                    <!-- Submit Button-->
                    <div class="text-center"><button class="btn btn-danger btn-xl text-uppercase enabled" id="submitButton" name="submit" value="submit" type="submit">UPDATE</button></div>
                </form>
            </div>
        </section>

 <section class="page-section" id="editBud">
            <div class="container">
			
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">EDIT BUDGET OF BUSINESS HERE</h2>
                </div>
                <form id="contactForm" data-sb-form-api-token="API_TOKEN" action="editBud.php">
	
	 <div class="form-group">
                                <!-- Name input-->
								<input class="form-control" id="att_name" name = "att_name" type="text" placeholder="Enter name of business you wish to update *" data-sb-validations="required"/>
                                <input class="form-control" id="att_budget" name="att_budget" type="number" placeholder="Enter new budget for 1 person *" data-sb-validations="required" />
                                <div class="invalid-feedback" data-sb-feedback="att_budget:required">Budget is required.</div>
                            </div>
                    <!-- Submit Button-->
                    <div class="text-center"><button class="btn btn-danger btn-xl text-uppercase enabled" id="submitButton" name="submit" value="submit" type="submit">UPDATE</button></div>
                </form>
            </div>
        </section>
		
		<section class="page-section" id="editTime">
            <div class="container">
			
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">EDIT CLOSING AND OPENING HOURS OF BUSINESS HERE</h2>
                </div>
                <form id="contactForm" data-sb-form-api-token="API_TOKEN" action="editTime.php">
	
	 <div class="form-group">
                                <!-- Name input-->
								<input class="form-control" id="att_name" name = "att_name" type="text" placeholder="Enter name of business you wish to update *" data-sb-validations="required"/>
								 <input class="form-control" id="att_budget_opening_hours" name="att_budget_opening_hours" type="text" placeholder="Enter new opening hour *" data-sb-validations="required" />
                                <div class="invalid-feedback" data-sb-feedback="att_budget_opening_hours:required">Time is required.</div>
               
                                <!-- Opening input-->
                               <input class="form-control" id="att_budget_closing_hours" name = "att_budget_closing_hours" type="text" placeholder="Enter new closing hour *" data-sb-validations="required"/>
                                <div class="invalid-feedback" data-sb-feedback="att_budget_closing_hours:required">A time is required.</div>
                    
                            </div>
                    <!-- Submit Button-->
                    <div class="text-center"><button class="btn btn-danger btn-xl text-uppercase enabled" id="submitButton" name="submit" value="submit" type="submit">UPDATE</button></div>
                </form>
            </div>
        </section>
		
			<section class="page-section" id="editDesc">
            <div class="container">
			
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">EDIT DESCRIPTION OF BUSINESS HERE</h2>
                </div>
                <form id="contactForm" data-sb-form-api-token="API_TOKEN" action="editDesc.php">
	
	 <div class="form-group">
                                <!-- Name input--><input class="form-control" id="att_name" name = "att_name" type="text" placeholder="Enter name of business you wish to update *" data-sb-validations="required"/>
                                <textarea class="form-control" id="att_description" name="att_description" placeholder="Enter new Description*" data-sb-validations="required"></textarea>
                                <div class="invalid-feedback" data-sb-feedback="att_description:required">Please enter description for a better user experience.</div>
                            </div>
                    <!-- Submit Button-->
                    <div class="text-center"><button class="btn btn-danger btn-xl text-uppercase enabled" id="submitButton" name="submit" value="submit" type="submit">UPDATE</button></div>
                </form>
            </div>
        </section>
		
		<section class="page-section" id="editType">
            <div class="container">
			
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">EDIT TYPE OF BUSINESS HERE</h2>
                </div>
                <form id="contactForm" data-sb-form-api-token="API_TOKEN" action="editType.php">
	
	 <div class="form-group">
                                <!-- Name input-->
								<input class="form-control" id="att_name" name = "att_name" type="text" placeholder="Enter name of business you wish to update *" data-sb-validations="required"/>
                                 <label class="form-group mb-md-0"> Select new Attraction Type: </label>
                                <label for="Restaurant" class="radio-inline"><input type="radio" name="attraction_type_id" value= "Restaurant" id="attraction_type_id">Restaurant</label>
								 <label for="Night Life" class="radio-inline"><input type="radio" name="attraction_type_id" value="Night Life" id="attraction_type_id">Night Life</label>
                           <label for="Outdoor Entertainment" class="radio-inline"><input type="radio" name="attraction_type_id" value= "Outdoor Entertainment" id="attraction_type_id">Outdoor Entertainment</label>
								 <label for="Indoor Entertainment" class="radio-inline"><input type="radio" name="attraction_type_id" value="Indoor Entertainment" id="attraction_type_id">Indoor Entertainment</label>
                            </div>
                    <!-- Submit Button-->
                    <div class="text-center"><button class="btn btn-danger btn-xl text-uppercase enabled" id="submitButton" name="submit" value="submit" type="submit">UPDATE</button></div>
                </form>
            </div>
        </section>
		
		<section class="page-section" id="editCity">
            <div class="container">
			
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">EDIT CITY  OF BUSINESS HERE</h2>
                </div>
                <form id="contactForm" data-sb-form-api-token="API_TOKEN" action="editCity.php">
	
	 <div class="form-group">
                                <!-- Name input-->
								<input class="form-control" id="att_name" name = "att_name" type="text" placeholder="Enter name of business you wish to update *" data-sb-validations="required"/>
                                 <textarea class="form-control" id="att_loc_id" name="att_loc_id" placeholder="Specify new city *" data-sb-validations="required"></textarea>
                                <div class="invalid-feedback" data-sb-feedback="att_loc_id:required">Please enter city for a customized experience.</div>
                            </div>
                    <!-- Submit Button-->
                    <div class="text-center"><button class="btn btn-danger btn-xl text-uppercase enabled" id="submitButton" name="submit" value="submit" type="submit">UPDATE</button></div>
                </form>
            </div>
        </section>
		 <section class="page-section" id="team">
            <div class="container">
			
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">ARE YOU SURE? </h2>
                </div>
                <!-- * * * * * * * * * * * * * * *-->
                <!-- * * SB Forms Contact Form * *-->
                <!-- * * * * * * * * * * * * * * *-->
                <!-- This form is pre-integrated with SB Forms.-->
                <!-- To make this form functional, sign up at-->
                <!-- https://startbootstrap.com/solution/contact-forms-->
                <!-- to get an API token!-->
                <form id="contactForm" data-sb-form-api-token="API_TOKEN" action="delete.php">
	
	 <div class="form-group">
                                <!-- Name input-->
                                <input class="form-control" id="att_name" name = "att_name" type="text" placeholder="Attraction Name *" data-sb-validations="required"/>
                                <div class="invalid-feedback" data-sb-feedback="att_name:required">A name is required.</div>
                            </div>
                    <!-- Submit Button-->
                    <div class="text-center"><button class="btn btn-danger btn-xl text-uppercase enabled" id="submitButton" name="submit" value="submit" type="submit">DELETE MY BUSINESS</button></div>
                </form>
            </div>
        </section>
		
		<section class="page-section" id="linkHobby">
            <div class="container">
			
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Add a hobby so your business finds its customers</h2>
                </div>
                <form id="contactForm" data-sb-form-api-token="API_TOKEN" action="linkHobby.php">
	
	 <div class="form-group">
                                <!-- Name input-->
								<input class="form-control" id="att_name" name = "att_name" type="text" placeholder="Enter name of business you wish to link hobby to *" data-sb-validations="required"/>
                                 <input class="form-control" id="hobby_name" name="hobby_name" placeholder="Specify hobby name *" data-sb-validations="required"></input>
                                <div class="invalid-feedback" data-sb-feedback="att_loc_id:required">Please enter city for a customized experience.</div>
                            </div>
                    <!-- Submit Button-->
                    <div class="text-center"><button class="btn btn-danger btn-xl text-uppercase enabled" id="submitButton" name="submit" value="submit" type="submit">SUBMIT</button></div>
                </form>
            </div>
        </section>
        <!-- Contact-->
        <section class="page-section" id="contact">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">See you soon! </h2>
                </div>
                <!-- * * * * * * * * * * * * * * *-->
                <!-- * * SB Forms Contact Form * *-->
                <!-- * * * * * * * * * * * * * * *-->
                <!-- This form is pre-integrated with SB Forms.-->
                <!-- To make this form functional, sign up at-->
                <!-- https://startbootstrap.com/solution/contact-forms-->
                <!-- to get an API token!-->
                <form id="logInForm" data-sb-form-api-token="API_TOKEN" action="index.php">
                   
                    <!-- Submit Button-->
                    <div class="text-center"><button class="btn btn-danger btn-xl text-uppercase enabled" id="logInButton" value="submit" name="logIn" type="submit" >Sign Out</button></div>
                </form>
            </div>
        </section>
       
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>
