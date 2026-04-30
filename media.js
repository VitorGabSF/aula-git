function media(){
    let nome = document.getElementById("").value ;
    let not1 = Number(document.getElementById("").value) ;
    let not2 = Number(document.getElementById("").value) ;
    let not3 = Number(document.getElementById("").value) ;
    let not4 = Number(document.getElementById("").value) ;

    let soma = not1 + not2 + not3 + not4
    let media = soma / 4

    document.getElementById("").innerText = "Aluno " + nome
    document.getElementById("").innerText = "Possui uma média no 1°Bimestre de " + not1
    document.getElementById("").innerText = "Possui uma média no 2°Bimestre de " + not2
    document.getElementById("").innerText = "Possui uma média no 3°Bimestre de " + not3
    document.getElementById("").innerText = "Possui uma média no 4°Bimestre de " + not4
    document.getElementById("").innerText = "Possui uma média final de " + media
}