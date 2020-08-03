<div class="row mt">
    <div class="col-md-12">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-info">Danh sách thành viên</h4>
        </div>
        <div class="content-panel">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col"><span style="color:black">STT</span></th>
                        <th scope="col"><span style="color:black">Tên thành viên</span></th>
                        <th scope="col"><span style="color:black">Email</span></th>
                        <th scope="col"><span style="color:black">Ảnh đại diện</span></th>
                        <th scope="col"><span style="color:black">Vai trò</span></th>
                        <th scope="col"><span style="color:black">Tùy chọn</span></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($member as $key => $data)
                    <tr class="rowTable{{ $data->id }}">
                        <th scope="row">{{ $key + 1 }}</th>
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->email }}</td>
                        <td>
                            <img src="{{$data->avatar}}" width="90" height="120"></td>
                        <td>{{ ($data->roles)->pluck('name')->implode(' , ') ?? '' }}</td>
                        <td>

                            @can('member_edit')
                            <a href="{{ route('member.edit',$data->id) }}">
                                <button class="btn btn-primary btn-xs ">
                                    <i class="fa fa-pencil "></i>
                                </button>
                            </a>
                            @endcan

                            @can('member_delete')
                            <button class="btn btn-danger btn-xs delMember" data-toggle="modal" data-target="#delMemberModal"
                                data-id="{{ $data->id }}" data-name="{{ $data->name }}"
                                ><i class="fa fa-trash-o "></i>
                            </button>
                            @endcan

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
