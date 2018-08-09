//scripty mcscriptface
function loadImage(type){
    //0 = any
    //1 = cnyp (48)
    //2 = clipart (329)
    //3 = other (23)
    var index = 0;
    switch(type){
        case 0:
            index = Math.floor((Math.random()*10));
            if(index < 4){
                loadImage(1);
            } else if (index <= 7){
                loadImage(2);
            } else {
                loadImage(3);
            }
            break;
        case 1:
            index = Math.floor((Math.random()*48));
            writeImage("https://www.cusdclipco.org/images/cnyp/image_" + index + ".png");
            break;

        case 2:
            index = Math.floor((Math.random()*329));
            writeImage("https://www.cusdclipco.org/images/clipart/image_" + index + ".png");
            break;

        case 3:
            index = Math.floor((Math.random()*23));
            writeImage("https://www.cusdclipco.org/images/other/image_" + index + ".png"); 
            break;
    } 

    function writeImage(filePath){
        var img_node = document.createElement("IMG");
        img_node.setAttribute("id","stock-image-image");
        img_node.setAttribute("src", filePath);
        img_node.setAttribute("alt", "Stock Image");
        img_node.setAttribute("class", "subpage_image");
        document.getElementById('stock-image').appendChild(img_node);
    }


}

