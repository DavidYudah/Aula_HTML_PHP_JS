//Função para informar add produto no carrinho
const botoesComprar = document.querySelectorAll(".botaoComprar");

for (const botao of botoesComprar) {
  botao.addEventListener("click", function() {
    // Função para executar quando o botão for clicado
    alert("Produto adicionado ao carrinho!");
  });
}


// Função para mostrar que a mensagem foi enviada
function alertaEnviar(){
  alert("Sua Mensagem foi enviada com sucesso");
}


const loginForm = document.getElementById('loginForm');

loginForm.addEventListener('submit', (event) => {
    event.preventDefault(); // Evita o envio padrão do formulário

    const email = document.getElementById('email').value;
    const senha = document.getElementById('senha').value;

    // Validação básica (simula autenticação):
    if (email === 'prof.adianefs@gmail.com' && senha === 'senha123') {
        alert('Login realizado com sucesso!');
        // Armazenar o login em sessão ou local storage (opcional)
        window.location.href = 'index_be.html'; // Redirecionar para a próxima página
    } else {
        alert('Credenciais inválidas!');
    }
});



