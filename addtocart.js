let carts = document.querySelectorAll(".addToCart");//selecting all add to cart buttons

let products = [ //array of product objects
    {
        name : "model S",
        tag : "models",
        price : 14500,
        incart : 0
    },
    {
        name : "model X",
        tag : "modelx",
        price : 15500,
        incart : 0
    },
    {
        name : "model 3",
        tag : "model3",
        price : 15500,
        incart : 0
    },
    {
        name : "Tyre 19'",
        tag : "tyre19",
        price : 19500,
        incart : 0
    },
    {
        name : "Key Card",
        tag : "keycard",
        price : 7500,
        incart : 0
    },
    {
        name : "Air Filter",
        tag : "airfilter",
        price : 15000,
        incart : 0
    },
    {
        name : "Pedal Set",
        tag : "pedalset",
        price : 15000,
        incart : 0
    },
    {
        name : "Rear Trunk Liner",
        tag : "reartrunkliner",
        price : 15000,
        incart : 0
    },
    {
        name : "Roof Rack",
        tag : "roofrack",
        price : 15000,
        incart : 0
    },
    {
        name : "Spoiler",
        tag : "spoiler",
        price : 15000,
        incart : 0
    },
    {
        name : "Mud Flaps",
        tag : "mudflaps",
        price : 15000,
        incart : 0
    }
];

for(let i=0 ; i < carts.length; i++){
    carts[i].addEventListener('click' , () =>{ //add to cart when its clicked
        cartNumbers();
    })
}
// fxn to add cart number when product is clicked
function cartNumbers(){
    let productNumbers= localStorage.getItem('cartNumbers');
    productNumbers=parseInt(productNumbers);

    if (productNumbers){
        localStorage.setItem('cartNumbers', productNumbers+1);
        document.querySelector("a span").textContent = productNumbers+1;
    }
    else{
        localStorage.setItem('cartNumbers', 1);
        document.querySelector("a span").textContent = 1;
    }
    
}
//fxn unsures cart number is not lost when we reload page
function onLoadCartNumber(){
    let productNumbers= localStorage.getItem('cartNumbers');
    if (productNumbers){
        document.querySelector("a span").textContent = productNumbers;
    }
}
onLoadCartNumber();