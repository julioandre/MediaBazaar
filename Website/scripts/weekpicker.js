$(".btn-info").on('click',function () {
    console.log("I worked")
    $("#my_php").replaceWith($("#mytable"))
    $("#mytable").removeClass().addClass('makedisplay')
})
$(".btn-danger").on('click',function () {
    $('input[type=checkbox]').prop('checked',false);

})
console.log("I work")

