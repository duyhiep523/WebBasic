$(document).ready(function () {

    var text_math = $('#result').text();
    // reset
    function resetCalculator() {
        $("#write").text("");
        $("#result").text("");
        text_math = "";
        $("#write").css("overflow-x", "hidden");
    }
    $('#reset').click(function () {
        resetCalculator();
    })
    // nhập
    var arr = ["\(", "\)", "\/", "7", "8", "9", "x", "4", "5", "6", "-", "1", "2", "3", "+", "0", "."];
    for (let i = 1; i < 18; i++) {
        $(".btn:eq(" + i + ")").click(function () {
            if ($("#result").text() == "Error!!!") {
                resetCalculator();
            }
            if ($("#result").text() != "") {
                text_math = $("#result").text();
                $("#result").text("");
            }
            text_math += arr[i - 1];
            $("#write").text(text_math);
            console.log(text_math);
            showoverflow();
        })
    }
    // tính toán
    $(".btnEqual").click(function () {
        text_math = text_math.replace("x", "*");
        try {
            let result = eval(text_math);
            $("#result").text(result);
        } catch (error) {
            $("#result").text("Error!!!");
        }
    })
    // tràn
    function showoverflow() {
        if (text_math.length > 11) {
            $("#write").css("overflow-x", "scroll");
        } else {
            $("#write").css("overflow-x", "hidden");
        }
    }

});