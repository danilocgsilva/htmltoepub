/**
 * @param type - 0 means an ID. 1 means a class
 */
function createElementView(type, widgetID) {
    
    /**
     * Array to hold all ID elements holders
     */
    IDClassList = [];
    
    if (type == 0) {
        type = "ID";
    } else if (type == 1) {
        type = "Class";
    }
    
    var element_view = document.getElementById(widgetID);
    var divContainerWidget = document.createElement("div");
    divContainerWidget.setAttribute("class", IDClassList.length);
    var nodeinfo = document.createTextNode(type);
    var inputText = document.createElement("input");
    var inputRemove = document.createElement("input");
    inputText.setAttribute("type", "text");
    inputRemove.setAttribute("type","button");
    inputRemove.setAttribute("value","X");
    inputRemove.setAttribute("onClick", "this.parent.outerHTML = ''");
    divContainerWidget.appendChild(nodeinfo);
    divContainerWidget.appendChild(inputText);
    divContainerWidget.appendChild(inputRemove);
    element_view.appendChild(divContainerWidget);
    
    IDClassList.push(divContainerWidget);
    
    alert(IDClassList.length);
}
