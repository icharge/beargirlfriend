$.validator.setDefaults({
	submitHandler: function() { window.href.location(""); }
});

$().ready(function() {
	// validate the comment form when it is submitted
	$("#commentForm").validate();

	// validate signup form on keyup and submit
	$("#signupForm").validate({
		rules: {
			name: "required",
			ulice: "required",
			username: {
				required: true,
				minlength: 2
			},
			title: {
				required: true,
				minlength: 5
			},
			confirm_password: {
				required: true,
				minlength: 6,
				equalTo: "#password"
			},
			mesto: {
				required: true,
				
			},
			psc: {
				required: true,
				number: true
			},

			ico: {
				number: true
				
			},
			jmeno: {
				required: true,
				
			},
			prijmeni: {
				required: true,
				
			},
			pohlavi: {
				required: true,
				
			},
			email: {
				required: true,
				email: true
			},
			topic: {
				required: "#newsletter:checked",
				minlength: 2
			},
			agree: "required"
		},
		messages: {
			name: "vyplňte jméno !",
			ulice: "vyplňte ulici !",
			username: {
				required: "Zadejte uživatelské jméno",
				minlength: "min. 2 znaky !"
			},
			title: {
				required: "Please write title!",
				minlength: "min. 5 ch.!"
			},
			confirm_password: {
				required: "potvrďte heslo !",
				minlength: "min. 5 znaků !",
				equalTo: "neshodují se !"
			},
			mesto:{
				required: "zadejte město !",
			},
			psc:{
				required: "zadejte PSČ !",
				number: "zadejte čísla !"
			},
			
			ico:{
				number: "zadejte čísla !"
			},

			
			jmeno:{
				required: "zadejte jméno !",
			},
			prijmeni:{
				required: "zadejte příjmení !",
			},
			pohlavi:{
				required: "Zadej pohlaví",
			},
			email: "zadejte e-mail !",
			agree: "Potvrďte OP !"
		}
	});
	


	// propose username by combining first- and lastname
	$("#username").focus(function() {
		var firstname = $("#firstname").val();
		var lastname = $("#lastname").val();
		if(firstname && lastname && !this.value) {
			this.value = firstname + "." + lastname;
		}
	});

	//code to hide topic selection, disable for demo
	var newsletter = $("#newsletter");
	// newsletter topics are optional, hide at first
	var inital = newsletter.is(":checked");
	var topics = $("#newsletter_topics")[inital ? "removeClass" : "addClass"]("gray");
	var topicInputs = topics.find("input").attr("disabled", !inital);
	// show when newsletter is checked
	newsletter.click(function() {
		topics[this.checked ? "removeClass" : "addClass"]("gray");
		topicInputs.attr("disabled", !this.checked);
	});
});
