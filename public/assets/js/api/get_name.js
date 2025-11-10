async function carregarNomeUsuario() {

  const resposta = await fetch("/owl-school/api/utils/get_name.php", { method: "POST" });

  const resultado = await resposta.json();

  const spanNome = document.getElementById("userName");

  if (!resultado.user_name) {
    spanNome.innerHTML = "Usuário";
    return;
  }

  spanNome.innerHTML = resultado.user_name;

}

document.addEventListener("DOMContentLoaded", carregarNomeUsuario);
