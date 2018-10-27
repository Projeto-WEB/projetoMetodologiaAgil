function VerificaCPF() {
  if (vercpf(document.formulario.cpf.value))
    errors = "0";
  else {
    errors = "1";
    if (errors) alert('CPF INVALIDO');
    document.retorno = (errors == '');
    document.getElementById('cpf').value = '';
  }
}

function vercpf(cpf) {
  if (cpf.length != 11 || cpf == "00000000000" || cpf == "11111111111" || cpf == "22222222222" || cpf == "33333333333" || cpf == "44444444444" || cpf == "55555555555" || cpf == "66666666666" || cpf == "77777777777" || cpf == "88888888888" || cpf == "99999999999")
    return false;
  add = 0;
  for (i = 0; i < 9; i++)
    add += parseInt(cpf.charAt(i)) * (10 - i);
  rev = 11 - (add % 11);
  if (rev == 10 || rev == 11)
    rev = 0;
  if (rev != parseInt(cpf.charAt(9)))
    return false;
  add = 0;
  for (i = 0; i < 10; i++)
    add += parseInt(cpf.charAt(i)) * (11 - i);
  rev = 11 - (add % 11);
  if (rev == 10 || rev == 11)
    rev = 0;
  if (rev != parseInt(cpf.charAt(10)))
    return false;
  //alert('CPF VÁLIDO.');
  return true;
}

function nu(campo) {
  var digits = "0123456789"
  var campo_temp
  for (var i = 0; i < campo.value.length; i++) {
    campo_temp = campo.value.substring(i, i + 1)
    if (digits.indexOf(campo_temp) == -1) {
      campo.value = campo.value.substring(0, i);
      break;
    }
  }
}

function ValRG() {
  var numero = document.getElementById('rg').value
  var numero = numero.split("");
  tamanho = numero.length;
  vetor = new Array(tamanho);

  if (tamanho >= 1) {
    vetor[0] = parseInt(numero[0]) * 2;
  }
  if (tamanho >= 2) {
    vetor[1] = parseInt(numero[1]) * 3;
  }
  if (tamanho >= 3) {
    vetor[2] = parseInt(numero[2]) * 4;
  }
  if (tamanho >= 4) {
    vetor[3] = parseInt(numero[3]) * 5;
  }
  if (tamanho >= 5) {
    vetor[4] = parseInt(numero[4]) * 6;
  }
  if (tamanho >= 6) {
    vetor[5] = parseInt(numero[5]) * 7;
  }
  if (tamanho >= 7) {
    vetor[6] = parseInt(numero[6]) * 8;
  }
  if (tamanho >= 8) {
    vetor[7] = parseInt(numero[7]) * 9;
  }
  if (tamanho >= 9) {
    vetor[8] = parseInt(numero[8]) * 100;
  }

  total = 0;

  if (tamanho >= 1) {
    total += vetor[0];
  }
  if (tamanho >= 2) {
    total += vetor[1];
    4324234
  }
  if (tamanho >= 3) {
    total += vetor[2];
  }
  if (tamanho >= 4) {
    total += vetor[3];
  }
  if (tamanho >= 5) {
    total += vetor[4];
  }
  if (tamanho >= 6) {
    total += vetor[5];
  }
  if (tamanho >= 7) {
    total += vetor[6];
  }
  if (tamanho >= 8) {
    total += vetor[7];
  }
  if (tamanho >= 9) {
    total += vetor[8];
  }

  resto = total % 11;
  if (resto != 0) {
    alert('RG INVALIDO.');
    document.getElementById('rg').value = '';
  } //else {
  //alert('RG VÁLIDO.');
  //}

}

function mostrarCamposDeficiencia() {
  document.getElementById("lb-cid").style.visibility = "visible";
  document.getElementById('cid').style.display = "inline-block";
}

function esconderCamposDeficiencia() {
  document.getElementById("lb-cid").style.visibility = "hidden";
  document.getElementById('cid').style.display = "none";
}

function validarEmail(email) {
  usuario = email.value.substring(0, email.value.indexOf("@"));
  dominio = email.value.substring(email.value.indexOf("@") + 1, email.value.length);

  if ((usuario.length >= 1) &&
    (dominio.length >= 3) &&
    (usuario.search("@") == -1) &&
    (dominio.search("@") == -1) &&
    (usuario.search(" ") == -1) &&
    (dominio.search(" ") == -1) &&
    (dominio.search(".") != -1) &&
    (dominio.indexOf(".") >= 1) &&
    (dominio.lastIndexOf(".") < dominio.length - 1)) {} else {
    alert("E-mail invalido");
  }
}
