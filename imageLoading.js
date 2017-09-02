//scripty mcscriptface
function loadImage(){
        var i = Math.floor((Math.random()*237)+1);
        if(i == 190){
            i++;
        }
        var filePath = "images/stock-images/stock-image_" + i + ".png";
        var x = document.createElement("IMG");
        x.setAttribute("src", filePath);
        x.setAttribute("alt", "Stock Image");
        x.setAttribute("class", "subpage_image")
        document.getElementById('stock-image').appendChild(x);
    }