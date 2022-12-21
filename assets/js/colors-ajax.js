$(document).ready(function() {

    /*
    * Get products through filter
    */
    const pagination = $('#paginate .links')
    const pagold = pagination.html()
    let verif = false

    function control_filter() {

        const el  = $(this)
        const obj = el.parent().parent()

        const move_objects = () => {

            const actives = $('#filter .actives')
            const status = obj.attr('data-status')
            const objrow = obj.attr('data-block')

            if( status === 'on'){

                obj.detach().appendTo(actives);

            }else{

                obj.detach().appendTo(`.${objrow}`);

            }

        };

        if( el.is(':checked')){

            obj.attr('data-status', 'on')

        }else{

            obj.attr('data-status', 'off')

        }

        move_objects()

        let inputsActives = get_filters_actives()

        console.log(inputsActives.allInputs.length );
        if (inputsActives.allInputs.length >= 1) {
          verif = true
        }else{
          verif = false
        }

        get_products_through_the_filter(inputsActives.allCategory, inputsActives.allColors)

    }
    $('#filter input').on('change', control_filter)


    function get_products_through_the_filter( categories, colors, currentpage = 1){

        $.ajax({
            url: ajaxLoad_ajaxurl.ajaxurl,
            type: 'POST',
            dataType: 'json',
            async: true,
            data: {
                action: 'imgs_product',
                categories: categories,
                colors: colors,
                currentpage: currentpage
            },
            beforeSend: function() {
                $('#grid').text('Carregando...')
            },
            success: function( response ) {

                // console.log(response);
                $('#grid').html( response.products )

                if (verif === true) {
                  pagination.html( response.pagination )
                }else{
                  pagination.html( pagold )
                }

            },
            fail: function( jqXHR, textStatus ) {
              console.log( jqXHR, textStatus )
            }
        })
    }

    const get_filters_actives = () => {

      const allInputs = $('[data-status=on]')
      const allColors = []
      const allCategory = []

      allInputs?.each( function(){

          const category = $(this).attr('data-block')

          if (category === 'colors') {

              allColors.push($(this).children().children('input').val());

          } else {

              allCategory.push($(this).children().children('input').val());

          }

      })

      return { allInputs, allColors, allCategory }

    }


    /* Function for filter pagination */
    function cotrol_pagination_filter(){

      const el = get_filters_actives()
      const numpage = $(this).attr('data-numpage')

      if (verif === true) {
        get_products_through_the_filter( el.allCategory, el.allColors, numpage)
      }
      // console.log( );

    }
    $('body').on('click', '.bt-paginate', cotrol_pagination_filter)



    /* ORDEM A|Z */
    $('[data-order]').on('click', function() {
        const buttonOrder = $(this).attr('data-order');

        let htmls = [];

        const classProduct = 'product';
        $('.az-za button').removeClass('active')

        $(`.${classProduct}`)?.each((_, element) => {
            htmls.push({
                html: `<div class="${classProduct}">${$(element).html()}</div>`,
                name: $(element).children('a').children('h2').text(),
            });
        });

        if (buttonOrder === 'a-z') {
            htmls.sort((a, b) => {
                return a.name.localeCompare(b.name);
            });
        } else {
            htmls.sort((a, b) => {
                return a.name.localeCompare(b.name);
            }).reverse();
        }

        $(`[data-order="${buttonOrder}"]`).addClass('active')
        const nArr = htmls.map(data => data.html).join('');

        // console.log(nArr);
        $('#grid').html(nArr);
    });
});
