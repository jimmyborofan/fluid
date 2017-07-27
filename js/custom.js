/**
 * 
 * Custom or generic functions shared by more than one view are placed in here 
 * for efficiency
 */

$(document).ready(function () {
        /*
         * generic back button function to return user to main task table
         */
  $('.backButton').click(function() {
        location.href = "/index.php?/Page";
    });
});
