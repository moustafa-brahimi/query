jQuery(document).ready(function ($) {




    console.log("hello developer");





    var content     =   $(".buttonsDisplayer").html(),





        style       =   $(".buttonsDisplayer").siblings(".sharer").css("marginTop"),





        listHeight  =   $('.the-list .menu').height(),



        comments    =   $("#all-comments"),


        btn         =   $( '.info .love:not(.loving)' ),

        savedSearchs=   [],


        bestTime,  clicks,  placeholder, menuClicks, loadMore, pageId, postID, that, animationDuration,loveBtn,

        searchInput, textVal, searchKey, results, lovesNum, authorLink, thePost, searchItem;


    // ========== set post content css prop


    $( '.query-single-post' ).css({

      fontSize    :   postcontent.size + "px",
      fontFamily  :   postcontent.family,
      fontWeight  :   postcontent.weight

    });





    // sub menu config



    $( ".menu-item-has-children" ).each( function () {



      $( this ).children( "a" ).attr( { href: "#" } );



      $( this ).on( "click", function() {



        menuClicks = $(this).data('clicks');



        $( this ).data("clicks", !menuClicks);



        if( !menuClicks ) {



          $( this ).find( " .sub-menu " ).show().animate( {  opacity: 1, marginTop: "10px"  }, 500 );



          $( this ).find( " .sub-menu li " ).animate( { height: "65px" } );



        } else {





          $( this ).find( " .sub-menu " ).animate( {  opacity: 0, marginTop: "0px"  }, 500 );



          $( this ).find( " .sub-menu li " ).animate( { height: "0" } );



        }





      });



    });



    // set nav elements height





    function menuNavHeight() {





       listHeight = $('.the-list .menu').height();





       $('#search-input input').animate({ height: listHeight }, 1000 );





    }





    menuNavHeight();





    // timing the search button





    $('#search-button').on("click", function() {





      bestTime = $(this).css("animationDuration").replace('s', '');





      function runInTime() {





        $("#search-input").toggleClass("hidden").find('input').focus();



        $(".menu").toggleClass("hidden");





        $("#search-button .fa-search, #search-button .fa-chevron-left").toggleClass( "hidden" );



      }




      setTimeout(runInTime, bestTime / 2 * 1000);







      clicks = $(this).data('clicks');





      $(this).data("clicks", !clicks);







      if( !clicks ) {





        $(this).css({ animation: "search-nav-button " + bestTime + "s forwards"});






      } else {





        $(this).css({ animation: "search-nav-reverse " + bestTime + "s forwards"});





      }





    });



    //============================ mobile menu config

    $( "#search-control" ).on( "click", function() {



      searchInput   =   $( this ).siblings( "#searchform" );

      textVal       =   $( searchInput ).find( "input" ).val();

      if( textVal.length == 0 ) {

        $( searchInput ).find( "input" ).focus();

      } else {

        $( searchInput ).submit();

      }

    });

    $( "#menu-control" ).on( "click", function() {

      $( ".menu-items" ).slideToggle();

      $( this ).find( ".close,.open" ).toggleClass( "hidden" );

    });

    //==================== search bar



    searchItem  =  $( ".results a" ).clone();

    $( ".results a" ).remove();

    $( ".the-list #s" ).on( "focus", function() {

      $( ".results" ).slideDown();

    });



    $( ".the-list #s" ).on( "blur", function() {

      $( ".results" ).slideUp();

    });

    // =====

    // $( ".the-list #searchform" ).on( "submit", function( e ) { e.preventDefault() });

    // =====

    $( ".show-more" ).on( "click", function() {

      $( ".the-list #searchform" ).submit();

    });

    $( ".the-list #s" ).on( "keyup", function()  {

      searchKey     =   $( this ).val().trim();

      if( searchKey.length <= 3 ) {

        $( ".show-more" ).hide();

        return;

      }


      $( ".results" ).find( "a" ).remove();

      $( ".loading" ).show();

      $( ".show-more" ).show();

      if( savedSearchs[searchKey] != undefined  ) {

        $( ".results" ).find( "a" ).remove();

        $( ".loading" ).hide();

        $( ".show-more" ).show();


        $( savedSearchs[searchKey] ).appendTo( $( ".results" ) );

        return;

      }

      setTimeout( function() {

        $.ajax({

          url     :  ajax.url,

          type    : 'post',

          data    : {

            action  : "nav_search",

            keyword : searchKey

          },

          success : function( response ) {

              $( ".results" ).find( "a" ).remove();

              $( ".loading" ).hide();

              posts = JSON.parse( response );

              //console.log( response );

              Object.values( posts ).forEach(( post ) => {

                const {
                  title = '',
                  thumbnail = false,
                  permalink = '',
                  author_name = '',
                  date = '',
                } = post;

                $( searchItem ).clone().appendTo( $( ".results" ) );
                
                $( ".results a:last-of-type" ).find( "h3" ).text( title );
                $( ".results a:last-of-type" ).attr( "href", permalink );

                if( thumbnail ) {
                  $( ".results a:last-of-type" ).find( "img" ).attr( "src", thumbnail );
                } else {
                  $( ".results a:last-of-type" ).find( "img" ).remove();
                }
                $( ".results a:last-of-type" ).find( ".author" ).append( author_name );
                $( ".results a:last-of-type" ).find( ".date" ).append( date );

              });



              savedSearchs[searchKey]  = $( ".results a" );

           },

          error   : function( reponse ) {  }


        });

      }, 500 );


    });


    // comments form edit



    comments.find( "#comments" ).remove();


    comments.find( ".says" ).remove();



    comments.find( "#respond" ).remove();



    comments.find( ".children .avatar" ).remove();



    comments.find( ".children .comment-meta a" ).remove();



    $( "#comment-form input, #comment-form textarea" ).each( function () {



      placeholder = $(this).siblings( "label" ).remove().text();



      $(this).attr( "placeholder", placeholder );



    });





    // go to form button



    $( "#go-to-form" ).on( "click", function() {




    $( "#comment-form #comment" ).focus();



    });





    // try again button



    $(" #try-again ").one( "click", function() {



      $(' #search-button ').click();



    })



    .on( "click", function() {



      $( "#s" ).focus();



    });



    $( ".load-more button" ).on( 'click', function( e ) {

      e.preventDefault();

      loadMore  = $( this ).parents( '.load-more' );

      pageId    = $( loadMore ).data( "page" );


      if( $( loadMore ).hasClass( 'loading' ) ) { return; }


      $( loadMore ).addClass( 'loading' );

      $( loadMore ).find( 'svg' ).removeClass( "fa-ellipsis-h" ).addClass( 'fa-circle-notch fa-spin' );


      $.ajax({

        url     :   ajax.url,

        type    :   'post',

        data    : {

          action  : 'load_new_posts',

          pageId  : pageId


        },

        success : function( reponse ) {

            $( loadMore ).before( reponse );

            $( loadMore ).removeClass( 'loading' );

            $( loadMore ).data( 'page', pageId + 1 );

            $( loadMore ).find( 'svg' ).removeClass( 'fa-circle-notch fa-spin' ).addClass( "fa-ellipsis-h" );

            // to re-run love button for new loaded posts

            btn  = $( ".articles" ).find( ".info .love" );

            quey_love_btn( btn, 'click' );


            // thum dblclick == love

            thumbDblClickLove( $( 'article .thumbnail, article .image' ) );


            if( reponse.length == 0 ) {

              $( loadMore ).text( 'there\'s no more posts' );

            }

        },

        error   : function( reponse ) {


         }


      });


    });



  // ================= love button ==============


  function quey_love_btn( elements, theEvent ) {

    $( elements ).on( theEvent, function( e ) {

      e.preventDefault();

      if( $( this ).hasClass( 'loving' ) ) { return; }

      $( this ).addClass( 'loving' );

      postID            =   $( this ).data('post-id');
      todo            =   ( $(this).hasClass('loved') ? 'unlove' : 'love' );   
      that              =   $( this );


      animationDuration =   Number( $( 'article' ).find( '.middle-heart' ).css( 'animationDuration' ).replace( 's', '' ) );

      
      $.ajax({

        url:  ajax.url,
        type: 'post',
        data: {
          action: 'love_post_button',
          postID,
          todo,
        },

        success : function( response ) {

          console.log( response );

          lovesNum  = parseInt( $( that ).find( 'span' ).text() );
          
          if( response ==  'loved' ) {

            $( that ).addClass( 'loved' );

            $( that ).find( 'span' ).text( lovesNum + 1 );

            $( that ).parents('.info').siblings( '.thumbnail, .image' ).find( ".middle-heart" ).fadeIn( 250 ).delay( animationDuration * 1000 * 2 ).fadeOut( 250 );

          } else if ( response == 'unloved' ) {

            $( that ).removeClass( 'loved' );

            $( that ).find( 'span' ).text( lovesNum - 1 );

          }

          $( that ).removeClass( 'loving' );

         },

        error   :  function( reponse ) {  }

      });

      

    });


}



  quey_love_btn( btn, 'click' );


  // ============= double click thumbnail == love  =============

  function thumbDblClickLove( elements ) {

    $( elements ).on( 'dblclick', function() {

      loveBtn = $( this ).siblings( '.info' ).find( '.love' );

      if( $( loveBtn ).hasClass( 'loved' ) ) { return; }

      $( loveBtn ).click();

    });

  }

  thumbDblClickLove( 'article .thumbnail, article .image' );


  // ===============================================

  $( '.cat-item' ).parents( 'ul' ).addClass( 'cats-list' );

  // ============= remove latest comments text

  $( '.recentcomments' ).each( function() {

    authorLink  =   $( this ).find( '.comment-author-link' ).clone();

    thePost     =   $( this ).find( 'a' ).clone();

    $( this ).empty();

    $( this ).append( thePost ).prepend( authorLink );


  });

  // ================================

  $( ".query-single-post blockquote" ).prepend( "<i class='fas fa-quote-left icon'></i>" );


});

