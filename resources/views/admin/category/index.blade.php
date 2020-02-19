@extends('admin.templates.default')

@section('content')
@include('admin.templates.partials._alerts')
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Category</h3>
            </div>
            <div class="box-body">
                <a href="{{ route('category.create') }}" class="btn btn-primary">Add Category</a>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $page = 1;
                        if (request()->has('page')) {
                        $page = request('page');
                        }

                        $no = config('olshop.pagination') * $page - (config('olshop.pagination') - 1);
                        @endphp

                        @foreach ($categories as $category)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->slug }}</td>
                            <td>{{ $category->description }}</td>
                            <td>
                                <a href="{{ route('category.edit', $category) }}" class="btn btn-warning btn-sm"><i
                                        class="fa fa-edit"></i></a>
                                <button href="{{ route('category.destroy', $category) }}" id="delete"
                                    data-title="{{ $category->title }}" class="btn btn-danger btn-sm">
                                    <i class="fa fa-trash"></i>
                                </button>

                                <form action="" method="post" id="deleteForm">
                                    @csrf
                                    @method("DELETE")
                                    <input type="submit" value="" style="display:none">
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="box-footer clearfix">
                {{ $categories->links('vendor.pagination.adminlte') }}
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="{{ asset('admin_assets/bower_components/sweetalert/dist/sweetalert.min.js') }}">
</script>
<script>
    $('button#delete').on('click', function() {
      let href = $(this).attr('href');
      let title = $(this).data('title'); //diambil dari data title

    // dialog delete
    swal({
        title: "Are you sure to delete this " + title +" category ?",
        text: "Once deleted, you will not be able to recover this category!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                document.getElementById('deleteForm').action = href;
                document.getElementById('deleteForm').submit();
                swal("Your Category has been deleted!", {
                icon: "success",
                });
            }
        });
    });
</script>
@endpush
