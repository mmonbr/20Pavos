<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Attachments</h3>
    </div>

    <div class="box-body">
        <div class="row">
            <div class="col-md-6">
                <table id="attachments" class="table table-hover">
                    <tr>
                        <th>Thumbnail</th>
                        <th>Order</th>
                        <th>Move</th>
                        <th>Actions</th>
                    </tr>
                    @foreach($attachments as $attachment)
                        <tr>
                            <td>
                                <a href="{{ cdn_file($attachment->url) }}" target="_blank"><img height="64px"
                                                                                                width="64px"
                                                                                                src="{{ cdn_file($attachment->path) }}"></a>
                            </td>
                            <td>
                                {{ $attachment->order }}
                            </td>
                            <td>
                                <form method="POST"
                                      action="{{ route('admin.products.attachments.move', [$product->id, $attachment->id]) }}"
                                      class="inline">

                                    {{ csrf_field() }}

                                    <input type="hidden" name="action" value="up">

                                    <button class="btn btn-default"><i class="fa fa-arrow-up"></i></button>
                                </form>
                                <form method="POST"
                                      action="{{ route('admin.products.attachments.move', [$product->id, $attachment->id]) }}"
                                      class="inline">

                                    {{ csrf_field() }}

                                    <input type="hidden" name="action" value="down">

                                    <button class="btn btn-default"><i class="fa fa-arrow-down"></i></button>
                                </form>
                            </td>
                            <td>
                                <form method="POST"
                                      action="{{ route('admin.products.attachments.delete', [$product->id, $attachment->id]) }}"
                                      class="inline">
                                    {{ method_field('delete') }}

                                    {{ csrf_field() }}
                                    <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
            <div class="col-md-6">
                <form id="attachment-upload" action="{{ route('admin.products.attachments.store', $product->id) }}"
                      class="dropzone"
                      enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="fallback">
                        <input name="file" type="file" multiple/>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@section('scripts')
    <script>
        // This example uses jQuery so it creates the Dropzone, only when the DOM has
        // loaded.

        // Disabling autoDiscover, otherwise Dropzone will try to attach twice.
        Dropzone.autoDiscover = false;
        // or disable for specific dropzone:
        // Dropzone.options.myDropzone = false;

        $(function () {
            // Now that the DOM is fully loaded, create the dropzone, and setup the
            // event listeners
            var myDropzone = new Dropzone('#attachment-upload');
            myDropzone.on("success", function (file) {
                var response = JSON.parse(file.xhr.response);

                $('#attachments').find('> tbody').append(
                        '<tr>'
                        + '<td>'
                        + '<a href="' + response.path + '" target="_blank"><img height="64px" width="64px" src="' + response.path + '"></a>'
                        + '</td>'
                        + '<td>'
                        + response.order
                        + '</td>'
                        + '<td>'
                        + '---- REFRESH ----'
                        + '</td>'
                        + '<td>'
                        + '---- REFRESH ----'
                        + '</td>'
                        + '</tr>'
                ).fadeIn();
            });
        })
    </script>
@endsection