<div class="modal-overlay modal-inactive">
    <div class="modal-container pop-up">
        <div class="modal-head">

            <?php if(get_heading() == "Services" || get_heading() == "Red Teaming" || get_heading() == "Web Security" || get_heading() == "Network Security" || get_heading() == "Social Engineering"){ ?>
                <div class="modal-heading">
                    <p class="heading">Lets make your business secure!</p>
                    <p class="subheading">You are just a step away from assurance of your business protection and growth.</p>
                </div>
            <?php } ?>

            <?php if(get_heading() == "Trainings" || get_heading() == "Secure Web Development" || get_heading() == "Secure Android Development" || get_heading() == "Ethical Hacking"){ ?>
                <div class="modal-heading">
                    <p class="heading">Get Ready for any cyber threat!</p>
                    <p class="subheading">Register now to </p>
                </div>
            <?php } ?>

            <?php xsvg(40, 40, "modal-close") ?>

        </div>
        <div class="modal-body">
            <form method="POST" name="registration_form" class="modal-form" onsubmit="formValidation(event)">
                <p class="notice"><b>Training is not available right now.</b> You can still register below and we will let you know when it will be available.</p>
                <p class="form-msg error-msg"></p>
                <?php if(get_heading() == "Trainings" || get_heading() == "Secure Web Development" || get_heading() == "Secure Android Development" || get_heading() == "Ethical Hacking"){ ?>
                    <div class="form-field">
                        <label for="cname" class="form-label">Your Name(To be printed on Certificate):</label>
                        <input type="text" name="name" class="form-input" placeholder="Enter name"/>
                    </div>
                <?php } ?>
                <div class="form-field">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" name="email" class="form-input" placeholder="Enter email"/>
                </div>
                <div class="form-field">
                    <label for="phone" class="form-label">Contact number:</label>
                    <input type="tel" name="phone" class="form-input" placeholder="Enter phone"/>
                </div>
                <?php if(get_heading() == "Services" || get_heading() == "Red Teaming" || get_heading() == "Web Security" || get_heading() == "Network Security" || get_heading() == "Social Engineering"){ ?>
                    <div class="form-field">
                        <label for="domain" class="form-label">Business Domain:</label>
                        <input type="text" name="domain" class="form-input" placeholder="Your Domain"/>
                    </div>
                <?php } ?>
                <?php if(get_heading() == "Services" || get_heading() == "Red Teaming" || get_heading() == "Web Security" || get_heading() == "Network Security" || get_heading() == "Social Engineering"){ ?>
                    <div class="form-field">
                        <label for="service" class="form-label">Service:</label>
                        <select name="service" class="form-select form-input">
                            <option>Red Teaming</option>
                            <option>Network Security</option>
                            <option>Web Security</option>
                            <option>Social Engineering</option>
                        </select>
                    </div>
                <?php } ?>
                <?php if(get_heading() == "Trainings" || get_heading() == "Secure Web Development" || get_heading() == "Secure Android Development" || get_heading() == "Ethical Hacking"){ ?>
                    <div class="form-field">
                        <label for="training" class="form-label">Training:</label>
                        <select name="training" class="form-select form-input">
                            <option>Secure Web Development</option>
                            <option>Secure Android Development</option>
                            <option>Ethical Hacking</option>
                        </select>
                    </div>
                <?php } ?>
                <div class="form-field">
                    <button type="submit" class="form-btn">Submit&nbsp<?php smspinner(20, 20, "spinner") ?></button>
                </div>
            </form>
            <div class="submit-msg">
                <?php successsvg(60, 60); ?>
                <h2 class="main-msg"></h2>
                <p class="sec-msg"></p>
                <button class="k-btn">Back to site</button>
            </div>
        </div>
    </div>
</div>