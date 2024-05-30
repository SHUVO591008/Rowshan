//Gender Formate Validate
$.validator.addMethod(
  "genderFormat",
  function (value, element) {
      if (value == "male" || value == "female" || value == "other") {
          return true;
      }
  },
  "Please Enter Valid Data."
);

//Religion Formate Validate
$.validator.addMethod(
  "religionFormat",
  function (value, element) {
      if (
          value == "hinduism" ||
          value == "islam" ||
          value == "buddhists" ||
          value == "christianity"
      ) {
          return true;
      }
  },
  "Please Enter Valid Data."
);

//Date Formate Validate
$.validator.addMethod(
"dateFormat",
function (value, element) {
    if (value == "") {
        return true;
    }

    var rxDatePattern =
        /(?:0[1-9]|[12][0-9]|3[01])\/(?:0[1-9]|1[0-2])\/(?:19|20\d{2})/;
    return value.match(rxDatePattern);
},
"Please enter a date in the format dd/mm/yyyy."
);


 //Blood Group Format  Validate
 $.validator.addMethod(
  "bloodgroupFormat",
  function (value, element) {
      if (
          value == "" ||
          value == "A+" ||
          value == "A-" ||
          value == "B+" ||
          value == "B-" ||
          value == "O+" ||
          value == "O-" ||
          value == "AB+" ||
          value == "AB-"
      ) {
          return true;
      }
  },
  "Please Enter Valid Data."
);

//Phone Formate Validate
$.validator.addMethod(
"phoneFormat",
function (value, element) {
    if (value == "") {
        return true;
    }
    var rxPhonePattern = /(^(\+88|0088)?(01){1}[3456789]{1}(\d){8})$/;
    return value.match(rxPhonePattern);
},
"Please Enter Valid Phone Number."
);

//City Formate Validate
$.validator.addMethod(
  "cityFormat",
  function (value, element) {
      if (value == "bangladesh") {
          return true;
      }
  },
  "Please Enter Valid Data."
);



//status Formate Validate
$.validator.addMethod(
  "statusActiveInactive",
  function (value, element) {
      if (value == "active" || value == "inactive") {
          return true;
      }
  },
  "Please Enter Valid Data."
);

//social Formate Validate
$.validator.addMethod(
  "socialValid",
  function (value, element) {
      if (
          value == "" ||
          value == "facebook" ||
          value == "twitter" ||
          value == "linkedIn" ||
          value == "instagram" ||
          value == "youtube"
      ) {
          return true;
      }
  },
  "Please Enter Valid Data."
);

$(document).ready(function () {

    $('#dsrAddForm').validate({
      rules: {
        firstName: {
          required: true,
          maxlength: 55,
        },
        lastName: {
          required: true,
          maxlength: 55,
        },
        gender: {
          required: true,
          genderFormat: true,
        },
        religion: {
          required: true,
          religionFormat: true,
        },
        role_id: {
          required: true,
        },
        joining_date: {
          required: true,
          dateFormat: true,
        },

        designation: {
          required: true,
        },

        qualification: {
            required: true,
        },
        experience_details: {
            required: false,
        },
        total_experience: {
            required: false,
        },

        blood_group: {
          required: true,
          bloodgroupFormat: true,
        },


        dob: {
          required: true,
          dateFormat: true,
        },

        phone: {
          required: true,
          phoneFormat: true,
          minlength: 11,
          maxlength: 11,
        },

        email: {
          required: false,
          email: true,
          remote: {
              url: "/DSR/backend/varifyemail",
              type: "GET",
              data: {
                  email: function () {
                      return $("#email").val();
                  },
              },
          },
        },


        address1: {
            maxlength: 255,
            required: true,
        },
        address2: {
            maxlength: 255,
            required: false,
        },

        city: {
            required: true,
            cityFormat: true,
        },
        nid_number: {
          required: true,
          digits: true,
        },
        image: {
          required: true,
        },
        father_name: {
          required: true,
        },
        mother_name: {
            required: true,
        },
        gurdian_mobile: {
          required: true,
          phoneFormat: true,
          minlength: 11,
          maxlength: 11,
        },

        gurdian_nid_number: {
          required: true,
          digits: true,
        },
        relationship: {
          required: true,
          maxlength: 55,
        },
        gurdian_image: {
          required: true,
        },
        gurdian_documents: {
          required: true,
        },
        username: {
          required: true,
          minlength: 5,
          remote: {
              url: "/DSR/backend/varify/name",
              type: "GET",
              data: {
                  role_id: function () {
                      return $("#role_id").val();
                  },
                  username: function () {
                      return $("#username").val();
                  },
              },
          },
        },
        status: {
            required: true,
            statusActiveInactive: true,
        },

        password: {
            required: true,
            minlength: 6,
        },
        cpassword: {
            required: true,
            equalTo: "#password",
        },
        "socialicon[]": {
          required: false,
          socialValid: true,
        },
        "socialUrl[]": {
          required: false,
          url: true,
        },
        bank_name: {
          required: true,
        },
        bank_AC: {
            required: true,
            digits: true,
        },
        AC_holder: {
            required: true,
        },

        about: {
          required: false,
        },
      
        cv: {
          required: true,
      },
      
      
      },
      messages: {
        email: {
          required: "Please enter a email address",
          email: "Please enter a vaild email address"
        },
        password: {
          required: "Please provide a password",
          minlength: "Your password must be at least 6 characters long"
        },
        terms: "Please accept our terms"
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