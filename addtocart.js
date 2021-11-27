let carts = document.querySelectorAll(".addToCart");//selecting all add to cart buttons

let products = [ //array of product objects
    {
        name : "model S",
        tag : "models",
        price : 14500, 
        incart : 0 //no of items in cart
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
        price : 25500,
        incart : 0
    },
    {
        name : "Pedal Set",
        tag : "pedalset",
        price : 37500,
        incart : 0
    },
    {
        name : "Rear Trunk Liner",
        tag : "reartrunkliner",
        price : 56000,
        incart : 0
    },
    {
        name : "Roof Rack",
        tag : "roofrack",
        price : 17500,
        incart : 0
    },
    {
        name : "Spoiler",
        tag : "spoiler",
        price : 66900,
        incart : 0
    },
    {
        name : "Mud Flaps",
        tag : "mudflaps",
        price : 10500,
        incart : 0
    }
];

for(let i=0 ; i < carts.length; i++){
    carts[i].addEventListener('click' , () =>{ //add to cart when its clicked
        cartNumbers(products[i]); //captures a specific product from the objects of products above 
        totalPrice(products[i]);
    })
}
// fxn to add cart number when product is clicked
function cartNumbers(product){ //fxn takes a parameter
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
    setItems(product); //calling the function setIems
}
//fxn ensures cart number is not lost when we reload page
function onLoadCartNumber(){
    let productNumbers= localStorage.getItem('cartNumbers');
    if (productNumbers){
        document.querySelector("a span").textContent = productNumbers;
    }
}
//fxn that captures the no of a particular item in the cart
function setItems(product){
    let cartItems = localStorage.getItem('productsInCart');
    cartItems = JSON.parse(cartItems);//converting from json format to normal js 
     
    if(cartItems != null){ //if any item is already clicked once or more
        // to ensure another product other than the first one is also captured
        if (cartItems[product.tag] == undefined){
            cartItems = {
                ...cartItems,
                [product.tag] :product
            }
        }
        cartItems[product.tag].incart+=1;
    }
    else{ //if not clicked at all
        product.incart = 1;
        cartItems = {
            [product.tag] :product
        }
    }
    localStorage.setItem ("productsInCart" , JSON.stringify(cartItems));
}
//fxn to calacualte the total price of items in the cart
function totalPrice(product){ //takes a parameter
    let totalCartPrice = localStorage.getItem('totalPrice');//assigning the value to a variable
    if(totalCartPrice ==null){ //if total price is not defined i.e not item has been clicked
        localStorage.setItem ("totalPrice",product.price);//setting total price to local storage
    }
    else{//if an we have a value of total price in local storage i.e item has been clicked
        totalCartPrice=parseFloat(totalCartPrice);
        localStorage.setItem("totalPrice", totalCartPrice+product.price);//increment totalprice by value of new clicked item
    }
}
onLoadCartNumber();