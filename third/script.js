$('#submit').click(function() {
    $('#object-container').empty();
    n = $('#n-input').val()
    for (i = 0; i < n; i++) {
        $('#object-container').append('<img src="images/image.png" class="gopher" draggable="true">');
    }
    $(function () {
        $(".gopher").draggable();
    });
});