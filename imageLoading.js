//scripty mcscriptface
function loadImage(type){
    //0 = any
    //1 = cnyp (48)
    //2 = clipart (284)
    //3 = other (23)
    switch(type){
        case 0:
            var i = Math.floor((Math.random()*3)+1);
            loadImage(i);
            break;
        case 1:
            var i = Math.floor((Math.random()*48));
            var filePath = "images/cnyp/image_" + i + ".png";
            var x = document.createElement("IMG");
            x.setAttribute("src", filePath);
            x.setAttribute("alt", "Stock Image");
            x.setAttribute("class", "subpage_image")
            document.getElementById('stock-image').appendChild(x);
            break;

        case 2:
            var i = Math.floor((Math.random()*284));
            var filePath = "images/clipart/image_" + i + ".png";
            var x = document.createElement("IMG");
            x.setAttribute("src", filePath);
            x.setAttribute("alt", "Stock Image");
            x.setAttribute("class", "subpage_image")
            document.getElementById('stock-image').appendChild(x);
            break;

        case 3:
            var i = Math.floor((Math.random()*23));
            var filePath = "images/other/image_" + i + ".png";
            var x = document.createElement("IMG");
            x.setAttribute("src", filePath);
            x.setAttribute("alt", "Stock Image");
            x.setAttribute("class", "subpage_image")
            document.getElementById('stock-image').appendChild(x);
            break;

    }   
}
