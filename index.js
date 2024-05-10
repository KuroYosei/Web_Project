// Mobile Side nav Bar Show/Hide
const bar = document.getElementById('navbar');
const nav = document.getElementById('menu');
const back = document.getElementById('back');

if(nav){
    nav.addEventListener('click' , () => {
        bar.classList.add('show');
    })
}

if(back){
    back.addEventListener('click', ()=> {
        bar.classList.remove('show');
    })
}

var show = document.getElementById("anim-sub");
function myfunction(){
    show.style.display="block";
}
// Contact Us
const form = document.getElementById('form');
const name = document.getElementById('name');
const mail = document.getElementById('mail');
const phone = document.getElementById('phone');
const address = document.getElementById('address');
const message = document.getElementById('message');
form.addEventListener('submit', e => {
    e.preventDefault();
    valideInputs();
});
const setError = (element, message) => {
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector('.error');
    errorDisplay.innerText = message;
    inputControl.classList.add('error');
    inputControl.classList.remove('success');
}
const setSuccess = element => {
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector('.error');
    errorDisplay.innerText = '';
    inputControl.classList.add('success');
    inputControl.classList.remove('error');
}
const isValidEmail = mail => {
    const re = /^\w+@+\w+\.\w{3,4}$/;
    return re.test(String(mail).toLowerCase());
}
const valideInputs = () => {
    const nameValue = name.value.trim();
    const mailValue = mail.value.trim();
    const phoneValue = phone.value.trim();
    const addressValue = address.value.trim();
    const messageValue = message.value.trim();
    if (nameValue === '') {
        setError(name, 'Name is required');
    } else {
        setSuccess(name);
    }
    if (mailValue === '') {
        setError(mail, 'Email is required');
    } else if (!isValidEmail(mailValue)) {
        setError(mail, 'Provide a valid email address');
    } else {
        setSuccess(mail);
    }
    if (phoneValue === '') {
        setError(phone, 'Phone is required');
    } else if (phoneValue.length < 8) {
        setError(phone, 'Input at least 8 numbers');
    } else if (isNaN(phoneValue)) {
        setError(phone, 'Number Only');
    } else {
        setSuccess(phone);
    }
    if (addressValue === '') {
        setError(address, 'Address is required');
    } else if (addressValue.fulladdress) {
        setError(address, 'Enter Full Address');
    } else {
        setSuccess(address);
    }
    if (messageValue === '') {
        setError(message, 'Enter Message');
    } else {
        setSuccess(message);
    }
};
// Shopping Cart Counter
let count = 0
function cart_count_increase(){
    let count = 0
    count++
    document.getElementById("counter_num").innerHTML = count
    console.log(cart_count_increase)
}