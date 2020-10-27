/* Custom */
$('.datatable').DataTable();
$('.editor').summernote();

var overlay = document.getElementById('overlay')
window.addEventListener('load', function() {
    overlay.style.display = "none"
})


$.fn.clicktoggle = function(a, b) {
    return this.each(function() {
        var clicked = false;
        $(this).click(function() {
            if (clicked) {
                clicked = false;
                return b.apply(this, arguments);
            }
            clicked = true;
            return a.apply(this, arguments);
        });
    });
};

var width = $("div.uk-sticky").width();

var clickopen = function() {
    $("#left-bar").show();
    $("#right-bar").css('margin-left', '260px');
    $("div.uk-sticky").css('width', width);
}

var clickclose = function() {
    $("#left-bar").hide();
    $("#right-bar").css('margin-left', '0px');
    $("div.uk-sticky").css('width', '100%');
}

function leftbarclose()
{
    $("#left-bar-open").on('click', function() {
        $("#left-bar").show();
        // UIkit.offcanvas("#left-bar").show();
    });
    
    $("#left-bar-close").on('click', function() {
        $("#left-bar").hide();
        // UIkit.offcanvas("#left-bar").show();
    });

    $("div.uk-sticky").css('width', '100%');
    $("nav").css('width', '100%');
}

$("#leftbar-toggle").clicktoggle(clickclose, clickopen);

function leftbaropen()
{
    $("#left-bar").show();
}


if($(window).width() >= 960) {
    leftbaropen();
}
else {
    leftbarclose();
}

$(window).resize(function() {
    if($(this).width() >= 960) {
        leftbaropen();
    }
    else {
        leftbarclose();
    }
});

var readImage = (input) => {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        var preview = $('#preview-featured');
        reader.onload = function(e) {
            preview.attr('src', e.target.result);
            preview.show();
        }
        reader.readAsDataURL(input.files[0]); // convert to base64 string
    }
}

$("#featureImage").change(function(){
    readImage(this);
});

$(".formlay").on('submit', function() {
    overlay.style.display = "block"
})