var txt_user = document.querySelector("form #user");
var txt_pass = document.querySelector("form #pass");
var errrrr = document.getElementById("er");
var in4 = document.getElementById("name_us");
var txt_error = "";
var hiih;
document.getElementById("btnSubmit").addEventListener("click", myfunction);
function myfunction(event) {
    event.preventDefault();
    if (txt_pass.value == "" || txt_user.value == "") {
        txt_error += "Vui lòng nhập đầy đủ thông tin"
        write_error(txt_error);

        txt_error = ""
        return false;
    }
    if (txt_user.value != "admin") {
        txt_error += "Tài khoản không tồn tại"
        write_error(txt_error);
        txt_error = ""
        return false;
    } else if (txt_pass.value != "admin") {
        txt_error += "Mật khẩu sai"
        write_error(txt_error);
        txt_error = ""
        return false;
    }
    else {
        hiih = txt_user.value;
        window.location.href = "index.html";
        in4.textContent = hiih;
    }
}

function write_error(sos) {
    errrrr.style.display = "flex"
    errrrr.textContent = sos;
    setTimeout(function () {
        errrrr.textContent = "";
        errrrr.style.display = "none"
    }, 3000);
}


