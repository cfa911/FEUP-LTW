
let register = document.getElementsByTagName('section')[0];
let username_box = document.getElementsByTagName('input')[0];
let e_mail_box = document.getElementsByTagName('input')[1];
let password_box = document.getElementsByTagName('input')[2];
let fname_box = document.getElementsByTagName('input')[3];
let lname_box = document.getElementsByTagName('input')[4];
let age_box = document.getElementsByTagName('input')[5];
let file_box = document.getElementsByTagName('input')[6];

let username_filled = false;
let e_mail_filled = false;
let password_filled = false;
let first_name_filled = false;
let last_name_filled = false;
let age_filled = false;
let file_choosen = false;

document.getElementsByTagName('input')[7].disabled = true;

username_box.addEventListener('change', function() {
  if(username_box.value != ''){
    username_filled = true;
  }else {
    username_filled = false;
  }
  test_ready();
});

e_mail_box.addEventListener('change', function() {
  if(e_mail_box.value != ''){
    e_mail_filled = true;
  }else {
    e_mail_filled = false;
  }
  test_ready();
});

password_box.addEventListener('input', function () {
  test_strength();
  test_ready();
  event.preventDefault();
});

fname_box.addEventListener('change', function() {
  if(fname_box.value != ''){
    first_name_filled = true;
  }else {
    first_name_filled = false;
  }
  test_ready();
});

lname_box.addEventListener('change', function() {
  if(lname_box.value != ''){
    last_name_filled = true;
  }else {
    last_name_filled = false;
  }
  test_ready();
});

age_box.addEventListener('change', function() {
  if(age_box.value != ''){
    age_filled = true;
  }else {
    age_filled = false;
  }
  test_ready();
});

file_box.addEventListener('change', function() {
  if(file_box.value != ''){
    file_choosen = true;
  }else{
    file_choosen = false;
  }
  test_ready();
});




function test_strength(){
    var password_strenght = 0;
    let password = document.getElementsByTagName('input')[2].value;
    if(password.length < 8)
      password_strenght += -8;

    if(/\d/.test(password))
      password_strenght ++;
    else {
      password_strenght --;
    }
    if((password.toLowerCase() != password) && (password.toUpperCase() != password)){
      password_strenght ++;
    }else {
      password_strenght --;
    }
    if(/\W/.test(password) || /_/.test(password)){
      password_strenght ++;
    }else{
      password_strenght --;
    }


    switch(password_strenght){
      case 3:
        document.querySelector('#Strength').style = "color:green";
        document.querySelector('#Strength').textContent = 'Very Strong';
        password_filled = true;
        break;
      case 2:
        document.querySelector('#Strength').style = "color:green";
        document.querySelector('#Strength').textContent = 'Strong';
        password_filled = true;
        break;
      case 1:
        document.querySelector('#Strength').style = "color:yellow";
        document.querySelector('#Strength').textContent = 'Good';
        password_filled = true;
        break;
      case 0:
      case -1:
      case -2:
      case -3:
        document.querySelector('#Strength').style = "color:red";
        document.querySelector('#Strength').textContent = 'Weak';
        password_filled = false;
        break;
      default:
        document.querySelector('#Strength').style = "color:red";
        document.querySelector('#Strength').textContent = 'Very Weak';
        password_filled = false;

        break;
    }
};

function test_ready(){
    if(username_filled && e_mail_filled && password_filled && first_name_filled && last_name_filled && age_filled && file_choosen)
      document.getElementsByTagName('input')[7].disabled = false;
    else
        document.getElementsByTagName('input')[7].disabled = true;

};
