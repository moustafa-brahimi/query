<form role="search" method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url() ); ?>">



					<input type="text" value="<?php echo esc_attr( get_search_query() ); ?>" autocomplete="off" name="s" id="s" placeholder="<?php esc_attr_e('search', "query"); ?>">



</form>

