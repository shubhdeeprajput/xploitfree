<?php

    if(basename($_SERVER['SCRIPT_FILENAME']) == "footer.php"){
        include_once "../shared/notfound.php";
    }
    else{

        $db_foot_connection = new Db_Connect();
        $foot_conn = $db_foot_connection->get_connection();

?>

    <div class="picfoot"></div>
    <footer class="navfooter">
        <div class="content content-wrap">

            <div class="footcol ainfo">
                <div class="navlogo-section">
                    <a class="navlink" href="home.php">
                        <div class="navlogo footcolhead">
                            <span class="brandname" style="margin-right: 0.5em; margin-left: 0">XploitFree Security</span>
                            <span class="brandlogo navitem footlogo"><?php logosvg(45, 45) ?></span>
                        </div>
                    </a>
                </div>
                <div class="xinfo">
                    <p class="footcolitem footcoltext"><span>Our Motto: <i><q>Securing Your Digital Presence</q></i></span></p>
                    <p class="footcolitem footcoltext"><span>Copyright &copy 2020 Xploitfree Security</span></p>
                </div>
            </div>

            <div class="footcol sinfo">
                <p class="footcolhead">Services</p>
                <ul class="footcollist">
                    <a href="websecurity.php" class="navlink navitem"><li class="footcolitem"><span class="footcoltext">Web Security</span></li></a>
                    <a href="networksecurity.php" class="navlink navitem"><li class="footcolitem"><span class="footcoltext">Network Security</span></li></a>
                    <a href="socialengg.php" class="navlink navitem"><li class="footcolitem"><span class="footcoltext">Social Engineering</span></li></a>
                    <a href="redteaming.php" class="navlink navitem"><li class="footcolitem"><span class="footcoltext">Red Teaming</span></li></a>
                </ul>
            </div>

            <div class="footcol tinfo">
                <p class="footcolhead">Trainings</p>
                <ul class="footcollist">
                    <?php
                        $query_trainings = "select name, training_url from trainings";

                        $trainings_data = $foot_conn->query($query_trainings);

                        while($trng = $trainings_data->fetch_array(MYSQLI_ASSOC)){
                    ?>
                        <a href="./<?php echo $trng["training_url"] ?>" class="navlink navitem">
                            <li class="footcolitem">
                                <span class="footcoltext"><?php echo $trng["name"] ?></span>
                            </li>
                        </a>
                    <?php } ?>
                </ul>
            </div>

            <div class="footcol cinfo">

                <div class="contact">
                    <p class="footcolhead">Contact us</p>
                    <p class="footcolitem">
                        <span class="footcolicon"><?php phnsvg(30, 30, "white") ?></span>
                        <span class="footcoltext">(+91) 9900990099</span>
                    </p>
                    <a class="footcolitem navlink" href="mailto:xploitfreesecurity@gmail.com">
                        <span class="footcolicon"><?php emailsvg(30, 30) ?></span>
                        <span class="footcoltext">xploitfreesecurity@gmail.com</span>
                    </a>
                </div>

                <div class="socialmedia">
                    <p class="footcolhead">Join us</p>
                    <div class="footcolitem">
                        <a href="/" class="navlink navitem footcolicon" title="facebook">
                            <?php facebooksvg(40, 40) ?>
                        </a>
                        <a href="/" class="navlink navitem footcolicon" title="linkedin">
                            <?php linkedinsvg(40, 40) ?>
                        </a>
                        <a href="/" class="navlink navitem footcolicon" title="twitter">
                            <?php twittersvg(40, 40) ?>
                        </a>
                        <a href="/" class="navlink navitem footcolicon" title="instagram">
                            <?php instagramsvg(40, 40) ?>
                        </a>
                        <a href="/" class="navlink navitem footcolicon" title="mail">
                            <?php mailsvg(40, 40) ?>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </footer>

<?php
        $foot_conn->close();
    } 
 ?>