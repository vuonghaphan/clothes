<div class="content-panel">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Tên sản phẩm</th>
                <th scope="col">Slug</th>
                <th scope="col">Danh mục</th>
                <th scope="col">Ảnh</th>
                <th scope="col">Trạng thái </th>
                <th scope="col">Nổi bật </th>
                <th scope="col">Tùy chọn</th>
            </tr>
        </thead>
        @foreach ($product as $key => $data)
        <tbody>
            <tr class="rowTable{{ $data->id }}">
                <th scope="row">{{ $key + 1 }}</th>
                <td>{{ $data->name }}</td>
                <td>{{ $data->slug }}</td>
                <td>{{ $data->category->name }}</td>
                <td>
                    <img width="100px" height="130px" src="{{asset($data->img_path)}}">
                </td>
                <td>
                    @if ($data->status == 1)
                        {!! '<span class="rounded-0 label label-success">Còn hàng</span>' !!}
                    @elseif ($data->status == 2)
                        {!! '<span class="rounded-0 label label-info">Sắp ra mắt</span>' !!}
                    @elseif ($data->status == 0)
                        {!! '<span class="rounded-0 label label-warning">Hết hàng</span>' !!}
                    @endif
                </td>
                <td><span class="label label-{{ $data->hot == 0 ? 'primary' : 'danger' }} label-mini">{{ $data->hot == 1 ? 'Hot' : 'Không' }}</span></td>
                <td>
                    <a href="{{ route('product.image', $data->id) }}" type="button" >
                        <button class="btn btn-warning btn-xs"><i class="fa fa-image "></i>
                        </button>
                    </a>
                    @can('product_edit')
                    <a href="{{ route('product.edit', $data->id)}}" type="button" >
                        <button class="btn btn-primary btn-xs"><i class="fa fa-pencil "></i>
                        </button>
                    </a>
                    @endcan


                    @can('product_delete')
                    <button class="btn btn-danger btn-xs delPrdJS"
                        data-toggle="modal"
                        data-target="#delProductModal"
                        data-id="{{ $data->id }}"
                        data-name="{{ $data->name }}"
                        >
                        <i class="fa fa-trash-o "></i>
                    </button>
                    @endcan
                </td>
            </tr>
        </tbody>
        @endforeach
    </table>
</div>
