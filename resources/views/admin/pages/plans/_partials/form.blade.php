@include('admin.includes.alerts')
<div class="form-group">
    <label for="name">Nome:</label>
    <input type="text" name="name" class="form-control" value="{{ $plan->name ?? old('name') }}" placeholder="Nome:">
</div>
<div class="form-group">
    <label for="name">Preço:</label>
    <input type="text" name="price" class="form-control" value="{{ $plan->price ?? old('price') }}" placeholder="Preço:">
</div>
<div class="form-group">
    <label for="description">Descrição:</label>
    <input type="text" name="description" class="form-control" value="{{ $plan->description ?? old('description') }}" placeholder="Descrição:">
</div>
<div class="form-group">
    <button type="submit" class="btn btn-dark">Enviar</button>
</div>