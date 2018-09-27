
var shop = (function(){
    return {
        init: function(){
            this.event();
        },
        event: function(){
            document.body.onclick = function(e){
                e = e || window.event;
                var target = e.target || e.srcElement;
                if(target.innerHTML == "加入购物车"){
                    console.log(target.parentNode.parentNode);
                    $td = target.parentNode.parentNode.childNodes;
                    console.log($td);
                    var obj = {};
                    for(var i = 0; i < $td.length - 1; i++){
                        if(i == $td.length - 1){
                            obj[$td[i]] = $td[i];
                        }
                        // else{
                        //     arr.push($td[i].innerHTML);
                        // }
                    }
                    console.log(obj);
                    // console.log(JSON.parse(arr));
                }
            }
        }
    }
}())