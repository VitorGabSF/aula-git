<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Entrar</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,500;9..144,600&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
<style>
  :root{
    --ink: #0e0d0c;
    --paper: #f6f3ee;
    --brass: #b08d57;
    --brass-bright: #d4ac6e;
    --line: rgba(246,243,238,0.14);
    --muted: rgba(246,243,238,0.55);
    --error: #e0665a;
  }
  *{ box-sizing:border-box; margin:0; padding:0; }
  html,body{ height:100%; }
  body{
    background: var(--ink);
    color: var(--paper);
    font-family: 'Inter', sans-serif;
    display:flex;
    align-items:center;
    justify-content:center;
    min-height:100vh;
    padding: 24px;
    position: relative;
    overflow:hidden;
  }

  /* textura sutil de fundo tipo "vinheta de cofre" */
  body::before{
    content:"";
    position:absolute;
    inset:0;
    background:
      radial-gradient(circle at 50% 0%, rgba(176,141,87,0.10), transparent 55%),
      radial-gradient(circle at 100% 100%, rgba(176,141,87,0.06), transparent 50%);
    pointer-events:none;
  }

  .card{
    position:relative;
    width:100%;
    max-width: 400px;
    background: linear-gradient(180deg, rgba(255,255,255,0.03), rgba(255,255,255,0));
    border: 1px solid var(--line);
    border-radius: 2px;
    padding: 48px 40px 40px;
    backdrop-filter: blur(6px);
  }

  /* moldura tipo "selo" nos cantos */
  .card::before, .card::after{
    content:"";
    position:absolute;
    width:14px;
    height:14px;
    border: 1px solid var(--brass);
    opacity:0.6;
  }
  .card::before{ top:-1px; left:-1px; border-right:none; border-bottom:none; }
  .card::after{ bottom:-1px; right:-1px; border-left:none; border-top:none; }

  .eyebrow{
    font-size: 11px;
    letter-spacing: 0.22em;
    text-transform: uppercase;
    color: var(--brass-bright);
    margin-bottom: 18px;
    display:flex;
    align-items:center;
    gap: 10px;
  }
  .eyebrow::before{
    content:"";
    width:18px; height:1px;
    background: var(--brass);
    display:inline-block;
  }

  h1{
    font-family:'Fraunces', serif;
    font-weight: 500;
    font-size: 34px;
    line-height:1.15;
    letter-spacing: -0.01em;
    margin-bottom: 8px;
  }
  h1 em{
    font-style: italic;
    color: var(--brass-bright);
  }

  .sub{
    color: var(--muted);
    font-size: 14px;
    line-height:1.5;
    margin-bottom: 34px;
  }

  form{ display:flex; flex-direction:column; gap:20px; }

  .field{ position:relative; }
  .field label{
    display:block;
    font-size: 11px;
    letter-spacing: 0.08em;
    text-transform: uppercase;
    color: var(--muted);
    margin-bottom: 8px;
  }
  .field input{
    width:100%;
    background: transparent;
    border: none;
    border-bottom: 1px solid var(--line);
    color: var(--paper);
    font-family:'Inter', sans-serif;
    font-size: 15px;
    padding: 8px 2px 10px;
    outline: none;
    transition: border-color 0.25s ease;
  }
  .field input::placeholder{ color: rgba(246,243,238,0.25); }
  .field input:focus{
    border-color: var(--brass-bright);
  }
  .field input:focus-visible{
    outline: 2px solid var(--brass-bright);
    outline-offset: 4px;
  }

  .field.error input{ border-color: var(--error); }
  .error-msg{
    font-size:12px;
    color: var(--error);
    margin-top:6px;
    display:none;
  }
  .field.error .error-msg{ display:block; }

  .row{
    display:flex;
    align-items:center;
    justify-content:space-between;
    font-size: 13px;
    color: var(--muted);
  }
  .remember{ display:flex; align-items:center; gap:8px; cursor:pointer; user-select:none; }
  .remember input{
    appearance:none;
    width:14px; height:14px;
    border:1px solid var(--line);
    background:transparent;
    cursor:pointer;
    position:relative;
    flex-shrink:0;
  }
  .remember input:checked{
    background: var(--brass);
    border-color: var(--brass);
  }
  .remember input:checked::after{
    content:"";
    position:absolute;
    left:4px; top:1px;
    width:4px; height:8px;
    border: solid var(--ink);
    border-width: 0 1.5px 1.5px 0;
    transform: rotate(45deg);
  }
  a.link{
    color: var(--brass-bright);
    text-decoration:none;
    border-bottom: 1px solid transparent;
    transition: border-color 0.2s ease;
  }
  a.link:hover{ border-color: var(--brass-bright); }

  button.submit{
    margin-top: 10px;
    background: var(--brass);
    color: var(--ink);
    border: none;
    padding: 14px;
    font-family:'Inter', sans-serif;
    font-weight: 600;
    font-size: 14px;
    letter-spacing: 0.03em;
    text-transform: uppercase;
    cursor: pointer;
    transition: background 0.2s ease, transform 0.15s ease;
    position: relative;
    overflow:hidden;
  }
  button.submit:hover{ background: var(--brass-bright); }
  button.submit:active{ transform: scale(0.98); }
  button.submit:focus-visible{
    outline: 2px solid var(--brass-bright);
    outline-offset: 3px;
  }
  button.submit.loading{ color: transparent; pointer-events:none; }
  button.submit.loading::after{
    content:"";
    position:absolute;
    left:50%; top:50%;
    width:16px; height:16px;
    margin:-8px 0 0 -8px;
    border: 2px solid rgba(14,13,12,0.3);
    border-top-color: var(--ink);
    border-radius:50%;
    animation: spin 0.7s linear infinite;
  }
  @keyframes spin{ to{ transform: rotate(360deg); } }

  .divider{
    display:flex;
    align-items:center;
    gap:14px;
    color: var(--muted);
    font-size: 11px;
    text-transform: uppercase;
    letter-spacing: 0.12em;
    margin: 30px 0 22px;
  }
  .divider::before, .divider::after{
    content:"";
    flex:1;
    height:1px;
    background: var(--line);
  }

  .foot{
    text-align:center;
    font-size: 13px;
    color: var(--muted);
    margin-top: 28px;
  }

  @media (prefers-reduced-motion: reduce){
    *{ animation:none !important; transition:none !important; }
  }

  @media (max-width: 420px){
    .card{ padding: 40px 26px 32px; }
    h1{ font-size: 28px; }
  }
</style>
</head>
<body>

  <div class="card">
    <div class="eyebrow">Acesso restrito</div>
    <h1>Boa te ver <em>de novo</em>.</h1>
    <p class="sub">Entre com suas credenciais para continuar de onde parou.</p>

    <form id="loginForm" novalidate action="<?php BASE_URL ?>"login method="POST">
        <input type="hidden" name="csrf_token" value="<?php htmlspecialchars(Core\Auth::csrfToken(), ENT_QUOTES, 'UTF-8') ?>">
      <div class="field" id="emailField">
        <label for="email">E-mail</label>
        <input type="email" id="email" placeholder="voce@exemplo.com" autocomplete="email" required>
        <div class="error-msg">Digite um e-mail válido.</div>
      </div>

      <div class="field" id="passField">
        <label for="senha">Senha</label>
        <input type="senha" id="senha" placeholder="••••••••" autocomplete="current-password" required>
        <div class="error-msg">A senha precisa ter pelo menos 6 caracteres.</div>
      </div>

      <div class="row">
        <label class="remember">
          <input type="checkbox" id="remember">
          Lembrar de mim
        </label>
        <a href="#" class="link">Esqueceu a senha?</a>
      </div>

      <button type="submit" class="submit" id="submitBtn">Entrar</button>
    </form>

    <div class="divider">ou</div>

    <div class="foot">
      Ainda não tem conta? <a href="#" class="link">Criar conta</a>
    </div>
  </div>

<script>
  const form = document.getElementById('loginForm');
  const emailField = document.getElementById('emailField');
  const passField = document.getElementById('passField');
  const emailInput = document.getElementById('email');
  const passInput = document.getElementById('password');
  const btn = document.getElementById('submitBtn');

  function validEmail(v){
    return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(v);
  }

  form.addEventListener('submit', function(e){
    e.preventDefault();
    let ok = true;

    if(!validEmail(emailInput.value)){
      emailField.classList.add('error');
      ok = false;
    } else {
      emailField.classList.remove('error');
    }

    if(passInput.value.length < 6){
      passField.classList.add('error');
      ok = false;
    } else {
      passField.classList.remove('error');
    }

    if(!ok) return;

    btn.classList.add('loading');
    setTimeout(() => {
      btn.classList.remove('loading');
      btn.textContent = 'Entrando…';
    }, 900);
  });

  [emailInput, passInput].forEach(inp => {
    inp.addEventListener('input', () => {
      inp.closest('.field').classList.remove('error');
    });
  });
</script>

</body>
</html>