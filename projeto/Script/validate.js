const Senha_U = document.getElementById('Senha_U');
const C_Senha = document.getElementById('C_Senha');

function validate(item){
    item.setCustomValidity('');
    item.checkValidity();
    
    if (item == C_Senha){
        if (item.value === Senha_U.value) item.setCustomValidity('');
        else item.setCustomValidity('As senhas digitadas não são iguais.');
    }
}

Senha_U.addEventListener('input', function() {validate(Senha_U)});
C_Senha.addEventListener('input', function() {validate(C_Senha)});