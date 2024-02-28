jQuery(document).ready(function($) {
    $( '.wp-magazine-install-plugins' ).click( function ( e ) {
        e.preventDefault();

        $( this ).addClass( 'updating-message' );
        $( this ).text( wp_magazine_adi_install.btn_text );

        $.ajax({
            type: "POST",
            url: ajaxurl,
            data: {
                action     : 'wp_magazine_getting_started',
                security : wp_magazine_adi_install.nonce,
                slug : 'advanced-import',
                filename : 'advanced-import',
                request : 1
            },

            success:function( response ) {
                            setTimeout(function(){

                                $.ajax( {
                                    type: "POST",
                                    url: ajaxurl,
                                    data: {
                                        action : 'wp_magazine_getting_started',
                                        security : wp_magazine_adi_install.nonce,
                                        slug : 'wpmagplus-companion',
                                        filename : 'wpmagplus-companion',
                                        request : 2
                                    },
                                    success:function( response ) {
                                        var extra_uri, redirect_uri, dismiss_nonce;
                                        setTimeout(function() {
                                            if ( $( '.wp-magazine-close' ).length ) {
                                                dismiss_nonce = $( '.wp-magazine-close' ).attr( 'href' ).split( 'wp_magazine_admin_notice_nonce=' )[1];
                                                extra_uri     = '&wp_magazine_admin_notice_nonce=' + dismiss_nonce;
                                            }
                                            redirect_uri         = response.data.redirect + extra_uri;
                                            window.location.href = redirect_uri;

                                        }, 2000 );
                                    },
                                    error: function( xhr, ajaxOptions, thrownError ){
                                        console.log( thrownError );
                                    }
                                } );

                            }, 2000 );
                            
                        },
                       
            error: function( xhr, ajaxOptions, thrownError ){
                console.log(thrownError);
            }
        });
    } );


} );