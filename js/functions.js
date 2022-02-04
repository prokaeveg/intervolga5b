jQuery(function (){
    $('#addButton').on("click",function (){
        return confirm('Do you want to add a new row in database?');
    });
    $('#backButton').on("click", function (){
       return confirm('Do you want go back to the main page?');
    });
});