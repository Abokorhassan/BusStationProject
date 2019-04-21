/**
 * Created by user on 7/6/16.
 */
if($("html[dir='rtl']")) {
    $('.rating').rating({
        size:'sm',
        rtl:'true'
    });
}
else{
    $('.rating').rating({
        size:'sm',
    });
}
$('#input-3').rating({
    step: 1,
    size: 'sm',
    starCaptions: {1: 'Poor', 2: 'Average', 3: 'Good', 4: 'Very Good', 5: 'Excellent'},
    starCaptionClasses: {1: 'text-danger', 2: 'text-warning', 3: 'text-info', 4: 'text-primary', 5: 'text-success'}
});

// $('.starability-growRotate').rating({
//     rtl:true
// })






