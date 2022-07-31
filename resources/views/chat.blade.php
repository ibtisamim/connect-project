<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/all.min.css"/>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <!--start body background-->
    <div class="body_background">
        <!-- start container -->
        <div class="container">
            <!-- start row 1-->
            <div class="row pt-5 nav_page d-none d-lg-flex d-xl-flex">
                <div class="col-lg-3 col-md-3">
                    <div class="logo">
                        <img src="img/logo-black.svg" width="180">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="serch">
                        <div class="form-group  search-div" style="width:100%">
                            <i class="fas fa-search icon-search"></i>
                            <i class="fas fa-arrow-right icon-arrow"></i>
                            <input type="text" placeholder="Type in something." class="form-control search-input">
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3">
                    <div class="notification">
                        <div class="notification_dropDown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="img/Notifications.png" alt="notification_img">
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li class="notification_item">
                                    <P>Notifications</P>
                                    <a href="#"><i class="fas fa-ellipsis-h"></i></a>
                                </li>
                                <li>
                                    <div class="details_notification">
                                        <img src="img/user_image.png" alt="">
                                        <div class="description">
                                            <p>Lorem Ipsum Lorem Ipsum
                                                Lorem Ipsum</p>
                                            <span>3 Days Ago</span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="details_notification">
                                        <img src="img/user_image.png" alt="">
                                        <div class="description">
                                            <p>Lorem Ipsum Lorem Ipsum
                                                Lorem Ipsum</p>
                                            <span>3 Days Ago</span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="details_notification">
                                        <img src="img/user_image.png" alt="">
                                        <div class="description">
                                            <p>Lorem Ipsum Lorem Ipsum
                                                Lorem Ipsum</p>
                                            <span>3 Days Ago</span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="details_notification">
                                        <img src="img/user_image.png" alt="">
                                        <div class="description">
                                            <p>Lorem Ipsum Lorem Ipsum
                                                Lorem Ipsum</p>
                                            <span>3 Days Ago</span>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="messages_dropDown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="img/message.png" alt="message_img">
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li class="messages_item">
                                    <P>Direct Messages</P>
                                    <a href="#"><i class="fas fa-ellipsis-h"></i></a>
                                </li>
                                <li>
                                    <div class="details_messages">
                                        <img src="img/user_image.png" alt="">
                                        <div class="description">
                                            <h6>Lorem Ipsum</h6>
                                            <p>Lorem Ipsum Lorem Ipsum</p>
                                            <span>3 Days Ago</span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="details_messages">
                                        <img src="img/user_image.png" alt="">
                                        <div class="description">
                                            <h6>Lorem Ipsum</h6>
                                            <p>Lorem Ipsum Lorem Ipsum</p>
                                            <span>3 Days Ago</span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="details_messages">
                                        <img src="img/user_image.png" alt="">
                                        <div class="description">
                                            <h6>Lorem Ipsum</h6>
                                            <p>Lorem Ipsum Lorem Ipsum</p>
                                            <span>3 Days Ago</span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                    <p class="text-center">See all messages</p>
                                </li>


                            </ul>
                        </div>
                        <div class="person_dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="img/user.png" alt="user_img">
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a  href="#">My Profile</a></li>
                                <li><a  href="#">Help</a></li>
                                <li><a  href="#">Cart</a></li>
                                <li><a  href="#">Checkout</a></li>
                                <li><a  href="#">Settings</a></li>
                                <li><a  href="#">Sign out</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row 1-->

            <!-- start row 2-->
            <div class="row mt-5 chat_row">
                <div class="col-lg-4 chat_left">
                    <div class="form-group">
                        <div class="serch_person">
                            <span class="plus">
                                <i class="fas fa-plus"></i>
                            </span>
                            <span class="search_icon">
                                <i class="fas fa-search"></i>
                            </span>
                            <input type="text" class="form-control" placeholder="Find pepole and conservation">
                        </div>
                    </div>
                    <div class="status_message">
                        <span class="active">Resent</span>
                        <span>Unread</span>
                        <span>Projects</span>
                    </div>
                    <div class="active_chat single_chat">
                        <div class="single_chat_details">
                            <img src="img/user.png" alt="">
                            <span class="active_status"></span>
                            <div class="description">
                                <h4>User name</h4>
                                <p>short description to chat lorem </p>
                            </div>
                        </div>
                        <div class="setting_single_chat">
                            <span class="setting_icon">...</span>
                            <p class="time">10:20 pm</p>
                        </div>
                    </div>
                    <div class="single_chat">
                        <div class="single_chat_details">
                            <img src="img/user.png" alt="">
                            <span class="active_status"></span>
                            <div class="description">
                                <h4>User name</h4>
                                <p>short description to chat lorem </p>
                            </div>
                        </div>
                        <div class="setting_single_chat">
                            <span class="setting_icon">...</span>
                            <p class="time">10:20 pm</p>
                        </div>
                    </div>
                    <div class="single_chat have_messsage">
                        <div class="single_chat_details">
                            <img src="img/user.png" alt="">
                            <span class="active_status"></span>
                            <div class="description">
                                <h4>User name</h4>
                                <p>short description to chat lorem </p>
                            </div>
                        </div>
                        <div class="setting_single_chat">
                            <span class="setting_icon">...</span>
                            <p class="time">10:20 pm</p>
                        </div>
                    </div>
                    <div class="single_chat have_messsage">
                        <div class="single_chat_details">
                            <img src="img/user.png" alt="">
                            <span class="active_status"></span>
                            <span class="number_message">2</span>
                            <div class="description">
                                <h4>User name</h4>
                                <p>short description to chat lorem </p>
                            </div>
                        </div>
                        <div class="setting_single_chat">
                            <span class="setting_icon">...</span>
                            <p class="time">10:20 pm</p>
                        </div>
                    </div>
                    <div class="buttom_image">
                        <span class="active_status"></span>
                        <img src="img/bottom_image.png" alt="">
                    </div>
                </div>
                <div class="col-lg-8 chat_right">
                    <div class="header_chat">
                        <h2>
                            Michael Wong
                        </h2>
                        <span class="header_chat_status"></span>
                    </div>
                    <div class="message">

                        <div class="left_message">
                            <div>
                                <p class="date_message">
                                    Yesterday, 8:19 PM
                                </p>
                            </div>
                            <div>
                                <p class="content_message">
                                    I thought this would be an awesome way to interact with the interface.
                                </p>
                            </div>
                        </div>

                        <div class="right_message">
                            <img src="img/user.png" alt="">
                            <div class="content">
                                <div>
                                    <p class="date_message">
                                        Michael Wong, Yesterday 8:20 PM
                                    </p>
                                </div>
                                <div>
                                    <p class="content_message">
                                        I agree! It definitely produces a better user experience.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="left_message">
                            <div>
                                <p class="date_message">
                                    7:40 PM
                                </p>
                            </div>
                            <div>
                                <p class="content_message">
                                    Did you get that awesomesauce I sent?
                                </p>
                            </div>
                        </div>

                        <div class="right_message">
                            <img src="img/user.png" alt="">
                            <div class="content">
                                <div>
                                    <p class="date_message">
                                        Michael Wong, 7:46 PM
                                    </p>
                                </div>
                                <div>
                                    <p class="content_message">
                                        I did, our whole team rubbed it allll over their bread.
                                    </p>
                                </div>
                                <div>
                                    <p class="content_message">
                                        It was delicious!
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="left_message">
                            <div>
                                <p class="date_message">
                                    7:47 PM
                                </p>
                            </div>
                            <div>
                                <p class="content_message">
                                    Awesome!
                                </p>
                            </div>
                        </div>


                        <div class="right_message">
                            <img src="img/user.png" alt="">
                            <div class="content">
                                <div>
                                    <p class="date_message">
                                        Michael Wong, 7:48 PM
                                    </p>
                                </div>
                                <div>
                                    <p class="content_message">
                                        Yeah, we all loved it!
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="left_message">
                            <div>
                                <p class="date_message">
                                    7:47 PM
                                </p>
                            </div>
                            <div>
                                <p class="content_message">
                                    Awesome!
                                </p>
                            </div>
                        </div>


                        <div class="right_message">
                            <img src="img/user.png" alt="">
                            <div class="content">
                                <div>
                                    <p class="date_message">
                                        Michael Wong, 7:48 PM
                                    </p>
                                </div>
                                <div>
                                    <p class="content_message">
                                        Yeah, we all loved it!
                                    </p>
                                </div>
                            </div>
                        </div>


                    </div>
                    <div class ="input_chat">
                        <div class="typing">
                            <!-- <p>Michael Wong is typing <div class="dot-typing"></div></p> -->
                        </div>
                        <hr>
                        <div class="input_send">
                            <input type="text" name="message" id="message" placeholder="Message Michael" autocomplete="off">
                            <a href="#" class="send"><img src="img/send.png" alt="send"></a>
                            <a href="#" class="emojis"><img src="img/emojis.png" alt="emojis"></a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row 2-->
        </div>
        <!-- end container -->
       
    </div>
    <!--end body background-->
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/select2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/masonary.js"></script>
    <script src="js/custom.js"></script>
</body>
</html>