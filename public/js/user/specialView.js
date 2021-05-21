/**
 * Created by Azamat Mirvosiqov on 29.01.2015.
 */

var min = 13,
    max = 30;

function setFontSize(size) {
    if (size < min) {
        size = min;
    }
    if (size > max) {
        size = max;
    }
    $('body').css({'font-size': parseInt(size) + 1 + 'px'});/*26*/
    

}

function makeNormal() {
    $('html').removeClass('blackAndWhite blackAndWhiteInvert');
    $.removeCookie('specialView', {path: '/'});
}

function makeBlackAndWhite() {
    makeNormal();
    $('html').addClass('blackAndWhite');
    $.cookie("specialView", 'blackAndWhite', {path: '/'});
}

function makeBlackAndWhiteDark() {
    makeNormal();
    $('html').addClass('blackAndWhiteInvert');
    $.cookie("specialView", 'blackAndWhiteInvert', {path: '/'});
}

function saveFontSize(size) {
    $.cookie("fontSize", size, {path: '/'});
}
function changeSliderText(sliderId, value) {
    var position = Math.round(Math.abs((value - min) * (100 / (max - min))));
    $('#' + sliderId).prev('.sliderText').children('.range').text(position);
}

$(document).ready(function () {
    var appearance = $.cookie("specialView");
    switch (appearance) {
        case 'blackAndWhite':
            makeBlackAndWhite();
            break;
        case 'blackAndWhiteInvert':
            makeBlackAndWhiteDark();
            break;
    }

    $('.no-propagation').click(function (e) {
        e.stopPropagation();
    });

    $('.appearance .spcNormal').click(function () {
        makeNormal();
    });
    $('.appearance .spcWhiteAndBlack').click(function () {
        makeBlackAndWhite();

    });
    $('.appearance .spcDark').click(function () {
        makeBlackAndWhiteDark();
    });


    $('#fontSizer').slider({
        min: min,
        max: max,
        range: "min",
        slide: function (event, ui) {
            setFontSize(ui.value);
            changeSliderText('fontSizer', ui.value);
        },
        change: function (event, ui) {
            saveFontSize(ui.value);
        }
    });

    var fontSize = $.cookie("fontSize");
    if (typeof(fontSize) != 'undefined') {
        $("#fontSizer").slider('value', fontSize);
        setFontSize(fontSize);
        changeSliderText('fontSizer', fontSize);
    }

    /****************zoomSizer********************/
    $('#zoomSizer').slider({
        min: minzoom,
        max: maxzoom,
        range: "min",
        slide: function (event, ui) {
            setzoomSizer(ui.value);
            changeSliderTextZoom('zoomSizer', ui.value);
        },
        change: function (event, ui) {
            // savezoomSizer(ui.value);
        }
    });

    var zoomSizer = $.cookie("zoomSizer");
    if (typeof(zoomSizer) != 'undefined') {
        $("#zoomSizer").slider('value', zoomSizer);
        setzoomSizer(zoomSizer);
        changeSliderTextZoom('zoomSizer', zoomSizer);
    }

});

var minzoom = 0,
    maxzoom = 5; /** максимум 5 **/

function savezoomSizer(size) {
    $.session("zoomSizer", size, {path: '/'});
}

function changeSliderTextZoom(sliderId, value) {
    var position = Math.round(Math.abs(100 - (20 * (maxzoom - value))));
    $('#' + sliderId).prev('.sliderZoom').children('.range').text(position);
}
function setzoomSizer(size) {
    if (size < minzoom) {
        size = minzoom;
    }
    if (size > maxzoom) {
        size = maxzoom;
    }
    $('body').css({
        // 'zoom': '1.' + parseInt(size),
        // '-ms-zoom': '1.' + parseInt(size),
        // '-webkit-zoom': '1.' + parseInt(size),
        // '-moz-zoom': '1.' + parseInt(size),
        // '-o-zoom': '1.' + parseInt(size),
        '-webkit-transform': 'scale(1.'+parseInt(size)+')',
        '-moz-transform': 'scale(1.'+parseInt(size)+')',
        '-ms-transform': 'scale(1.'+parseInt(size)+')',
        'transform': 'scale(1.'+parseInt(size)+')',
        '-webkit-transform-origin': 'top center',
        '-moz-transform-origin': 'top center',
        '-ms-transform-origin': 'top center',
        'transform-origin': 'top center',
        // '-webkit-transform': 'scale(1.'+parseInt(size)+')',
        // 'transform': "scale(1."+parseInt(size)+")",
        // 'margin-top': ""+ (parseInt(size) + 20) +"%",
    });

}