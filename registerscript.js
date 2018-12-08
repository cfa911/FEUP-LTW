
let register = document.getElementsByTagName('section')[0];
let password_box = document.getElementsByTagName('input')[2];

password_box.addEventListener('input', function () {
  test_strength();
  event.preventDefault();
});

register.addEventListener('submit', function () {


    let username = document.getElementsByTagName('input')[0].value;
    let e_mail = document.getElementsByTagName('input')[1].value;
    let password = document.getElementsByTagName('input')[2].value;

    alert('Submitted!');
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
      console.log('special');
      password_strenght ++;
    }else{
      password_strenght --;
    }
    console.log(password_strenght);

    switch(password_strenght){
      case 3:
        document.querySelector('#Strength').textContent = 'Very Strong';
        break;
      case 2:
        document.querySelector('#Strength').textContent = 'Strong';
        break;
      case 1:
        document.querySelector('#Strength').textContent = 'Good';
        break;
      case 0,-1,-2,-3:
        document.querySelector('#Strength').textContent = 'Weak';
        break;
      default:
        document.querySelector('#Strength').textContent = "Very Weak";
        break;
    }

}
