function assignReviewtoUser(){
    return new Promise(function(resolve,reject){
        let reviewformId=sessionStorage.getItem('reviewformID');
             if(reviewformId!=null){
                $.ajax({
                    "url": "/assignReviewtoUser/"+reviewformId,
                    'method': "GET",
                    data: {'is_new':1},
                    success: function(response) {
                        if (response.status) {
                            sessionStorage.removeItem('reviewformID');
                                resolve(response.review_id);
                        }else{
                            sessionStorage.removeItem('reviewformID');
                            reject(response);
                        }
                    }
                });
             }
    })
 }
 function stripHtml(html)
{
   let tmp = document.createElement("DIV");
   tmp.innerHTML = html;
   return tmp.textContent || tmp.innerText || "";
}
    $(function() {


          $.ajaxSetup({
              headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },
       });
       $('[data-toggle="tooltip"]').tooltip()




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
                first_name: {required: true,regex:'^[a-zA-Z]+$' },
                last_name:{required:true,regex:'^[a-zA-Z]+$'},
                mobile_no:{required:true,minlength:10,maxlength:10,
                    remote:{
                    url: "/uniqueMobile",
                    type: "post",
                    data: {
                        mobile_no: function() {
                        return $('input[name="mobile_no"]').val();
                        }

                    }
                 }
                },
                email:{required:true,email:true,regex:`([!#-'*+/-9=?A-Z^-~-]+(\.[!#-'*+/-9=?A-Z^-~-]+)*|\"\(\[\]!#-[^-~ \t]|(\\[\t -~]))+\")@([!#-'*+/-9=?A-Z^-~-]+(\.[!#-'*+/-9=?A-Z^-~-]+)*|\[[\t -Z^-~]*])`,
                remote:{
                    url: "/uniqueEmail",
                    type: "post",

                 }},
                password:{required:true,minlength:8},
                acceptTermContions:{required:true}
            },
            messages:{
                first_name:{
                    regex:"please enter first name in alphabetic"
                },
                last_name:{
                    regex:"please enter last name in alphabetic"
                },
                email:{
                    regex:"Please enter valid email",
                    remote:"Email is already availbale, try  another email id",
                },
                mopbile_name:{
                    regex:"Please enter valid email",
                    remote:"Mobile no is already availbale, try another mobile no.",
                }
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
        // register Form
        $('#loginform').validate({
            rules: {
                email:{required:true,email:true,regex:`([!#-'*+/-9=?A-Z^-~-]+(\.[!#-'*+/-9=?A-Z^-~-]+)*|\"\(\[\]!#-[^-~ \t]|(\\[\t -~]))+\")@([!#-'*+/-9=?A-Z^-~-]+(\.[!#-'*+/-9=?A-Z^-~-]+)*|\[[\t -Z^-~]*])`},
                password:{required:true},
            },
            messages:{
                first_name:{
                    regex:"please enter first name in alphabetic"
                },
                last_name:{
                    regex:"please enter last name in alphabetic"
                },
                email:{
                    regex:"Please enter valid email",
                    remote:"Email is already availbale, try  another email id",
                },
                mopbile_name:{
                    regex:"Please enter valid email",
                    remote:"Mobile no is already availbale, try another mobile no.",
                }
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
        });
    });
    $('#registerform').submit(function(e){
            e.preventDefault();
            if($('#registerform').valid()){
                $.ajax({
                    "url": "/user/register",
                    'method': "POST",
                    data: $('#registerform').serialize(),
                    success: function(response) {
                        if (response.status) {
                            let reviewformId=sessionStorage.getItem('reviewformID');
                            if(reviewformId != null){


                                        assignReviewtoUser().then(function(review_id){
                                            if(review_id!=null){
                                            window.location.assign('/user/confirm');
                                            }else{
                                            window.location.assign('/user/confirm');
                                            }
                                }).catch(response=>{
                                    alert(response.message);
                                    window.location.assign(currentPage);
                                });
                            }else{
                                window.location.assign(currentPage);
                            }

                        } else {
                            ToastError(response.message);

                        }
                    },
                    error:function(response){

                         response=response.responseJSON;
                         if(response.errors!=undefined  && response.errors!=null){
                            let str = '';
                            for(let x in response.errors){
                                 str += response.errors[x][0]+'<br/>';
                            }
                            $('#signupalert').html(str).addClass('alert-danger');
                        }
                    }
                });
            }else{

            }
            return false;
    });

    $('#loginform').submit(function(e){
        e.preventDefault();
        $('#loginalert').html('').removeClass('alert-danger');
        if($('#loginform').valid()){
            $.ajax({
                "url": "/login",
                'method': "POST",
                data: $('#loginform').serialize(),
                success: function(response) {
                    if (response.status) {
                        let reviewformId=sessionStorage.getItem('reviewformID');
                        if(reviewformId != null){
                        assignReviewtoUser().then(function(review_id){
                                 if(review_id!=null){
                                    window.location.assign('/myaccount');
                                 }else{
                                    window.location.assign(currentPage);
                                 }
                        }).catch(response=>{
                            alert(response.message);
                            window.location.assign(currentPage);
                        });
                    }
                    else{
                        window.location.assign(currentPage);
                    }



                    } else {
                        //ToastError(response.message);
                        if(response.message!='undefined' && response.message!=null){
                            $('#loginalert').html(response.message).addClass('alert-danger');
                        }else if(response.errors!=undefined  && response.errors!=null){
                            $('#loginalert').html(response.errors.email.email[0]).addClass('alert-danger');
                        }

                    }
                },
                error:function(response){
                    debugger
                     response=response.responseJSON;
                     if(response.errors!=undefined  && response.errors!=null){
                        $('#loginalert').html(response.errors.email[0]).addClass('alert-danger');
                    }
                }
            });
        }else{

        }
        return false;
});
$('#write-review').on('click',function(){
    // location.assign("{{route('submit.review')}}");
     if(AuthUser!=null && AuthUser!='undefined' && AuthUser!="" ){
             location.assign("/submit/review");
     }else{
         $('#myaccount').trigger('click');
     }
 });



