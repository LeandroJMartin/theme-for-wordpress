$(document).ready(function () {

    /*-- Menu --*/
    $('#open-menu').click(function() {
        $('.navigation').toggleClass('active')
        $(this).toggleClass('on')
        $('header').toggleClass('fixed')
    });

    $('#slide').owlCarousel({
        loop: true,
        margin: 0,
        mouseDrag: true,
        autoplay: true,
        autoHeight:true,
        smartSpeed: 1200,
        dots: true,
        nav: false,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
            },
            768: {
                items: 1,
            },
            1024: {
                items: 1
            }
        }
    });

    $('#slide_lines').owlCarousel({
        loop: true,
        margin: 0,
        mouseDrag: true,
        autoplay: false,
        navText: ['<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="1" stroke-linecap="square" stroke-linejoin="bevel"><path d="M15 18l-6-6 6-6"/></svg>', '<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="1" stroke-linecap="square" stroke-linejoin="bevel"><path d="M9 18l6-6-6-6"/></svg>'],
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
                dots: true,
                nav: false,
            },
            768: {
                items: 1,
                dots: false,
                nav: true,
            }
        }
    });

    const $owl = $('#gallery').owlCarousel({
        loop: false,
        items: 1,
        mouseDrag: true,
        autoplay: false,
        nav: false,
        dots: true,
        thumbs: true,
        thumbImage: true,
        thumbContainerClass: 'owl-thumbs',
        thumbItemClass: 'owl-thumb-item',
        responsiveClass: true,
        responsive: {
            576: {
                items: 1,
                dots: false,
            },
        }
    });


    $('.flines, .tipes, .colors').on('click', function(){
        $(this).toggleClass('open')
    })

    /*
    * controller galery product
    */

    function select_category_gallery(){

        const obj = $('#imgs_p > div')
        const cat = $(this).attr('data-category')

        obj.each(function(){

            const item = $(this)
            const imgs = $(this).attr('data-catimg')

            if (imgs === cat) {

                const html = item.html()

                $('#gallery.owl-carousel').trigger('replace.owl.carousel', html).trigger('refresh.owl.carousel');

            }

        })

        const thumb = $('#thumbs_imgs_p > div')

        thumb.each(function(){

            const thuitem = $(this)
            const thumb = $(this).attr('data-cathumb')

            if (thumb === cat) {

                const thumbhtml = thuitem.html()

                $('.owl-thumbs').html(thumbhtml);

            }
        })

        $('.options .opt button').removeClass('active')
        $(this).addClass('active')

    }
    $('.options .opt button').on('click', select_category_gallery);


    /*
    * controller representatives
    */
    function get_agents() {

        const eslink = $(this).attr('data-es')
        const selec = $('#es-mobi').val()
        const name = $(this).attr('data-estado')

        let is = true

        $('#adj_height li').each(function(){

            const height = $(this).height()

            const agent = $(this).attr('data-es')

            $(this).css({ 'display' : 'none'})

            if (eslink === agent) {

                $('.estado #es').text(name)
                $(this).css({ 'display' : 'block'})

                is = false

            }

            if (selec === agent) {

                $('.estado #es').text(name)
                $(this).css({ 'display' : 'block'})

            }
        })

        if (is === true ) {

          $('.estado #es').text(name)
          $('#es-error').css({ 'display' : 'block' })

        }

    }
    $('.map a').on('click', get_agents)
    $('#es-mobi').on('change', get_agents)


    $('#video').on('click', function(){

        $('.modal-video').addClass('open')

    })

    $('.modal-video, .modal-video .close').on('click', function(){
        $(this).removeClass('open')
    })

    $('#i_video').width(function(){
    let larg = $(this).width();
    let alt = larg / 1.77;
    $(this).css('height', alt);
    });


});

function adjust_margin_left(){

    if( $(window).width() > 768 ){

        const w = $(window).width()
        const obj = $('.container').width()
        let res = (w - obj) / 2

        document.documentElement.style.setProperty('--vw', `${res}px`);

    }

}adjust_margin_left()
