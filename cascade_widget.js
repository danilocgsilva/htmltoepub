/**
 * @param type - 0 means an ID. 1 means a class
 */
function createElementView(type, widgetID) {
    
    if (type == 0) {
        type = "ID";
    } else if (type == 1) {
        type = "Class";
    }
    
    var element_view = document.getElementById(widgetID);
    var divContainerWidget = document.createElement("div");
    divContainerWidget.setAttribute("class", this.IDClassList.length);
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
    
    this.IDClassList.push(divContainerWidget);
    
    alert(this.IDClassList.length);
}

/**
 * Array to hold all ID elements holders
 */
createElementView.prototype.IDClassList = [];

/**
 * Function to create element
 */
function createOBJ(type, WidgetID) {
  window[WidgetID] = new createElementView(type, WidgetID);
}
