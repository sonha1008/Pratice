define(["helloworld","knockoutjslib"],function(hl,ko) {
	var ViewModel = function(first, last) {
    this.firstName = ko.observable(first);
    this.lastName = ko.observable(last);
 
    this.fullName = ko.computed(function() {
        // Knockout tracks dependencies automatically. It knows that fullName depends on firstName and lastName, because these get called when evaluating fullName.
       return this.firstName() + " " + this.lastName();
    	}, this);
	};

	ko.applyBindings(new ViewModel("Son", "Ha")); // This makes Knockout get to work

});