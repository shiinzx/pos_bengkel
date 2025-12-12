
@foreach($categories as $category)
  <h3>{{ $category->name }}</h3>
  <div class="row row-cols-1 row-cols-md-2 g-2">
    @foreach ($products as $product)
      <div class="col">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $product->name }}</h5><br>
                <input type="hidden" name="" class="id_product" value="{{ $product->id}}">
                <h3>{{ $product->price }}</h3>
                <button class="btn-add btn btn-primary">Add</button>
            </div>
        </div>
      </div>
    @endforeach
  </div>
@endforeach