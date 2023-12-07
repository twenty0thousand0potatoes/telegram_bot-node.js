"use strict";

const croos =  document.getElementById("close_cross");
const pop_up =  document.getElementById("pop_up_order");
const btn_open =  document.getElementById("order_form_open");

croos.addEventListener('click', ()=>{
    pop_up.style.display = "none";
    document.querySelector("body").classList.toggle('overflow');
});

btn_open.addEventListener('click', ()=>{
    window.scrollTo({
        top: 0,
        behavior: 'smooth'
      });
    pop_up.style.display = "flex";
    document.querySelector("body").classList.toggle('overflow');
})


const form = document.getElementById('my_form');


form.addEventListener('submit', function (event) {
    event.preventDefault(); 
   
    const formData = new FormData(form);

    const formDataObject = {};
    formData.forEach((value, key) => {
        formDataObject[key] = value;
    });

    fetch('http://localhost:3500/form', {
        method: 'POST',
        body: formData 
    })
    .then(function(response) {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }

    
        response.status === 200 ? alert("Ваш заказ принят в обработку!") : alert("Произошла ошибка!");
        return response.text();

    })
    .then(function(data) {
        console.log(data);
    })
    .catch(function(error) {
        console.error(error);
    });
});

