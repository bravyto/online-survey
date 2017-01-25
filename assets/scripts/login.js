var Login = function () {

	var handleLogin = function() {
		$('.login-form').validate({
	            errorElement: 'span', //default input error message container
	            errorClass: 'help-block', // default input error message class
	            focusInvalid: false, // do not focus the last invalid input
	            rules: {
	                username: {
	                    required: true
	                },
	                password: {
	                    required: true
	                }
	            },

	            messages: {
	                username: {
	                    required: "Username is required."
	                },
	                password: {
	                    required: "Password is required."
	                }
	            },

	            invalidHandler: function (event, validator) { //display error alert on form submit   
	                $('.alert-error', $('.login-form')).show();
	            },

	            highlight: function (element) { // hightlight error inputs
	                $(element)
	                    .closest('.form-group').addClass('has-error'); // set error class to the control group
	            },

	            success: function (label) {
	                label.closest('.form-group').removeClass('has-error');
	                label.remove();
	            },

	            errorPlacement: function (error, element) {
	                error.insertAfter(element.closest('.input-icon'));
	            },

	            submitHandler: function (form) {
	                form.submit();
	            }
	        });

	        $('.login-form input').keypress(function (e) {
	            if (e.which == 13) {
	                if ($('.login-form').validate().form()) {
	                    $('.login-form').submit();
	                }
	                return false;
	            }
	        });
	}
	// 	var handleCreatePengguna = function() {
	// 	$('#createPengguna').validate({
	//             errorElement: 'span', //default input error message container
	//             errorClass: 'help-block', // default input error message class
	//             focusInvalid: false, // do not focus the last invalid input
	//             rules: {
	//                 username: {
	//                     required: true
	//                 },
	//                 password: {
	//                     required: true
	//                 }
	//             },

	//             messages: {
	//                 username: {
	//                     required: "Username is required."
	//                 },
	//                 password: {
	//                     required: "Password is required."
	//                 }
	//             },

	//             invalidHandler: function (event, validator) { //display error alert on form submit   
	//                 $('.alert-error', $('#createPengguna')).show();
	//             },

	//             highlight: function (element) { // hightlight error inputs
	//                 $(element)
	//                     .closest('.form-group').addClass('has-error'); // set error class to the control group
	//             },

	//             success: function (label) {
	//                 label.closest('.form-group').removeClass('has-error');
	//                 label.remove();
	//             },

	//             errorPlacement: function (error, element) {
	//                 error.insertAfter(element.closest('.input-icon'));
	//             },

	//             submitHandler: function (form) {
	//                 form.submit();
	//             }
	//         });

	//         $('#createPengguna input').keypress(function (e) {
	//             if (e.which == 13) {
	//                 if ($('#createPengguna').validate().form()) {
	//                     $('#createPengguna').submit();
	//                 }
	//                 return false;
	//             }
	//         });
	// }

		var handleCreateLayanan = function() {
		$('#createLayanan').validate({
	            errorElement: 'span', //default input error message container
	            errorClass: 'help-block', // default input error message class
	            focusInvalid: false, // do not focus the last invalid input
	            rules: {
	                layanan: {
	                    required: true
	                },
	                deskripsi: {
	                    required: true
	                }
	            },

	            messages: {
	                layanan: {
	                    required: "Layanan is required."
	                },
	                deskripsi: {
	                    required: "Deskripsi is required."
	                }
	            },

	            invalidHandler: function (event, validator) { //display error alert on form submit   
	                $('.alert-error', $('#createLayanan')).show();
	            },

	            highlight: function (element) { // hightlight error inputs
	                $(element)
	                    .closest('.form-group').addClass('has-error'); // set error class to the control group
	            },

	            success: function (label) {
	                label.closest('.form-group').removeClass('has-error');
	                label.remove();
	            },

	            errorPlacement: function (error, element) {
	                error.insertAfter(element.closest('.input-icon'));
	            },

	            submitHandler: function (form) {
	                form.submit();
	            }
	        });

	        $('#createLayanan input').keypress(function (e) {
	            if (e.which == 13) {
	                if ($('#createLayanan').validate().form()) {
	                    $('#createLayanan').submit();
	                }
	                return false;
	            }
	        });
	}

		var handleStartSurvey = function() {
		$('#startSurvey').validate({
	            errorElement: 'span', //default input error message container
	            errorClass: 'help-block', // default input error message class
	            focusInvalid: false, // do not focus the last invalid input
	            rules: {
	                deskripsi: {
	                    required: true
	                },
	               	nama: {
	                    required: true
	                }
	            },

	            invalidHandler: function (event, validator) { //display error alert on form submit   
	                $('.alert-error', $('#startSurvey')).show();
	            },

	            highlight: function (element) { // hightlight error inputs
	                $(element)
	                    .closest('.form-group').addClass('has-error'); // set error class to the control group
	            },

	            success: function (label) {
	                label.closest('.form-group').removeClass('has-error');
	                label.remove();
	            },

	            errorPlacement: function (error, element) {
	                error.insertAfter(element.closest('.input-icon'));
	            },

	            submitHandler: function (form) {
	                form.submit();
	            }
	        });
	}

		var handleEditPassword = function() {
		$('#editPassword').validate({
	            errorElement: 'span', //default input error message container
	            errorClass: 'help-block', // default input error message class
	            focusInvalid: false, // do not focus the last invalid input
	            rules: {
	                password: {
	                    required: true
	                },
	               	conf_password: {
	                    required: true
	                },
	                old_password: {
	                	required: true
	                }
	            },

	            invalidHandler: function (event, validator) { //display error alert on form submit   
	                $('.alert-error', $('#editPassword')).show();
	            },

	            highlight: function (element) { // hightlight error inputs
	                $(element)
	                    .closest('.form-group').addClass('has-error'); // set error class to the control group
	            },

	            success: function (label) {
	                label.closest('.form-group').removeClass('has-error');
	                label.remove();
	            },

	            errorPlacement: function (error, element) {
	                error.insertAfter(element.closest('.input-icon'));
	            },

	            submitHandler: function (form) {
	                form.submit();
	            }
	        });

	        $('#editPassword input').keypress(function (e) {
	            if (e.which == 13) {
	                if ($('#editPassword').validate().form()) {
	                    $('#editPassword').submit();
	                }
	                return false;
	            }
	        });
	}
    
    return {
        //main function to initiate the module
        init: function () {
        	handleEditPassword();
        	handleStartSurvey();
        	handleCreateLayanan();
			//handleCreatePengguna();
            handleLogin();
        }

    };

}();