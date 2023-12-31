$(document).ready(function () {
    var text_math = $('#result').text();
    // reset
    var write = $("#write");
    var re = $("#result")
    function resetCalculator() {
        write.text("");
        re.text("");
        text_math = "";
        write.css("overflow-x", "hidden");
    }
    $('#reset').click(function () {
        resetCalculator();
    })
    // nhập
    const arr = ["\(", "\)", "\/", "7", "8", "9", "x", "4", "5", "6", "\-", "1", "2", "3", "\+", "0", "\."];
    for (let i = 1; i < 18; i++) {
        $(".btn:eq(" + i + ")").click(function () {
            if (re.text() == "Error!!!") {
                resetCalculator();
            }
            if (re.text() != "") {
                if (i == 3 || i == 7 || i == 11 || i == 15) {
                    text_math = re.text();
                    re.text("");
                } else {
                    resetCalculator();
                }
            }
            text_math += arr[i - 1];
            write.text(text_math);
            showoverflow();
        })
    }
    // tính toán
    $(".btnEqual").click(function () {
        text_math = text_math.replace(/x/g, "*");
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
            write.css("overflow-x", "scroll");
        } else {
            write.css("overflow-x", "hidden");
        }
    }
    $(".btn1").click(function () {
        $(".btn1").toggleClass("dark");
        $(".icon").toggleClass("dark1");
        $("body").toggleClass("dark2");
    })
});