<?php
    require_once "php/functions.php";
    $await_confirm=0;
    $name="";
    if(isset($_COOKIE['convo_mail'])){
        $email=$_COOKIE['convo_mail'];
        if(isset($_COOKIE['convo_token'])){
            $token=$_COOKIE['convo_token'];
            $result=sql("SELECT * FROM `users` WHERE `email`='$email' AND `token`='$token'");
            if($result->num_rows>0){
                $row=$result->fetch_assoc();
                $name=$row['name'];
                if(!isset($_SESSION['on'])){
                    $token=randomString(64);
                    sql("UPDATE `cookie` SET `token`='$token' WHERE `mail`='$email'");
                    $_COOKIE['convo_token']=$token;
                }
            }else{
                $_COOKIE['convo_mail']='';
                $_COOKIE['convo_token']='';
            }
        }else{
            if(isset($_COOKIE['not_confirmed'])&&$_COOKIE['not_confirmed']==='1')
                $await_confirm=1;
            else $_COOKIE['convo_mail']='';
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-COMPATIBLE" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Website for Convolution 2017"/>
    <meta name="keywords"
          content="event, fest, convolution, 2017, jadavpur university, electrical engineering, 17, 2k17"/>
    <meta name="author" content="Subhashis Bhowmik"/>
    <title>Convolution 2017</title>

    <link rel="stylesheet" type="text/css" href="css/loader.css"/>
    <link rel="stylesheet" type="text/css" href="css/reset.css"/>
    <link rel="stylesheet" type="text/css" href="css/main.css"/>
    <link rel="stylesheet" type="text/css" href="css/jquery.mCustomScrollbar.css"/>
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css"/>
</head>
<body>
<noscript>
    Javascript is disabled. Redirecting...
    <meta HTTP-EQUIV="REFRESH" content="0; url=lite/">
</noscript>
<div id="loader">
    <div id="animatedlogo">
        <img src="img/animatedlogo.svg">
    </div>
    <div id="mousescroll">
        <img src="img/scroll.svg">
    </div>
    <div id="keyboard">
        <img src="img/keys.svg">
    </div>
</div>
<div id="holder" tabindex="-1" class="mCustomScrollbar" data-mcs-theme="dark">
    <div id='nav'>
        <ul>
            <li id="tab-home" class='active' data-id="header"><span><b>Home</b></span></li>
            <li id="tab-about" data-id="about"><span><b>About</b></span></li>
            <li id="tab-circuistic" data-id="circuistic"><span><b>Circuistic</b></span></li>
            <li id="tab-algomaniac" data-id="algomaniac"><span><b>Algomaniac</b></span></li>
            <li id="tab-sparkhack" data-id="sparkhack"><span><b>Sparkhack</b></span></li>
            <li id="tab-crossfire" data-id="Crossfire"><span><b>Crossfire</b></span></li>
            <li id="tab-decisia" data-id="decisia"><span><b>Decisia</b></span></li>
            <li id="tab-inquizzitive" data-id="inquizzitive"><span><b>Inquizzitive</b></span></li>
            <li id="tab-workshops" data-id="workshops"><span><b>Presentation</b></span></li>
            <li id="tab-sponsors" data-id="sponsors"><span><b>Sponsors</b></span></li>
            <li id="tab-contact" data-id="contact"><span><b>Contact</b></span></li>
        </ul>
    </div>
</div>
<!--<div id="button_login"></div>-->

<div id="login_signup_div">
    <div id="login_signup_div_content">
        <div id="login_signup_div_close">&#x2715;</div>
        <div id="login_signup_div_content_in">
            <div class="log_sin">
                <form action="php/login.php" method="post" name="login_form">
                    <label>Login</label>
                    <input type="email" id="login_email" name="login_email" placeholder="E-mail ID"/>
                    <input type="password" id="login_pass" name="login_pass" placeholder="Password"/>
                    <button id="login_btn">Login</button>
                </form>
            </div>

            <div class="log_sin">
                <form action="php/signup.php" method="post" name="signup_form">
                    <label>sign up</label>
                    <input type="text" id="signup_name" name="signup_name" placeholder="Name"/>
                    <input type="email" id="signup_email" name="signup_email" placeholder="E-mail ID"/>
                    <input type="password" id="signup_password" name="signup_password"  placeholder="Password"/>
                    <input type="password" id="signup_password_2" name="signup_password_2" placeholder="Confirm Password"/>
                    <input type="text" id="signup_institute" name="signup_institute" placeholder="College or University"/>
                    <input type="text" id="signup_dept" name="signup_dept" placeholder="Department"/>
                    <select id="class" name="class">
                        <optgroup label="class">
                            <option>CLASS</option>
                            <option>UG 1st yr</option>
                            <option>UG 2nd yr</option>
                            <option>UG 3rd yr</option>
                            <option>UG 4th yr</option>
                        </optgroup>
                    </select>
                    <button id="signup_btn" type="submit">Sign up</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div id="detailsDivWrapper">
    <div id="detailsDiv">
        <div id="detailsDivClose">&#x2715;</div>

    </div>
</div>

<div id="right_div" class="home">
    <div class="content" style="display:none">
        <div id="close" style="color:white;cursor:pointer;float:right;">&#x2715;</div>
        <div id="content_inside">

            <div id="login_signup_btn">
                Login / Sign Up
            </div>
        </div>
    </div>
    <div id="arrow">
        <div id="arrow_a" style="color:white;cursor:pointer;">&#x203A;</div>
    </div>
</div>

<div id="bg"></div>
<div id="wrapper">
    <div id="main">
        <div id="convo">
            <div class="bg noSelect"></div>
            <div id="home" class="item noSelect">
                <!--<div class="bg"></div>-->
                <div class="inner">
                    <!--<img id="ju" src="img/ju.png"/>-->
                    <img class="foreground hidden" id="first" src="img/convo_black.svg"/>
                    <div class="line hidden"></div>
                    <img class="foreground hidden" id="second" src="img/TechUrShare.png"/>
                </div>
            </div>
            <div id="about" class="item">
                <!--<div class="bg"></div>-->
                <div class="parallax noSelect">
                    <img src="img/parallax/5.svg" class="inner" id="item5">
                    <img src="img/parallax/4.svg" class="inner" id="item4">
                    <img src="img/parallax/3.svg" class="inner" id="item3">
                    <img src="img/parallax/2.svg" class="inner" id="item2" style="z-index: 2">
                    <!--<img src="img/parallax/1.svg" class="inner" id="item1">-->
                    <div class="inner img" id="item1" style="background-image:url('img/parallax/1wofan.svg');">
                        <img class="rotator" src="img/parallax/1wfan.svg">
                    </div>
                </div>
                <div id="content">
                    <img src="img/logo2.png" id="logo"/>
                    <p class="text">The annual technical meet organized by the students of the Department of Electrical
                        Engineering, Jadavpur University. It is aimed at providing a platform for engineering students
                        to learn and apply their acquired skills. The 3-day event will promote extensive interaction
                        among creative solution designers and prominent personalities from academics and industries.
                    </p>

                    <div class="end">
                        <i class="fa fa-calendar-check-o"></i><span>March</span><span>Jadavpur University</span><i
                            class="fa fa-university"></i>
                    </div>
                </div>
            </div>


            <!--debitis eaque facilis illum ipsa ipsum possimus, quod.</p>-->
        </div>
        <div id="events" style="padding-top: 100px;">
            <div id="circuistic" class="item" style="background: #ffb630">
                <div id="lcd">
                    <img src="img/circuistic/LCD.png"/>
                    <img src="img/circuistic/LCD_ON.png"/>
                    <img src="img/circuistic/LCD_Convolution.png"/>
                    <img src="img/circuistic/LCD_Circuistic.png"/>
                </div>
                <!--<h1 class="item" style="text-align: center; color: #00cc66">CIRCUISTIC</h1>-->
                <!--<hr>-->
                <br>
                <div id="circuistic_text">Tired of reading only text books? Have an inherent love for circuits?
                    Then this is the event you were looking for. CONVOLUTION 2017 presents CIRCUISTIC 4.0, the circuit
                    building event of the year. To all the enthusiasts and hobbyists out there here is your chance to
                    create magic with circuits and walk away with awesome prizes.<br>
                    The contestants will be given a problem statement, which has to be analysed and practically realised
                    by building a prototype circuit. The prototype must be both efficient and economical.
                    Come. Build. Win.
                </div>
                <div id="circuistic_contacts"><div id="circuistic_contacts_inner"><i style="color: dodgerblue">Contact:  </i> <div style="border-right: solid 2px dodgerblue">Soumee Guha- +919477784233  </div>   Anurag Chhetry- +919732812683</div></div>
                <!--<div id="circuistic_buttons_wrapper">-->
                    <!--<div id="circuistic_buttons_wrapper_inner">-->
                        <!--<a href="" style="text-decoration:none;float: left;"><div class="circuistic_button">DETAILS</div></a>-->
                        <!--<a href="" style="text-decoration:none;float: right;"><div class="circuistic_button">REGISTER</div></a>-->
                        <!--<div style="clear: both"></div>-->
                    <!--</div>-->
                <!--</div>-->
                <div style="margin-top: 1.2vw">
                    <div id="circuistic_buttons_wrapper">
                        <div id="circuistic_buttons_wrapper_inner">
                            <a id="circuistic_details_btn" style="text-decoration:none;float: left;"><div class="circuistic_button">DETAILS</div></a>
                            <a href="" style="text-decoration:none;float: right;"><div class="circuistic_button">REGISTER</div></a>
                            <div style="clear: both"></div>
                        </div>
                    </div>
                <img class="ckt_image" src="img/circuistic/Circuits_2.png"/>
                </div>
                <div>
                    <div id="multitext" style="float:left">23.7</div>
                    <div id="oscillograph" style="float:right"></div>
                    <div style="clear: both"></div>
                </div>
            </div>
            <h1 id="algomaniac" class="item">ALGOMANIAC</h1>
            <hr>
            <div id="algo">
                <div class="shrink">
                    <!--img id="consoleImg" src="img/flat_terminal_bare.svg"/-->
                    <div id="laptop_screen">
                        <div id="termial_titlebar">
                            <div class="terminal_buttons" style="background-color:red;"></div>
                            <div class="terminal_buttons" style="background-color:#FFC107;"></div>
                            <div class="terminal_buttons" style="background-color:green;"></div>
                        </div>
                        <div id="console"></div>

                    </div>
                    <div id="laptop_bottom"></div>
                </div>
                <br/>
                <div id="algo_buttons_wrapper">
                    <a class="algo_buttons_class" href="" style="float: left;">
                        details
                    </a>
                    <a class="algo_buttons_class" href="" style="float: right;">
                        register
                    </a>

                </div>
                <div id="algo_sponsors">
                    place for sponsors

                </div>
            </div>
            <br/>
            <h1 id="sparkhack" class="item">SPARKHACK</h1>
            <div id="sparkhack_wrapper">
                <div class="progress">
                    <div class="indeterminate"></div>
                </div>
            </div>
            <h1 id="crossfire" class="item">Crossfire</h1>
            <div class="blankDiv">
                Crossfire info comming soon
                <div class="progress">
                    <div class="indeterminate"></div>
                </div>
            </div>
            <h1 id="decisia" class="item">DECISIA</h1>
            <div class="blankDiv">
                Decisia info comming soon
                <div class="progress">
                    <div class="indeterminate"></div>
                </div>
            </div>
            <h1 id="inquizzitive" class="item">INQUIZZITIVE</h1>
            <div class="blankDiv">
                Inquizzitive info comming soon
                <div class="progress">
                    <div class="indeterminate"></div>
                </div>
            </div>
            <h1 id="workshops" class="item">PRESENTATION</h1>
            <div class="blankDiv">
                Presentations will be here soon
                <div class="progress">
                    <div class="indeterminate"></div>
                </div>
            </div>
            <h1 id="sponsors" class="item">SPONSORS</h1>
            <div class="blankDiv">
                <div class="progress">
                    <div class="indeterminate"></div>
                </div>
            </div>
            <h1 id="contact" class="item">CONTACT</h1>
            <div class="blankDiv">
                <div class="progress">
                    <div class="indeterminate"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="js/jq.js"></script>
<script type="text/javascript" src="js/jquery.flot.js"></script>
<script type="text/javascript" src="js/jquery.mCustomScrollbar.concat.min.js"></script>
<script type="text/javascript" src="js/main.js"></script>
<script type="text/javascript" src="js/circuistic.js"></script>
<script type="text/javascript" src="js/console.js"></script>
</body>
</html>