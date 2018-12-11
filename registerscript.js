
let register = document.getElementsByTagName('section')[0];
let password_box = document.getElementsByTagName('input')[2];
document.getElementsByTagName('input')[3].disabled = true;
password_box.addEventListener('input', function () {
  test_strength();
  event.preventDefault();
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
        document.getElementsByTagName('input')[3].disabled = false;
        break;
      case 2:
        document.querySelector('#Strength').style = "color:green";
        document.querySelector('#Strength').textContent = 'Strong';
        document.getElementsByTagName('input')[3].disabled = false;
        break;
      case 1:
        document.querySelector('#Strength').style = "color:yellow";
        document.querySelector('#Strength').textContent = 'Good';
        document.getElementsByTagName('input')[3].disabled = false;
        break;
      case 0:
      case -1:
      case -2:
      case -3:
        document.querySelector('#Strength').style = "color:red";
        document.querySelector('#Strength').textContent = 'Weak';
        document.getElementsByTagName('input')[3].disabled = true;
        break;
      default:
        document.querySelector('#Strength').style = "color:red";
        document.querySelector('#Strength').textContent = 'Very Weak';
        document.getElementsByTagName('input')[3].disabled = true;

        break;
    }

}
