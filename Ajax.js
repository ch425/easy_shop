function sendAjax() {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "a.php", true);
    xhr.send(null);
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var data = xhr.responseText;
            document.body.innerHTML = data;
            // 获取所有的tr
            var $trAll = document.getElementsByTagName('tr');
            for (var i = 1; i < $trAll.length; i++) {
                var $td = $trAll[i].querySelectorAll('td');
                $td[0].innerHTML = "<img src='" +$td[0].innerHTML + "'/>";
            }
        }
    }
}
sendAjax();