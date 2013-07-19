
function adminPageInsertImage(type, img) {
	if(type == 'header') {
		opener.document.forms[0].header_image.value = img;
	} else {
		var editor = opener.myCodeMirror;
		var img = '<img src="{@image ' + img + '}" alt="">';
		var pos = editor.getCursor();
		editor.replaceRange(img, pos);
	}
}