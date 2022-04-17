// $(function() {
    var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });


  /*   $('.swalDefaultSuccess').click(function() {
      Toast.fire({
        icon: 'success',
        title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.swalDefaultInfo').click(function() {
      Toast.fire({
        icon: 'info',
        title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.swalDefaultError').click(function() {
      Toast.fire({
        icon: 'error',
        title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.swalDefaultWarning').click(function() {
      Toast.fire({
        icon: 'warning',
        title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.swalDefaultQuestion').click(function() {
      Toast.fire({
        icon: 'question',
        title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
 */

  //});
    function ToastSuccess(message){
        Toast.fire({
            icon: 'success',
            title: message
        })
    }
    function ToastError(message){
        Toast.fire({
            icon: 'error',
            title: message
        })
    }
    $(function() {
        // register Form
        $('#registerform').validate({
            rules: {
                first_name: {
                    required: true,
                    /* remote:{
                        url: "{{route('admin.category.unique.check')}}",
                        type: "post",
                        data: {
                            category_name: function() {
                            return $('input[name="name"]').val();
                            },
                            id: function() {
                                return $('input[name="id"]').val();
                            }
                        }
                     }, */
                },
                last_name:{require:true},
                mobile_no:{require:true},
                email:{require:true},
                password:{require:true},
            },
            messages: {

            },
            errorElement: 'span',
            errorPlacement: function (error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function (element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
            },
            unhighlight: function (element, errorClass, validClass) {
                 $(element).removeClass('is-invalid');
            }
        })
    });
