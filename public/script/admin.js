
function adminPageInsertImage(type, img) {
	if(type == 'header') {
		opener.document.forms[0].header_image.value = img;
	} else {
		opener.document.forms[0].content.value += '<img src="{@image ' + img + '}" alt="">';
	}
}