/**
 * @param type - 0 means an ID. 1 means a class
 */
function createElementView(type, widgetID) {
    
    if (type == 0) {
        type = "ID";
    } else if (type == 1) {
        type = "Class";
    }
    
    // Assimilaçao de elemento
    var element_view = document.getElementById(widgetID);
    
    // Criaçao do container do widget
    var divContainerWidget = document.createElement("div");
    divContainerWidget.setAttribute("ID", widgetID + "_gen_" + this.IDClassList.length);
    
    
    // Text element to be between fields
    
    // Checks if is the first widget or not
    // If does, it's not necessary to perform the following action
    if (document.querySelectorAll("#" + widgetID + " > div").length != 0) {
        var divNodeInfo = document.createElement('div');
        divNodeInfo.setAttribute("class", "extract_field_info");
        var nodeInfo = document.createTextNode("and after");
        divNodeInfo.appendChild(nodeInfo);
        divContainerWidget.appendChild(divNodeInfo);
    }
    
    // Criaçao dos outros elementos constituintes do widget
    var nodeinfo = document.createTextNode(type);
    var inputText = document.createElement("input");
    var inputRemove = document.createElement("input");
    inputText.setAttribute("type", "text");
    inputRemove.setAttribute("type","button");
    inputRemove.setAttribute("value","X");
    inputRemove.setAttribute("onClick", "document.getElementById('" +  widgetID + "_gen_" + this.IDClassList.length + "').outerHTML = ''");
    divContainerWidget.appendChild(nodeinfo);
    divContainerWidget.appendChild(inputText);
    divContainerWidget.appendChild(inputRemove);
    element_view.appendChild(divContainerWidget);
    
    this.IDClassList.push(divContainerWidget);
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
