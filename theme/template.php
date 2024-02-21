<?php
$user = new User();
$res = $user->admin_details();
?>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title><?php echo $_SESSION['ADMIN_TITLE']; ?></title>

    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">

    <link rel="stylesheet" href="<?php echo WEB_ROOT; ?>css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo WEB_ROOT; ?>css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="<?php echo WEB_ROOT; ?>css/fontAwesome.css">
    <link rel="stylesheet" href="<?php echo WEB_ROOT; ?>css/hero-slider.css">
    <link rel="stylesheet" href="<?php echo WEB_ROOT; ?>css/owl-carousel.css">
    <link rel="stylesheet" href="<?php echo WEB_ROOT; ?>css/datepicker.css">
    <link rel="stylesheet" href="<?php echo WEB_ROOT; ?>css/tooplate-style.css">
    <link rel="stylesheet" href="<?php echo WEB_ROOT; ?>css/nav-top-menu.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">

    <script src="<?php echo WEB_ROOT; ?>js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    <link rel="stylesheet" href="<?php echo WEB_ROOT; ?>css/directchat.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

</head>
<style type="text/css">
    #menuSm {
    
    }

    #menuSm li:hover {
        background-color: #DFD7C4;
    }

    @media only screen and (max-width: 768px) {
        #menuSm {
            width: 100%;
            height: auto;
            margin: 0px;
        }
    }
</style>

<body style="background-color:#F0F3F3">

    <?php
    if (!empty($_SESSION['m_cart'])) {
        if (count($_SESSION['m_cart']) > 0) {
            $cart =  count($_SESSION['m_cart']);
        }
    }
    unset($_SESSION['msg_cart']);
    ?>
    <style type="text/css">

        @media all and (min-width: 992px) {
            .dropdown-menu {
                padding: 0;
            }

            .dropdown-menu li {
                position: relative;
                margin: 0;
                height: 40px;
            }

            .dropdown-item {
                height: 40px;
            }

            .dropdown-menu .submenu {
                display: none;
                position: absolute;
                left: 100%;
                top: -6px;
            }

            .dropdown-menu .submenu-left {
                right: 100%;
                left: auto;
            }

            .dropdown-menu>li:hover {
                background-color: #f1f1f1;
            }

            .dropdown-menu>li:hover>.submenu {
                display: block;
            }
        }


        @media (max-width: 991px) {

            .dropdown-menu .dropdown-menu {
                margin-left: 0.7rem;
                margin-right: 0.7rem;
                margin-bottom: .5rem;
            }

        }


    </style>


    <script type="text/javascript">
     


        document.addEventListener("DOMContentLoaded", function() {



            document.querySelectorAll('.dropdown-menu').forEach(function(element) {
                element.addEventListener('click', function(e) {
                    e.stopPropagation();
                });
            })




            if (window.innerWidth < 992) {


                document.querySelectorAll('.navbar .dropdown').forEach(function(everydropdown) {
                    everydropdown.addEventListener('hidden.bs.dropdown', function() {

                        this.querySelectorAll('.submenu').forEach(function(everysubmenu) {
  
                            everysubmenu.style.display = 'none';
                        });
                    })
                });

                document.querySelectorAll('.dropdown-menu a').forEach(function(element) {
                    element.addEventListener('click', function(e) {

                        let nextEl = this.nextElementSibling;
                        if (nextEl && nextEl.classList.contains('submenu')) {

                            e.preventDefault();
                            console.log(nextEl);
                            if (nextEl.style.display == 'block') {
                                nextEl.style.display = 'none';
                            } else {
                                nextEl.style.display = 'block';
                            }

                        }
                    });
                })
            }


        });

    </script>


    </nav>
    <nav id="menuSm" class="navbar  navbar-fixed-top    navbar-custom ">
        <div class="container ">
            <div class="navbar-header">

                <div style="font-size:15px;color:#fff;padding:10px;font-weight:bold;margin-right:9px;margin-top:4px"><?php echo $_SESSION['ADMIN_TITLE']; ?></div>
                <button type="button" class="navbar-toggle btn-xs p" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse ">

                <div class="sm-ul navbar-custom-menu  ">
                    <ul class="nav navbar-nav  tooltip-demo">
                        <li class="<?php echo ($view == '' || $view == 'availability') ? 'active' : '' ?>">
                            <a data-toggle="tooltip" data-placement="bottom" href="<?php echo WEB_ROOT;  ?>">
                                <i class="fa fa-home fa-fw "> </i> Resort to Stay
                            </a>
                        </li>

                        <li class="<?php echo ($view == 'about') ? 'active' : '' ?>">
                            <a data-toggle="tooltip" data-placement="bottom" href="<?php echo WEB_ROOT . 'index.php?p=about';  ?>">
                                <i class="fa  fa-info-circle fa-fw "></i> About Us
                            </a>
                        </li>
                        <li class="<?php echo ($view == 'contact') ? 'active' : '' ?>">
                            <a data-toggle="tooltip" data-placement="bottom" title="Contact Us" href="<?php echo WEB_ROOT . 'index.php?p=contact';  ?>">
                                <i class="fa fa-phone fa-fw "></i> Contact Us
                            </a>
                        </li>
                        <li class="<?php echo ($view == 'faq') ? 'active' : '' ?>">
                            <a data-toggle="tooltip" data-placement="bottom" href="<?php echo WEB_ROOT . 'index.php?p=faq';  ?>">
                                <i class="fa  fa-question-circle fa-fw "></i> FAQ
                            </a>
                        </li>



                        <?php if (isset($_SESSION['GUESTID'])) {

                            $sql = "SELECT count(*) as MSG FROM `tblpayment` WHERE STATUS<>'Pending'  AND  `MSGVIEW`=0 AND `GUESTID`=" . $_SESSION['GUESTID'];
                            $mydb->setQuery($sql);
                            $msgCnt = $mydb->loadSingleResult();
                        ?>
                            <li class="dropdown messages-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-bell-o"></i>
                                    <span class="label label-success"><?php echo $msgCnt->MSG; ?></span>
                                    <i class="fa fa-caret-down fa-fw"></i>
                                </a>
                                <ul class="dropdown-menu" style="padding: 5px;">
                                    <?php
                                    $sql = "SELECT  *  FROM `tblpayment` WHERE STATUS<>'Pending'  AND `GUESTID`=" . $_SESSION['GUESTID'];
                                    $mydb->setQuery($sql);
                                    $msg = $mydb->loadResultList();
                                    foreach ($msg as $mess) {
                                    ?>
                                        <li>
                                            
                                            <ul class="menu">
                                                <li>
                                                    <a class="read" href="<?php echo WEB_ROOT;  ?>guest/index.php?p=message&code=<?php echo  $mess->CONFIRMATIONCODE; ?>">
                                                        Reservation is already <?php echo   $mess->STATUS; ?>..
                                                        
                                                    </a>
                                                </li>


                                            </ul>
                                        </li>
                                        
                                    <?php }  ?>
                                </ul>
                            </li>

                            <?php
                            $g = new Guest();
                            $result = $g->single_guest($_SESSION['GUESTID']);
                            ?>
                           

                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                                  
                                    <i class="fa fa-user fa-fw"></i><?php echo $result->G_FNAME . ' ' . $result->G_LNAME; ?> <i class="fa fa-caret-down fa-fw"></i>

                                </a>
                                <ul class="dropdown-menu nav nav-stacked">

                                    <li><a style="color:#000;text-align:left;border-bottom:1px solid #fff;" href="<?php echo WEB_ROOT;  ?>guest/" data-toggle="lightbox" data-width="800">Account<!--  <span class="pull-right badge bg-blue">31</span> --></a></li>
                                    <li><a style="color:#000;text-align:left;border-bottom:1px solid #fff;" href="<?php echo WEB_ROOT;  ?>guest/index.php?p=bookings" data-toggle="lightbox" data-width="800">Bookings <!-- <span class="pull-right badge bg-green">12</span> --></a></li>
                                    <li><a style="color:#000;text-align:left;border-bottom:1px solid #fff;" href="<?php echo WEB_ROOT . 'logout.php';  ?>">Logout </a></li>

                                    
                                </ul>

                            </li>
                        <?php } else { ?>

                            <li class="nav-item dropdown" id="myDropdown">
                                <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"> Register Now<i class="fa fa-caret-down fa-fw"></i> </a>
                                <ul class="dropdown-menu">
                                    <li> <a class="dropdown-item" href="<?php echo WEB_ROOT . 'index.php?p=resort';  ?>"><i class="fa fa-home "></i> Register Resort </a></li>
                                    <li> <a class="dropdown-item" href="<?php echo WEB_ROOT . 'index.php?p=guest';  ?>"><i class="fa fa-users "></i> Register Guest</a></li>
                                </ul>
                            </li>
                            <li class="<?php echo ($view == 'login') ? 'active' : '' ?>"><a href="<?php echo WEB_ROOT . 'index.php?p=login&q=guest';  ?>"><i class="fa fa-sign-in fa-fw "></i> Login </a></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <?php

    if (publicpage() == 'booking') {
      

    } elseif (publicpage() == 'guest') {
    } else {

        if ($view == "") {
        
            include("banner-page.php");
        } elseif ($view == "resorts") {
        } elseif ($view == "amen") {
        } else {
            include("banner-page.php");
        }
    }

    require_once $content;


    ?>
    <style type="text/css">
        .float {
            position: fixed;
            width: 60px;
            height: 60px;
            bottom: 40px;
            right: 40px;
            background-color: #FCDE64;
            color: #000;
            border-radius: 50px;
            text-align: center;
            box-shadow: 2px 2px 3px #FCDE64;

        }

        .float:hover {

            text-decoration: none;
        }

        .my-float {
            margin-top: 22px;
        }
    </style>
    <?php
    $maxcart = isset($cart) ? $cart : 0;
    if ($maxcart > 0) {
    ?>
        <a href="<?php echo WEB_ROOT . 'booking/index.php?p=resorts'; ?>" title="Cart" class="float">
            <i class="fa fa-shopping-cart my-float"></i>
            <span class="label label-danger"><?php echo  isset($cart) ? $cart : 0; ?> </span>
        </a>
    <?php
    }
   
    $setting = new Setting();
    $fb = $setting->find_all_setting('Facebook');
    $setting = new Setting();
    $int = $setting->find_all_setting('Instagram');
    ?>

    <footer style="padding: 30px 0px;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="primary-button">
                        <a href="#" class="scroll-top">Back To Top</a>
                    </div>
                </div>
                <div class="col-md-12">
                    <ul class="social-icons">
                        <li><a target="_blank" href="<?php echo $fb->DESCRIPTION; ?>" style="display:flex; flex-direction: row; justify-content: center; align-items: center"><i class="fa fa-facebook"></i></a></li>
                        <li><a target="_blank" href="<?php echo $int->DESCRIPTION; ?>" style="display:flex; flex-direction: row; justify-content: center; align-items: center"><i class="fa fa-instagram"></i></a></li>
                    </ul>
                </div>
                <div class="col-md-12">
                    <p>Copyright &copy;2023 and modified by Emata & Andan.
                </div>
            </div>
        </div>
    </footer>



 

    <div class="modal" style=" top: 0;z-index: 9999;" id="reservation" tabindex="-1">

        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post" action="addtocart.php">
                    <div class="modal-header">
                        Addons
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="roomID" id="roomID">
                        <div id="showAddons"></div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn-default" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i> Close</button>
                        <button type="submit" name="saveAddons" class="btn-info"><i class="icon-off"></i> Add</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
   



    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>
        window.jQuery || document.write('<script src="<?php echo WEB_ROOT; ?>js/vendor/jquery-1.11.2.min.js"><\/script>')
    </script>

    <script src="<?php echo WEB_ROOT; ?>js/vendor/bootstrap.min.js"></script>

    <script src="<?php echo WEB_ROOT; ?>js/datepicker.js"></script>
    <script src="<?php echo WEB_ROOT; ?>js/plugins.js"></script>
    <script src="<?php echo WEB_ROOT; ?>js/main.js"></script>
    <script src="<?php echo WEB_ROOT; ?>js/timepicker-bs4.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
    <link href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" rel="stylesheet" />
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script type="text/javascript">
        function isNumber(evt) {
            evt = (evt) ? evt : window.event;
            var charCode = (evt.which) ? evt.which : evt.keyCode;
            if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                return false;
            }
            return true;
        }

        $(document).ready(function() {
            $('.toggle-modal-reserve').click(function() {
                var roomID = $(this).data('id');
                $('#reservation').modal('toggle');
                $('.modal-body #roomID').val(roomID);
                $.ajax({ 
                    type: "POST",
                    url: "loadaddons.php",
                    dataType: "text",  
                    data: {
                        ROOMID: roomID
                    },
                    success: function(data) {
                        $("#showAddons").html(data);
                    }

                });
            });
        });

        
        $(".modalclose").on("click", function() {
            $('#myModal').removeClass('show').addClass('fade');
        });

        $('#reply_msg').bind('keypress', function(e) {
            if (e.keyCode == 13) {
              
                var msg = $(this).val();

                $.ajax({ 
                    type: "POST",
                    url: "loadchatboot.php",
                    dataType: "text",  
                    data: {
                        msg: msg
                    },
                    success: function(data) {
                       

                        $("#show_reply").html(data);
                    }
                });

                $(this).val("");
                $(this).focus();

            }
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {


            $('#form-submit .dbirth').datepicker({
                changeYear: true,
                maxDate: subtractYears(18, new Date()),
                minDate: subtractYears(60, new Date())
            });


            $('#start_time').timepicker({
                interval: 60,
                minTime: '9:00 am',
                maxTime: '10:00 pm',
                startTime: '9:00 am',
                timeFormat: 'h:mm p',
                dynamic: false,
                dropdown: true,
                show24Hours: false
            });
            $('#end_time').timepicker({
                interval: 60,
                minTime: '9:00 am',
                maxTime: '10:00 pm',
                startTime: '9:00 am',
                timeFormat: 'h:mm p',
                dynamic: false,
                dropdown: true,
                show24Hours: false
            });

            $("#arrival").datepicker({
                defaultDate: new Date(),
                minDate: new Date(),
                onSelect: function(dateStr) {
                    $("#departure").datepicker("option", {
                        minDate: new Date(dateStr)
                    })
                }
            });

            $('#departure').datepicker({
                defaultDate: new Date(),
                minDate: new Date(),
                onSelect: function(dateStr) {

                    var startDate = $('#arrival').val();
                    var time = $('#start_time').val();
                    var endDate = dateStr;
                    var end_date_time = endDate + " " + time;

                    var endTime = new Date(end_date_time)
                    var resultHRS = endTime.getHours();
                    var hr = parseInt(resultHRS) + 1;

                    if (dateStr == startDate) {

                        $('#end_time').timepicker({
                            interval: 60,
                            minTime: new Date(0, 0, 0, hr, 0, 0),
                            maxTime: new Date(0, 0, 0, 23, 50, 0),
                            startTime: new Date(0, 0, 0, hr, 0, 0),
                            timeFormat: 'h:mm p',
                            dynamic: false,
                            dropdown: true,
                            show24Hours: false
                        });
                    } else {


                        $('#end_time').timepicker({
                            interval: 60,
                            minTime: '8:00 am',
                            maxTime: '11:30 pm',
                            startTime: '8:00 am',
                            timeFormat: 'h:mm p',
                            dynamic: false,
                            dropdown: true,
                            show24Hours: false
                        });
                    }




                }
            });


        });


        $(document).ready(function() {



           
            $('.scroll-link').on('click', function(event) {
                event.preventDefault();
                var sectionID = $(this).attr("data-id");
                scrollToID('#' + sectionID, 750);
            });
           
            $('.scroll-top').on('click', function(event) {
                event.preventDefault();
                $('html, body').animate({
                    scrollTop: 0
                }, 'slow');
            });
         
            $('#nav-toggle').on('click', function(event) {
                event.preventDefault();
                $('#main-nav').toggleClass("open");
            });
        });
        
        function scrollToID(id, speed) {
            var offSet = 0;
            var targetOffset = $(id).offset().top - offSet;
            var mainNav = $('#main-nav');
            $('html,body').animate({
                scrollTop: targetOffset
            }, speed);
            if (mainNav.hasClass("open")) {
                mainNav.css("height", "1px").removeClass("in").addClass("collapse");
                mainNav.removeClass("open");
            }
        }
        if (typeof console === "undefined") {
            console = {
                log: function() {}
            };
        }


        function allLetter(inputtxt) {
            var letters = /^[A-Za-z]+$/;
            if (inputtxt.value.match(letters)) {
                return true;
            } else {
                return false;
            }
        }
    </script>
    <script language="javascript" type="text/javascript">
        function OpenPopupCenter(pageURL, title, w, h) {
            var left = (screen.width - w) / 2;
            var top = (screen.height - h) / 4; 
            var targetWin = window.open(pageURL, title, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=' + w + ', height=' + h + ', top=' + top + ', left=' + left);
        }

        function validate_all() {
            validatePassword();
        }

        function validatePassword() {
            var pass = document.getElementById('password');
            var errors = [];
            var p = pass.value;

            if (p.length < 8) {
                errors.push("Your password must be at least 8 characters");
            }
            if (p.search(/[a-z]/i) < 0) {
                errors.push("Your password must contain at least one letter.");
            }
            if (p.search(/[0-9]/) < 0) {
                errors.push("Your password must contain at least one digit.");
            }
            if (errors.length > 0) {
                pass.setCustomValidity(errors.join("\n"));
                
                return false;
            }
            pass.setCustomValidity("");
            return true;
        }

        $(document).ready(function() {
            $("#username").focusout(function() {
                var user = document.getElementById('username');
                var error = [];
                var result = [];
                var user_name = user.value;

                


                $.ajax({ 
                    type: "POST",
                    url: "validateusername.php",
                    dataType: "html", 
                    data: {
                        username: user_name
                    },
                    success: function(r) {
                        
                        result.push(r);
                    }
                });

                console.log(result.join("\n"));
                if (result[0] > 1) {
                    error.push("Your username is already in used");
                }

                if (error.length > 0) {
                    user.setCustomValidity(error.join("\n"));
                    return false;
                }
                user.setCustomValidity("");
                return true;

            });



        });
        $(document).scroll(function() {
            var y = $(document).scrollTop(), 
                header = $("#availsetup"); 
            if (y >= 400) {
                header.css({
                    position: "fixed",
                    "top": "0",
                    "left": "0"
                });
            } else {
                header.css("position", "static");
            }
        });



        $(document).ready(function() {
            $("input[name$='cars']").click(function() {
                var test = $(this).val();

                $("div.desc").hide();
                $("#Cars" + test).show();
            });
        });

        function switchStyle() {
            if (document.getElementById('styleSwitch').checked) {
                document.getElementById('gallery').classList.add("custom");
                document.getElementById('exampleModal').classList.add("custom");
            } else {
                document.getElementById('gallery').classList.remove("custom");
                document.getElementById('exampleModal').classList.remove("custom");
            }
        }
    </script>

</body>

</html>