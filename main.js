let nombre = document.getElementById('name');
let email = document.getElementById('email');
let lastName = document.getElementById('lastname');
let country = document.getElementById('country');   
let CC = document.getElementById('CC');
let address = document.getElementById('address');
let phone = document.getElementById('phone');
let category = document.getElementById('category');
const enviar = document.querySelector('#enviar');
const consultar = document.querySelector('#consultar');
//  function sendForm() {
//     fetch('http://127.0.0.1:8000/api/user/create', {
//         method: 'POST',
//         body: JSON.stringify({
//             "name": nombre.value,
//             "lastName": lastName.value,
//             "CC": CC.value,
//             "country": country.value,
//             "email": email.value,
//             "address": address.value,
//             "phone": phone.value,
//             "category_id": category.value
//         }),
//         headers: {
//             'Content-Type': 'application/json'
//         }
//     });}
async function consultForm() {
    await fetch('http://127.0.0.1:8000/api/user', {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json'
        }
    });
    console.log('consultar');
}
enviar.addEventListener('click', function(){
    fetch('http://127.0.0.1:8000/api/user/create', {
        method: 'POST',
        body: JSON.stringify({
            "name": nombre.value,
            "lastName": lastName.value,
            "CC": CC.value,
            "country": country.value,
            "email": email.value,
            "address": address.value,
            "phone": phone.value,
            "category_id": category.value
        }),
        headers: {
            'Content-Type': 'application/json'
        }
    });});
consultar.addEventListener('click', consultForm);