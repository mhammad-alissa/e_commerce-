let regexPass = /^(?=.*[A-Z])(?=.*[@$!%*#?&])(?=.*[a-z])(?=.*\d)[A-Za-z\d@$!%*#?&]{8,}$/;
let regexEmail = /^[a-z0-9._-]+@(gmail|yahoo|hotmail).com$/;
// let regexMobile = /^[0][7][7][0-9]{7}$/;
// let regexfullname            = /^[a-zA-Z]{4,}(?: [a-zA-Z]+){3}$/;

// fullname
const fullName               = document.getElementById('fullName');
const fullNameMessageError   = document.getElementById('fullNameMessageError');

// email
const email                   = document.getElementById('email');
const emailMessageError       = document.getElementById('emailMessageError');
// password
const pass                    = document.getElementById('pass');
const passMessageError        = document.getElementById('passMessageError');

const ConfirmPass             = document.getElementById('ConfirmPass');
const ConfirmPassMessageError = document.getElementById('ConfirmPassMessageError');
//button
const submit                  = document.getElementById('submit');


submit.addEventListener('click' , function(e){
    var bool = true;
    
    // fullname condition
    fullNameMessageError.innerText='';
    if(fullName.value==''){
        fullNameMessageError.innerText='User Name is empty';
        bool = false;
    }
    
    // Age condition
    // let date = new Date();
    // let birthYear = birthDay.value.slice(0,4);
    // let curentYear = date.toString().slice(11,15);
    // intbirthYear = Number(birthYear);
    // intcurentYear = Number(curentYear);
    // birthDayMessageError.innerText='';
    // if (birthDay.value=='') {
    //     birthDayMessageError.innerText='age is empty';
    //     bool = false;
    // }else if(intcurentYear - intbirthYear < 16){
    //     birthDayMessageError.innerText ="your age must be more than 16";
    //     bool = false;
    // }

    // email condition
    emailMessageError.innerText='';
        if (email.value=='') {
            emailMessageError.innerText='Email is empty';
            bool = false;
        }else if(!email.value.match(regexEmail)){
            emailMessageError.innerText='Email is not valid';
            bool = false;
        }
    // password condition
    passMessageError.innerText='';
    if (pass.value=='') {
        passMessageError.innerText='password is empty';
        bool = false;
    
    }else if(!pass.value.match(regexPass)){
        passMessageError.innerText='password is not valid';
        bool = false;
    }
    // password confirm condition
    ConfirmPassMessageError.innerText='';
    if (ConfirmPass.value=='') {
        ConfirmPassMessageError.innerText='confirm password is empty';
        bool = false;
    }else if(ConfirmPass.value != pass.value){
        ConfirmPassMessageError.innerText='confirm password is not match';
        bool = false;
    }
    if(bool == false ){
        e.preventDefault();
    }
    })

