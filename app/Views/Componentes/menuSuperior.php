<nav class="menuSuperior">
    <div class="caixaOpcoes">
        <a href="">Estoque</a>
        <a href="">Funcionarios</a>
        <a href="">Dashboard</a>
    </div>
    <div class="caixaSair">
        <a href="" onclick="sair()">Sair</a>
    </div>
</nav>

<script>
function sair() {
    event.preventDefault();
    fetch('<?= BASE_URL ?>logout', {
        method: 'POST'
    }).then(response =>{
        window.location.href = response.url;
    })
}
</script>