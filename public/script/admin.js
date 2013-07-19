
function adminPageInsertImage(type, img) {
	if(type == 'header') {
		opener.document.forms[0].header_image.value = img;
	} else {
		var editor = opener.myCodeMirror;
		var img = '<img src="{@image ' + img + '}" alt="">';
		var pos = editor.getCursor() // or {line , ch };
		var tok = editor.getTokenAt(pos);
		editor.replaceRange(img, pos);
	}
}