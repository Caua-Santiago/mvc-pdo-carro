// INICIALIZAÇÃO DA PÁGINA
document.addEventListener("DOMContentLoaded", function () {
  // Carrega a tabela ao abrir a página
  listarCarro();

  // Quando clicar em Salvar, executa salvarCarro()
  document
    .getElementById("formCarro")
    .addEventListener("submit", salvarCarro);
});

// LISTAR CARROS (READ)
async function listarCarro() {
  const resposta = await fetch("CarroController.php?acao=listar", {
    method: "GET",
  });
  const resultado = await resposta.json();

  //TODO: dar console.table

  const tabela = document.getElementById("tabelaCarros");
  tabela.innerHTML = "";

  resultado.dados.forEach(function (carro) {
    tabela.innerHTML += `
        <tr>
          <td>${carro.id_carro}</td>
          <td>${carro.modelo}</td>
          <td>${carro.placa}</td>
  
          <td>
            <button  class="btn btn-warning btn-sm" onclick="editarCarro(${carro.id_carro})">
              Editar
            </button>
  
            <button class="btn btn-danger btn-sm"onclick="excluirCarro(${carro.id_carro})">
              Excluir
            </button>
          </td>
        </tr>
      `;
  });
}

// SALVAR CARRO
// CADASTRAR OU EDITAR CREATE/UPDATE
async function salvarCarro(event) {
  // Impede o recarregamento da página
  event.preventDefault();

  // Captura os dados do formulário
  const formulario = document.getElementById("formCarro");
  const dados = new FormData(formulario);

  // Envia os dados para o Controller
  const resposta = await fetch("carroController.php?acao=cadastrar", {
    method: "POST",
    body: dados,
  });

  // Recebe a resposta do PHP
  const resultado = await resposta.json();

  // Exibe a mensagem
  alert(resultado.mensagem);

  // Se salvou com sucesso...
  if (resultado.sucesso == true) {
    //Reseta o formulário para novo cadastro
    limparFormCarro();

    // Atualiza a tabela
    listarCarro();
  }
}

// NOVO CARRO (LIMPA O FORMULÁRIO E PREPARA PARA CADASTRO)
function limparFormCarro() {
  document.getElementById("formCarro").reset();
  document.getElementById("id").value = "";
  document.getElementById("acao").value = "cadastrar";
  document.getElementById("tituloFormulario").textContent = "Novo Carro";
}

// EDITAR CARRO (UPDATE)
async function editarCarro(id) {
  // Busca o projeto pelo ID
  const resposta = await fetch(`carroController.php?acao=buscar&id_carro=${id}`, {
    method: "GET",
  });
  const resultado = await resposta.json();
  const carro = resultado.dados;

  // Preenche o formulário
  document.getElementById("id").value = carro.id_carro;
  document.getElementById("modelo").value = carro.modelo;
  document.getElementById("placa").value = carro.placa;

  // Altera a ação para editar
  document.getElementById("acao").value = "editar";

  // Muda o título
  document.getElementById("tituloFormulario").textContent = "Editar Carro";

  // Posiciona o cursor no nome
  document.getElementById("modelo").focus();
}

// EXCLUIR CARRO (DELETE)
async function excluirCarro(id) {
  // Confirma a exclusão
  if (!confirm("Deseja excluir este carro?")) {
    return;
  }

  // Cria os dados da requisição
  const dados = new FormData();
  dados.append("acao", "excluir");
  dados.append("id_carro", id);

  // Envia para o Controller
  const resposta = await fetch("carroController.php", {
    method: "POST",
    body: dados,
  });

  // Recebe a resposta
  const resultado = await resposta.json();

  // Exibe a mensagem
  alert(resultado.mensagem);

  // Atualiza a tabela
  listarCarro();
} 