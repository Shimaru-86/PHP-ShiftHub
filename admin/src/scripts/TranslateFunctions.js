var buscador = "palavra";
var teclado = "portugues";
var direcao = document.getElementById('direcao');
var botaoBuscar = document.getElementById('botaoBuscar');
var verbetesArray = []; // Array para armazenar os dados dos verbetes

function ativaBotaoBuscar() {
  botaoBuscar.innerHTML = 'Buscar';
  botaoBuscar.classList.remove('w3-disabled');
  botaoBuscar.disabled = false;
}

function desativaBotaoBuscar() {
  botaoBuscar.innerHTML = '<i class="fa fa-spinner fa-spin"></i> Buscando...';
  botaoBuscar.classList.add('w3-disabled');
  botaoBuscar.disabled = true;
}

function editarPalavra(idVerbetePk) {
    // Encontrar o verbete pelo idVerbetePk
    var verbeteSelecionado = verbetesArray.find(verbete => verbete.idVerbetePk == idVerbetePk);
  
    if (verbeteSelecionado) {
      /*
      alert('id: ' + verbeteSelecionado.idVerbetePk + '\n' +
        'verbete: ' + verbeteSelecionado.verbete + '\n' +
        'direcao: ' + verbeteSelecionado.direcao + '\n' +
        'texto: ' + verbeteSelecionado.texto);
        */
      document.getElementById("buscadorDeVerbetes").style.display = "none";
      document.getElementById("divEditor").style.display = "block";
      document.getElementById("idVerbete").innerHTML = verbeteSelecionado.idVerbetePk;
      document.getElementById("editorVerbete").value = verbeteSelecionado.verbete;
      document.getElementById("editor").innerHTML = verbeteSelecionado.texto;
    } else {
      alert('Verbete não encontrado!');
    }
}

function buscarPalavra() {
  desativaBotaoBuscar();
  document.getElementById('resultado').innerHTML = '<i class="fa fa-spinner fa-spin"></i> Buscando...';

  var direcao = document.getElementById('direcao').value;
  var palavra = document.getElementById('palavra').value;

  if (palavra.trim() === '') {
    ativaBotaoBuscar();
    document.getElementById('resultado').innerHTML = '<div><h3><strong>Resultado</strong></h3><p class="w3-text-red w3-large">Digite uma palavra para fazer a consulta.</p></div>';
    return;
  }

  var xhr = new XMLHttpRequest();
  xhr.open('POST', '../controllers/BuscarVerbeteEditavel.php', true);
  xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) {
      ativaBotaoBuscar();
      var response = JSON.parse(xhr.responseText);
      var resultHTML = '';

      verbetesArray = response; // Atualizar o array com os dados recebidos

      if (response.length > 0) {
        //Aqui, acrestar os dados recebidos no array.
          resultHTML += '<div><h3><strong>Resultado</strong></h3>';
          response.forEach(function(verbete) {
            resultHTML += '<div><h4 class="w3-brown w3-xlarge w3-hover-blue sh-pointer" onclick="editarPalavra(\'' + verbete.idVerbetePk + '\')">' + verbete.verbete + '</h4><p>' + verbete.texto + '</p></div>';
          });
          resultHTML += '</div>';
      } else {
          resultHTML += '<div><h3><strong>Resultado</strong></h3><p class="w3-text-red w3-large">Nenhum resultado encontrado.</p></div>';
      }

      document.getElementById('resultado').innerHTML = resultHTML;
    }
  };
  xhr.send('palavra=' + encodeURIComponent(palavra) + '&direcao=' + encodeURIComponent(direcao));
}

function analisaTecla(event) {
  if(event.key === "Enter") {
    buscarPalavra();
  }
}