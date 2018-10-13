function validateFields(isEdit = false) {
    var validateForm = true;
    var p_name = $("#person_name").val();
    var p_dob = $("#person_dob").val();
    var p_email = $("#person_email").val();
    var p_favorite = $("#person_favorite_color").val();
    if (isEdit == true) {
        p_name = $("#person_name_edit").val();
        p_dob = $("#person_dob_edit").val();
        p_email = $("#person_email_edit").val();
        p_favorite = $("#person_favorite_color_edit").val();
    }
    var errorMessages = [];
    if (p_name == "") {
        errorMessages.push("A name is Required");
        validateForm = false;
    } else {
        if (!minLengthString(p_name,3)) {
            errorMessages.push("A name requires more than 3 characters");
            validateForm = false;
        }
    }
    if (p_dob == "") {
        errorMessages.push("A Date of Birth is Required");
        validateForm = false;
    }
    if (p_email == "") {
        errorMessages.push("An email is Required");
        validateForm = false;
    } else {
        if (!validateEmail(p_email)) {
            errorMessages.push("A valid email is required");
            validateForm = false;
        }
    }
    if (p_favorite == "") {
        errorMessages.push("A favorite color is Required");
        validateForm = false;
    } else {
        if (!minLengthString(p_favorite,2)) {
            errorMessages.push("A favorite color requires more than 2 characters");
            validateForm = false;
        }
    }

    //console.log(errorMessages);
    if (!validateForm) {
        var responseMessage = "<ul>";
        $.each( errorMessages,function(index, value) {
            responseMessage = responseMessage + "<li>" + value + "</li>";
        });
        responseMessage = responseMessage + "</ul>";
        //console.log(responseMessage);
        if (isEdit) {
            showErrorEdit(responseMessage);
        } else {
            showError(responseMessage);
        }
    }
    return validateForm;
}

function showError(errorMessage) {
    $("#error_message").html(errorMessage);
    $("#error_div").show();
}
function showErrorEdit(errorMessage) {
    $("#error_message_edit").html(errorMessage);
    $("#error_div_edit").show();
}

function minLengthString(string,length) {
     if (string.length > length) {
          return true;
     } else {
          return false;
     }
}

function validateEmail(email) {
      if( /(.+)@(.+){2,}\.(.+){2,}/.test(email) ){
          // valid email
          return true;
      } else {
          // invalid email
          return false;
      }
}
