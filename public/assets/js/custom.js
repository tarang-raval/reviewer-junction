
    $(function() {

        $.validator.addMethod(
            "regex",
            function(value, element, regexp) {
              var re = new RegExp(regexp);
              return this.optional(element) || re.test(value);
            },
            "Please check your input."
          );

        // register Form
        $('#registerform').validate({
            rules: {
                first_name: {
                    required: true,regex:'^[a-zA-Z]+$'
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
                last_name:{required:true,regex:'^[a-zA-Z]+$'},
                mobile_no:{required:true,minlength:10,maxlength:10},
                email:{required:true,email:true,regex:`([!#-'*+/-9=?A-Z^-~-]+(\.[!#-'*+/-9=?A-Z^-~-]+)*|\"\(\[\]!#-[^-~ \t]|(\\[\t -~]))+\")@([!#-'*+/-9=?A-Z^-~-]+(\.[!#-'*+/-9=?A-Z^-~-]+)*|\[[\t -Z^-~]*])`},
                password:{required:true,minlength:6},
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
    $('#registerform').submit(function(e){
            e.preventDefault();
            return false;
    })
