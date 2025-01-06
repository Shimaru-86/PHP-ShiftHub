document.addEventListener('DOMContentLoaded', function () {
  const editor = document.getElementById('editor');
  const fontSelector = document.getElementById('fontSelector');
  const fontSizeButtons = document.querySelectorAll('[data-size]');
  const boldButton = document.getElementById('boldButton');
  const italicButton = document.getElementById('italicButton');
  const underlineButton = document.getElementById('underlineButton');
  const symbolButton = document.getElementById('symbolButton');
  const supButton = document.getElementById('supButton');
  const undoButton = document.getElementById('undoButton');
  const redoButton = document.getElementById('redoButton');
  const previewButton = document.getElementById('previewButton');
  const saveButton = document.getElementById('saveButton');
  const output = document.getElementById('output');
  const preview = document.getElementById('preview');
  const verbete = document.getElementById('verbete');

  //Ativar ou desativar o corretor
  const spellCheckerButton = document.getElementById('spellCheckerButton');
  let spellCheckerEnabled = true;

  spellCheckerButton.addEventListener('click', function () {
    spellCheckerEnabled = !spellCheckerEnabled;
    editor.setAttribute('spellcheck', spellCheckerEnabled);
    spellCheckerButton.querySelector('i').classList.toggle('fa-toggle-on', spellCheckerEnabled);
    spellCheckerButton.querySelector('i').classList.toggle('fa-toggle-off', !spellCheckerEnabled);
  });

  function applyStyleToSelection(styleProperty, value) {
    document.execCommand('styleWithCSS', false, true);
    document.execCommand(styleProperty, false, value);
  }

  function applyInlineStyleToSelection(property, value) {
    const sel = window.getSelection();
    if (sel.rangeCount) {
      const range = sel.getRangeAt(0).cloneRange();
      const span = document.createElement('span');
      span.style[property] = value;
      range.surroundContents(span);
      sel.removeAllRanges();
      sel.addRange(range);
    }
  }

  fontSelector.addEventListener('change', function () {
    applyStyleToSelection('fontName', this.value);
  });

  fontSizeButtons.forEach(button => {
    button.addEventListener('click', function () {
      applyInlineStyleToSelection('fontSize', this.dataset.size);
    });
  });

  boldButton.addEventListener('click', function () {
    applyStyleToSelection('bold', null);
  });

  italicButton.addEventListener('click', function () {
    applyStyleToSelection('italic', null);
  });

  underlineButton.addEventListener('click', function () {
    applyStyleToSelection('underline', null);
  });

  symbolButton.addEventListener('click', function () {
    const span = document.createElement('span');
    span.className = 'font-14 symbol';
    span.textContent = '·';
    insertNodeAtCursor(span);
  });

  supButton.addEventListener('click', function () {
    applyStyleToSelection('superscript', null);
  });

  undoButton.addEventListener('click', function () {
    document.execCommand('undo', false, null);
  });

  redoButton.addEventListener('click', function () {
    document.execCommand('redo', false, null);
  });

  function insertNodeAtCursor(node) {
    const sel = window.getSelection();
    if (sel.rangeCount > 0) {
      const range = sel.getRangeAt(0);
      range.deleteContents();
      range.insertNode(node);
      range.collapse(false);
      sel.removeAllRanges();
      sel.addRange(range);
    }
  }

  previewButton.addEventListener('click', function () {
    const content = editor.innerHTML;
    output.value = content;
    verbete.innerText = document.getElementById("editorVerbete").value;
    preview.innerHTML = content;
  });

  saveButton.addEventListener('click', function () {
    //Prepara os dados para envio.
    const content = editor.innerHTML;
    const idVerbete = parseInt(document.getElementById('idVerbete').innerText, 10);
    const verbete = document.getElementById('editorVerbete').value;
    const direcao = document.getElementById('direcao').value;

    //Se o verbete estiver vazio, cancela a operação de salvar ou atualizar.
    if(verbete == "") {
      showModal("modalAlert", "O nome do verbete está vazio.");
      return;
    }

    //Exige que Pré-Visualize antes de Salvar/Atualizar
    if(output.value == "") {
      showModal("modalAlert", `Clique em Pré-Visualizar antes de ${document.getElementById('saveButton').innerText} e garanta que tenha algum conteúdo para o verbete.`);
      return;
    }

    if (confirm(`Deseja ${document.getElementById('saveButton').innerText}: '${verbete}'?`)) {
      const xhr = new XMLHttpRequest();
      xhr.open('POST', '../controllers/SalvarAtualizarVerbete.php', true);
      xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
      xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
          const response = JSON.parse(xhr.responseText);

          if (response.success) {
            // Atualizar o ID do verbete no HTML se for um novo verbete
            if (response.idVerbetePk) {
              const idVerbeteElement = document.getElementById("idVerbete");
              if (idVerbeteElement) {
                  idVerbeteElement.innerText = response.idVerbetePk; // Atualiza o valor do campo idVerbete com o novo ID
                  document.getElementById('saveButton').innerText = "Atualizar Verbete";
              } else {
                  showModal("modalError", "Erro ao mostrar o novo número de Id. Elemento com ID 'idVerbete' não encontrado. Recomendo que feche a janela de edição do verbete e abra novamente.");
              }
          }
            //Exibir mensagem de sucesso.
            showModal("modalNews", "Mensagem: " + response.message);
          } else {
            //Exibir mensagem de erro.
            showModal("modalError", "Erro ao atualizar verbete: " + response.message)
          }
        }
      };
      xhr.send(`idVerbetePk=${encodeURIComponent(idVerbete)}&verbete=${encodeURIComponent(verbete)}&direcao=${encodeURIComponent(direcao)}&texto=${encodeURIComponent(content)}`);
    }
  });

});