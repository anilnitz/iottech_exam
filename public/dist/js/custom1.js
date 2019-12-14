var base_url = $('meta[name="base_url"]').attr('content');
var class_List = $('.class_Lists').DataTable({
    serverSide: false,
    ajax:'Admin_Class_list',
    "columns": [
        {"data": "sr_no"},
        {"data": "class_name"},
        {"data": "seats"},
        {"data": "regFees"},
        {"data": "action"}
    ],
    dom: 'Bfrtip',
    buttons: [
        'copyHtml5',
        'excelHtml5',
        'csvHtml5',
        'pdfHtml5'
    ]
});
// for adding tostar will open
$("#addClass").on("aftersubmit", function (e, data) {
    $('#pleasewait').modal('hide');
    toastr[data.type](data.message)
    if (data.type === 'success') {
        class_List.ajax.url("Admin_Class_list").load();
        $(this).trigger('reset');
    }
});
$("#update_class").on("aftersubmit", function (e, data) {
    $('#pleasewait').modal('hide');
    toastr[data.type](data.message)
    if (data.type === 'success') {
        $('#edit-class').modal('hide');
        class_List.ajax.url('Admin_Class_list').load();
    }
});

$(".class_Lists").on('click', '.view-class', function () {
    var id = $(this).attr('class_id');
    var token = $('meta[name="csrf-token"]').attr('content');
    var tables='add_classes';
    $.ajax({
        url:'getData',
        type: 'POST',
        dataType: 'JSON',
        data: { "id": id,"table": 'add_classes',"_token": token,},
        success: function (data) {
            var permission = data.data[0];
            $("#classs_name").html(permission.class_name);
            $("#classs_dessss").html(permission.des);
            $("#class_seat").html(permission.seats);
        },
        error: function (data) {
            console.log('unable to send request..');
        }
    });
});

$(".class_Lists").on('click', '.edit-class', function () {
    var id = $(this).attr('class_id');
    var token = $('meta[name="csrf-token"]').attr('content');
    var tables='add_classes';
    $.ajax({
        url:'getData',
        type: 'POST',
        dataType: 'JSON',
        data: { "id": id,"table": 'add_classes',"_token": token,},
        success: function (data)
        {
            var permission = data.data[0];
            $("#class_id").val(permission.id);
            $("#class_name").val(permission.class_name);
            $("#class_des").val(permission.des);
            $("#class_seats").val(permission.seats);
        },
        error: function (data) {
            console.log('unable to send request..');
        }
    });
});

$(".class_Lists").on('click','.delete_class', function () {
    var id = $(this).attr('class_id');
    var token = $('meta[name="csrf-token"]').attr('content');
    console.log(token);
    swal({
        fadeDuration: 1000,
        fadeDelay: 0.50,
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Delete !'
    }).then(function (result) {
        if (result.value) {
            $.ajax({
                url: APP_URL + '/admin_delete',
                type: 'POST',
                dataType: 'JSON',
                data: {
                    "id": id,
                    "table": 'add_classes',
                    "_token": token,
                },
                success: function (data) {
                    if (data.type === "success")
                    {
                        class_List.ajax.url("Admin_Class_list").load();
                        toastr[data.type](data.message);

                    } else if (data.type === "error") {
                        toastr[data.type](data.message);
                    }
                },
                error: function (data) {
                    console.log(APP_URL);
                    console.log('unable to send request..');
                }
            });
        }
    });
});

/*---------------------------------Examination Term Add------------------------------------------*/
var terms_list = $('.terms_list').DataTable({
    serverSide: false,
    ajax:'term_list',
    "columns": [
        {"data": "sr_no"},
        {"data": "term_name"},
        {"data": "current_date"},
        {"data": "action"}
    ],
    dom: 'Bfrtip',
    buttons: [
        'copyHtml5',
        'excelHtml5',
        'csvHtml5',
        'pdfHtml5'
    ]
});
$("#exam_term").on("aftersubmit", function (e, data) {
    $('#pleasewait').modal('hide');
    toastr[data.type](data.message)
    if (data.type === 'success') {
        terms_list.ajax.url("term_list").load();
        $(this).trigger('reset');
    }
});
$("#update_term").on("aftersubmit", function (e, data) {
    $('#pleasewait').modal('hide');
    toastr[data.type](data.message)
    if (data.type === 'success') {
        $('#edit-term').modal('hide');
        terms_list.ajax.url('term_list').load();
    }
});

$(".terms_list").on('click', '.view-term', function () {
    var id = $(this).attr('term_id');
    var token = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        url:'get_Term_data',
        type: 'get',
        dataType: 'JSON',
        data: { "id": id,"table": 'categories',"_token": token,},
        success: function (data) {
            var permission = data.data[0];
            $("#term_names").html(permission.term_name);
            $("#term_dess").html(permission.description);
            $("#term_dates").html(permission.current_date);
        },
        error: function (data) {
            console.log('unable to send request..');
        }
    });
});

$(".terms_list").on('click', '.edit-term', function () {
    var id = $(this).attr('term_id');
    var token = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        url:'get_Term_data',
        type: 'get',
        dataType: 'JSON',
        data: { "id": id,"table": 'categories',"_token": token,},
        success: function (data)
        {
            var permission = data.data[0];
            $("#term_id").val(permission.id);
            $("#term_name").val(permission.term_name);
            $("#term_des").val(permission.description);
            $("#term_date").val(permission.current_date);
        },
        error: function (data) {
            console.log('unable to send request..');
        }
    });
});

$(".terms_list").on('click','.delete_term', function () {
    var id = $(this).attr('term_id');
    var token = $('meta[name="csrf-token"]').attr('content');
    console.log(token);
    swal({
        fadeDuration: 1000,
        fadeDelay: 0.50,
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Delete !'
    }).then(function (result) {
        if (result.value) {
            $.ajax({
                url: APP_URL + '/exam_term_delete',
                type: 'get',
                dataType: 'JSON',
                data: {
                    "id": id,
                    "table": 'categories',
                    "_token": token,
                },
                success: function (data) {
                    if (data.type === "success")
                    {
                        terms_list.ajax.url("term_list").load();
                        toastr[data.type](data.message);

                    } else if (data.type === "error") {
                        toastr[data.type](data.message);
                    }
                },
                error: function (data) {
                    console.log('unable to send request..');
                }
            });
        }
    });
});


//--------------------------End Add Category---------------------------------------

//------------------------------------Exam type Start------------------------------------
var exam_type_list = $('.exam_type_list').DataTable({
    serverSide: false,
    ajax:'exam_type_list',
    "columns": [
        {"data": "sr_no"},
        {"data": "exam_term.term_name"},
        {"data": "type_name"},
        {"data": "current_date"},
        {"data": "action"}
    ],
    dom: 'Bfrtip',
    buttons: [
        'copyHtml5',
        'excelHtml5',
        'csvHtml5',
        'pdfHtml5'
    ]
});
$("#exam_type").on("aftersubmit", function (e, data) {
    $('#pleasewait').modal('hide');
    toastr[data.type](data.message)
    if (data.type === 'success') {
        exam_type_list.ajax.url("exam_type_list").load();
        $(this).trigger('reset');
    }
});
$("#update_type").on("aftersubmit", function (e, data) {
    $('#pleasewait').modal('hide');
    toastr[data.type](data.message)
    if (data.type === 'success') {
        $('#edit-type').modal('hide');
        exam_type_list.ajax.url('exam_type_list').load();
    }
});
$(".exam_type_list").on('click', '.view-type', function () {
    var id = $(this).attr('type_id');
    var token = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        url:'get_type_data',
        type: 'get',
        dataType: 'JSON',
        data: { "id": id,"table": 'categories',"_token": token,},
        success: function (data) {
            console.log(data);
            var permission = data.data[0];
            $("#type_term").html(permission.exam_term.term_name);
            $("#type_name").html(permission.type_name);
            $("#type_des").html(permission.description);
            $("#type_date").html(permission.current_date);
        },
        error: function (data) {
            console.log('unable to send request..');
        }
    });
});
$(".exam_type_list").on('click', '.edit-type', function () {
    var id = $(this).attr('type_id');
    var token = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        url:'get_type_data',
        type: 'get',
        dataType: 'JSON',
        data: { "id": id,"table": 'categories',"_token": token,},
        success: function (data)
        {
            var permission = data.data[0];
            $("#type_id").val(permission.id);
            $("#type_terms").val(permission.term_id);
            $("#type_names").val(permission.type_name);
            $("#type_dess").val(permission.description);
            $("#type_dates").val(permission.current_date);
        },
        error: function (data) {
            console.log('unable to send request..');
        }
    });
});
$(".exam_type_list").on('click','.delete_type', function () {
    var id = $(this).attr('type_id');
    var token = $('meta[name="csrf-token"]').attr('content');
    console.log(token);
    swal({
        fadeDuration: 1000,
        fadeDelay: 0.50,
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Delete !'
    }).then(function (result) {
        if (result.value) {
            $.ajax({
                url: APP_URL + '/exam_type_delete',
                type: 'get',
                dataType: 'JSON',
                data: {
                    "id": id,
                    "table": 'categories',
                    "_token": token,
                },
                success: function (data) {
                    console.log(APP_URL);
                    if (data.type === "success")
                    {
                        exam_type_list.ajax.url("exam_type_list").load();
                        toastr[data.type](data.message);

                    } else if (data.type === "error") {
                        toastr[data.type](data.message);
                    }
                },
                error: function (data) {
                    console.log(APP_URL);
                    console.log('unable to send request..');
                }
            });
        }
    });
});



//-----------------------------------End Exam type-------------------------------------

