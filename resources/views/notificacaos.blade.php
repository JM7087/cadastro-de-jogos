<!-- notificação de erro -->
@error('nome')
    <div class="alert alert-danger" id="mesagem">{{ $message }}</div>
@enderror

<!-- Verifique se há erros para o campo plataforma_id -->
@error('plataforma_id')
    <div class="alert alert-danger" id="mesagem">{{ $message }}</div>
@enderror

<!-- Verifique se há erros para o campo jogo_finalizado -->
@error('jogo_finalizado')
    <div class="alert alert-danger" id="mesagem">{{ $message }}</div>
@enderror

  <!-- notificação de sucesso -->
  @if(session('success'))
  <div class="alert alert-success mt-3" id="mesagem">
      {{ session('success') }}
  </div>
  @endif