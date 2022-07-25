/**
 * JCarroll 24/06/22
 *
 * This file is to handle all paging within a document
 */


function getIndexFromParents(Element)
{
    return Array.prototype.indexOf.call(Element, Element.parent())
}


function RemoveAll(arrayToDelete){
    for (let i = 0; i < arrayToDelete.length; i++) {
        $(arrayToDelete[i]).remove();
    }
}

function PageBeforeElement(Element){
    let page = $(Element.parent(".page-Control")).clone();
    let index = getIndexFromParents(Element, Element.parent())
    RemoveAll(Element.nextAll()); //remove all overflowing elements
    RemoveAll($(page.find(Element)).prevAll()); //Remove all elements before the current
    Element.remove();
}

