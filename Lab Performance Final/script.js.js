function btn(key) {
 let resultElement = document.getElementById("result");
  let resultPrevElement = document.getElementById("resultPrev");
  let operatorElement = document.getElementById("operator");
  console.log(key);
  if (!isNaN(key)) {
  
  let res = resultElement.innerHTML;
  resultElement.innerHTML = res == 0 ? key : res + key;} 
  
  else if (key == ".") {
  
    indexOperator = resultElement.innerHTML.indexOf("+");
    if (!resultElement.innerHTML.includes("."))
	{
      resultElement.innerHTML += ".";
    } else 
	{
      //dot in the second number
    }
  } else {
    if (key == "+" || key == "-" || key == "*" || key == "/" || key == "=") {
      if (resultElement.innerHTML != "0") {
      switch (key) {
      case "+":
      resultPrevElement.innerHTML =
      Number(resultPrevElement.innerHTML) +
      Number(resultElement.innerHTML);
      case "-":
      resultPrevElement.innerHTML =
      Number(resultPrevElement.innerHTML) +
      Number(resultElement.innerHTML);
      Case "*":
      resultPrevElement.innerHTML =
      Number(resultPrevElement.innerHTML) +
      Number(resultElement.innerHTML);
      case "/":
      resultPrevElement.innerHTML =
      Number(resultPrevElement.innerHTML) +
      Number(resultElement.innerHTML);
        }
      }
    }
  }
}