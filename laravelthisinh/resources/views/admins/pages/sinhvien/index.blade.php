@extends('admins/masterlayoutadmin')

@section('main_title')
Student
@endsection

@section('status_avtive_nav_student')
active
@endsection

@section('main_content')
<div class="container-fluid box_main_category">
    <div class="page-head">
        <h4 class="mt-2 mb-2">Thí Sinh</h4>
    </div>
    <div class="edit-table">
        <div class="row">
            <div class="col-lg-12 col-sm-12">
                <div class="card m-b-30">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h5 class="header-title">Edit Table With Button</h5>
                                <p class="text-muted">Add toolbar column with edit and delete buttons.</p>
                            </div>
                            <div class="col-md-6 text-right ">
                                <!-- Button to Open the Modal -->
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#model_student">
                                    Thêm thí sinh mới
                                </button>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#timKiem_student">
                                    Tìm kiếm
                                </button>
                                <a href="{{ route('sinhvien.index') }}" class="btn btn-primary">
                                    Trở lại
                                </a>
                            </div>
                        </div>
                        <div class="">
                            <table class="table table-striped" id="my-table">
                                <thead>
                                    <tr>
                                        <th>Mã thí sinh</th>
                                        <th>Tên thí sinh</th>
                                        <th>Ngày sinh</th>
                                        <th>Quê quán</th>
                                        <th>Tổng điểm</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody ID="tableBodyStudent">
                                    @if( isset($students) )
                                    @foreach($students as $student)
                                    <tr class="category-{{$student->MaThiSinh}} box_category_main  ">
                                        <td> {{ $student->MaThiSinh }} </td>
                                        <td>{{ $student->TenThiSinh }}</td>
                                        <td>{{$student->NgaySinh}}</td>
                                        <td> {{$student->QueQuan}} </td>
                                        <td> {{$student->TongDiem}} </td>
                                        <td class="">
                                            <div class="text-right">
                                                <a href="{{ route('sinhvien.edit',['sinhvien' => $student->MaThiSinh]) }}" data-id="{{ $student->MaThiSinh}}" name="edit_student" class="btn btn-outline-primary btn_edit_student ">Sửa</a>
                                                <a href="{{route('sinhvien.destroy', ['sinhvien' => $student->MaThiSinh])}}" onclick="event.preventDefault();
                                                     document.getElementById('deleteform').submit();" name="delete_student" class="btn btn-outline-danger btn_delete_student">Xóa</a>
                                                <form id="deleteform" action="{{route('sinhvien.destroy', ['sinhvien' => $student->MaThiSinh])}}" method="POST" class="d-none">
                                                    @csrf
                                                    @method('delete')
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endisset
                                </tbody>
                            </table>

                        </div>
                        <!-- tao phần phân trang -->
                        <div class="box_pagination_main">
                            @isset($students)
                            {{ $students->links() }}
                            @endisset
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end row-->
    </div>

    <!-- The Modal -->
    <div class="modal fade" id="model_student">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title edit_title"> Thêm thí sinh </h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="box_body-1 box_modal_add_category">
                        <h5 class="modal-title text-center">Thí sinh</h5>
                        <form action=" {{ route('sinhvien.store') }} " method="post" class="add_student_form">
                            <div class="form-group">
                                <label for="tenthisinh">Tên thí sinh</label>
                                <input type="text" class="form-control" name="ten_thi_sinh" placeholder="Nhập tên thí sinh" id="tenthisinh">
                            </div>
                            <div class="form-group">
                                <label for="id_ngaysinh">Ngày sinh</label>
                                <input type="date" class="form-control" name="idNgaySinh" id="id_ngaysinh" placeholder="Ngày sinh">
                            </div>
                            <div class="form-group">
                                <label for="id_quequan">Quê quán</label>
                                <input type="text" class="form-control" name="idQueQuan" id="id_quequan" placeholder="Nhập quê quán">
                            </div>
                            <div class="form-group">
                                <label for="id_tongdiem">Tổng điểm</label>
                                <input type="text" class="form-control" name="idTongDiem" id="id_tongdiem" placeholder="Nhập quê quán">
                            </div>
                            <input type="hidden" name="idStudent" id="id_student" value="">
                            <input type="hidden" name="missionformcategory" value="submit_form_edit_category">
                        </form>
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-success btn_edit_post">Thêm</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
                </div>

            </div>
        </div>
    </div>


    <!-- The Modal -->
    <div class="modal fade" id="timKiem_student">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title edit_title"> tìm kiếm </h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="box_body-1 box_modal_add_category">
                        <form action="{{ route('sinhvien.search') }}" method="post" class="search_student">
                            <div class="form-group">
                                <label for="tenthisinh">Tìm kiếm</label>
                                <input type="text" class="form-control" name="ten_thi_sinh" placeholder="Nhập cái điều bạn muốn tìm" id="timthisinh">
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-success btn_search_product">Tìm</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
                </div>

            </div>
        </div>
    </div>

</div>


@endsection