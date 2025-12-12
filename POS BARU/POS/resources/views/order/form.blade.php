@foreach($categories as $category)
<h3>{{ $category->name }}</h3>
<div class="row row-cols-1 row-cols-md-2 g-2">
    @foreach ($category->product as $product)
  <div class="col mb-5">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title mb-2 w-100">{{ $product->name }}</h5>
        <input type="hidden" name="" class="id_product" value="{{ $product->id }}">
        <h3 class="fw-bold mb-3 w-100">Rp {{ number_format ($product->price, 0, ',', '.') }}</h3>
        <button class="btn-add btn btn-primary">Add</button>
    
      </div>
    </div>
  </div>
  @endforeach
</div>
 @endforeach