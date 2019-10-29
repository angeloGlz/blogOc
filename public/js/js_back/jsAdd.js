$(".submitDelete").on("click", function(){
	if (confirm("Voulez-vous vraiment supprimer ce chapitre ?")) {
		return true;
	}
	else{
		return false;
	}
})