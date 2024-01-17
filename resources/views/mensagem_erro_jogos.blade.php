<!-- notificação de erro -->
@error('nome')
    <div class="alert alert-danger" id="mesagem">{{ $message }}</div>
@enderror

<!-- Verifique se há erros para o campo plataforma_id -->
@error('plataforma_id')
    <div class="alert alert-danger" id="mesagem">{{ $message }}</div>
@enderror
