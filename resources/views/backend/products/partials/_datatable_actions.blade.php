<a href="{{ route('products.show', $product->slug) }}" class="btn btn-success btn-xs"><i
            class="fa fa-link"></i></a>
<a href="{{ route('admin.products.edit', $product->id) }}"
   class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></a>

@if($product->published())
    <form method="POST"
          action="{{ route('admin.products.unpublish', [$product->id]) }}"
          class="inline confirm">
        {{ method_field('delete') }}

        {{ csrf_field() }}
        <button class="btn btn-warning btn-xs"><i class="fa fa-pause"></i></button>
    </form>
@else
    <form method="POST"
          action="{{ route('admin.products.publish', [$product->id]) }}"
          class="inline confirm">
        {{ method_field('patch') }}

        {{ csrf_field() }}
        <button class="btn btn-info btn-xs"><i class="fa fa-play"></i></button>
    </form>
@endif

<form method="POST"
      action="{{ route('admin.products.destroy', [$product->id]) }}"
      class="inline confirm">
    {{ method_field('delete') }}

    {{ csrf_field() }}
    <button class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button>
</form>