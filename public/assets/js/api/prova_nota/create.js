let idProvaAtual = null;
let idAlunoAtual = null;


async function abrirModalCriarNota(provaId, alunoId) {

  idProvaAtual = provaId;
  idAlunoAtual = alunoId;

  const elementoModal = document.getElementById("createNotaModal");
  const modal = new bootstrap.Modal(elementoModal);
  modal.show();

  document.getElementById("create_nota").value = "";
}


async function salvarCriacaoNota() {

  let nota = document.getElementById("create_nota").value;

  nota = nota.replace(",", ".");


  const formularioDados = new FormData();

  formularioDados.append("prova_id", idProvaAtual);
  formularioDados.append("aluno_id", idAlunoAtual);
  formularioDados.append("nota", nota);


  const resposta = await fetch("/afonso/owl-school/api/prova_nota/create.php", {
    method: "POST",
    body: formularioDados

  });


  const resultado = await resposta.json();


  if (resultado.success) {

    alert("Nota lançada com sucesso!");

    if (typeof listarNotasDaProva === "function") {listarNotasDaProva(idProvaAtual);}

    const modal = bootstrap.Modal.getInstance(document.getElementById("createNotaModal"));
    modal.hide();

  } else {
    alert("Erro ao criar nota: " + (resultado.message || "erro desconhecido."));
  }
}


document.getElementById("btnSalvarNota").addEventListener("click", salvarCriacaoNota);
