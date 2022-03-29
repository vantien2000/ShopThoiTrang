
$(document).ready(function() {
    var positionCate = '.table-data-cate';
    var typeFormCate = 'category';
    var typeHandleEdit = 'edit';
    var typeHandleAdd = 'add';
    let formCateAdd = '#form-cate-add';
    ajaxHandleForm(formCateAdd, positionCate, typeFormCate, typeHandleAdd);
    let formCateEdit = '#form-cate-edit';
    ajaxHandleForm(formCateEdit, positionCate, typeFormCate, typeHandleEdit);
    var positionType = '.table-data-type';
    var typeFormType = 'type';
    let formTypeAdd = '#form-type-add';
    ajaxHandleForm(formTypeAdd, positionType, typeFormType, typeHandleAdd);
    let formTypeEdit = '#form-type-edit';
    ajaxHandleForm(formTypeEdit, positionType, typeFormType, typeHandleEdit);
    function ajaxHandleForm(form, position, typeForm, typeHandle) {
        $(document).on('submit',form, function(e){
            e.preventDefault();
            $.ajax({
                url : $(form).attr('action'),
                type: 'POST',
                data: $(form).serialize(),
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(res) {
                    let error = $(form+' .error-message');
                    let id = res[typeForm][''+typeForm+'_id'];
                    let positionHandle = typeHandle === 'add' ? $(position) : $(position + ' .'+typeForm+'-'+id);
                    if(res[typeForm] === null) {
                        error.text(res.message);
                    }
                    else {
                        var set = setting(id, typeForm , res);
                        if (typeHandle === 'add') {
                            positionHandle.append(set.html);
                        } else {
                            positionHandle.replaceWith(set.html);
                        }
                        error.text('');
                    }
                }
            });
            $(form + ' .submit').click(function(e) {
                $(form).trigger('submit');
            });
        });
    };

    let formDeleteCate = $('.table-data-cate .delete-btn');
    let formDeleteType = $('.table-data-type .delete-btn');
    let typeHanleDeleteCate = 'category';
    let typeHanleDeleteType = 'type';
    handleDelete(formDeleteCate, typeHanleDeleteCate);
    handleDelete(formDeleteType, typeHanleDeleteType);

    function handleDelete(formDeleteCate, types) {
        formDeleteCate.on('click', function(e) {
            e.preventDefault();
            var id = $(this).data(''+types+'-id');
            $.ajax({
                url: $(this).data('delete-url'),
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(res) {
                    if (res.deleted > 0) {
                        $('.'+types+'-'+id).remove();
                    }
                    alert(res.message);
                }
            });
        });
    };

    function setting(id, type, data) {
        let categoryRow = type == 'type' ? '<td>'+data['category_name']+'</td>' : '';
        var url = {
            edit: location.origin + '/edit-'+type+'/' + id,
            delete: location.origin + '/delete-'+type+'/' + id
        };
        var html = '<tr class="'+type+'-'+id+'"><td>'+id+'</td>'+
                '<td>'+data[type][''+type+'_name']+'</td>'+
                categoryRow+
                '<td><span>'+
                    '<a href="javascript:void(0)" data-'+type+'-id="'+id+'" class="edit-btn" data-edit-url="'+url.edit+'" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil color-muted m-r-5"></i> </a>'+
                    '<a href="javascript:void(0)" data-'+type+'-id="'+id+'" class="delete-btn" data-delete-url="'+url.delete+'" data-toggle="tooltip" data-placement="top" title="Close"><i class="fa fa-close color-danger"></i></a></span>'+
                '</td></tr>';
            return {
                url,
                html
            };
    };
    
});