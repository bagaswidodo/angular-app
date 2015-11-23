<!DOCTYPE html>
<html lang="en" ng-app="wisataApp">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Wisata SPA</title>

        <!-- Bootstrap Core CSS -->
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <!-- <link href="css/grayscale.css" rel="stylesheet"> -->

        <!-- Custom Fonts -->
        <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<!--         <link href="http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css">
        <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
 -->
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <script src="vendor/jquery/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

        <!-- Plugin JavaScript -->
        <script src="js/jquery.easing.min.js"></script>

        <!-- Custom Theme JavaScript 
        <script src="js/grayscale.js"></script>
        -->

        <!-- Angular JavaScript -->
        <script src="vendor/angular/1.3.15/angular.min.js"></script>       
        <script src="vendor/angular/1.3.15/angular-resource.min.js"></script> 
        <script src="vendor/angular/1.3.15/angular-cookies.min.js"></script> 

        <!-- Custom Angular JavaScript -->
         <script src="js/wisata/app.js"></script>         
        <script src="js/wisata/controllers.js"></script> 
         <script src="js/wisata/services.js"></script> 
    </head>
    <body id="page-top" data-spy="scroll" 
    data-target=".navbar-fixed-top" ng-controller="AppCtrl">
       <!-- Navigation -->
        <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                        <i class="fa fa-bars"></i>
                    </button>
                    <a class="navbar-brand page-scroll" href="#page-top">
                        <i class="fa fa-play-circle"></i>  Home
                    </a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
                    <ul class="nav navbar-nav">
                        <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                        <li class="hidden">
                            <a href="#page-top"></a>
                        </li>
                        <li>
                            <a class="page-scroll" href="#dreams">Dreams</a>
                        </li>
                        <li ng-show="isLogged">
                            <a class="page-scroll" href="#auth">Add a dream</a>
                        </li>                        
                        <li ng-hide="isLogged">
                            <a class="page-scroll" href="#auth">Login</a>
                        </li>                        
                        <li ng-show="isLogged">
                            <a ng-click="logout()" href>Logout</a>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container -->
        </nav>

<!-- Dreams Section -->
        <section id="dreams" class="container content-section text-center">
            <div class="row">
                <div class="col-lg-10 col-lg-offset-1">
                    <nav>
                        <ul class="pager">
                            <li ng-show="previous" class="previous "><a ng-click="paginate('previous')" class="page-scroll" href="#dreams"><< Previous</a></li>
                            <li ng-show="next" class="next"><a ng-click="paginate('next')" class="page-scroll" href="#dreams">Next >></a></li>
                        </ul>
                    </nav>
                    <div ng-repeat="wisata in data" class="cadre">
                        <h2>
                            {{wisata.name}}
                        </h2>
                        <p>{{wisata.alamat}} ({{wisata.lat}} , {{wisata.lng}})</p> 
                                             
                        <h2>
                            <div ng-if="wisata.is_owner">
                                <a ng-click="edit(wisata.id, $index)" href>
                                    <span class="fa fa-fw fa-pencil"></span>Edit
                                </a>
                                <a ng-click="destroy(wisata.id)" href="#dreams">
                                    <span class="fa fa-fw fa-trash"></span>Delete
                                </a>
                            </div>
                        </h2>
                    </div>
                    <nav>
                        <ul class="pager">
                            <li ng-show="previous" class="previous"><a ng-click="paginate('previous')" class="page-scroll" href="#dreams"><< Previous</a></li>
                            <li ng-show="next" class="next"><a ng-click="paginate('next')" class="page-scroll" href="#dreams">Next >></a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </section>



        <!-- Auth Section -->
        <section id="auth" class="content-section">
            <div class="download-section">
                <div class="container">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div ng-hide="isLogged" >
                            <h2 class="text-center">Login</h2>
                            <form ng-controller="LoginCtrl" ng-submit="submit()" accept-charset="UTF-8" role="form">
                                <div ng-show="isAlert" class="alert alert-danger" role="alert">
                                    These credentials do not match our records.
                                </div>                              
                                <div class="row">

                                    <div class="form-group col-lg-6" ng-class="{'has-error': errorEmail}">
                                        <input ng-model="formData.email" class="form-control" placeholder="email" name="email" type="email" id="email" required>
                                        <small class="help-block">{{ errorEmail}}</small>
                                    </div>

                                    <div class="form-group col-lg-6" ng-class="{'has-error': errorPassword}">
                                        <input ng-model="formData.password" class="form-control" placeholder="password" name="password" type="password" value="" id="password" required>
                                        <small class="help-block">{{ errorPassword}}</small>
                                    </div>

                                    <div class="checkbox col-lg-12">
                                        <label>
                                            <input ng-model="formData.memory" name="memory" type="checkbox" value="1">Remember me
                                        </label>
                                    </div>

                                    <div class="form-group col-lg-12 text-center">
                                        <input class="btn btn-default" type="submit" value="Send">
                                    </div>    

                                    <div class="col-lg-12 text-center">                 
                                        <a href="password/email">I have forgoten my password !</a>
                                    </div>
                                </div>
                            </form>                        
                            <div class="text-center">
                                <br>
                                <a href="auth/register" class="btn btn-default">I want to suscribe !</a>
                            </div>
                        </div>


                         <div ng-show="isLogged" >
                            <h2 class="text-center">Add a dream</h2>
                            <form ng-controller="WisataCtrl" ng-submit="submitCreate()" accept-charset="UTF-8" role="form">
                                <div class="row">

                                    <div class="form-group col-lg-12" ng-class="{'has-error': errorCreateContent}">
                                        <textarea rows="8" ng-model="formData.name" class="form-control" 
                                        placeholder="Your dream just there..." name="name" id="name" required></textarea>
                                        <small class="help-block">{{ errorCreateContent }}</small>
                                    </div>

                                    <div class="form-group col-lg-12 text-center">
                                        <input class="btn btn-default" type="submit" value="Send">
                                    </div>    

                                </div>
                            </form>  
                        </div> 
                    </div>                   
                </div>
            </div>
        </section>

    </body>
</html>