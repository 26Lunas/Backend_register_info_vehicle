$(function(){
    console.log("Jquery esta funcionando...");


    $.ajax({
        url: "https://vpic.nhtsa.dot.gov/api/vehicles/DecodeVINValuesBatch/",
        type: "POST",
        data: { format: "json", data: "1N6SD16S8SC443992;"},
        dataType: "json",
        success: function(result)
        {
            console.log(result);
        },
        error: function(xhr, ajaxOptions, thrownError)
        {
            console.log(xhr.status);
            console.log(thrownError);
        }
    });
        
});