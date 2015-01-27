/**
 * Created by azhou1 on 2015-01-13.
 */

/**
 * Shows the element with the given id if hidden and hides it if it is currently showing
 *
 * @param id - id of element to alternate display of
 */
function alternate_display_tablerow_id(id) {
    var element = document.getElementById(id);
    if(element.style.display == 'none') {
        element.style.display = 'table-row';
    } else {
        element.style.display = 'none';
    }
}

/**
 * Hides all elements with the given class except for one with a specific id (optional)
 *
 * @param class_name - the name of the class of elements to hide
 * @param exclude_ids - the id of an element to be excluded from this procedure (optional)
 */
function hide_elements_with_class(class_name, exclude_id) {
    var exclude_flag = typeof exclude_id !== 'undefined';
    var nodelist = document.getElementsByClassName(class_name);
    for(var i = 0; i < nodelist.length; i++) {
        if(exclude_flag && nodelist[i].id != exclude_id) {
            nodelist[i].style.display = 'none';
        }
    }
}