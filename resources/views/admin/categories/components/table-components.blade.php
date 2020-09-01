<table class="table table-bordered card-body">
    <thead>
        <tr>
            <th scope="col">STT</th>
            <th scope="col">Tên danh mục</th>
            <th scope="col">Slug</th>
            <th scope="col">Tùy chọn</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($categories as $key => $data)
        <tr>
            <th scope="row">{{ $key + 1 }}</th>
            <td>{{ $data->name }}</td>
            <td>{{ $data->slug }}</td>
            <td>
                @can('category_edit')
                <button class="btn btn-primary btn-xs test editCatJS" data-toggle="modal"
                    data-target="#editCatModal" data-id="{{ $data->id }}"
                    data-url="{{ route('category.edit',['category' => $data->id]) }}">
                    <i class="fa fa-pencil"></i>
                </button>
                @endcan

                @can('category_delete')
                <button class="btn btn-danger btn-xs delCatJS" data-toggle="modal"
                    data-target="#delCatModal" data-id="{{ $data->id }}"
                    data-name="{{ $data->name }}" ><i class="fa fa-trash-o ">
                </i></button>
                @endcan
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
