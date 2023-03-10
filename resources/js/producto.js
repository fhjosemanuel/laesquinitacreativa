const inputQuantity = document.querySelector('.input-quantity')
const btnIncrement = document.querySelector('#increment')
const btnDecrement = document.querySelector('#decrement')

let valueByDefault = parseInt(inputQuantity.value)

//funciones de click
btnIncrement.addEventListener('click', () =>{
    valueByDefault += 1
    inputQuantity.value = valueByDefault
})

btnDecrement.addEventListener('click', ()=>{
    if(valueByDefault === 10){
        return
    }
    valueByDefault -= 1
    inputQuantity.value = valueByDefault
})