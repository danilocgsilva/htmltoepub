

/**
 * @param type - 0 means an ID. 1 means a class
 */
function createElementView(type) {
    
    if (type == 0) {
        type = "ID";
    } else if (type == 1) {
        type = "Class";
    }
    
    var element_view = document.getElementById("titulo_aqui");
    var nodeinfo = document.createTextNode(type);
    var inputText = document.createElement("input");
    var inputRemove = document.createElement("input");
    inputText.setAttribute("type", "text");
    inputRemove.setAttribute("type","button");
    inputRemove.setAttribute("value","X");
    element_view.appendChild(nodeinfo);
    element_view.appendChild(inputText);
    element_view.appendChild(inputRemove);
}
