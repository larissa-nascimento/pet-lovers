document.getElementById('loginForm').addEventListener('submit', function(event) {
    event.preventDefault();
    
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;

    // Validação básica (exemplo)
    if (email === "" || password === "") {
        alert("Por favor, preencha todos os campos.");
    }}
);
