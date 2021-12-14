$(document).ready(function(){
    $("#submit").click(function() {
        if ($("#search").val() === "Search...")
        {
            alert("Inserire un valore valido");
            return false;
        }
    });
    
    $("#search").blur(function() {
        if(this.value == ''){ 
            this.value = 'Search...';
        }
    });
    
    $("#search").focus(function() {
        if (this.value == 'Search...') {
            this.value = ''; 
        }
    });
});

