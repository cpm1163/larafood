@include('admin.includes.alerts')
<div class="form-group">
    <label for="name">Nome:</label>
    <input type="text" name="name" class="form-control" value="{{ $detail->name ?? old('name') }}" placeholder="Nome:">
</div>
<div class="form-group">
    <button type="submit" class="btn btn-outline-dark"><i class="fas fa-paper-plane"></i></button>
</div>