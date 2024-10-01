const form = document.getElementById('form');
const input = document.querySelectorAll('.input');
const spanImput = document.querySelectorAll('.span');

function validaForm(){

  //////NOME
if(input[0].value === ""){
        input[0].style="border-bottom: 5px solid red";
        spanImput[0].innerHTML="Este campo não pode ser vazio";
        spanImput[0].style="color:red";
        input[0].focus();
        return false;
    }else{
        input[0].style="border-bottom: 5px solid green";
        spanImput[0].innerHTML="OK!";
        spanImput[0].style="color:green";
    }

 ////// UF
if(input[1].value === ""){
      spanImput[1].innerHTML="Este campo não pode ser vazio";
      spanImput[1].style="color:red";
      input[1].focus();
      return false;
  }else{
    input[1].style="border-bottom: 5px solid green";
    spanImput[1].innerHTML="OK!";
    spanImput[1].style="color:green";
}

  //////cidade
if(input[2].value === ""){
    input[2].style="border-bottom: 5px solid red";
    spanImput[2].innerHTML="Este campo não pode ser vazio";
    spanImput[2].style="color:red";
    input[2].focus();
    return false;
}else{ 
    input[2].style="border-bottom: 5px solid green";
    spanImput[2].innerHTML="OK!";
    spanImput[2].style="color:green";
}

  //////bairro
  if(input[3].value === ""){
    input[3].style="border-bottom: 5px solid red";
    spanImput[3].innerHTML="Este campo não pode ser vazio";
    spanImput[3].style="color:red";
    input[3].focus();
    return false;
}else{ 
    input[3].style="border-bottom: 5px solid green";
    spanImput[3].innerHTML="OK!";
    spanImput[3].style="color:green";
}

  //////logradouro
if(input[4].value === ""){
    input[4].style="border-bottom: 5px solid red";
    spanImput[4].innerHTML="Este campo não pode ser vazio";
    spanImput[4].style="color:red";
    input[4].focus();
    return false;
}else{ 
    input[4].style="border-bottom: 5px solid green";
    spanImput[4].innerHTML="OK!";
    spanImput[4].style="color:green";
}

/////// numero
  if(input[5].value === ""){
    input[5].style="border-bottom: 5px solid red";
    spanImput[5].innerHTML="Este campo não pode ser vazio";
    spanImput[5].style="color:red";
    input[5].focus();
    return false;
}else {
    input[5].style="border-bottom: 5px solid green";
    spanImput[5].innerHTML="OK!";
    spanImput[5].style="color:green";
}


  ////// Complemento
  if(input[6].value === ""){
    input[6].style="border-bottom: 5px solid red";
    spanImput[6].innerHTML="Este campo não pode ser vazio";
    spanImput[6].style="color:red";
    input[6].focus();
    return false;
  }else{
      input[6].style="border-bottom: 5px solid green";
      spanImput[6].innerHTML="OK!";
      spanImput[6].style="color:green";
  }

  ////// contato
  if(input[7].value === ""){
    input[7].style="border-bottom: 5px solid red";
    spanImput[7].innerHTML="Este campo não pode ser vazio";
    spanImput[7].style="color:red";
    input[7].focus();
    return false;
  }else{
      input[7].style="border-bottom: 5px solid green";
      spanImput[7].innerHTML="OK!";
      spanImput[7].style="color:green";
  }

  ////// ult_pag
  if(input[8].value === ""){
    input[8].style="border-bottom: 5px solid red";
    spanImput[8].innerHTML="Este campo não pode ser vazio";
    spanImput[8].style="color:red";
    input[8].focus();
    return false;
  }else{
      input[8].style="border-bottom: 5px solid green";
      spanImput[8].innerHTML="OK!";
      spanImput[8].style="color:green";
  }


   ////// conta milka
   if(input[9].value === ""){
    input[9].style="border-bottom: 5px solid red";
    spanImput[9].innerHTML="Este campo não pode ser vazio";
    spanImput[9].style="color:red";
    input[9].focus();
    return false;
  }else{
      input[9].style="border-bottom: 5px solid green";
      spanImput[9].innerHTML="OK!";
      spanImput[9].style="color:green";
  }

    ////// senha milka
    if(input[10].value === ""){
      input[10].style="border-bottom: 5px solid red";
      spanImput[10].innerHTML="Este campo não pode ser vazio";
      spanImput[10].style="color:red";
      input[10].focus();
      return false;
    }else{
        input[10].style="border-bottom: 5px solid green";
        spanImput[10].innerHTML="OK!";
        spanImput[10].style="color:green";
    }
}


  ///// MASCARAS

  //////////////// celular ///////////////////

  function mask(o, f) {
    setTimeout(function() {
      var v = mphone(o.value);
      if (v != o.value) {
        o.value = v;
      }
    }, 1);
  }
  
  function mphone(v) {
    var r = v.replace(/\D/g, "");
    r = r.replace(/^0/, "");
    if (r.length > 10) {
      r = r.replace(/^(\d\d)(\d{5})(\d{4}).*/, "($1) $2-$3");
    } else if (r.length > 5) {
      r = r.replace(/^(\d\d)(\d{4})(\d{0,4}).*/, "($1) $2-$3");
    } else if (r.length > 2) {
      r = r.replace(/^(\d\d)(\d{0,5})/, "($1) $2");
    } else {
      r = r.replace(/^(\d*)/, "($1");
    }
    return r;
  }