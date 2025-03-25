$('.faq-question-buyers').on('click', function() {
    try {
        const $answer = $(this).next();
        const $button = $(this);

        if (!$answer.length) {
            throw new Error('Answer element not found');
        }
        $answer.stop(true, true).slideToggle(400, function() {
            setTimeout(function() {
                if ($answer.is(':hidden')) {
                    $button.css("color", "#ffffff");
                } else {
                    $button.css("color", "#000000");
                }
            }, 500);
        });
    } catch (error) {
        console.error('Error occurred:', error.message);
        alert('Error 404: Something went wrong');
    }
});


$('.faq-question-sellers').on('click', function() {
    const $answer = $(this).next();
    const $button = $(this);

    if ($answer.is(':visible')) {
        $answer.stop(true, true).fadeOut(400);
        setTimeout(function() {$button.css("color", "#ffffff");}, 500);
    } else {
        $answer.stop(true, true).fadeIn();
        setTimeout(function() {$button.css("color", "#000000");}, 500);
    }
    
});

$('.faq-question-renters').on('click', function() {
    const $answer = $(this).next();
    const $button = $(this);

    if ($answer.is(':visible')) {
        $answer.stop(true, true).animate(
            { opacity: 0, height: 'toggle' }, 400);
            setTimeout(function() {$button.css("color", "#ffffff");}, 500);
    } else {
        $answer.stop(true, true).animate(
            { opacity: 1, height: 'toggle' }, 400);
            setTimeout(function() {$button.css("color", "#000000");}, 500);
    }
});
