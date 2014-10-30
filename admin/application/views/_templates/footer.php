
        <?php if(Auth::isUserLoggedIn() == true): ?>
                </div>
            </div>
        </div>
        <!-- footer -->
        <div class="navbar navbar-footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <footer role="contentinfo">
                            <p class="left">Bootstrap 3.x Admin Theme</p>
                            <p class="right">&copy; <?php echo date("Y"); ?> <a href="https://www.facebook.com/Nalin99" target="_blank">Nalin Perera</a></p>
                        </footer>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>        
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script type="text/javascript" src="http://code.jquery.com/jquery-2.0.3.min.js"></script>

        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script type="text/javascript" src="<?php echo ADMIN_URL; ?>/ui/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?php echo ADMIN_URL; ?>/ui/js/twitter-bootstrap-hover-dropdown.min.js"></script>
        <!-- <script type="text/javascript" src="<?php echo ADMIN_URL; ?>/ui/js/bootstrap-admin-theme-change-size.js"></script>-->

        <!-- Init -->
        <script type="text/javascript">
            
            $(function() {

                var pgurl = window.location.href;                
                $("ul.nav li a").each(function(){
                  if($(this).attr("href") == pgurl || $(this).attr("href") == '' )
                  $(this).parent().addClass("active");
                });

                // Setting focus
                //$('input[name="email"]').focus();

                // Setting width of the alert box
                //var alert = $('.alert');
                //var formWidth = $('.bootstrap-admin-login-form').innerWidth();
                //var alertPadding = parseInt($('.alert').css('padding'));

                //if (isNaN(alertPadding)) {
                    //alertPadding = parseInt($(alert).css('padding-left'));
                //}

                //$('.alert').width(formWidth - 2 * alertPadding);
            });
        </script>
    </body>
</html>