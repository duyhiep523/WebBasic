var user = document.getElementById("user");
var pass = document.getElementById("pass");
var err = document.getElementById("err");
var form = document.getElementById("for")
form.addEventListener("submit", function (event) {
    event.preventDefault();
    if (user.value == "") {
        count("Vui lòng nhập đầy đủ thông tin")
        user.focus();
        return false;
    }
    if (pass.value == "") {
        count("Vui lòng nhập đầy đủ thông tin")
        pass.focus();
        return false;
    }
    if (user.value != "admin") {
        count("Tài khoản không tồn tại")
        user.focus()
        return false;

    } else if (pass.value != "admin") {
        count("Mật khẩu không chính xác")
        pass.focus()
        return false;
    } else {
        sessionStorage.setItem("name","Nguyễn Duy Hiệp")
        window.location = "index.html"
        return true;
    }

})
function count(sos) {
    err.style.display = "flex"
    err.textContent = sos;
    setTimeout(function () {
        err.textContent = "";
        err.style.display = "none"
    }, 3000)
    
}