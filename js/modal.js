document.addEventListener("click", (event) => {

    if(event.target == document.querySelector(".modal-overlay") || event.target == document.querySelector(".modal-close") || event.target == document.querySelectorAll(".modal-close path")[0] || event.target == document.querySelectorAll(".modal-close path")[1] || event.target == document.querySelector(".k-btn")){
        if(document.querySelector("body").classList.contains("modal-active")){
            const fields = document.getElementsByClassName("form-input");
            document.querySelector("body").classList.remove("modal-active");
            document.querySelector(".modal-overlay").classList.add("modal-inactive");
            document.querySelector(".form-msg").style.display = "none";
            document.querySelector(".form-msg").textContent = "";
            document.querySelector(".submit-msg").classList.remove("slide-in");
            document.querySelector(".modal-form").classList.remove("slide-out");
            for(i=0; i<fields.length; i++){
                fields[i].classList.remove("invalid");
            }
            document.forms["registration_form"].reset();
        }
    }

})

function formValidation(event){

    event.preventDefault();

    document.querySelector(".form-msg").classList.add("error-msg");
    document.querySelector(".form-msg").classList.remove("success-msg");

    const emailRegExp = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
    const phnRegExp = /^[0-9]+$/;
    const nameRegExp = /^[A-Za-z ]+$/;
    const urlRegExp = /^((?!-)[A-Za-z0-9-]{1, 63}(?<!-)\\.)+[A-Za-z]{2, 6}$/;

    const fields = document.forms["registration_form"];

    const emailField = document.forms['registration_form']['email'];
    const phnField = document.forms['registration_form']['phone'];
    const nameField = document.forms['registration_form']['name'];
    const domainField = document.forms['registration_form']['domain'];
    const trainingField = document.forms['registration_form']['training'];
    const serviceField = document.forms['registration_form']['service'];

    for(i=0; i<fields.length; i++){
        fields[i].classList.remove("invalid");
    }

    if(emailField != undefined && emailField.value == '' || phnField != undefined && phnField.value == '' || nameField != undefined && nameField.value == '' || domainField != undefined && domainField.value == '' || trainingField != undefined && trainingField.value == '' || serviceField != undefined && serviceField.value == ''){
        for(i=0; i<fields.length; i++){
            if(fields[i].value =='' && fields[i].type != "submit")
                fields[i].classList.add("invalid");
        }
        document.querySelector(".form-msg").style.display = "block";
        document.querySelector(".form-msg").textContent = "Please provide all details or else we won't be able to contact you.";
    }
    else if(emailField != undefined && !emailRegExp.test(emailField.value)){
        emailField.classList.add("invalid");
        document.querySelector(".form-msg").style.display = "block";
        document.querySelector(".form-msg").textContent = "Enter valid email!";
    }
    else if(emailField != undefined && emailField.value.length > 50){
        emailField.classList.add("invalid");
        document.querySelector(".form-msg").style.display = "block";
        document.querySelector(".form-msg").textContent = "Character limit exceeded.(Limit: 50)";
    }
    else if(nameField != undefined && !nameRegExp.test(nameField.value)){
        nameField.classList.add("invalid");
        document.querySelector(".form-msg").style.display = "block";
        document.querySelector(".form-msg").textContent = "Please enter valid name(to be printed on Certificate).";
    }
    // else if(nameField != undefined && nameField.value.length > 20){
    //     nameField.classList.add("invalid");
    //     document.querySelector(".form-msg").style.display = "block";
    //     document.querySelector(".form-msg").textContent = "Character limit exceeded.(Limit: 30)";
    // }
    else if(phnField != undefined && !phnRegExp.test(phnField.value) && phnField.value != 10){
        phnField.classList.add("invalid");
        document.querySelector(".form-msg").style.display = "block";
        document.querySelector(".form-msg").textContent = "Enter valid contact!";
    }
    // else if(domainField.value != undefined && !urlRegExp.test(domainField.value)){
    //     domainField.classList.add("invalid");
    //     document.querySelector(".form-msg").style.display = "block";
    //     document.querySelector(".form-msg").textContent = "Please enter valid domain or else we wont be able to perform test.";
    // }
    else{

        data = {};

        for(i=0; i<fields.length; i++){
            data[fields[i].name] = fields[i].value;
        }

        document.querySelector(".spinner").style.display = "inline";

        fetch('./back/registrationApi.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data),
            }).then((response) => (response.json())).then((data) => {

                if(data["success"]){
                    document.querySelector(".spinner").style.display = "none";
                    document.querySelector(".form-msg").style.display = "block";
                    document.querySelector(".form-msg").classList.remove("error-msg");
                    document.querySelector(".form-msg").classList.add("success-msg");
                    msgs = data["message"].split(".");
                    document.querySelector(".submit-msg h2").textContent = msgs[0];
                    document.querySelector(".submit-msg p").textContent = msgs[1];
                    document.querySelector(".submit-msg").classList.add("slide-in");
                    document.querySelector(".modal-form").classList.add("slide-out");
                }
                else{
                    document.querySelector(".spinner").style.display = "none";
                    document.querySelector(".form-msg").style.display = "block";
                    document.querySelector(".form-msg").classList.add("error-msg");
                    document.querySelector(".form-msg").classList.remove("success-msg");
                    document.querySelector(".form-msg").textContent = data["message"];
                }
                
            });
    }
    
}

function btnClickHandler(btn, isAvailable, event){

    if(event != undefined){
        event.preventDefault();
    }

    document.querySelector(".form-select").value = btn.dataset.name;

    document.querySelector(".modal-overlay").classList.remove("modal-inactive");
    document.querySelector("body").classList.add("modal-active");

    if(isAvailable == 0){
        document.querySelector(".notice").style.display = "block";
    }

}