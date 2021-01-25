

/* Toggles text box DIV between expanded and shrunken, assuming parameter is anchor and text box uses the same name minus 'Control'. */
function toggleTextBoxByControl(textBoxControl) {
    var textBoxControlId, textBoxId, textBoxControl;

    textBoxControlId = textBoxControl.id;
    textBoxId = textBoxControlId.replace('Control', '');
    textBox = document.getElementById(textBoxId);
    toggleTextBox(textBox, textBoxControl);
}

function toggleTextBox(textBox, textBoxControl) {
    if (textBox.className == 'textboxshrunken') {
        expandTextBox(textBox, textBoxControl);
    } else {
        shrinkTextBox(textBox, textBoxControl);
    }
}

function expandTextBox(textBox, textBoxControl) {
    textBox.className = 'textboxexpanded';
    textBoxControl.innerHTML = 'less';
}

function shrinkTextBox(textBox, textBoxControl) {
    textBox.className = 'textboxshrunken';
    textBoxControl.innerHTML = 'more';
}

/* Toggles text box DIV between expanded and shrunken, assuming parameter
   is anchor and text box uses the same name minus 'Control'. */
function toggleTextBoxSmallByControl(textBoxControl) {
    var textBoxControlId, textBoxId, textBoxControl;

    textBoxControlId = textBoxControl.id;
    textBoxId = textBoxControlId.replace('Control', '');;
    textBox = document.getElementById(textBoxId);
    toggleTextBoxSmall(textBox, textBoxControl);
}

function toggleTextBoxSmall(textBox, textBoxControl) {
    if (textBox.className == 'textboxsmallshrunken') {
        expandTextBoxSmall(textBox, textBoxControl);
    } else {
        shrinkTextBoxSmall(textBox, textBoxControl);
    }
}

function expandTextBoxSmall(textBox, textBoxControl) {
    textBox.className = 'textboxsmallexpanded';
    textBoxControl.innerHTML = 'less';
}

function shrinkTextBoxSmall(textBox, textBoxControl) {
    textBox.className = 'textboxsmallshrunken';
    textBoxControl.innerHTML = 'more';
}



function selectMenu(menuId) {
    var menuframe;

    menuframe = document.getElementById('menuFrame');
    menuframe.contentWindow.selectMenu(menuId);
}

function galleryPopup(queryString) {
    window.open('../galleryPopup.htm?' + queryString,'gallerypopup', 'location=no,menubar=no,resizable=no,scrollbars=no,status=no,toolbar=no,height=288,width=352');
}
