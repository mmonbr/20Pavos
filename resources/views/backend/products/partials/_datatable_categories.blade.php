@foreach($product->categories as $category)
    <span class="label label-default">{{ $category->name }}</span>
@endforeach