require('./bootstrap');

/*
    Popup Box
*/

// Open & Close Button
$('#popup-box-open-btn').click(function (e) {
    $('.popup-box').css('display', 'flex');
});

$('#popup-box-close-btn').click(function (e) {
    $('.popup-box').toggle();
});
  
// Copy Button
$('#popup-box-copy-btn').click(function (e) {
    $('#popup-box-copy-input').select();
    document.execCommand("copy");
});