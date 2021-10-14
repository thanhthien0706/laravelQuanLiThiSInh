const { forEach } = require("lodash");

$(document).ready(function() {
    $("#model_student .btn_edit_post").click(function(e) {
        e.preventDefault();
        callConfirm(
            "Bạn có chắc chắn không?",
            addstudent,
            $("#model_student .add_student_form")
        );
    });

    $(".btn_edit_student").click(function(e) {
        e.preventDefault();
        xuLyAjaxEdit($(this));
    });

    $(".btn_search_product").click(function(e) {
        e.preventDefault();
        xuLyTim($(".search_student"));
    });
});

function callConfirm($msg, callback, itemAction) {
    $(".btn_confirm .text_msg").text($msg);
    $(".btn_confirm").css({
        right: "30px",
        "z-index": "99999"
    });

    $(".btn_confirm .close").click(function() {
        $(".btn_confirm").css({
            right: "-999px"
        });
    });

    $(".btn_confirm .btn_ok").click(function() {
        // delete_category($(".btn_submit_form_delete"));
        callback(itemAction);
        $(".btn_confirm").css({
            right: "-999px"
        });
    });

    $(".btn_confirm .btn_cancel").click(function() {
        $(".btn_confirm").css({
            right: "-999px"
        });
    });
}

function xuLyTim($this) {
    let $url = $this.attr("action");
    let $token = $("meta[name='csrf-token']").attr("content");
    let $dataId = $("#timthisinh").val();
    let $missionformcategory = "Tim_thi_sinh";
    // console.log($url, $token, $dataId, $missionformcategory);
    ajaxSubmitForm($url, $token, "POST", $dataId, $missionformcategory);
}

function xuLyAjaxEdit($this) {
    let $url = $this.attr("href");
    let $token = $("meta[name='csrf-token']").attr("content");
    let $dataId = $this.data("id");
    let $missionformcategory = "editStudent";
    // console.log($url, $token, $dataId, $missionformcategory);
    ajaxSubmitForm($url, $token, "GET", $dataId, $missionformcategory);
}

function addstudent($this) {
    let $url = $this.attr("action");
    let $token = $("meta[name='csrf-token']").attr("content");
    let $dataId = $this.serializeArray();
    let $missionformcategory = $(
        "input[name='submit_form_edit_category']"
    ).val();
    // console.log($url, $token, $dataId, $missionformcategory);
    ajaxSubmitForm($url, $token, "POST", $dataId, $missionformcategory);
}

function ajaxSubmitForm($url, $token, $type, $dataId, $missionformcategory) {
    $.ajax({
        url: $url,
        type: $type,
        data: {
            _token: $token,
            data_id: $dataId,
            mission_form: $missionformcategory
        },
        success: function(data) {
            if (data.successAddStudent) {
                $(".alert-success .text_msg").text(data.successAddStudent);
                $(".alert-success").css({
                    right: "30px",
                    "z-index": "99999"
                });
                $(".alert-success .close").click(function() {
                    $(".alert-success").css({
                        right: "-999px"
                    });
                });

                setTimeout(function() {
                    $(".alert-success").css({
                        right: "-999px"
                    });
                }, 3000);
                location.reload();
            }
            if (data.editDataCategory) {
                $("#model_student #tenthisinh").val(
                    data.editDataCategory[0].TenThiSinh
                );
                $("#model_student #id_ngaysinh").val(
                    data.editDataCategory[0].NgaySinh
                );
                $("#model_student #id_quequan").val(
                    data.editDataCategory[0].QueQuan
                );
                $("#model_student #id_tongdiem").val(
                    data.editDataCategory[0].TongDiem
                );
                $("#model_student #id_student").val(
                    data.editDataCategory[0].MaThiSinh
                );
                $("#model_student .btn_edit_post").text("Sửa");
                $("#model_student .edit_title").text("Sửa thí sinh");
                jQuery.noConflict();
                $("#model_student").modal("show");
            }
            if (data.editThanhCong) {
                location.reload();
            }
            if (data.datasudent) {
                $("#tableBodyStudent").empty();
                data.datasudent.forEach(function($dt) {
                    $("#tableBodyStudent").append(`
                    <tr class="category-${$dt.MaThiSinh} box_category_main  ">
                                        <td> ${$dt.MaThiSinh} </td>
                                        <td>${$dt.TenThiSinh} </td>
                                        <td>${$dt.NgaySinh}</td>
                                        <td>${$dt.QueQuan}</td>
                                        <td>${$dt.TongDiem}</td>
                                        <td class="">
                                            <div class="text-right">
                                                <a href="{{ route('sinhvien.edit',['sinhvien' => ${$dt.MaThiSinh}]) }}" data-id="{{ ${$dt.MaThiSinh}}}" name="edit_student" class="btn btn-outline-primary btn_edit_student ">Sửa</a>
                                                <a href="{{route('sinhvien.destroy', ['sinhvien' => ${$dt.MaThiSinh}])}}" onclick="event.preventDefault();
                                                     document.getElementById('deleteform').submit();" name="delete_student" class="btn btn-outline-danger btn_delete_student">Xóa</a>
                                                <form id="deleteform" action="{{route('sinhvien.destroy', ['sinhvien' => ${$dt.MaThiSinh}])}}" method="POST" class="d-none">
                                                    @csrf
                                                    @method('delete')
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                    `);
                });
            }
        }
    });
}
