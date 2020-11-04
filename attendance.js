function CountFun(x)
  {
    var c = "c" + x.toString();
    var t = "t" + x.toString();
    var k = "k" + x.toString();
    document.getElementById(c).innerHTML = Math.floor((parseInt(document.getElementById(t).value)/(parseInt(document.getElementById(t).value)+parseInt(document.getElementById(k).value)))*100);
  }