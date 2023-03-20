let cart = document.querySelector("#Cart");
let productList = document.querySelector(".Product-List");
let activ = document.querySelector(".active");

cart.onclick = _ => {
    console.log(cart);
    productList.classList.toggle("show");
}


let bigImg = document.querySelector(".bigImg");
let imgAll = document.querySelectorAll("div .img");
imgAll.forEach(element => {
    element.onclick = _ => {
        bigImg.src = element.src;
        imgAll.forEach(element => {
           element.classList.remove("active")
        
       });
        element.classList.add("active")
    }
}
)

let num = 0;
let add = document.querySelector("#Add");
let less = document.querySelector("#Less");
let quantity = document.querySelector("#Quantity");
let amount = document.querySelector("#amount");

add.onclick = _ => {
    ++num;
    quantity.innerText = num;
    amount.innerText = num * 120;
    

}
less.onclick = _ => {
    if (num == 0) {
    quantity.innerText = num;
    }else {
        --num;
        quantity.innerText = num;
        amount.innerText = num * 120;
        
    }
    
}

// let price = document.getElementById("price");
// let btn = document.querySelector(".btn-Cart");
// let list = document.querySelector(".Product-List");
// let x = localStorage.length;
// // if (localStorage) {
// //         std_num = localStorage.length ;
// // }else{
// //         std_num=0;
// // }

// btn.onclick = (_) => {
//   list.innerHTML += 
//   `
//   <ul> 
//   <li> The Price is : ${price.innerText}
//   </li>
//   </ul>
  

//   x++;
//   localStorage.setItem("price" + x, price.innerText);
// //   price.innerText = "";
//   price.focus();
// };
// function showAll() {
//   list.innerHTML = ``;
//   for (let i = 0; i < localStorage.length; i++) {
//     let data = localStorage.getItem(localStorage.key(i));
//     list.innerHTML += `<li>${data}</li>`;
//   }
// }
// showAll();


let addBtn = document.querySelector(".btn-Cart");
let titleProduct = document.querySelector(".title");
let placeholder = document.querySelector("#Placeholder");
let orderSummary = document.querySelector(".order-Summary");
let price = document.getElementById("price");


addBtn.onclick = _ => {
    placeholder.style.display = "none";
    orderSummary.innerHTML =
    `<div class = "card">
    ${titleProduct.innerText}
    <ul>
    <li>${quantity.innerText}</li>
    <li>${amount.innerText}</li>
    </ul>
    <button id = 'del'> Delet Product</button>
    </div>
    `
}

document.addEventListener("click" , e=> {
    //console.log(e.target);
    if(e.target.id == "del") {
        e.target.parentElement.remove();
        placeholder.style.display = "";
    }
});

