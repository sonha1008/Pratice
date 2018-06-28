requirejs.config({
	paths: {
		"knockoutjslib": "knockout-3.4.2",
		"helloworld" : "helloworld"
	}
});
requirejs(["helloworld"]);