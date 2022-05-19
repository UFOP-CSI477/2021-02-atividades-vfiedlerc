let rate1 = document.querySelector(".rate1");
let rate2s = document.querySelector(".rate2");
let resultButton = document.querySelector(".result");
let selects = document.querySelectorAll(".options select");
let select1 = selects[0];
let select2 = selects[1];
let inputs = document.querySelectorAll(".input input");
let input1 = inputs[0];
let input2 = inputs[1];

let rates ={};
let requestURL = "https://api.exchangerate.host/latest?base=USD";

fetchDados();

async function fetchDados(){
  let res = await fetch(requestURL);
  res = await res.json();  
  rates = res.rates;
  populateOptions();
}

function populateOptions(){
  let valor = "";
  Object.keys(rates).forEach((code) =>{
    let str = `<option value = "${code}"> ${code}</option>`;
    valor += str;

  })
  selects.forEach((s) => (s.innerHTML = valor));


}

function converte (valor, from, to){

  let v =(valor/rates[from]) * rates[to];
  let v1 = v.toFixed(3);
  return v1 = 0.0? v.toFixed(5): v1;

}

function displayRate(){

  let v1 = select1.value;
  let v2 = select2.value;
  let val = convert(1, v1, v2);

  rate1.innerHTML = `1 ${v1} equals`;
  rate2s.innerHTML= `${val} ${v2}`;

}


resultButton.addEventListener("click", ()=>{
  let fromCurr = select1.value;
  let fromValue = parseFloat(input1.value);
  let toCurr = select2.value;
  if(isNaN(fromValue)){
    alert("Digite um número: ");

  }else{
    let CurrValue = converte(fromValue, fromCurr, toCurr);
    input2.value = CurrValue;
  }
});


selects.forEach(s=>s.addEventListener("change", displayRate));

document.querySelector(".swap").addEventListener("click", ()=>{
  let inpt1 = input1.value;
  let inpt2 = input2.value;
  let opt1 = select1.value;
  let opt2 = select2.value;

  input2.value = inpt1;
  input2.value = inpt2;

  select2.value = opt1;
  select1.value = opt2;

  displayRate();

})