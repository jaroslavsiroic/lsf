function validate(form){
	fail = validateNick(form.nick.value);
	fail += validateName(form.name.value);
	fail += validateSurname(form.surname.value);
	fail += validatePassword(form.pass.value);

	if (fail == "") return true;
	else { document.getElementById("fail").innerHTML = fail; return false; }
}
function validatePost(form){
	fail = validateTitle(form.title.value);
	fail += validateHeadline(form.headline.value);
	fail += validateContent(form.content.value);
	if (fail == "") return true;
	else { document.getElementById("fail").innerHTML = fail; return false; }
}
function valCom (form) {
	fail = validateComment(form.content.value);
	if (fail == "") return true;
	else { document.getElementById("fail").innerHTML = fail; return false; }
}
function validateComment(field){
	if (field == "") return "No Comment was entered.<br/>";
	else if (field.length < 5)
	return "Comment must be at least 5 characters.<br/>";
	return "";
}
function validateTitle(field){
	if (field == "") return "No Title was entered.<br/>";
	else if (field.length < 5)
	return "Title must be at least 5 characters.<br/>";
	return "";
}
function validateHeadline(field){
	if (field == "") return "No Headline was entered.<br/>";
	else if (field.length < 5)
	return "Headline must be at least 5 characters.<br/>";
	return "";
}
function validateContent(field){
	if (field.length == 0) return "No Content was entered.<br/>";
	else if (field.length < 50)
	return "Content must be at least 50 characters.<br/>";
	return "";
}
function validateNick(field){
	if (field == "") return "No Username was entered.<br/>";
	else if (field.length < 3)
	return "Username must be at least 3 characters.<br/>";
	else if (/[^a-zA-Z0-9_-]/.test(field))
	return "Only a-z, A-Z, 0-9, - and _ allowed in Username.<br/>";
	return "";
}
function validateName(field){
	if (field == "") return "No Name was entered.<br/>";
	else if (/[^a-zA-Z0-9_-]/.test(field))
	return "Only a-z, A-Z, 0-9, - and _ allowed in Name.<br/>";
	return "";
}
function validateSurname(field){
	if (field == "") return "No Surname was entered.<br/>";
	else if (/[^a-zA-Z0-9_-]/.test(field))
	return "Only a-z, A-Z, 0-9, - and _ allowed in Surname.<br/>";
	return "";
}
function validatePassword(field){
	if (field == "") return "No Password was entered.<br/>";
	else if (field.length < 6)
	return "Password must be at least 6 characters.<br/>";
	else if (/[^a-zA-Z0-9_-]/.test(field))
	return "Only a-z, A-Z, 0-9, - and _ allowed in Password.<br/>";
	return "";
}