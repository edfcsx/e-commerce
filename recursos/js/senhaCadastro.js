function verificarSenha(){
    var s2 = document.getElementById('primeiraSenha').value;
    var s1 = document.getElementById('segundaSenha').value;
    var t = document.getElementById('confirmacaoSenha');
    if (s1 == s2){
        t.value = "As senhas são iguais";
    }else {
        t.value = "As senhas não conferem, por favor redigite a senha!";
    }
}
function  erro() {
    var t = document.getElementById('confirmacaoSenha').value;
    var c = "As senhas são iguais";
    if (t != c) {
        alert('As senhas não conferem, por favor redigite a senha!');
    }
}